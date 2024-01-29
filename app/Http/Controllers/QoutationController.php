<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\catogery;
use App\Models\items;
use App\Models\qoutation;
use App\Models\line;
use App\Models\size;
use App\Models\type;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class QoutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($line)
    {
      $qoute=qoutation::where(['line'=>$line])->get();
    $qoute_id=qoutation::get()->count()==0?qoutation::get()->count()+1:qoutation::get()->max();
    if(line::find($line)){
      $line_name=line::find($line);
      $items=items::get();
      $catogery=catogery::get();
      $type=type::get();
      $size=size::get();
      $brand=brand::get();
      return view('qoutation.index')->with(['line'=>$line_name,'qoute_id'=>$qoute_id,'items'=>$items,'catogery'=>$catogery,'type'=>$type,'size'=>$size,'brand'=>$brand]);
    }
    else {
        return redirect()->route("lines")->with('error', 'لايوجد نشاط بهذا الاسم');
    }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $qoute=qoutation::create([

        "customer_name" => $request->customer_name,
        // "qouation_number" => "Q.1",
        "qoutation_date" =>$request->quotation_date,
        "line" => $request->line_id,
        "rate" =>$request->factor
       ]);


       for ($i=0; $i <sizeof($request->item) ; $i++) {
        $qoute->qoute_lines()->create([
            'item'=>$request->item[$i],
            'qty'=>$request->qty[$i],

             "material"=>$request->material[$i],
           "material_acc"=>$request->material_acc[$i],
           "material_other"=>$request->material_other[$i],
           "labour"=>$request->labour[$i],
            "labour_acc"=>$request->labour[$i],
            "labour_other"=>$request->labour_other[$i],




            ]);
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\qoutation  $qoutation
     * @return \Illuminate\Http\Response
     */
    public function show(qoutation $qoutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\qoutation  $qoutation
     * @return \Illuminate\Http\Response
     */
    public function edit(qoutation $qoutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\qoutation  $qoutation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qoutation $qoutation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\qoutation  $qoutation
     * @return \Illuminate\Http\Response
     */
    public function destroy(qoutation $qoutation)
    {
        //
    }
}
