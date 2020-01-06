@extends('layouts.app')

@section('content')
    <div class="container-div">
        <img src="/fashion/{{$fashion->filename}}" alt="이미지없음">
        <div class="conDiv">
            <h3>{{$fashion->name}}</h3>
            <br>
            <p>{{$fashion->comments}}</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="{{route('cart.store')}}" method='POST'>
                {!! csrf_field() !!}
                <input type="number" name="count" value=1> 개 
                <input type="text" name='id' class="showId" value="{{$fashion->id}}">
                <br>
                <br>
                <a href="/buy" class="btn btnBuy">바로 구매</a>
                <button class="btn btnCart">장바구니 담기</button>
            </form>
        </div>
    </div> 
    <br>
    <br>
    <br>
    
    <a class="btn btn-primary btnEdit" href="/fashions/{{$fashion->id}}/edit">상품 수정</a>
    <label class="btn btn-danger btnDel" id="btnDel{{$fashion->id}}" onclick="del({{$fashion->id}})">상품 삭제</label>            
    
    <br>
    <br>
    <br>

    <div class="btnDiv">
        <label id="label1" class="label1" onclick="la(1)">상세 설명</label>
        <label id="label2" class="label2" onclick="la(2)">상품평</label>
        <label id="label3" class="label3" onclick="la(3)">Q&A</label>
    </div>
    <div id="labelDiv">
        <img src="/label.jpg" alt="">
    </div>
@stop

@section('script')
    <script>        
        var btnDiv = document.getElementById('btnDiv');

        function del(id){
            console.log(id);

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        if(confirm('상품을 삭제합니다.')){
            console.log("이프문");
            $.ajax({
                type:"DELETE",
                url: '/fashions/'+id
            }).then(function(e){
                console.log("덴");
                window.location.href='/fashions';
            },function(e){
                console.log(e);
            });
        }
        }


        function la(n){
            var label1 = document.getElementById('label1');
            var label2 = document.getElementById('label2');
            var label3 = document.getElementById('label3');
            
            console.log(label3);

            label1.style.backgroundColor = "#BDBDBD";
            label2.style.backgroundColor = "#BDBDBD";
            label3.style.backgroundColor = "#BDBDBD";

            if(n == 1){
                label1.style.backgroundColor = "#353535";
                labelDiv.innerHTML= '';
                var conImg = document.createElement("img");
                conImg.src="/label.jpg"
                conImg.className = 'conImg';

                labelDiv.append(conImg);
            }
            if(n==2){
                label2.style.backgroundColor = "#353535";
                labelDiv.innerHTML= '';
            }
            if(n==3){
                label3.style.backgroundColor = "#353535";
                labelDiv.innerHTML= '';
            }
        }
    </script>
@stop

@section('style')
    <style>
        .showId{
            display:none;
        }
        .btnBuy{
            width:200px;
            height:50px;
            line-height:40px;
            background-color:#3490dc;
            color:white;
        }
        .btnCart{
            width:200px;
            height:50px;
            line-height:40px;
            background-color:white;
            border:1px solid black;
        }
        .btnDel{
            margin-top: 8px;
        }
        .conImg{
            width:1000px;
        }
        .btn-div{
            margin-left:10px;
            display:flex;
            width:100%;
        }
        .btnDiv>.label2,.btnDiv>.label3{
            border-radius:0.25em;
            margin-right:50px;
            padding:10px;
            width:100px;
            text-align:center;
            background-color:#BDBDBD;
            font-weight:800;
            color:white;
        }
        .btnDiv>.label1{
            border-radius:0.25em;
            margin-right:50px;
            padding:10px;
            width:100px;
            text-align:center;
            background-color:#353535;
            font-weight:800;
            color:white;
        }
        .btnDiv>label:hover{

        }
        .conDiv{
            margin-left:100px;
        }
        .container-div>img{
            width:400px;
            height:400px;
        }
        .container-div{
            display:flex;
        }
    </style>
@stop