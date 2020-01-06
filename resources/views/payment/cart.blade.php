@extends('layouts.app')

@section('content')
    <h3>장바구니</h3>
    @forelse($carts as $cart)
        <div class="cartDiv">
            <img src="/fashion/{{$cart->filename}}" alt="이미지없음" class="cartImg">
            <h3>{{$cart->name}}</h3>
            <h3>{{$cart->price}}원</h3>
            <input type="number" value="{{$cart->count}}">
        </div>
    @empty
    @endforelse
@stop

@section('style')
    <style>
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
        .cartDiv>input{
            height:20px;
            margin-left:100px;
            margin-top:40px;
        }
    </style>
@stop