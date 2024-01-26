<?php

namespace App\Http\Controllers;

use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\facade\response;
use App\Http\Requests\pagesRequest;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=pages::get();
        return (["Pages"=>$pages]);
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

      pages::create([
            'name'=>$request->name,
            'path'=>$request->path,
            'active'=>$request->active
        ]);
        return (["message"=>"تم إضافة الصفحة بنجاح"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages=pages::find($id);
        if(!$pages){
            return([
            "message"=>"الصفحة غير موجودة",
             "code"=>404
        ]);
        }
        else{
            return ([
                     "Pages"=>$pages,
                     "code"=>200,
                     "message"=>"تم العثور على الصفحة"
        ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pages=pages::find($id);
        if(!$pages){

            return ([
            "message"=>"الصفحة غير متوفرة"
                ]);
        }
        else{
            $pages->update([
                'name'=>$request->name,
                'path'=>$request->path,
                'active'=>$request->active
            ]);
            return ([
                     "Pages"=>$pages,
                     "message"=>"تم التعديل"
        ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages=pages::find($id);
        if(!$pages){

            return response->json([
            "message"=>"الصفحة غير متوفرة"
                ],404);
        }
        else{
            $pages->delete();
            return ([
                     "Pages"=>$pages,
                     "message"=>"the page was deleted"
        ]);
        }
    }
}
