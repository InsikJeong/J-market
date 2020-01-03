@extends('layouts.app')

@section('content')

    <form action="/fashions/{{$good->id}}" class="form__article" method="post" enctype="multipart/form-data">상품 수정
        {{ method_field('PUT') }}
        {!! csrf_field() !!}
        <br>
        <div class="form-group">
            <label>상품 이름</label>
            <input type="text" name='name' value="{{$good->name}}">
            {!! $errors->first('name','<span class="form-error">:message</span>') !!}      
        </div>
        <div class="form-group">
            <label>상품 가격</label>
            <input type="number" name='price' value="{{$good->price}}"> 
            {!! $errors->first('price','<span class="form-error">:message</span>') !!}
        </div>
        <div class="form-group">
            <label>상품 설명</label>
            <textarea name="comments"  cols="100" rows="10" >{{$good->comments}}</textarea>
            {!! $errors->first('comments','<span class="form-error">:message</span>') !!}
        </div>
        <div class="form-group">
            <label>상품 이미지</label> 
            <input type="file" name="files[]" >
            {!! $errors->first('files','<span class="form-error">:message</span>') !!}
        </div>
        <br>
    
        <br>
        <br>
        <br>

        <div class="form-group text-center">
            <button class="button__update__articles btn btn-success">
                수정 하기
            </button>
        </div>
    </form> 

@stop
