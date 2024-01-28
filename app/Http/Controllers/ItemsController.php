<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\line;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($master=null)
    {



        $breadcrumb="إضافة منتج";
        $item=items::get();
        $lines=line::where('main_line', '<>', '')->get();
        return view("items.index",['items'=>$item , 'breadcrumb'=>$breadcrumb ,"lines"=>$lines]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $line=items::create([
            "name"=>$request->name,
            "line"=>$request->line,
            "price"=>$request->price,

         ]);

    if( $line) {
        return  redirect()->back()->with(['message'=>"تم إضافة خدمة بنجاح"]);
    }
    else{
        return  redirect()->back()->withErrors($validator)->withInput();
    }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
$id=$request->id;
        $item=items::find($id)->update([
            "name"=>$request->name,
            "line"=>$request->line,
            "price"=>$request->price,
         ]);

    if( $item) {
        return  redirect()->back()->with(['message'=>"تم تعديل العنصر بنجاح"]);
    }
    else{
        return  redirect()->back()->with(['message'=>"error"]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        $item=lines::find($request->id)->delete();
        if( $item) {
            return  redirect()->back()->with(['message'=>"تم حذف العنصر بنجاح"]);
        }
        else{
            return  redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
