@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/fashion/{{$fashion->filename}}" alt="이미지없음">
        <div class="conDiv">
            <h3>{{$fashion->name}}</h3>
            <br>
            <p>{{$fashion->comments}}</p>
        </div>
    </div> 
    <br>
    <br>
    <br>
    <div class="btnDiv">
        <label >상세 설명</label>
        <label >상품평</label>
        <label >Q&A</label>
    </div>
@stop

@section('style')
    <style>
        .btnDiv{
            display:flex;
            width:100%;
        }
        .btnDiv>label{
            margin-right:50px;
            border: 1px solid black;
            padding:10px;
            width:100px;
            text-align:center;
            background-color:#86E57F;
        }
        .conDiv{
            margin-left:100px;
        }
        .container>img{
            width:400px;
            height:400px;
        }
        .container{
            display:flex;
        }
    </style>
@stop