@extends('layouts.app')

@section('content')
    <div>
        <h2 class='buyH2'>상품을 구매해주셔서 감사합니다.</h2>
        <div class="buyDiv">
            <a class="btn btn-primary buyA" href="/">홈으로</a>
            <a class="btn btn-primary buyA" href="/cart">장바구니</a>
        </div>
    </div>
@stop

@section('style')
    <style>
        .buyH2{
            margin-left:300px;
            margin-top:50px;
        }
        .buyDiv{
            margin-left:420px;
            margin-top:50px;
        }
    </style>
@stop