@extends('layouts.app')

@section('content')
    <div clase="btnCre">
        <a href="goods/create" class="btn btn-primary">상품 추가</a>
    </div>
    <br>
    <br>
    @forelse ($goods as $good)
        <div id="good{{$good->id}}" class="goodDiv">
            <div id="imgDiv" class="imgDiv">
                <img src="/goods/{{$good->filename}}" alt="이미지없음" onclick="imgClick({{$good->num}},{{$good->id}})">
            </div>
            <div class="nameDiv">
                <a href="{{route('goods.show',$good->id)}}">{{$good->name}}</a>
            </div>
            <div class="price">
                <label >{{$good->price}} 원</label>            
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
        .goodDiv{
            display:inline-block;
        }

    </style>
@stop
