<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        // dd($request->search);
        $search = "%{$request->search}%";


        $goods=\App\Goods::where('name','like',$search)->get();
        return view('layouts.result',compact('goods'));

        // $search = DB::table('goods')
        //         ->where('name', 'like', 'T%')
        //         ->get();
    }
}
