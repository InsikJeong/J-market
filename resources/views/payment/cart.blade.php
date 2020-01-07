@extends('layouts.app')

@section('content')
    <h3>장바구니</h3>
    @forelse($carts as $cart)
        <div class="cartDiv">
            <div class="imgDiv">
                <img src="/goods/{{$cart->filename}}" alt="이미지없음" class="searchImg" onclick="imgClick({{$cart->num}},{{$cart->id}})">
            </div>
            <div class="nameDiv">
                <h3 onclick="imgClick({{$cart->num}},{{$cart->id}})">{{$cart->name}}</h3>
            </div>
            <div class="priceDiv">
                <h3>{{$cart->price}}원</h3>
            </div>
            <input type="number" value="{{$cart->count}}">
            <h5>개</h5>
            <label class="btn btnDel btn-primary" onclick="del({{$cart->id}})">삭제</label>
        </div>
    @empty
    <br>
    <br>
    <h3>담긴 상품이 없습니다.</h3>
    @endforelse
    <br>
    <br>
    <label onclick="allDel()" class="btn btn-primary">장바구니 비우기</label>

    <h3>합계 : {{$hap}}</h3>
@stop
@section('script')
    <script>
        function allDel(){
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            if(confirm('상품을 전부 삭제합니다.')){
                console.log("이프문");
                $.ajax({
                    type:"post",
                    url: '/cart/all',
                }).then(function(e){
                    console.log("덴");
                    window.location.href='/cart';
                },function(e){
                    console.log(e);
                });
            }
        }
        function del(id){
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            if(confirm('상품을 삭제합니다.')){
                console.log("이프문");
                $.ajax({
                    type:"DELETE",
                    url: '/cart/'+id
                }).then(function(e){
                    console.log("덴");
                    window.location.href='/cart';
                },function(e){
                    console.log(e);
                });
            }
        }
    </script>
@stop

@section('style')
    <style>
        .searchImg{
            width:100px;
            height:100px;
        }
        .searchDiv{
            display:flex;            
        }
        .nameDiv,.priceDiv{
            width:200px;
            margin-left:100px;
        }
        .nameDiv>h3,.priceDiv>h3{
            line-height:100px;
            height:100px;
        }
        .btnDel{
            margin-top:30px;
            height:35px;
            margin-left:20px;
        }
        .cartImg{
            width:100px;
            height:100px;
        }
        .cartDiv{
            display:flex;            
        }
        .cartDiv>h3{
            line-height:100px;
            height:100px;
            margin-left:100px;
        }
        .cartDiv>h5{
            line-height:100px;
            height:100px;
            
        }
        .cartDiv>input{
            height:20px;
            margin-left:100px;
            margin-top:40px;
        }
    </style>
@stop