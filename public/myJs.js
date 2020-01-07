function re(num){
    if(num == 1){
        window.location.href ='http://127.0.0.1:8000/fashions';
    }
    else if(num==2){
        window.location.href ='http://127.0.0.1:8000/foods';
    }
    else{
        window.location.href ='http://127.0.0.1:8000/';
    }
    }
function imgClick(num,id){
    if(num ==1 ){
        window.location.href ='http://127.0.0.1:8000/goods/'+id;
    }
}