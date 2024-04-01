@extends('layouts.app')
@section('styles')
    <style>
        @font-face {
            font-family: 'OptimusPrinceps';
            src: url('{{ asset('/fonts/NotoNaskhArabic-VariableFont_wght.ttf') }}');
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

        h2.price-offer-intro {
            padding-top: 3rem;
            border-bottom-style: dotted;
            border-bottom-color: orangered;
            padding-bottom: 3rem;
            color: blue;
            font-weight: bold;
        }

        div.region_project_number {
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
            border-bottom-style: dotted;
            border-bottom-color: gray;
        }

        h3.offer-giver {
            padding-top: 1rem;
            color: blue;
            font-weight: bold;

        }

        div.foundation-intro {
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }

        h3.foundation-name {
            font-style: italic;

        }

        div.contents {
            padding-bottom: 3rem;
            padding-top: 3rem;
            border-bottom-style: dotted;
            border-bottom-color: orangered;
        }

        div.contents h3 {
            color: blue;
            font-weight: bold;
        }

        div.contents ol {
            font-size: 18px;
            color: blue;
        }

        div.contents ol span {
            color: orangered;
        }

        div.provided-to {
            padding-bottom: 4rem;
            padding-top: 4rem;
            border-bottom-style: dotted;
            color: blue;
            border-bottom-color: orangered;
        }

        h1.tagana-contracting {
            text-align: center;
            color: blue;
            font-weight: bold;
        }

        div.submit-by {
            direction: ltr;
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
            border-bottom-style: dotted;
            color: blue;
        }

        div.submit-by div {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        div.submit-by div h3.first-child {
            color: blue;
            font-weight: bold;
        }

        div.ref-date-page {
            display: flex;
            justify-content: space-between;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }

        h3.ref {
            font-weight: bold;
        }

        h3.page {
            font-weight: bold;
        }

        span.header-date {
            font-weight: bold;
        }

        div.date-page {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        div.topic-project-name {
            padding-bottom: 1rem;
            padding-top: 1rem;
            border-bottom-style: dotted;

        }

        p.header-topic {
            color: blue;
            font-size: 18px;
        }

        p.header-topic span.topic {
            font-weight: bold;
        }

        p.header-project-name {
            color: blue;
            font-size: 18px;
        }

        p.header-project-name span.project-name {
            font-weight: bold;
            color: blueviolet;
        }

        div.mister-eng {
            display: flex;
            gap: 4rem;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }

        h4.hi {
            padding-bottom: 3rem;
            padding-top: 3rem;
            text-align: center;
            font-weight: bold;
        }

        p.topic-main {
            font-size: 18px;
        }

        ul.terms-general-rules {
            margin-top: 1rem;
            font-size: 18px;
        }

        h3.terms {
            position: relative;

        }

        h3.terms::after {
            content: '';
            position: absolute;
            bottom: -0.3rem;
            right: 0;
            width: 16%;
            height: 2px;
            background-color: black;
        }

        p.hope-satisfied {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        div.topic-footer {
            display: flex;
            justify-content: center;
            padding-bottom: 0rem;
            padding-top: 3rem;
        }

        div.topic-footer img.first-img {
            margin-left: 20%;
        }

        div.topic-footer div {
            margin-right: 10%;
        }

        div.page-footer {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            column-gap: 4rem;
            padding-bottom: 3rem;
            padding-top: 3rem;
        }

        h3.first-summary {
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }

        h3.first-summary::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            right: 0;
            width: 40%;
            height: 2px;
            background-color: blue;
        }

        h3.second-summary {
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }

        h3.second-summary::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            right: 0;
            width: 44%;
            height: 2px;
            background-color: blue;
        }

        h3.third-summary {
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }

        h3.third-summary::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            right: 0;
            width: 50%;
            height: 2px;
            background-color: blue;
        }

        h3.fourth-summary {
            position: relative;
            margin-top: 2.5rem;
            margin-bottom: 5.5rem;
            color: blue;
            font-weight: bold;
        }

        h3.fourth-summary::after {
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
        <h2 class="price-offer-intro">{{ $qoute->description }}</h2>
        <div class="region_project_number">

            <h3 class="region">المنطقة : القصيم </h3>
            <h3 class="project_number">رقم المشروع :{{ $qoute->project_name }}</h3>

        </div>
        <h3 class="offer-giver">مقدم العرض :</h3>


        <div class="foundation-intro">
            <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">
            <div>
                <h3 class="foundation-name">مؤسسة إدارة المساحات للمقاولات</h3>
                <h3>Spaces Management Est. For Contracting</h3>

            </div>
            <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">

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
            <h1 class="tagana-contracting">{{ $qoute->customers_data ? $qoute->customers_data->name : '' }}</h1>
        </div>

        <div class="submit-by">
            <div>
                <h3 class="first-child">Submit it by;</h3>
                <h3>Spaces Management Est. For Contracting</h3>

            </div>



            <h3 class="date">23/6/2023</h3>
        </div>


        <div class="foundation-intro">
            <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">
            <div>
                <h3></h3>
                <h3>Spaces Management Est. For Contracting</h3>

            </div>
            <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">

        </div>
        <div class="ref-date-page">
            <h3>Ref :{{ date('d/m/y') }}</h3>
            <div class="date-page">
                <h3><span class="header-date">Date</span> {{ $qoute->qoutation_date }}</h3>
                <h3 class="page">Page 1 of 7.</h3>
            </div>

        </div>
        <div class="topic-project-name">
            <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية
                + S</p>

            <p class="header-project-name">
                <span class="project-name">إسم المشروع </span>:{{ $qoute->project_name }}
            </p>
        </div>
        <div class="mister-eng">
            <div style="color: blue;">
                <h3>السادة / مؤسسة تقانة للمقاولات</h3>
                <h3> {{ $qoute->customers_data->name }} </h3>


            </div>
            <div style="color: blue;">
                <h3>المحترم</h3>
                <h3>المحترمين</h3>


            </div>
        </div>


        <h4 class="hi">تحية طيبة وبعد ،،،
        </h4>
        <p class="topic-main">
            إشارة إلى الموضوع أعلاه ، نشكركم لدعوتكم لنا ويسرنا ويشرفنا أن نتقدم لكم بعرض سعرنا الخاص بعملية <span
                style="color: blue;font-weight:bold;">توريد وتركيب وتشغيل كابلات كهرباء + لوحات SDP، وعليه يكون إجمالي
                المبلغ (5,113,381.24 ريال سعودي )، خمسة مليون وثلاثة عشرة ألف وثلاثمائة وواحد وثمانون ريال سعودي فقط وأربعة
                عشرون هللة لا غير ،</span> وذلل حسب وذلك حسب جداول الكميات والبنود والكميات والأسعار المرفقة مع هذا العرض
            .(، وذلك وفقاً للمواصفات والكميات والأسعار المرفقة مع هذا العرض.
        </p>
        <h3 class="terms">الشروط والأحكام العامة :</h3>

        @foreach ($qoute->qoute_batch as $batch)
            @foreach ($lines as $line)
                @if ($line->id == $batch->line)
                    <li>
                        {{ $line->terms }}
                    </li>
                @endif
            @endforeach
        @endforeach
        <p class="hope-satisfied">أملين أن يحوز عرضنا على رضاكم ،،،</p>
        </p>
        @include('reports._apart.fotter')
        <div class="foundation-intro">
            <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">
            <div>
                <h3>مؤسسة إدارة المساحات للمقاولات</h3>
                <h3>Spaces Management Est. For Contracting</h3>

            </div>
            <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">

        </div>
        <div class="ref-date-page">
            <h3>Ref : 22-09-85</h3>
            <div class="date-page">
                <h3>Date : 23/6/2023</h3>
                <h3 class="page">Page 2 of 7.</h3>
            </div>

        </div>
        <div class="topic-project-name">
            <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت كهربائية
                + S</p>

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
                        <?php $i = 1; ?>
                        @foreach ($qoute->qoute_batch as $batch)
                            <tr>

                                <td>&emsp;</td>

                                <td>&emsp;</td>
                                <td>&emsp;</td>
                            </tr>
                            <tr>
                                <td>{{ $i++ }}</td>


                                <td>{{ $batch->lines->name }}</td>
                                <td>{{ $batch->qoute_lines->sum('product_factor') }}</td>
                            </tr>
                            <tr>

                                <td>&emsp;</td>

                                <td>&emsp;</td>
                                <td>&emsp;</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <img src="{{ asset('images/1694333491.jpg') }}" style="width:20%;height:20%;">
            <div style="border-bottom-style:dotted;margin-top:2rem;"></div>
            @include('reports._apart.fotter')
            <div class="ref-date-page">
                <h3 class="ref">Ref : 22-09-85</h3>
                <div class="date-page">
                    <h3>Date : 23/6/2023</h3>
                    <h3 class="page">Page 3 of 7.</h3>
                </div>

            </div>
            <div class="topic-project-name">
                <p class="header-topic"> <span class="topic">الموضوع : </span>عرض سعر عملية توريد وتركيب وتشغيل كابالت
                    كهربائية + S</p>

                <p class="header-project-name">
                    <span class="project-name">إسم المشروع : {{ $qoute->project_name }}</span>
                </p>
            </div>
            <div>
                @foreach ($qoute->qoute_batch as $batch)
                    )


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


                                <tr aria-rowspan="2" aria-colspan="6">
                                    <td aria-rowspan="2" aria-colspan="6">{{ $batch->qoutes->description }}</td>


                                </tr>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($batch->qoute_lines as $qoute_line)
                                    <tr>
                                        <td> {{ $qoute_line->product_factor * $qoute_line->qty }}</td>
                                        <td> {{ $qoute_line->product_factor }}</td>
                                        <td> {{ $qoute_line->unit ? $qoute_line->units->name : '' }}</td>
                                        <td> {{ $qoute_line->qty }}</td>
                                        <td> {{ $qoute_line->items ? $qoute_line->items->name : '' }}</td>
                                        <td> {{ $i++ }}</td>
                                    </tr>
                                @endforeach
                                <tr>

                                    <td>381,216.88</td>

                                    <td>Total OF SECONDARY DISTRIBUTION BOARDS (SDB'S) - SAR</td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                    <img src="{{ asset('images/1694333491.jpg') }}" style="width:20%;height:20%;">
                    <div style="border-bottom-style:dotted;margin-top:2rem;"></div>
                    @include('reports._apart.fotter')
                    <div class="ref-date-page">
                        <h3 class="ref">Ref : 22-09-85</h3>
                        <div class="date-page">
                            <h3>Date : 23/6/2023</h3>
                            <h3 class="page">Page 3 of 7.</h3>
                        </div>

                    </div>
                @endforeach
                @foreach ($qoute->qoute_batch as $batch)
                    <div>
                        <h3 class="fourth-summary"> {{ $batch->lines->main_lines->name }}</h3>
                        </h3>
                        <div class="images-container">
                            @foreach ($batch->attachment as $attach)
                                <img src="{{ Storage::url($attach->path) }}" style="width:20%;height:20%;">
                            @endforeach
                        </div>
                @endforeach
                <div style="border-bottom-style:dotted;margin-top:2rem;"></div>
                <div class="page-footer">
                    <div>
                        <h3>الرياض ، حي اليرموك - طريق الدمام</h3>
                        <h3>ص . ب 18199 الرياض 11415</h3>
                        <h3>سجل تجاري : 1010515706</h3>
                    </div>
                    <div>
                        <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">
                    </div>
                    <div>
                        <h3>KSA - Riyadh City , Dammam Road</h3>
                        <h3>PO Box 18199 Riyadh 11415</h3>
                        <h3>CR .1010515706</h3>
                    </div>
                </div>
            </div>
            <div class="foundation-intro">
                <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">
                <div>
                    <h3>مؤسسة إدارة المساحات للمقاولات</h3>
                    <h3>Spaces Management Est. For Contracting</h3>

                </div>
                <img src="{{ asset('images/1694333491.jpg') }}" style="width:10%;height:10%;">

            </div>
            <div class="ref-date-page">
                <h3 class="ref">Ref : 22-09-85</h3>
                <div class="date-page">
                    <h3>Date : 23/6/2023</h3>
                    <h3 class="page">Page 3 of 7.</h3>
                </div>

            </div>




        </div>
    @endsection
