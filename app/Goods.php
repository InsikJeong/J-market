<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = [
        'num','name', 'price','comments','filename',
    ];

}
