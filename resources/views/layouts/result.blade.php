@extends('layouts.app')
@section('content')

    <h3>검색 결과</h3>
    <br>
    @forelse ($goods as $good)
        <div class="searchDiv">
            <div class="imgDiv">
                <img src="/goods/{{$good->filename}}" alt="이미지없음" class="searchImg" onclick="imgClick({{$good->num}},{{$good->id}})">
            </div>
            <div class="nameDiv">
                <h3 onclick="imgClick({{$good->num}},{{$good->id}})">{{$good->name}}</h3>
            </div>
            <div class="priceDiv">
                <h3>{{$good->price}}원</h3>
            </div>
        </div>
    @empty
    @endforelse
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
    </style>
@stop