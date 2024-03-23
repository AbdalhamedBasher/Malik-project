<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=customer::get();
        $projects = project::get();

        return view('project.index',compact('projects','customers'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $project= project::create([
        "serial"=>$request->serial,
        "name"=>$request->name,
        "customer"=>$request->customer,
        "status"=>$request->status,
       ]);
       if($project){
        return redirect()->back()->with("success",'تم إضافة المشروع بنجاح');
       }
       else {
       return  redirect()->back()->with("danger",'حدث خطا ما الرجاء التواصل مع المبرمج');
       }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $project= project::find($request->id)->update([
            "serial"=>$request->serial,
            "name"=>$request->name,
            "customer"=>$request->customer,
            "status"=>$request->status,
           ]);
           if($project){
            return redirect()->back()->with("success",'تم إضافة المشروع بنجاح');
           }
           else {
           return  redirect()->back()->with("danger",'حدث خطا ما الرجاء التواصل مع المبرمج');
           }
    }


}
