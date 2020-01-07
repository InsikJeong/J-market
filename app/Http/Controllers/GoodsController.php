<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect('/');
    }

    public function fashions()
    {
        $goods = \App\Goods::where('num',1)->get();

        return view('goods.fashions',compact('goods'));
    }
    public function foods()
    {
        // $goods = \App\Goods::where('num',1)->get();
        $goods = \App\Goods::where('num',2)->get();
        // $beautys = \App\Goods::where('num',3)->get();

        return view('goods.foods',compact('goods'));
    } 
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\GoodRequest $request)
    // public function store(Request $request)
    {
            if($request->hasFile('files')){
                $files = $request->file('files');
                foreach($files as $file) {
                    $filename = Str::random().filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                    
                    $good =  $request->user()->goods()->create([ 
                    'num'=>1,
                    'name'=>$request->name,
                    'price'=>$request->price,
                    'comments'=>$request->comments,
                    'filename' => $filename,
                    ]);
                    
                    if (!$good) {
                        return redirect('/');
                    }
    
                    $file->move(attachments_path(), $filename);
                }
        }
        // if($request->num == 1){
        //     return redirect(route('goods.fashions'));
        // }       
        // else if($request->num == 2){
        //     return redirect(route('goods.foods'));
        // }
        // else{
        //     return redirect('/');
        // }
        return redirect('/');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $good = \App\Goods::whereId($id)->first();


        return view('goods.show',compact('good'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $good = \App\Goods::whereId($id)->first();

        return view('goods.edit',compact('good'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\GoodRequest $request, $id)
    {
        if($request->hasFile('files')){
            $files = $request->file('files');
            foreach($files as $file) {
                $filename = Str::random().filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                
                \App\Goods::where('id',$id)->update([
                    'num'=>1,
                    'name'=>$request->name,
                    'price'=>$request->price,
                    'comments'=>$request->comments,
                    'filename' => $filename,
                ]);
        

                $file->move(attachments_path(), $filename);
            }
        }
        $good = \App\Goods::where('id',$id)->first();


        return view('goods.show',compact('good'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goods =\App\Goods::whereId($id)->delete();
    
        return response()->json([],204);
    }
}
