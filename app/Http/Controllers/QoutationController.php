<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\catogery;
use App\Models\customer;
use App\Models\items;
use App\Models\qoutation;
use App\Models\line;
use App\Models\qoutation_line;
use App\Models\size;
use App\Models\type;
use Illuminate\Http\Request;
use App\Models\units;

use function PHPSTORM_META\type;

class QoutationController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qoute = qoutation::get();
        if ( $qoute) {

        $line_name = line::get();
        $items = items::get();
        $catogery = catogery::get();
        $type = type::get();
        $size = size::get();
        $brand = brand::get();
$summaries=[];
        foreach ($qoute as $key => $value) {

            $summaries[$value->id] = $this->summary($value->id);
        }
        return view('qoutation.index')->with(['qoutations' => $qoute , 'summaries' => $summaries]);
        }
        else {
            return view('qoutation.index')->with(['qoutations' => $qoute]);
        }

}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qoute = qoutation::get();
        $qoute_id = qoutation::get()->count() == 0 ? qoutation::get()->count() + 1 : qoutation::get()->max();
        $customer = customer::get();
        $line = line::where(["main_line" => null])->get();

        $items = items::get();
        $catogery = catogery::get();
        $type = type::get();
        $size = size::get();
        $brand = brand::get();
        $units = units::get();



        return view('qoutation.create')->with(['line' => $line, 'qoute_id' => $qoute_id, 'customer' => $customer, 'items' => $items, 'catogery' => $catogery, 'type' => $type, 'size' => $size, 'brand' => $brand, 'units' => $units]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qout_line = [];


        $last = (qoutation::max("id") == null) ? 1 : qoutation::max("id") + 1;

        $request->validate([


            "factor" => "numeric|required",
            "qoutation_date" => "date|required",
            "expire_date" => "date|required",
            "project_name" => "string|required",
            'customer' => "required",
            "indrect" => "required|decimal:0,100",
            "addition" => "required|decimal:0,100",
            "consult" => "required|decimal:0,100",
            "risk" => "required|decimal:0,100",



        ]);
        $qoute = qoutation::create([



            "factor" => $request->factor,
            "qoutation_date" => $request->qoutation_date,
            "expire_date" => $request->expire_date,
            "project_name" => $request->project_name,
            "statues" => $request->statues,
            "description" => $request->description,
            "refrence" => 'Q' . $last,
            'customer' => $request->customer,
            "indrect" => $request->indrect,
            "addition" => $request->addition,
            "consult" => $request->consult,
            "risk" => $request->risk,


        ]);
        if (isset($request->lines)) {


            foreach ($request->lines as $key => $line) {
                $qoute_batch = $qoute->qoute_batch()->create([
                    "line" => $line,
                    "factor" => $request->factor,
                    "qoute" => $qoute->id,

                ]);






                if (isset($request->item[$line])) {
                    foreach ($request->item[$line] as $key => $value) {

                        $qout_line[$key] = $qoute_batch->qoute_lines()->create([

                            "qty" => $request->qty[$line][$key],
                            "item" => $value,
                            "unit" => $request->unit[$line][$key],
                            "qoute_batch" =>  $qoute_batch->id,
                            "material" => $request->material[$line][$key],
                            "material_acc" => $request->material_acc[$line][$key],
                            "material_other" => $request->material_acc[$line][$key],
                            "total_material" => $request->total_material[$line][$key],
                            "labour" => $request->labour[$line][$key],
                            "labour_other" => $request->labour_other[$line][$key],
                            "total_labour" => $request->total_labour[$line][$key],
                            "product_factor" => $request->product_factor[$line][$key],


                        ]);
                    }
                }
            }
        }

        if (($qoute)) {
            return redirect()->route('qoute')->with(['message' => 'تم حفظ التسعيرة']);
        }
        // else {
        //     return redirect()->back()->with(['message' => 'هناك خطا في التسعيرة']);        }
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
    public function edit($id)
    {

        // $qoute_id = qoutation::get()->count() == 0 ? qoutation::get()->count() + 1 : qoutation::get()->max();
        $customer = customer::get();
        $qoute = qoutation::find($id);
        $line = line::where(["main_line" => null])->get();
        $items = items::get();
        $catogery = catogery::get();
        $type = type::get();
        $size = size::get();
        $brand = brand::get();
        $units = units::get();
        $qoute_batch = config('app.my_constant.key1');;
        foreach ($qoute->qoute_batch as $value) {
            $qoute_batch[$value->line] = $value;
        }


        $qoute_line_total = [];
        // sumation of all qoute lines in qoutation batch
        $sumation = $this->summary($qoute->id);


        return view('qoutation.edit')->with(['qoute' => $qoute, 'line' => $line, 'customer' => $customer, 'items' => $items, 'catogery' => $catogery, 'type' => $type, 'size' => $size, 'brand' => $brand, 'units' => $units, 'sumation' => $sumation, 'qoute_batch' => $qoute_batch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\qoutation  $qoutation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $qout_line = [];
$qoute = qoutation::find($id);

        $last = (qoutation::max("id") == null) ? 1 : qoutation::max("id") + 1;


        $qoute->update([



            "factor" => $request->factor,
            "qoutation_date" => $request->qoutation_date,
            "expire_date" => $request->expire_date,
            "project_name" => $request->project_name,
            "statues" => $request->statues,
            "description" => $request->description,
            "refrence" => 'Q' . $last,
            'customer' => $request->customer,
            "indrect" => $request->indrect,
            "addition" => $request->addition,
            "consult" => $request->consult,
            "risk" => $request->risk,


        ]);
        if (isset($request->lines)) {


            foreach ($request->lines as $key => $line) {
                $qoute_batch = $qoute->qoute_batch()->update([
                    "line" => $line,
                    "factor" => $request->factor,
                    "qoute" => $qoute->id,

                ]);






                if (isset($request->item[$line])) {
                    foreach ($request->item[$line] as $key => $value) {

                        $qout_line[$key] = $qoute_batch->qoute_lines()->update([

                            "qty" => $request->qty[$line][$key],
                            "item" => $value,
                            "unit" => $request->unit[$line][$key],
                            "qoute_batch" =>  $qoute_batch->id,
                            "material" => $request->material[$line][$key],
                            "material_acc" => $request->material_acc[$line][$key],
                            "material_other" => $request->material_acc[$line][$key],
                            "total_material" => $request->total_material[$line][$key],
                            "labour" => $request->labour[$line][$key],
                            "labour_other" => $request->labour_other[$line][$key],
                            "total_labour" => $request->total_labour[$line][$key],
                            "product_factor" => $request->product_factor[$line][$key],


                        ]);
                    }
                }
            }
        }

        if (($qoute)) {
            return redirect()->route('qoute')->with(['message' => 'تم تعديل التسعيرة']);
        }
        else {
            return redirect()->back()->with(['message' => 'هناك خطا في التسعيرة']);        }
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
    public function summary($qoute)
    {
        $qoutes = qoutation::find($qoute);

        $sumation = [];
        $sumation["total_material"] = 0;
        $sumation["total_labour"] = 0;
        $sumation["total"] = 0;
        $sumation["product_factor"] = 0;

        if ($qoutes->qoute_batch) {
            //    sumation qoute_line in qoutation
            foreach ($qoutes->qoute_batch as $key => $value) {
                $sumation["total_material"] = $value->qoute_lines->sum('total_material');
                $sumation["total_labour"] = $value->qoute_lines->sum('total_labour');
                $sumation["total"] = $value->qoute_lines->sum('total_labour') + $value->qoute_lines->sum('total_material');
                $sumation["product_factor"] = $value->qoute_lines->sum('product_factor');
            }
        }
        return $sumation;
    }
    public function pdf($id)
    {
        $qoute = qoutation::find($id);
        if ($qoute == null) {
            return redirect()->back();
        } else {
            $qoute_batch = $qoute->qoute_batch;
            // sumation of all qoute lines in qoutation batch

            foreach ($qoute_batch as $key => $value) {
                $qoute_lines[$value->lines->name] = $value->qoute_lines;
            }




            $sumation = 0;


            $qoute['sumation'] = $sumation;

            return view('qoutation.pdf_qoute')->with(['qoute' => $qoute]);
        }
    }
    public function contract()
    {
        return view('reports.index');
    }
    public function qoutation_pdf($qoutation)
    {
        $qoute = qoutation::find($qoutation);
        $lines = \App\Models\line::get();
        return view('reports.price_offer')->with(['qoute' => $qoute, 'lines' => $lines]);
    }
}
