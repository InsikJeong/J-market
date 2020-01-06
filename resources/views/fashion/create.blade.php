@extends('layouts.app')

@section('content')
    <form class="creForm"action="{{route('fashions.store')}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <h3>상품 등록</h3>
        <br>
        <label>상품 이름</label>
        <input type="text" name='name'>
        {!! $errors->first('name','<span class="form-error">:message</span>') !!}
        <br>
        <label>상품 가격</label>
        <input type="number" name='price'>
        {!! $errors->first('price','<span class="form-error">:message</span>') !!}
        <br>
        <label>상품 설명</label>
        <textarea name="comments"  cols="100" rows="10"></textarea>
        {!! $errors->first('comments','<span class="form-error">:message</span>') !!}
        <br>
        <label>상품 이미지</label>
        <input type="file" name="files[]">
        {!! $errors->first('files','<span class="form-error">:message</span>') !!}
        <br>

        <button>등록 완료</button>
    </form> 
@stop
@section('style')
    <style>
        .creForm>input{
            width:740px;
            margin-left:30px;
        }
        .creForm>textarea{
            margin-left:30px;
        }
    </style>        
@stop