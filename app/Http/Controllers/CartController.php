<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $carts=\App\Cart::where('user_id',$user)->get();
        $hap = 0;

        foreach($carts as $cart){
            $hap += $cart->price*$cart->count;
        }

        return view('payment.cart',compact('carts','hap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goods= \App\Goods::whereId($request->id)->first();
        
        // \App\Cart::user()->cart()->create([
            $cart = $request->user()->cart()->create([
            'num'=>$goods->num,
            'name'=>$goods->name,
            'price'=>$goods->price,
            'comments'=>$goods->comments,
            'filename'=>$goods->filename,
            'count'=>$request->count,
        ]);
        
        $carts=\App\Cart::where('user_id',$cart->user_id)->get();
        $hap =0;

        foreach($carts as $cart){
            $hap += $cart->price*$cart->count;
        }

        return view('payment.cart',compact('carts','hap'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart =\App\Cart::whereId($id)->delete();
    
        return response()->json([],204);
    }

    public function allDel(){
        // \DB::table('carts')->truncate();
        $id = Auth::id();
        $cart =\App\Cart::whereId($id)->truncate();

        return redirect('/cart');
    }
}
