<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\line;
use App\Models\qoutation;
class ReportController extends Controller
{
    //
    public function index()
    {
        return view('reports.index');
    }
    public function qoutation_pdf(){
        $lines = \App\Models\line::get();
        $qoutes = \App\Models\qoutation::get();
dd("here");
        return view('reports.price_offer'
        ,['lines' => $lines, 'qoutes' => $qoutes]);
    }
}
