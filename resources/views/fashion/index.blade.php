@extends('layouts.app')

@section('content')
    <div clase="btnCre">
        <a href="fashions/create" class="btn btn-primary">상품 추가</a>
    </div>
    <br>
    <br>
    @forelse ($fashions as $goods)
        <div id="fashion{{$goods->id}}" class="fashionDiv">
            <div id="imgDiv" class="imgDiv">
                <img src="/goods/{{$goods->filename}}" alt="이미지없음" onclick="imgClick({{$goods->num}},{{$goods->id}})">
            </div>
            <div class="nameDiv">
                <a href="{{route('fashions.show',$goods->id)}}">{{$goods->name}}</a>
            </div>
            <div class="price">
                <label >{{$goods->price}} 원</label>            
            </div>
        </div>
    @empty
    @endforelse
@stop

@section('script')
    <script>
    </script>
@stop

@section('style')
    <style>
        .nameDiv>a{
            color:black;
        }
        .btnCre{
            width:1000px;
            /* display:block; */
        }
        .nameDiv,.price{
            text-align:center;
        }
        .price>label{
            font-weight:800;
        }
          .imgDiv>img {
            width:300px;
            height:300px;
        }
        .fashionDiv{
            display:inline-block;
        }

    </style>
@stop
