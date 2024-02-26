<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">logo</div>
        </div>
        <div class="col-md-6">
            <table>
                <tbody>

                    {{--
                    "description" => $request->description,
                    "refrence" => 'Q'.$last,
                    'customer' => $request->customer,
                    "indrect" => $request->indrect,
                    "addition"=>$request->addition,
                    "consult" => $request->consult,
                    "risk" => $request->risk, --}}
                    <tr>

                        <td>رقم العرض</td>
                        <td>{{$qoute->id}}</td>
                    </tr>
                    <tr>
                        <td> إسم المشروع</td>
                        <td>{{$qoute->project_name}}</td>
                    </tr>
                    <tr>
                        <td>العميل</td>
                        {{-- apply here the reation customer_data and get customer name --}}
                        <td>
@if ($qoute->customers_data)
    {{$qoute->customers_data->name}}

@else
    لا يوجد عميل / No Customer
@endif



                        </td>




                    </tr>
                    <tr></tr>
                        <td>الوصف</td>
                        <td>{{$qoute->description}}</td>
                    <tr>
                        <td>تاريخ العرض</td>
                        <td>{{$qoute->qoutation_date}}</td>
                    </tr>
                    <tr>
                        <td>تاريخ انتهاء العرض</td>
                        <td>{{$qoute->expire_date}}</td>
                    </tr>

                    <tr>
                        <td>الحالة </td>
                        <td>{{$qoute->statues}}</td>
                    </tr>

                    <tr>
                        <td>المبلغ الاجمالي</td>
                        <td>{{$qoute->total}}</td>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
