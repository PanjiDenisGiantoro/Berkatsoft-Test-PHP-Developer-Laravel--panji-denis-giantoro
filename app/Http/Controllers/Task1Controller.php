<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Task1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task1.index');
    }
    public function cek(Request $request)
    {
        // jumlah huruf brs (3) and berkatsoft(10)
        $jumlah1 = 3;
        $jumlah2 = 10;
        $huruf1 = $request->firstword;
        $huruf2 = $request->secondword;
        //pecah huruf to array
        $pisah1 = str_split($huruf1);
        $pisah2 = str_split($huruf2);
        $i = 0;







        if (strlen($huruf1) == $jumlah1 && strlen($huruf2) == $jumlah2){

            foreach ($pisah2 as $i => $item){
                if ($i == $jumlah2){
                    if ($item == strtolower($item)){
                        $bool = true;
                    }elseif ($item ==strtoupper($item)){
                        $bool = true;
                    }
            }else{
                    $bool= true;
                }
            }

        }elseif (strlen($huruf1) != $jumlah1 && strlen($huruf2) == $jumlah2){
            $bool = false;
        }elseif (strlen($huruf1) == $jumlah1 && strlen($huruf2) != $jumlah2){
            $bool = false;
        }else if (strlen($huruf1) != $jumlah1 && strlen($huruf2) != $jumlah2){
            $bool = false;
        }

        return view('task1.indexAnswer',compact('bool','pisah1','pisah2'));


//        if ($request->firstword == 'brs' && $request->secondword == 'berkatsoft')
//        {
//            if($request->firstword)
//            $bool = true;
//        }else if($request->firstword != 'brs' && $request->secondword != 'berkatsoft')
//        {
//            $bool = false;
//        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
