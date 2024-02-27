<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = attachment::get();
        return view('attachments.index') -> with(['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qoute_batch = \App\Models\qoutation_batch::get();

        return view('attachments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

// create the attachment
        public function store(Request $request)
        {

          $attachment=[];
                $request->validate([
                    'path' => 'required|array',
                    'path.*' => 'required|file|max:2048',
                    'qoute_bath' => 'required|string|max:255',
                ]);

                $paths = [];
                foreach ($request->file('path') as $file) {
                    $path = $file->store('public/attachments');
                    $paths[] = $path;
                }

                foreach ($paths as $path) {
                    $attachment = attachment::create([
                        'path' => $path,
                        'qoute_bath' => $request->qoute_bath,
                    ]);
                }
dd($attachment);
                return back()->with('success', 'Attachments uploaded successfully.');


        }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(attachment $attachment)
    {
        //
    }
}
