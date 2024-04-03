<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\catogery;
use App\Models\customer;
use App\Models\items;
use App\Models\qoutation;
use App\Models\line;
use App\Models\project;
use App\Models\qoutation_line;
use App\Models\qoutation_batch;


use App\Models\size;
use App\Models\type;
use Illuminate\Http\Request;
use App\Models\units;
use App\Jobs\DownloadQouation;
use function PHPSTORM_META\type;
use App\Jobs\GeneratePdf;
use App\Models\AboutCompany;
use Dompdf\Dompdf;
use ArPHP\I18N\Arabic;
use Dompdf\Options;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        if ($qoute) {

            $line_name = line::get();
            $items = items::get();
            $catogery = catogery::get();
            $type = type::get();
            $size = size::get();
            $project = project::get();
            $brand = brand::get();
            $summaries = [];
            foreach ($qoute as $key => $value) {

                $summaries[$value->id] = $this->summary($value->id);
            }
            return view('qoutation.index')->with(['qoutations' => $qoute, 'summaries' => $summaries, "projects" => $project]);
        } else {
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
        $projects = project::get();


        return view('qoutation.create')->with(['line' => $line, 'qoute_id' => $qoute_id, 'customer' => $customer, 'items' => $items, 'catogery' => $catogery, 'type' => $type, 'size' => $size, 'brand' => $brand, 'units' => $units, 'projects' => $projects]);
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




            "qoutation_date" => $request->qoutation_date,
            "expire_date" => $request->expire_date,
            "project" => $request->project,

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
        $projects = project::get();
        $sumation=[];
        if($qoute){
        foreach ($qoute->qoute_batch as $value) {
            $qoute_batch[$value->line] = $value;
        }
        $sumation = $this->summary($qoute->id);
        return view('qoutation.edit')->with(['qoute' => $qoute, 'line' => $line, 'customers' => $customer, 'items' => $items, 'catogery' => $catogery, 'type' => $type, 'size' => $size, 'brand' => $brand, 'units' => $units, 'sumation' => $sumation, "projects" => $projects]);

    }

        $qoute_line_total = [];
        // sumation of all qoute lines in qoutation batch

return redirect()->back()->withInput();

         }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\qoutation  $qoutation
     * @return \Illuminate\Http\Response
     */public function update(Request $request, $id)
{
    DB::beginTransaction();


        $quote = qoutation::find($id);

        $quote->update([

            "qoutation_date" => $request->qoutation_date,
            "expire_date" => $request->expire_date,
            "project" => $request->project,

            "statues" => $request->statues,
            "description" => $request->description,

            'customer' => $request->customer,
            "indrect" => $request->indrect,
            "addition" => $request->addition,
            "consult" => $request->consult,
            "risk" => $request->risk,
        ]);
if ($request->lines) {
    # code...



            $quoteBatch = $quote->qoute_batch()->exists() ? $quote->qoute_batch : $quote->qoute_batch()->create([
                "factor" => $request->factor, // You might want to clarify where $request->factor comes from
                "quote" => $quote->id,
            ]);
foreach ( $quoteBatch as $key => $batch) {
    # code...

            if ( sizeof($request->item[$batch->line])>0) {
                foreach ($request->item[$batch->line] as $key => $item) {

                    $quoteLine = $batch->qoute_lines()->CreateUpdate(
                        [
                            'id' => $batch->id,
                            'item' => $item,


                            "qty" => $request->qty[$batch->line][$key],
                            "unit" => $request->unit[$batch->line][$key],
                            "material" => $request->material[$batch->line][$key],
                            "material_acc" => $request->material_acc[$batch->line][$key],
                            "material_other" => $request->material_acc[$batch->line][$key], // Is this intended?
                            "total_material" => $request->total_material[$batch->line][$key],
                            "labour" => $request->labour[$batch->line][$key],
                            "labour_other" => $request->labour_other[$batch->line][$key],
                            "total_labour" => $request->total_labour[$batch->line][$key],
                            "product_factor" => $request->product_factor[$batch->line][$key],
                        ]
                    );
                }

            } else {
                return redirect()->back()->with(['message' => 'خطا المنتجات غير موجودة']);
            }
        }

        DB::commit();

    } else {

    }
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
    public function qoutation_pdf1($qoutation)
    {

        // $qoute = qoutation::find($qoutation);
        // $lines = line::get();
        // $ourCompany = AboutCompany::get();

        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $dompdf = new Dompdf($options);
        // $image = base64_encode(file_get_contents(public_path('images/1694333491.jpg')));

        // $data = ['qoute' => $qoute, 'lines' => $lines, 'image' => $image, 'title' => $qoute->refrence];
        // $reportHtml = view('reports.price_offer', $data)->render();

        // $arabic = new Arabic();
        // $p = $arabic->arIdentify($reportHtml);

        // for ($i = count($p) - 1; $i >= 0; $i -= 2) {
        //     $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i - 1], $p[$i] - $p[$i - 1]));
        //     $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i - 1], $p[$i] - $p[$i - 1]);
        // }
        // $pdf = $dompdf->loadHTML($reportHtml);
        // $dompdf->render();
        // $dompdf->stream('document.pdf', ['Attachment' => false]);
        // return $pdf->download('purchase.pdf');
        // GeneratePdf::dispatch($lines,$qoute->refrence);
        $mpdf = new Mpdf();

        // Set Arabic font
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->SetDirectionality('rtl');
        $mpdf->SetFont('Arial', '', 12);

         $mpdf->AddPage();
        $mpdf->WriteHTML('<p style="text-align: right;">محتوى الصفحة الأولى</p>');

        // Add content to page 2
        $mpdf->AddPage();
        $mpdf->WriteHTML('<p style="text-align: right;">محتوى الصفحة الثانية</p>');

        // Add content to additional pages as needed
        // $mpdf->AddPage();
        // $mpdf->WriteHTML('<p style="text-align: right;">محتوى الصفحة الثالثة</p>');

        // Output PDF
        $mpdf->Output();
    }
    public function qoutation_pdf($qoutation){
        $qoute = qoutation::find($qoutation);


        // Split HTML content into separate sections for each page
        // $pages = explode('<!-- PAGE_BREAK -->', $htmlContent);

        // Create new mPDF instance
        $mpdf = new Mpdf();

        // Set Arabic font
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->SetDirectionality('rtl');
        $mpdf->SetFont('sans-serif', '', 12);
        $headerImage = public_path('images/header.png'); // Replace 'header.png' with your header image file
        $mpdf->SetHTMLHeader('<div style="margin-bottom: 20mm;"><img src="' . $headerImage . '" style="border:1px" /></div>');

        // Set footer image
        $footerImage = public_path('images/footer.png'); // Replace 'footer.jpg' with your footer image file
        $mpdf->SetHTMLFooter('<img src="' . $footerImage . '" style="width: 100%;" />');

        // Set header and footer


        // Add each page content to PDF

        // <p> الموافق -: '.$qoute->expire_date.' هـ    </p>

                $mpdf->WriteHTML( '<!DOCTYPE html>
                <html lang="ar">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Invoice</title>
                    <style>
                html{
                    margin-top:5rem;
                        }


                    .table {
                        width: 100%;
                        margin-bottom: 1rem;
                        color: #212529;
                    }

                    .introduction {
                        font-weight: bold;
                    }

                    p.dear-fawzan-company {
                        margin-top: 5rem;
                        margin-bottom: 2rem;
                    }

                    .topic {
                        font-weight: bold;
                    }

                    .topic-introduction {
                        margin-bottom: 2rem;
                        position: relative;
                        padding-bottom: 3px;
                    }

                    .topic-introduction::after {

                        position: absolute;
                        right: 0;
                        bottom: 0;
                        height: 1px;
                        width: 34%;
                        /* Adjust as needed */
                        background: black;
                        /* Change color as needed */
                    }

                    .topic p {
                        font-size: 16px;
                    }

                    p.phone-number {
                        margin-top: 2rem;
                        margin-right: 70%;

                    }

                    p.thanks {
                        margin-top: 2rem;
                        font-weight: bold;
                        margin-right: 10%;


                    }

                    h3.sales-department {
                        margin-top: 2rem;
                        font-weight: 500;
                        margin-right: 70%;

                    }

                    h3.early-fire-warning {
                        position: relative;
                        margin-top: 3rem;
                        margin-bottom: 2rem;
                    }

                    h3.early-fire-warning::after {

                        position: absolute;
                        right: 0;
                        bottom: 0;
                        height: 1px;
                        width: 42%;
                        /* Adjust as needed */
                        background: black;
                        /* Change color as needed */
                    }


                    h3.firefighting-system {
                        position: relative;
                        margin-top: 3rem;
                        margin-bottom: 2rem;

                    }

                    h3.firefighting-system::after {

                        position: absolute;
                        right: 0;
                        bottom: 0;
                        height: 1px;
                        width: 15%;
                        /* Adjust as needed */
                        background: black;
                        /* Change color as needed */
                    }

                    </style>
                </head>
                <body style="margin-top: 20mm">
                <h1 style="margin-top: 40mm;">.....</h1>
                <div class="introduction">

                <p>الرقم -:'.$qoute->refrence.'/ DQF     </p>
                <p>التاريخ -: '.  $qoute->qoutation_date.'  م</p>

                <p class="dear-fawzan-company"> السادة /   '.$qoute->customers_data->name.'
                </p>
             </div>
             <div class="topic">
             <h3 class="topic-introduction">الموضوع :    '.$qoute->project_data->name.'.
             </h3>
             <p>


             <pre>'.$qoute->description.'</pre>
                 ونحن على استعداد للتجاوب مع أي استفسار أو تساؤل على الرقم التالى -:
             </p>


                 <p class="mt-3 phone-number">
                     0507063545
                 </p>
                 <p class="thanks">
                     ولكم منا جزيل الشكر ،،،

                 </p>
                 <h3 class="sales-department">
                     قسم المبيعات

                 </h3>
             </div>


            </div>

                </body>
                </html>');
$row='';

              foreach($qoute->qoute_batch as $batch){
                foreach ($batch->qoute_lines as $key => $lines_data) {
                 $row.=   '<tr>
                <td>'.$lines_data->items->name.'
                </td>
                <td>'.$lines_data->items->type_data->name.'</td>
                <td>'.$lines_data->qty.'</td>
                <td>'.$lines_data->items->price * $batch->factor.'</td>
                <td>'.$lines_data->items->price * $batch->factor * $lines_data->qty.'</td>
            </tr>';
                }
                $mpdf->AddPage();
                $mpdf->WriteHTML(' <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>
                    *{
                        margin-top:5rem;
                            }
                    .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                }
                .introduction{
                font-weight: bold;
                }
                p.dear-fawzan-company{
                margin-top:5rem;
                margin-bottom: 2rem;
                }
                .topic{
                font-weight: bold;
                }
                .topic-introduction{
                margin-bottom: 2rem;
                position: relative;
                padding-bottom: 3px;
                }
                .topic-introduction::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 34%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }
                .topic p{
                font-size:16px;
                }

                p.phone-number{
                margin-top: 2rem;
                margin-right:70%;

                }
                p.thanks{
                margin-top: 2rem;
                font-weight: bold;
                margin-right:10%;


                }
                h3.sales-department{
                margin-top: 2rem;
                font-weight:500;
                margin-right:70%;

                }
                h3.early-fire-warning{
                position: relative;
                margin-top: 3rem;
                margin-bottom: 2rem;
                }

                h3.early-fire-warning::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 42%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }


                h3.firefighting-system{
                position: relative;
                margin-top: 3rem;
                margin-bottom: 2rem;

                }
                h3.firefighting-system::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 15%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }


                .table th,
                .table td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
                }

                .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
                }

                .table-striped tbody tr:nth-of-type(odd) {
                background-color: rgba(0, 0, 0, 0.05);
                }

                .table-bordered {
                border: 1px solid #dee2e6;
                }

                .table-bordered th,
                .table-bordered td {
                border: 1px solid #dee2e6;
                }

                .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                }
                div.terms-and-conditions{
                font-weight: bold;
                font-size:20px;
                }

                h3.terms-and-conditions-title{
                margin-top: 3rem;
                margin-bottom: 1rem;
                font-weight: bold;
                position: relative;
                }
                h3.terms-and-conditions-title::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 19%; /* Adjust as needed */
                background: black; /* Change color as needed */

                }

                span.hash-tag{
                margin-left: 5%;
                }

                ul.expiry-date{
                margin-top: 2rem;
                margin-bottom: 2rem;
                font-weight: 500;
                font-size: 20px;

                }
                h3.non-included-work-title{
                position: relative;
                margin-top: 2rem;
                margin-bottom: 2rem;
                }
                h3.non-included-work-title::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 20%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }
                ul.non-included-work-list{
                font-weight: 500;
                font-size: 20px;
                margin-top: 2rem;
                margin-bottom: 2rem;
                }
                @media(max-width:750px){
                .topic-introduction{
                margin-bottom: 2rem;
                position: relative;
                padding-bottom: 3px;
                }
                .topic-introduction::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 82%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }
                h3.early-fire-warning{
                position: relative;
                margin-top: 3rem;
                margin-bottom: 2rem;
                }

                h3.early-fire-warning::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 99%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }
                h3.firefighting-system{
                position: relative;
                margin-top: 3rem;
                margin-bottom: 2rem;

                }
                h3.firefighting-system::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 35%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }
                h3.terms-and-conditions-title{
                margin-top: 3rem;
                margin-bottom: 1rem;
                font-weight: bold;
                position: relative;
                }
                h3.terms-and-conditions-title::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 35%;
                background: black;

                }
                h3.non-included-work-title{
                position: relative;
                margin-top: 2rem;
                margin-bottom: 2rem;
                }
                h3.non-included-work-title::after{

                position: absolute;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 45%; /* Adjust as needed */
                background: black; /* Change color as needed */
                }
                .terms-and-conditions div h3{
                font-size: 20px;

                }
                }



                </style>
                </head>
                <body>

                <h1 style="margin-top: 40mm;">.....</h1>

                <div>

                <h3 class="early-fire-warning">
                    أولا-: ('.$batch->lines->name.' -  '.$batch->lines->main_lines->name.' ) .

                </h3>

            </div>
       </div>
       <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
           <tr>
               <th>البيان</th>
               <th>النوع</th>
               <th>العدد</th>
               <th>السعر الإفرادي</th>
               <th>السعر الإجمالي</th>
           </tr>
        </thead>
        <tbody>
           '.$row.'

        </tbody>
       </table>
       </body>
</html>');
              }


        // Output PDF
        return $mpdf->Output();
    }
}
