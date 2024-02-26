@extends('layouts.app')
@section('styles')
    <style>
        @font-face {
            font-family: 'OptimusPrinceps';
            src: url('{{asset('/fonts/NotoNaskhArabic-VariableFont_wght.ttf')}}');
        }
        *{
            font-family: 'OptimusPrinceps';
        }
        body{
            direction: rtl;
            padding-left: 5%;
            padding-right: 5%;
        }
        h2.price-offer-intro{
            padding-top: 3rem;
            border-bottom-style: dotted;
            border-bottom-color: orangered;
            padding-bottom: 3rem;
            color: blue;
            font-weight: bold;
        }
        div.region_project_number{
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
            border-bottom-style: dotted;
            border-bottom-color: gray;
        }
        h3.offer-giver{
            padding-top: 1rem;
            color: blue;
            font-weight: bold;

        }
        div.foundation-intro{
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }
        h3.foundation-name{
            font-style: italic;

        }
        div.contents{
            padding-bottom: 3rem;
            padding-top: 3rem;
            border-bottom-style: dotted;
            border-bottom-color: orangered;
        }
        div.contents h3{
            color: blue;
            font-weight: bold;
        }
        div.contents ol{
            font-size: 18px;
            color: blue;
        }
        div.contents ol span{
            color: orangered;
        }

        div.provided-to{
            padding-bottom: 4rem;
            padding-top: 4rem;
            border-bottom-style: dotted;
            color: blue;
            border-bottom-color: orangered;
        }
        h1.tagana-contracting{
            text-align: center;
            color: blue;
            font-weight: bold;
        }
        div.submit-by{
            direction: ltr;
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
            border-bottom-style: dotted;
            color: blue;
        }
        div.submit-by div{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        div.submit-by div h3.first-child {
            color: blue;
            font-weight: bold;
        }
        div.ref-date-page{
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }
        h3.ref{
            font-weight: bold;
        }
        h3.page{
            font-weight: bold;
        }
        span.header-date{
            font-weight: bold;
        }
        div.date-page{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        div.topic-project-name{
            padding-bottom: 1rem;
            padding-top: 1rem;
            border-bottom-style: dotted;

        }
        p.header-topic{
            color: blue;
            font-size: 18px;
        }
        p.header-topic span.topic{
            font-weight: bold;
        }
        p.header-project-name{
            color: blue;
            font-size: 18px;
        }
        p.header-project-name span.project-name{
            font-weight: bold;
            color: blueviolet;
        }
        div.mister-eng{
            display: flex;
            gap: 4rem;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }
        h4.hi{
            padding-bottom: 3rem;
            padding-top: 3rem;
            text-align: center;
            font-weight: bold;
        }
        p.topic-main{
            font-size: 18px;
        }
        ul.terms-general-rules{
            margin-top: 1rem;
            font-size: 18px;
        }
        h3.terms{
            position: relative;

        }
        h3.terms::after{
            content: '';
            position: absolute;
            bottom: -0.3rem;
            right: 0;
            width: 16%;
            height: 2px;
            background-color: black;
        }
        p.hope-satisfied{
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        div.topic-footer{
            display: flex;
            justify-content: center;
            padding-bottom: 0rem;
            padding-top: 3rem;
        }
        div.topic-footer img.first-img{
            margin-left: 20%;
        }
        div.topic-footer div{
            margin-right: 10%;
        }
        div.page-footer{
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            column-gap: 4rem;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }
        h3.first-summary{
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }
        h3.first-summary::after{
            content: '';
            position: absolute;
            bottom: -1rem;
            right: 0;
            width: 40%;
            height: 2px;
            background-color: blue;
        }

        h3.second-summary{
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }
        h3.second-summary::after{
            content: '';
            position: absolute;
            bottom: -1rem;
            right: 0;
            width: 44%;
            height: 2px;
            background-color: blue;
        }
        h3.third-summary{
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }
        h3.third-summary::after{
            content: '';
            position: absolute;
            bottom: -1rem;
            right: 0;
            width: 50%;
            height: 2px;
            background-color: blue;
        }
        h3.fourth-summary{
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }
        h3.fourth-summary::after{
            content: '';
            position: absolute;
            bottom: -1rem;
            right: 0;
            width: 22%;
            height: 2px;
            background-color: blue;
        }

        .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
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






    </style>
@endsection
@section('content')
<div>
    <h2 class="price-offer-intro">{{$qoute->description}}</h2>
    <div class="region_project_number">

        <h3 class="region">المنطقة : القصيم      </h3>
        <h3 class="project_number">رقم المشروع :{{$qoute->project_name}}</h3>

    </div>
    <h3 class="offer-giver">مقدم العرض :</h3>


    <div class="foundation-intro">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        <div>
            <h3 class="foundation-name">مؤسسة إدارة المساحات للمقاولات</h3>
            <h3>Spaces Management Est. For Contracting</h3>

        </div>
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

    </div>
    <div class="contents">
        <h3>المحتويات :</h3>
    <ol>
        <li>خطاب عرض السعر <span>(صفحة واحدة)</span></li>
        <li>جدول الكميات والمواصفات والأسعار وملخص التكلفة <span>(3 صفحات)</span></li>
        <li>بعض الصور المنفذة من جهتنا <span>(3 صفحات)</span></li>

    </ol>
    </div>
    <div class="provided-to">

    <h3>مقدم إلى شركة :</h3>
    <h1 class="tagana-contracting">{{$qoute->customers_data?$qoute->customers_data->name:""}}</h1>
    </div>

    <div class="submit-by">
        <div>
            <h3 class="first-child">Submit it by;</h3>
            <h3>Spaces Management Est. For Contracting</h3>

        </div>



        <h3 class="date">23/6/2023</h3>
    </div>


    <div class="foundation-intro">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        <div>
            <h3></h3>
            <h3>Spaces Management Est. For Contracting</h3>

        </div>
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

    </div>
    <div class="ref-date-page">
        <h3>Ref :{{date('d/m/y')}}</h3>
        <div class="date-page">
            <h3><span class="header-date">Date</span> {{$qoute->qoutation_date}}</h3>
            <h3 class="page">Page 1 of 7.</h3>
        </div>

    </div>
    <div class="topic-project-name">
         <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية + S</p>

    <p class="header-project-name">
        <span class="project-name">إسم المشروع </span>: مبنى مجمع تجاري قائم - القصيم
    </p>
    </div>
    <div class="mister-eng">
        <div style="color: blue;">
            <h3>السادة / مؤسسة تقانة للمقاولات</h3>
            <h3>عناية المهندس / قتيبة</h3>


        </div>
        <div style="color: blue;">
            <h3>المحترم</h3>
            <h3>المحترمين</h3>


        </div>
    </div>


    <h4 class="hi">تحية طيبة وبعد ،،،
    </h4>
    <p class="topic-main">
          إشارة إلى الموضوع أعلاه ، نشكركم لدعوتكم لنا ويسرنا  ويشرفنا أن  نتقدم لكم بعرض سعرنا الخاص بعملية  <span style="color: blue;font-weight:bold;">توريد وتركيب وتشغيل كابلات كهرباء + لوحات SDP، وعليه  يكون إجمالي المبلغ (5,113,381.24 ريال سعودي )،  خمسة مليون وثلاثة  عشرة ألف وثلاثمائة وواحد وثمانون ريال سعودي فقط وأربعة عشرون هللة لا غير ،</span> وذلل  حسب وذلك حسب جداول الكميات والبنود والكميات والأسعار المرفقة  مع هذا العرض .(، وذلك وفقاً للمواصفات والكميات والأسعار المرفقة مع هذا العرض.
    </p>
    <h3 class="terms">الشروط والأحكام العامة :</h3>
    <ul class="terms-general-rules">
        <li>العرض ساري لمدة 10 يوم من تاريخه.</li>
        <li>عرضنا لايشمل أي أعمال حفر أو ردم أو تكسير أو تخريم أو أي أعمال مدنية أخرى</li>
        <li>الأسعار تشمل التوريد والتركيب والتشغيل.</li>
        <li>الأسعار تشمل الضمان لمدة سنتين.</li>
        <li>سعر وحدة البن تم تسعيره على أساس الكميات المذكورة بجداول الكميات المرفقة .</li>
        <li>مدة تنفيذ الأعمال محل هذا العرض (سوف يتم الإتفاق عليها لاحقا - بالعقد) الإضافية والتعديلات اللازمة.</li>
        <li>الدفعات المالية للأعمال محل هذا العرض (سوف يتم الإتفاق عليها لاحقا - بالعقد) الإضافية والتعديلات اللازمة.</li>
        <li>خطة الأعمال والبرنامج الزمني والمخططات التنفيذية  العرض (سوف يتم الإتفاق عليها عند التعميد) تشمل الأعمال الإضافية والتعديلات اللازمة.</li>
        <li>خطة الأعمال والبرنامج الزمني والمخططات التنفيذية العرض (سوف يتم الإتفاق عليها لاحقا - عند التعميد)</li>
        <li>مرفق جدول الكميات  والمواصفات والأسعار للبنود محل هذا العرض (الصفحات التالية)</li>
    </ul>
    <p class="hope-satisfied">أملين أن يحوز عرضنا على رضاكم  ،،،</p>
    </p>
    <div class="topic-footer">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:5%;height:5%;" class="first-img">
        <div>
            <h3>مؤسسة إدارة المساحات للمقاولات</h3>
            <img src="{{asset('images/1694333491.jpg')}}" style="width:5%;height:5%;">
            <h3>منسق المشاريع</h3>
        </div>
    </div>
    <div class="page-footer">
        <div>
            <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
            <h3>ص . ب 18199 الرياض 11415</h3>
            <h3>سجل تجاري : 1010515706</h3>
        </div>
        <div>
            <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        </div>
        <div>
            <h3>KSA - Riyadh City , Dammam Road</h3>
            <h3>PO Box 18199 Riyadh 11415</h3>
            <h3>CR .1010515706</h3>
        </div>

    </div>
    <div class="foundation-intro">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        <div>
            <h3>مؤسسة إدارة المساحات للمقاولات</h3>
            <h3>Spaces Management Est. For Contracting</h3>

        </div>
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

    </div>
    <div class="ref-date-page">
        <h3>Ref : 22-09-85</h3>
        <div class="date-page">
            <h3>Date : 23/6/2023</h3>
            <h3 class="page">Page 2 of 7.</h3>
        </div>

    </div>
    <div class="topic-project-name">
         <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية + S</p>

    <p class="header-project-name">
        <span class="project-name">إسم المشروع : مبنى مجمع تجاري قائم - القصيم</span>
    </p>
    </div>




<div>
    <h3 class="first-summary">أ.ملخص جدول الكميات والأسعار للأعمال محل هذا العرض :-</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SECTION</th>
                    <th>DESCRIPTION</th>
                    <th>TOTAL-SAR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td>381,216.88</td>
                    <td>DISTRIBUTION BOARDS</td>
                    <td>1</td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4,732,164.36</td>
                    <td>MAIN FEEDER CABLES</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>5,113,381.24</td>
                    <td>TOTAL OF ELECTRICAL WORKS (SAR)</td>
                </tr>

            </tbody>
        </table>
</div>
<img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
<div style="border-bottom-style:dotted;margin-top:2rem;"></div>
<div class="page-footer">
    <div>
        <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
        <h3>ص . ب 18199 الرياض 11415</h3>
        <h3>سجل تجاري : 1010515706</h3>
    </div>
    <div>
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
    </div>
    <div>
        <h3>KSA - Riyadh City , Dammam Road</h3>
        <h3>PO Box 18199 Riyadh 11415</h3>
        <h3>CR .1010515706</h3>
    </div>

</div>
<div class="foundation-intro">
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
    <div>
        <h3>مؤسسة إدارة المساحات للمقاولات</h3>
        <h3>Spaces Management Est. For Contracting</h3>

    </div>
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

</div>
<div class="ref-date-page">
    <h3 class="ref">Ref : 22-09-85</h3>
    <div class="date-page">
        <h3>Date : 23/6/2023</h3>
        <h3 class="page">Page 3 of 7.</h3>
    </div>

</div>
<div class="topic-project-name">
     <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية + S</p>

<p class="header-project-name">
    <span class="project-name">إسم المشروع : مبنى مجمع تجاري قائم - القصيم</span>
</p>
</div>
<div>
    <h3 class="second-summary">ج. جدول الكميات والومواصفات والأسعار للوحات الكهرباء SDP-:
    </h3>
    <h2>SECONDARY DISTRIBUTION BOARDS (SDB'S)</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>الإجمالي <span>Total</span></th>
                    <th>سعر الوحدة<span>U/Price</span></th>
                    <th>الكمية <span>QTY</span></th>
                    <th>الوحدة<span>Unit</span></th>
                    <th> وصــــف البند<span>Item Description</span></th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Supply, install, connect and test the following panel boards (Type Tested) complete with Metering
                        Devices in large panel boards, circuit breakers, bus bars cabinets, conductors relays, residual
                        current devices, indicator lamps and all necessary accessories and ancillary works required in
                        according to specifications and as sample shown on site and supervision engineer instruction</td>
                    <td>1</td>

                </tr>
                <tr>
                    <td>139,303.75</td>
                    <td>34,825.94</td>
                    <td>No.</td>
                    <td>4</td>
                    <td>MDB 1600A approval for SCECO</td>
                    <td>1-1</td>
                </tr>
                <tr>
                    <td>43,097.54</td>
                    <td>43,097.54</td>
                    <td>No.</td>
                    <td>1</td>
                    <td>MDB Main CB1600A Branch CB (1250A+630A+2X160A) </td>
                    <td>1-2</td>
                </tr>
                <tr>
                    <td>43,097.54</td>
                    <td>43,097.54</td>
                    <td>No.</td>
                    <td>1</td>
                    <td>MDB Main CB1600A Branch CB(1000A+630A+
                        250A+160A)</td>
                    <td>1-3</td>
                </tr>
                <tr>
                    <td>45,809.54
                    </td>
                    <td>45,809.54
                    </td>
                    <td>No.</td>
                    <td>1</td>
                    <td>MDB Main CB1600A Branch CB(1000A+800A+
                        250A+160A)  </td>
                    <td>1-4</td>
                </tr>
                <tr>
                    <td>45,809.54</td>
                    <td>45,809.54</td>
                    <td>No.</td>
                    <td>1</td>
                    <td>MDB Main CB1600A Branch CB(1000A+ 630A +
                        400A+160A) </td>
                    <td>1-5</td>
                </tr>
                <tr>
                    <td>64,098.97</td>
                    <td>9,157.00</td>
                    <td>No.</td>
                    <td>7</td>
                    <td>MDB Main CB1600A Branch CB(1000A+ 630A +
                        400A+250A) </td>
                    <td>1-6</td>
                </tr>
                <tr>

                    <td>381,216.88</td>

                    <td>Total OF SECONDARY DISTRIBUTION BOARDS (SDB'S) - SAR</td>
                </tr>
            </tbody>

        </table>
    </div>
    <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
<div style="border-bottom-style:dotted;margin-top:2rem;"></div>
<div class="page-footer">
    <div>
        <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
        <h3>ص . ب 18199 الرياض 11415</h3>
        <h3>سجل تجاري : 1010515706</h3>
    </div>
    <div>
        <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
    </div>
    <div>
        <h3>KSA - Riyadh City , Dammam Road</h3>
        <h3>PO Box 18199 Riyadh 11415</h3>
        <h3>CR .1010515706</h3>
    </div>

</div>
</div>
<div class="foundation-intro">
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
    <div>
        <h3>مؤسسة إدارة المساحات للمقاولات</h3>
        <h3>Spaces Management Est. For Contracting</h3>

    </div>
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

</div>
<div class="ref-date-page">
    <h3 class="ref">Ref : 22-09-85</h3>
    <div class="date-page">
        <h3>Date : 23/6/2023</h3>
        <h3 class="page">Page 3 of 7.</h3>
    </div>

</div>
<div class="topic-project-name">
     <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية + S</p>

<p class="header-project-name">
    <span class="project-name">إسم المشروع : مبنى مجمع تجاري قائم - القصيم</span>
</p>
</div>
<div>
    <h3 class="third-summary">ب. جدول الكميات والمواصفات واألسعار ألعمال الكابالت محل هذا العرض -:-:
    </h3>
    <h2>MAIN ELECTRICAL FEEDER CABLES</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>الإجمالي <span>Total</span></th>
                    <th>سعر الوحدة<span>U/Price</span></th>
                    <th>الكمية <span>QTY</span></th>
                    <th>الوحدة<span>Unit</span></th>
                    <th> وصــــف البند<span>Item Description</span></th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Supply, install, connect copper cables from main distribution panelboard to sub distribution &
                        distribution panel boards extended on cable tray or pvc conduit, including termination both two
                        sides, glands, and all necessary accessories and ancillary works required for complete operative
                        system according to specifications and as supervision instruction .</td>

                    <td>1</td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Cable Brand : BAHRA Cable , KSA
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>508,334.40</td>
                    <td>619.92</td>
                    <td>m</td>
                    <td>820</td>
                    <td>(1x630)mm² XLPE/PVC </td>
                    <td>1-1</td>
                </tr>
                <tr>
                    <td>3,507,840.00</td>
                    <td>584.64</td>
                    <td>m</td>
                    <td>6000</td>
                    <td>(3x185)mm² XLPE/PVC +1x95mm² XLPE/PVC</td>
                    <td>1-2</td>
                </tr>
                <tr>
                    <td>640,584.00</td>
                    <td>206.64</td>
                    <td>m</td>
                    <td>3100</td>
                    <td>(3x50)mm² XLPE/PVC +1x25mm² XLPE/PVC </td>
                    <td>1-3</td>
                </tr>
                <tr>
                    <td>23,990.40</td>
                    <td>171.36</td>
                    <td>m</td>
                    <td>140</td>
                    <td>(3x35)mm² XLPE/PVC +1x16mm² XLPE/PVC  </td>
                    <td>1-4</td>

                </tr>
                <tr>
                    <td>4,732,164.36</td>
                    <td>32,747.40
                    </td>
                    <td>142.38</td>
                    <td>m</td>
                    <td>230</td>
                    <td> (3x25)mm² XLPE/PVC+1x16mm² XLPE/PVC </td>
                    <td>1-5</td>
                </tr>
                <tr>
                    <td>9,072.00
                    </td>
                    <td>113.40</td>
                    <td>m</td>

                    <td>80</td>
                    <td>(3x16)mm² XLPE/PVC+1x10mm² XLPE/PVC </td>
                    <td>1-6</td>
                </tr>
                <tr>
                    <td>9,596.16</td>
                    <td>85.68</td>
                    <td>m</td>
                    <td>112</td>
                    <td>(3x10)mm² XLPE/PVC+1x6mm² XLPE/PVC </td>
                    <td>1-7</td>
                </tr>
                <tr>
                    <td>4,732,164.36
                    </td>
                    <td>Total OF Main lectrical Feeder Cable - SAR</td>
                </tr>
            </tbody>
        </table>




    </div>
    <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
    <div style="border-bottom-style:dotted;margin-top:2rem;"></div>
    <div class="page-footer">
        <div>
            <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
            <h3>ص . ب 18199 الرياض 11415</h3>
            <h3>سجل تجاري : 1010515706</h3>
        </div>
        <div>
            <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        </div>
        <div>
            <h3>KSA - Riyadh City , Dammam Road</h3>
            <h3>PO Box 18199 Riyadh 11415</h3>
            <h3>CR .1010515706</h3>
        </div>
    </div>
</div>
<div class="foundation-intro">
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
    <div>
        <h3>مؤسسة إدارة المساحات للمقاولات</h3>
        <h3>Spaces Management Est. For Contracting</h3>

    </div>
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

</div>
<div class="ref-date-page">
    <h3 class="ref">Ref : 22-09-85</h3>
    <div class="date-page">
        <h3>Date : 23/6/2023</h3>
        <h3 class="page">Page 3 of 7.</h3>
    </div>

</div>
<div class="topic-project-name">
     <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية + S</p>

<p class="header-project-name">
    <span class="project-name">إسم المشروع : مبنى مجمع تجاري قائم - القصيم</span>
</p>
</div>
<div>
    <h3 class="fourth-summary">د. سابقة أعمالنا لأعمال الكهرباء - -
    </h3>
    <div class="images-container">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
    </div>
    <div style="border-bottom-style:dotted;margin-top:2rem;"></div>
    <div class="page-footer">
        <div>
            <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
            <h3>ص . ب 18199 الرياض 11415</h3>
            <h3>سجل تجاري : 1010515706</h3>
        </div>
        <div>
            <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        </div>
        <div>
            <h3>KSA - Riyadh City , Dammam Road</h3>
            <h3>PO Box 18199 Riyadh 11415</h3>
            <h3>CR .1010515706</h3>
        </div>
    </div>
</div>
<div class="foundation-intro">
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
    <div>
        <h3>مؤسسة إدارة المساحات للمقاولات</h3>
        <h3>Spaces Management Est. For Contracting</h3>

    </div>
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

</div>
<div class="ref-date-page">
    <h3 class="ref">Ref : 22-09-85</h3>
    <div class="date-page">
        <h3>Date : 23/6/2023</h3>
        <h3 class="page">Page 3 of 7.</h3>
    </div>

</div>
<div class="topic-project-name">
     <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية + S</p>

<p class="header-project-name">
    <span class="project-name">إسم المشروع : مبنى مجمع تجاري قائم - القصيم</span>
</p>
</div>
<div>
    <h3 class="fourth-summary">د. سابقة أعمالنا لأعمال الكهرباء - -
    </h3>
    <div class="images-container">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
    </div>
    <div style="border-bottom-style:dotted;margin-top:2rem;"></div>
    <div class="page-footer">
        <div>
            <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
            <h3>ص . ب 18199 الرياض 11415</h3>
            <h3>سجل تجاري : 1010515706</h3>
        </div>
        <div>
            <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        </div>
        <div>
            <h3>KSA - Riyadh City , Dammam Road</h3>
            <h3>PO Box 18199 Riyadh 11415</h3>
            <h3>CR .1010515706</h3>
        </div>
    </div>
</div>
<div class="foundation-intro">
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
    <div>
        <h3>مؤسسة إدارة المساحات للمقاولات</h3>
        <h3>Spaces Management Est. For Contracting</h3>

    </div>
    <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">

</div>
<div class="ref-date-page">
    <h3 class="ref">Ref : 22-09-85</h3>
    <div class="date-page">
        <h3>Date : 23/6/2023</h3>
        <h3 class="page">Page 3 of 7.</h3>
    </div>

</div>
<div class="topic-project-name">
     <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية + S</p>

<p class="header-project-name">
    <span class="project-name">إسم المشروع : مبنى مجمع تجاري قائم - القصيم</span>
</p>
</div>
<div>
    <h3 class="fourth-summary">د. سابقة أعمالنا لأعمال الكهرباء - -
    </h3>
    <div class="images-container">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
        <img src="{{asset('images/1694333491.jpg')}}" style="width:20%;height:20%;">
    </div>
    <div style="border-bottom-style:dotted;margin-top:2rem;"></div>
    <div class="page-footer">
        <div>
            <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
            <h3>ص . ب 18199 الرياض 11415</h3>
            <h3>سجل تجاري : 1010515706</h3>
        </div>
        <div>
            <img src="{{asset('images/1694333491.jpg')}}" style="width:10%;height:10%;">
        </div>
        <div>
            <h3>KSA - Riyadh City , Dammam Road</h3>
            <h3>PO Box 18199 Riyadh 11415</h3>
            <h3>CR .1010515706</h3>
        </div>
    </div>
</div>
</div>
@endsection

