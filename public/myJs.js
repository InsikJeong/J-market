function re(num){
    if(num == 'fashion'){
        window.location.href ='http://127.0.0.1:8000/fashions';
    }
    else if(num=='food'){
        window.location.href ='http://127.0.0.1:8000/foods';
    }
    else{
        window.location.href ='http://127.0.0.1:8000/';
    }
    }
function imgClick(id){
        window.location.href ='http://127.0.0.1:8000/goods/'+id;  
}