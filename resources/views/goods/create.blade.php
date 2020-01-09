@extends('layouts.app')

@section('content')
    <form class="creForm"action="{{route('goods.cre')}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <h3>상품 등록</h3>
        <div class="radioDiv">
            <input type="radio" name="num" value="fashion" checked>  fashion<br>
            <input type="radio" name="num" value="food"> food<br>
        </div>
        <br>
        <label>상품 이름</label>
        <input type="text" name='name' class="val">
        {!! $errors->first('name','<span class="form-error">:message</span>') !!}
        <br>
        <label>상품 가격</label>
        <input type="number" name='price' class="val">
        {!! $errors->first('price','<span class="form-error">:message</span>') !!}
        <br>
        <label>상품 설명</label>
        <textarea name="comments"  cols="100" rows="10" class="val"></textarea>
        {!! $errors->first('comments','<span class="form-error">:message</span>') !!}
        <br>
        <label>상품 이미지</label>
        <input type="file" name="files[]" class="val">
        {!! $errors->first('files','<span class="form-error">:message</span>') !!}
        <br>
        <br>
        <br>

        <button>등록 완료</button>
    </form> 
@stop
@section('style')
    <style>
        .hide1{
            display:none;
        }
        .val{
            width:740px;
            margin-left:30px;
        }
        .creForm>textarea{
            margin-left:30px;
        }
        .radioDiv{
            /* display:flex; */
        }
    </style>        
@stop