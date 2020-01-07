@extends('layouts.app')

@section('content') 
        <div id= "carouselExampleIndicators" class= "carousel slide" data-ride= "carousel" >
            <ol class= "carousel-indicators" > 
                <li data-target= "#carouselExampleIndicators" data-slide-to= "0" class= "active" ></li>
                <li data-target= "#carouselExampleIndicators" data-slide-to= "1" ></li>
                <li data-target= "#carouselExampleIndicators" data-slide-to= "2" ></li>
            </ol> 
            <div class= "carousel-inner" > 
                <div class= "carousel-item active" > 
                    <img class= "d-block w-100" src= "main/carousel/1.jpg" alt= "First slide" > 
                </div> 
                <div class= "carousel-item" > 
                    <img class= "d-block w-100" src= "main/carousel/2.jpg" alt= "Second slide" > 
                </div>
                <div class= "carousel-item" > 
                    <img class= "d-block w-100" src= "main/carousel/3.jpg" alt= "Third slide" > 
                </div>
            </div> 
            <a class= "carousel-control-prev" href= "#carouselExampleIndicators" role= "button" data-slide= "prev" >
                <span class= "carousel-control-prev-icon" aria-hidden= "true" ></span> 
                <span class= "sr-only" > Previous </span> 
            </a>      
            <a class= "carousel-control-next" href= "#carouselExampleIndicators" role= "button" data-slide= "next" > 
                <span class= "carousel-control-next-icon" aria-hidden= "true" ></span> 
                <span class= "sr-only" > Next </span> 
            </a> 
        </div> 
        <div class="bestsellers-div">
            <h3>Best Sellers</h3>
            <div class="best-img-div">
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
            </div>
        </div>
@stop

@section('script')
    <script>
    </script>
@stop
@section('style')
    <style>
        .nameDiv>a{
            color:black;
            text-decoration:none;
        }
        .price>label{
            font-weight:800;
        }
        .carousel-inner
        {
            margin-left:30px;

            width:1200px;
            height:400px;

        }
         .carousel-item>img{
            width:1200px;
            height:400px;
        }
        .bestsellers-div{
            margin-left:30px;
            margin-top:50px;
        }
        .best-img-div{
            display:flex;
            flex-wrap : wrap;
            text-align:center;
        }
        .imgDiv>img{
            width:300px;
            height:300px;
        }
        /* #menu-div{
            display:none;
        } */
    </style>
@stop

@section('script')
    <script>
        // var cartegoryCheck = 0
        // function cartegory(){
        //     if(cartegoryCheck == 0){
        //         document.getElementById("menu-div").style.display="block";
        //         cartegoryCheck =1;
        //     }
        //     else{
        //         document.getElementById("menu-div").style.display="none";
        //         cartegoryCheck =0;
        //     }
        // }
    </script>
@stop