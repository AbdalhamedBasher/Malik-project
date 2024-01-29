<?php

namespace App\Http\Controllers;

use App\Models\qoutation;
use App\Models\line;
use Illuminate\Http\Request;

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
    $qoute_id=qoutation::get()->count();
    if(line::find($line)){
      $line_name=line::find($line)->name;
      return view('qoutation.index')->with(['line'=>$line_name,'qoute'=>$qoute,'qoute_id'=>$qoute_id+1]);
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
        //
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
