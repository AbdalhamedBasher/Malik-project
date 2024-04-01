<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$title}}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lateef&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Almarai&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');
        @font-face {
            font-family: 'Arabic';
            src: url('{{ asset('/fonts/DINNEXTLTARABIC-LIGHT-2-2.ttf') }}');
        }

        * {
            font-family: 'OptimusPrinceps';
        }

        body {
            background-color: #ffffff;
            direction: rtl;
            padding-left: 5%;
            padding-right: 5%;
        }

     h6.region{
font-size: 12px;
font-weight:bold; 
     }
* {
   font-family: 	Roboto, DejaVu Sans, sans-serif;
   direction: rtl; text-align: right;
}
    </style>
</head>

<body dir="rtl" lang="ar">



    <div>
        
            <h6 class="region"> {{$qoute->refrence }}  -:الرقم  </h6>
            <h6 class="region"><span style=" vertical-align: super; 
                font-size: smaller; "> م</span> {{$qoute->qoutation_date }}  -:التاريخ  </h6>
            <h6 class="region"><span style=" vertical-align: super; 
                font-size: smaller; "> هـ</span> {{$qoute->qoutation_date }}  -:الموافق  </h6>
        </div>
        <h6 class="region"> <span style="margin-right: 5rem"> المحترم         </span>{{ $qoute->customers_data->name}}   /المكرم </h6>
        <h6 class="region" style="text-decoration: underline;"> {{$qoute->project_data->name }}  -:الموضوع  </h6>
<pre>
    {{$qoute->description}}
</pre>
<h6>
و نحن على إستعداد على الاجابة على جميع اسئلتكم </h6>
<h5 style="float: left" >0507063545</h5>
<h5 style="" >ewrewrwewerewewrewrew</h5>


@foreach ($qoute->qoute_batch as $batch)
<h4 style="text-decoration: underline;">{{$batch->lines->name}}</h4>

@endforeach
</body>

</html>
