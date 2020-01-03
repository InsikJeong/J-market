<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class FashionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fashions = \App\Goods::where('num',1)->get();
        // $foods = \App\Goods::where('num',2)->get();
        // $beautys = \App\Goods::where('num',3)->get();

        return view('fashion.index',compact('fashions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fashion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\FashionRequest $request)
    // public function store(Request $request)
    {
        if($request->hasFile('files')){
            $files = $request->file('files');
            foreach($files as $file) {
                $filename = Str::random().filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                
                $fashion = \App\Goods::create([ 
                'num'=>1,
                'name'=>$request->name,
                'price'=>$request->price,
                'comments'=>$request->comments,
                'filename' => $filename,
                ]);

                $file->move(fashions_attachments_path(), $filename);
            }
        }

        return redirect(route('fashions.index'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fashion = \App\Goods::whereId($id)->first();

        return view('fashion.show',compact('fashion'));
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
        //
    }
}
