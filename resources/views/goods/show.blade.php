@extends('layouts.app')

@section('content')
    <div class="container-div">
        <img src="/goods/{{$good->filename}}" alt="이미지없음">
        <div class="conDiv">
            <h3>{{$good->name}}</h3>
            <br>
            <p>{{$good->comments}}</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="{{route('cart.store')}}" method='POST' id="paymentForm">
                {!! csrf_field() !!}
                <input id="count" type="number" name="count" value=1> 개 
                <input type="text" name='id' class="showId" value="{{$good->id}}">
                
                <br>
                <br>
                <label class="btn btnBuy" onclick="buy({{$good->id}})">바로 구매</label>
                @if(Auth::user())
                    <button class="btn btnCart">장바구니 담기</button>
                @else
                @endif
            </form>
        </div>
    </div> 
    <br>
    <br>
    <br>
    
    <a class="btn btn-primary btnEdit" href="/goods/{{$good->id}}/edit">상품 수정</a>
    <label class="btn btn-danger btnDel" id="btnDel{{$good->id}}" onclick="del({{$good->id}})">상품 삭제</label>            
    
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

        function buy(id){
            console.log('buy 실행!');
            // var form = $('#paymentForm')[0];
            // var data = new FormData(form);
            // data.append('_method','put');
            // method:'PUT',
            // @method('PUT')
            // console.log(form);
            var count = document.getElementById('count').value;
            console.log(count);
            var data ={'id':id,'count':count};
            window.location.href ='http://127.0.0.1:8000/buy';
        }

        function del(id){
            console.log(id);

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            if(confirm('상품을 삭제합니다.')){
                console.log("이프문");
                $.ajax({
                    type:"DELETE",
                    url: '/goods/'+id
                }).then(function(id){
                    console.log("덴");
                        window.location.href='/';
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
            margin-top:10px;
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