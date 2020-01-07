<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'num','name', 'price','comments','filename','count',
    ];

    
    public function user(){
        //일대다 관계에서 one쪽은 단수
        return $this->belongsTo(User::class);
    }
}
