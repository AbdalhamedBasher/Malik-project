@extends('layouts.admin')
@section('content')

    {{-- @extends('layouts.main') --}}





@section('content')
    <div class="flex unit[-center markdown">

    </div>
    <?php $discount = ['سعر البيع', 'التكاليف', 'التكاليف غير المباشرة', 'التكاليف الكلية', 'الربح', 'صافي الربح']; ?>

    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>
        {{-- quotaion master --}}
        <div class="card-body">
            <form method="POST" action="{{ route('qoute.update', $qoute->id) }}" id="qoute">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group row-md-3">
                            <label for="inputZip">المرجع/refrence</label>
                            <input type="text" name="id" class="form-control" value="{{ $qoute->refrence }}"
                                readonly id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">المشروع/Project</label>

                            <select id="inputState" name="project" class="customer form-control">
                                <option>-- إختر --</option>

                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" {{$project->id==$qoute->project?'selected':''}} >
                                        {{ $project->name }} 
                                    </option>
                                @endforeach


                            </select>

                        </div>
                        @error('project')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row-md-3">

                            <label for="inputZip">العميل/customer</label>
                            <select id="inputState" name="customer" class="customer form-control">

                                @foreach ($customers as $customer)
                                    <option value="" >-- إختر --</option>
                                    <option value="{{ $customer->id }}" {{$customer->id==$qoute->customer?'selected':''}}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach


                            </select>

                        </div>
                        @error('customer')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group row-md-3">
                            <label for="inputZip">الوصف/description</label>
                            <input type="text" name="description" class="form-control" id="inputZip"
                                value="{{ $qoute->description }}">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">المعامل/factor</label>
                            <input type="text" name="factor" class="form-control factor" id="inputZip"
                                value="{{ $qoute->qoute_batch[0]->factor }}">


                        </div>

                        <div class="form-group row-md-3">
                            <label for="inputZip">تاريخ الانشاء/issue date</label>
                            <input type="date" name="qoutation_date" class="form-control qoutation_date" id="inputZip"
                                value="{{ $qoute->qoutation_date }}">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">تاريخ الانتهاء/expire date</label>
                            <input type="date" name="expire_date" class="form-control expire_date" id="inputZip"
                                value="{{ $qoute->expire_date }}">


                        </div>


                        </span>
                    </div>
                    <div class="col">
                        <div class="card mt-1">
                            <div class="card-header  text-3xl" style="background-color: #201843a3 ; color:aliceblue">
                                بيانات العميل/Customer Data
                            </div>
                            {{-- quotaion master --}}
                            <div class="card-body   h-50 ">
                                <table class="table table-auto ">


                                    <tbody class="customer_data">
                                        <tr class=" border-bottom-0 ">
                                            <td class=" border-bottom-0  border-top-0">الاسم/Name</td>
                                            <td class=" border-bottom-0  border-top-0 cust-name">
                                                {{ $qoute->customers_data->name }}</td>



                                        </tr>
                                        <tr class=" border-bottom-0 ">
                                            <td class=" border-bottom-0  border-top-0">رقم الهاتف/Phone Number</td>
                                            <td class=" border-bottom-0  border-top-0  cust-phone">
                                                {{ $qoute->customers_data->phone_number }}</td>



                                        </tr>
                                        <tr class=" border-bottom-0 ">
                                            <td class=" border-bottom-0  border-top-0">الايميل/Email</td>
                                            <td class=" border-bottom-0  border-top-0 cust-email">
                                                {{ $qoute->customers_data->email }}</td>



                                        </tr>
                                        <tr class= "border-bottom-0 ">
                                            <td class=" border-bottom-0  border-top-0">السجل التجاري/commercial registration
                                            </td>
                                            <td class=" border-bottom-0  border-top-0 cust-tax-number">
                                                {{ $qoute->customers_data->tax_number }}</td>



                                        </tr>
                                    </tbody>




                                </table>
                            </div>
                        </div>
                        <div class="form-row">



                        </div>






                    </div>
                </div>
                <input type="hidden" name="statues" class="statues">
                @php
                    $material_summary = [];
                    $labour_summary = [];
                    $profit_summary = [];
                    $total_summary = [];

                @endphp
             
                @foreach ($line as $item)
                    <div class="card mt-1 card-detail border-0">
                        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">
                            {{ $item->name }}
                        </div>

                        @foreach ($item->child_lines as $children)
                            @php
                                $material_summary[$children->id] = 0;
                                $labour_summary[$children->id] = 0;
                                $profit_summary[$children->id] = 0;
                                $total_summary[$children->id] = 0;
                                $all_tot = 0;
                                $all_profit = 0;
                                $all_labour = 0;
                                $all_material = 0;

                            @endphp
                            @if (isset($qoute_batch[$children->id]))
                                <div class="card-body border-2">

                                    <div class="table-responsive">
                                        <div class="">

                                            <input type="checkbox" class="lines" name="lines[]"
                                                value="{{ $qoute_batch[$children->id]->line }}" id=""
                                                {{ $qoute_batch[$children->id]->line == $children->id ? 'checked' : '' }}>
                                            <label class="" for="">
                                                {{ $children->name }} 

                                            </label>
                                        </div>

                                        <table class="overflow-x-scroll" style="text-align: center">
                                            <thead class=" overflow-x-scroll bg-blue-50">
                                                <tr class=" border border-1 overflow-x-scroll">
                                                    <th class=" border border-1 ">
                                                        #
                                                    </th>


                                                    <th style="text-align: center">
                                                        اسم المادة Product Name
                                                    </th>
                                                    <th style="text-align: center">
                                                        الوحدات Unit
                                                    </th>
                                                    <th style="text-align: center">
                                                        سعر الوحدة Product*factor
                                                    </th>
                                                    <th style="text-align: center">
                                                        الكمية Qty
                                                    </th>
                                                    <th style="text-align: center">
                                                        المجموع Sale Price</th>
                                                    <th style="text-align: center">
                                                        Material المواد المساعدة
                                                    </th>
                                                    <th style="text-align: center">
                                                        د-المواد Decoration Product
                                                    </th>
                                                    <th style="text-align: center">
                                                        -غير ذلك المواد Other Material
                                                    </th>
                                                    <th style="text-align: center">
                                                        المجموع المواد Material Total</th>
                                                    <th style="text-align: center">
                                                        المجموع المواد الكلي Material Per Qty</th>

                                                    <th style="text-align: center">
                                                        الايادي العاملة Labour</th>

                                                    <th style="text-align: center">
                                                        غير ذلك- الايادي Other Labour</th>
                                                    <th style="text-align: center">
                                                        المجموع العمالة Labour Total</th>
                                                    <th style="text-align: center">
                                                        الايادي العاملة الكلي Total Labour Per Qty</th>
                                                    <th style="text-align: center">
                                                        مجموع التكلفة الكلية All Total </th>
                                                    <th> &nbsp;</th>


                                                </tr>
                                            </thead>
{{-- here is the saved data from the database --}}
                                            <tbody class="line_data" id="{{ $children->id }}">

                                                @if (isset($qoute_batch[$children->id]->qoute_lines))
                                                    @foreach ($qoute_batch[$children->id]->qoute_lines as $value)
                                                        @php
                                                            $tot_material =
                                                                $value->material +
                                                                $value->material_acc +
                                                                $value->material_other;
                                                            $tot_labour = $value->labour + $value->labour_other;
                                                            $all_material = $tot_material * $value->qty;
                                                            $all_labour = $tot_labour * $value->qty;
                                                            $factor_price =
                                                                $value->qoute_batch_items->factor *
                                                                ($value->items->price) ? $value->items->price:0;
                                                            $product_factor = $factor_price * $value->qty;
                                                            $all_tot = $all_material + $all_labour;
                                                          
                                                        @endphp

                                                        <tr id="{{ $value->qoute_batch_items->lines->item_lines }}">
                                                            <td class="counter">

                                                                {{ $value->qoute_batch_items->line }}
                                                            </td>

                                                            <td style="text-align: center">

                                                                @if ($value->qoute_batch_items->lines->item_lines)
                                                                    <select class="form-control products w-full"
                                                                        id="{{ $value->qoute_batch_items->line }}"
                                                                        name="item[{{ $value->qoute_batch_items->line }}][]">

                                                                        @foreach ($items as $item)
                                                                            <option

                                                                                value="{{ $item->id }}"
                                                                                data-price="{{ $item->price }}"  {{$item->id==$value->item?'selected':' '}}>
                                                                                {{ $item->name }} 
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                @endif

                                                            </td>
                                                            <td style="text-align: center">

                                                                <select class="form-control select2"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    name="unit[{{ $value->qoute_batch_items->line }}][]">
                                                                    <option  value=""> </option>
                                                                    @foreach ($units as $unit)
                                                                        <option value="{{ $unit->id }}"
                                                                            {{ $unit->id == $value->unit ? 'selected' : '' }}>
                                                                            {{ $unit->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="factor_price[{{ $value->qoute_batch_items->line }}][]"
                                                                    class="border border-1 factor_price" readonly
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $value->qoute_batch_items->factor * $value->items->price  }}">
                                                                    @php
                                                                        $factor_price=$value->qoute_batch_items->factor * $value->items->price;
                                                                    @endphp
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="qty[{{ $value->qoute_batch_items->line }}][]"
                                                                    class="border border-1 qty"
                                                                    id="{{ $value->qoute_batch_items->line ?? 0 }}"
                                                                    value="{{ $value->qty ?? 0 }}">
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="product_factor[{{ $value->qoute_batch_items->line }}][]"
                                                                    readonly id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $factor_price *  $value->qty  ?? 0 }}"
                                                                    class="border border-1 simetot"
                                                                    {{    $value->qoute_batch_items->factor 
                                                                         }}>
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="material[{{ $value->qoute_batch_items->line }}][]"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $value->material ?? 0 }}"
                                                                    class="border border-1 material">
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="material_acc[{{ $value->qoute_batch_items->line }}][]"
                                                                    value="{{ $value->material_acc ?? 0 }}"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    class="border border-1 material_acc">
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="material_other[{{ $value->qoute_batch_items->line }}][]"
                                                                    value="{{ $value->material_other ?? 0 }}"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    class="border border-1 material_other">
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="tot_material[{{ $value->qoute_batch_items->line }}][]"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $tot_material ?? 0 }}" readonly
                                                                    class="border border-1 tot_material">
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="total_material[{{ $value->qoute_batch_items->line }}][]"
                                                                    id="{{ $value->qoute_batch_items->line }}" readonly
                                                                    class=" border border-1 all_material px-4"
                                                                    value="{{ $all_material ?? 0 }}"
                                                                    {{ $material_summary[$children->id] += $all_material }}>

                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="labour[{{ $value->qoute_batch_items->line }}][]"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $value->labour ?? 0 }}"
                                                                    class="border border-1 labour">
                                                            </td>


                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    name="labour_other[{{ $value->qoute_batch_items->line }}][]"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $value->labour_other ?? 0 }}"
                                                                    class=" border border-1 labour_other">
                                                            </td>
                                                            <td style="text-align: center">


                                                                <input type="text"
                                                                    name="worker_tot[{{ $value->qoute_batch_items->line }}][]"
                                                                    id="" class=" border border-1 tot_labour"
                                                                    value="{{ $value->tot_labour ?? 0 }}" readonly>
                                                            </td>
                                                            <td style="text-align: center">


                                                                <input type="text"
                                                                    name="total_labour[{{ $value->qoute_batch_items->line }}][]"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $all_labour ?? 0 }}"
                                                                    {{ $labour_summary[$children->id] += $all_labour }}
                                                                    class=" border border-1 all_labour px-4" readonly>
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text"
                                                                    id="{{ $value->qoute_batch_items->line }}"
                                                                    value="{{ $all_tot ?? 0 }}"
                                                                    {{ $total_summary[$children->id] += $all_tot }}
                                                                    class=" border border-1 all_tot" readonly>

                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr id="{{ $children->id }}">
                                                        <td class="counter">

                                                            {{ $children->id }}
                                                        </td>

                                                        <td style="text-align: center">

                                                            @if (isset($children->item_lines))
                                                                <select class="form-control products  w-full"
                                                                    id="{{ $children->id }}"
                                                                    name="item[{{ $children->id }}][]">
                                                                    <option  value=""> </option>
                                                                    @foreach ($children->item_lines as $product)
                                                                        <option value="{{ $product->id }}"
                                                                            data-price="{{ $product->price }}" >
                                                                            {{ $product->name }}
                                                                            <span
                                                                                id="{{ $product->id }}">{{ $product->price }}</span>
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                            <input type="hidden" name="" class="product-price"
                                                                readonly id="{{ $children->id }}">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <select class="form-control select2"
                                                                id="{{ $children->id }}"
                                                                name="unit[{{ $children->id }}][]">
                                                                <option selected value=""> </option>
                                                                @foreach ($units as $unit)
                                                                    <option value="{{ $unit->id }}">
                                                                        {{ $unit->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="factor_price[{{ $children->id }}][]"
                                                                class="border border-1 factor_price" readonly
                                                                id="{{ $children->id }}">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text" name="qty[{{ $children->id }}][]"
                                                                class="border border-1 qty" id="{{ $children->id }}"
                                                                value="0">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="product_factor[{{ $children->id }}][]" readonly
                                                                id="{{ $children->id }}" value="0"
                                                                class="border border-1 simetot">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="material[{{ $children->id }}][]"
                                                                id="{{ $children->id }}" value="0"
                                                                class="border border-1 material">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="material_acc[{{ $children->id }}][]"
                                                                value="0" id="{{ $children->id }}"
                                                                class="border border-1 material_acc">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="material_other[{{ $children->id }}][]"
                                                                value="0" id="{{ $children->id }}"
                                                                class="border border-1 material_other">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="tot_material[{{ $children->id }}][]"
                                                                id="{{ $children->id }}" value="0" readonly
                                                                class="border border-1 tot_material">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="total_material[{{ $children->id }}][]"
                                                                id="{{ $children->id }}" readonly
                                                                class=" border border-1 all_material px-4" value="0">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text" name="labour[{{ $children->id }}][]"
                                                                id="{{ $children->id }}" value="0"
                                                                class="border border-1 labour">
                                                        </td>


                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="labour_other[{{ $children->id }}][]"
                                                                id="{{ $children->id }}" value="0"
                                                                class=" border border-1 labour_other">
                                                        </td>
                                                        <td style="text-align: center">


                                                            <input type="text"
                                                                name="worker_tot[{{ $children->id }}][]"
                                                                id="" class=" border border-1 tot_labour"
                                                                value="0" readonly>
                                                        </td>
                                                        <td style="text-align: center">


                                                            <input type="text"
                                                                name="total_labour[{{ $children->id }}][]"
                                                                id="{{ $children->id }}" value="0"
                                                                class=" border border-1 all_labour px-4" readonly>
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text" id="{{ $children->id }}"
                                                                value="0" class=" border border-1 all_tot" readonly>

                                                        </td>

                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                        <input type="submit" value="إضافة Add"
                                            class=" btn btn-primary btn-line col-sm-2" id="{{ $children->id }}">
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>

                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="text" name="total[]" id="{{ $children->id }}"
                                            class="total border border-1" readonly>
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="text" name="total[]" id="{{ $children->id }}"
                                            class="total_material border border-1" readonly>
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="text" name="total[]" id="{{ $children->id }}"
                                            class="total_labour border border-1" readonly>
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip">total_profit {{ $children->id }}</label>
                                        <input type="text" name="total[]" id="{{ $children->id }}"
                                            class="total_profit border border-1" readonly value="0">
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>

                                    </div>
                                </div>



                    </div>

                    <div class="form-group col-md-2 justify-center d-none">
                        <label for="inputZip"> &emsp14; </label>
                        <input type="text" name="total[]" id="{{ $children->id }}"
                            class="total border border-1 d-none" readonly>
                    </div>
                    <div class="form-group col-md-2 justify-center d-none">
                        <label for="inputZip"> &emsp14; </label>
                        <input type="text" name="total[]" id="{{ $children->id }}"
                            class="total_material border border d-none" readonly>
                    </div>
                    <div class="form-group col-md-2 justify-center d-none">
                        <label for="inputZip"> &emsp14; </label>
                        <input type="text" name="total[]" id="{{ $children->id }}"
                            class="total_labour border border-1 d-none" readonly>
                    </div>
                    <div class="form-group col-md-2 justify-center d-none">
                        <label for="inputZip"> {{ $children->id }}</label>
                        <input type="text" name="total[]" id="{{ $children->id }}"
                            class="total_profit border border-1 d-none" readonly value="0">
                    </div>
                    <div class="form-group col-md-2 justify-center d-none">
                        <label for="inputZip"> &emsp14; </label>

                    </div>
                @else
                    <div class="card-body border-2">

                        <div class="table-responsive">
                            <div class="">

                                <input type="checkbox" class="lines" name="lines[]" value="{{ $children->id }}"
                                    id="">

                                <label class="" for="">
                                    {{ $children->name }}

                                </label>
                            </div>

                            <table class="overflow-x-scroll" style="text-align: center">
                                <thead class=" overflow-x-scroll bg-blue-50">
                                    <tr class=" border border-1 overflow-x-scroll">
                                        <th class=" border border-1 ">
                                            #
                                        </th>


                                        <th style="text-align: center">
                                            اسم المادة/Product Name
                                        </th>
                                        <th style="text-align: center">
                                            الوحدات/Unit
                                        </th>
                                        <th style="text-align: center">
                                            سعر الوحدة/Product*factor
                                        </th>
                                        <th style="text-align: center">
                                            الكمية/Qty
                                        </th>
                                        <th style="text-align: center">
                                            المجموع/Sale Price</th>
                                        <th style="text-align: center">
                                            المواد المساعدة/Material Price
                                        </th>
                                        <th style="text-align: center">
                                            د-المواد/Decoration Product
                                        </th>
                                        <th style="text-align: center">
                                            -غير ذلك المواد/Other Material
                                        </th>
                                        <th style="text-align: center">
                                            المجموع المواد/Material Total</th>
                                        <th style="text-align: center">
                                            المجموع المواد/الكلي /Material Per Qty</th>

                                        <th style="text-align: center">
                                            الايادي العاملة/Labour</th>

                                        <th style="text-align: center">
                                            غير ذلك- الايادي /Other Labour</th>
                                        <th style="text-align: center">
                                            المجموع العمالة Labour Total</th>
                                        <th style="text-align: center">
                                            الايادي العاملة/الكلي/Total Labour Per Qty</th>
                                        <th style="text-align: center">
                                            مجموع التكلفة الكلية/All Total </th>


                                    </tr>
                                </thead>

                                <tbody class="line_data" id="{{ $children->id }}">

                                    <tr id="{{ $children->id }}">
                                        <td class="counter">

                                            {{ $children->id }}
                                        </td>

                                        <td style="text-align: center">

                                            @if (isset($children->item_lines))
                                                <select class="form-control products  w-full" id="{{ $children->id }}"
                                                    name="item[{{ $children->id }}][]">
                                                    <option  value=""> </option>

                                                    @foreach ($children->item_lines as $product)
                                                        <option value="{{ $product->id }}"
                                                            data-price="{{ $product->price }}">
                                                            {{ $product->name }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif

                                        </td>
                                        <td style="text-align: center">

                                            <select class="form-control select2" id="{{ $children->id }}"
                                                name="unit[{{ $children->id }}][]">
                                                <option selected value=""> </option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">
                                                        {{ $unit->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="factor_price[{{ $children->id }}][]"
                                                class="border border-1 factor_price" readonly
                                                id="{{ $children->id }}">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="qty[{{ $children->id }}][]"
                                                class="border border-1 qty" id="{{ $children->id }}" value="0">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="product_factor[{{ $children->id }}][]"
                                                readonly id="{{ $children->id }}" value="0"
                                                class="border border-1 simetot">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="material[{{ $children->id }}][]"
                                                id="{{ $children->id }}" value="0"
                                                class="border border-1 material">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="material_acc[{{ $children->id }}][]"
                                                value="0" id="{{ $children->id }}"
                                                class="border border-1 material_acc">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="material_other[{{ $children->id }}][]"
                                                value="0" id="{{ $children->id }}"
                                                class="border border-1 material_other">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="tot_material[{{ $children->id }}][]"
                                                id="{{ $children->id }}" value="0" readonly
                                                class="border border-1 tot_material">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="total_material[{{ $children->id }}][]"
                                                id="{{ $children->id }}" readonly
                                                class=" border border-1 all_material px-4" value="0">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="labour[{{ $children->id }}][]"
                                                id="{{ $children->id }}" value="0"
                                                class="border border-1 labour">
                                        </td>


                                        <td style="text-align: center">

                                            <input type="text" name="labour_other[{{ $children->id }}][]"
                                                id="{{ $children->id }}" value="0"
                                                class=" border border-1 labour_other">
                                        </td>
                                        <td style="text-align: center">


                                            <input type="text" name="worker_tot[{{ $children->id }}][]"
                                                id="" class=" border border-1 tot_labour" value="0"
                                                readonly>
                                        </td>
                                        <td style="text-align: center">


                                            <input type="text" name="total_labour[{{ $children->id }}][]"
                                                id="{{ $children->id }}" value="0"
                                                class=" border border-1 all_labour px-4" readonly>
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" id="{{ $children->id }}" value="0"
                                                class=" border border-1 all_tot" readonly>

                                        </td>

                                    </tr>



                                </tbody>
                            </table>
                            <input type="submit" value="إضافة Add" class=" btn btn-primary btn-line col-sm-2"
                                id="{{ $children->id }}">
                        </div>

                        <div class="form-group col-md-2 justify-center d-none">
                            <label for="inputZip"> &emsp14; </label>
                            <input type="text" name="total[]" id="{{ $children->id }}"
                                class="total border border-1 d-none" reado d-nonenly>
                        </div>
                        <div class="form-group col-md-2 justify-center d-none">
                            <label for="inputZip"> &emsp14; </label>
                            <input type="text" name="total[]" id="{{ $children->id }}"
                                class="total_material border border d-none" readonly>
                        </div>
                        <div class="form-group col-md-2 justify-center d-none">
                            <label for="inputZip"> &emsp14; </label>
                            <input type="text" name="total[]" id="{{ $children->id }}"
                                class="total_labour border border-1 d-none" readonly>
                        </div>
                        <div class="form-group col-md-2 justify-center d-none">
                            <label for="inputZip"> {{ $children->id }}</label>
                            <input type="text" name="total[]" id="{{ $children->id }}"
                                class="total_profit border border-1 d-none" readonly value="0">
                        </div>
                        <div class="form-group col-md-2 justify-center d-none">
                            <label for="inputZip"> &emsp14; </label>

                        </div>
                    </div>
                @endif
                @endforeach
                @endforeach
        </div>
        <div class="card mt-1">
            <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">
                @php
                    $all_material = 0;
                    $all_total = 0;
                    $all_profit = 0;
                    $all_labour_data = 0;
                @endphp
            </div>
            @if (sizeof($line) > 0)
                <div class="card-body">
                    @foreach ($line as $item)
                        <div class="table-responsive">


                            <table class=" table table-bordered   overflow-x-scroll" style="text-align: center">
                                <h2 class=" text-3xl">{{ $item->name }}</h2>
                                <thead class=" overflow-x-scroll bg-blue-50">
                                    <tr class=" overflow-x-scroll">
                                        <th>
                                            #
                                        </th>

                                        <th style="text-align: center">

                                            /Filed النظام </th>

                                        <th style="text-align: center">
                                            Material Total المجموع المواد/الكلي</th>


                                        <th style="text-align: center">
                                            Labour Total الايادي العاملة/الكلي</th>
                                        <th style="text-align: center">
                                            Total Cost مجموع التكلفة الكلية </th>
                                        <th style="text-align: center">
                                            factor </th>
                                        <th style="text-align: center">
                                            Sale Pirce سعر البيع </th>
                                        &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @if (sizeof($item->child_lines) > 0)
                                        @foreach ($item->child_lines as $children)
                                            <tr class="summary">
                                                <td width="10">
                                                    {{ $i++ }}
                                                </td>

                                                <td style="text-align: center">
                                                    {{ $children->name }}

                                                <td style="text-align: center">

                                                    <input type="text" id="{{ $children->id }}" readonly
                                                        class="all_material_summary"
                                                        value="{{ $material_summary[$children->id] }}"
                                                        {{ $all_material += $material_summary[$children->id] }}>
                                                </td>

                                                <td style="text-align: center">


                                                    <input type="text" id="{{ $children->id }}"
                                                        value="{{ $labour_summary[$children->id] }}"
                                                        {{ $all_labour_data += $labour_summary[$children->id] }}
                                                        class="all_labour_summary" readonly>

                                                </td>
                                                <td style="text-align: center">

                                                    <input type="text" id="{{ $children->id }}"
                                                        value="{{ $total_summary[$children->id] }}"
                                                        {{ $all_tot += $total_summary[$children->id] }}
                                                        class="all_tot_summary" readonly>

                                                </td>
                                                <td style="text-align: center">

                                                    <input type="text" id="{{ $children->id }}"
                                                        value="{{ $qoute->qoute_batch[0]->factor }}"
                                                        class="factor_summary" readonly>

                                                </td>
                                                <td style="text-align: center">

                                                    <input type="text" id="{{ $children->id }}"
                                                        value="{{ $profit_summary[$children->id] }}"
                                                        {{ $all_profit += $profit_summary[$children->id] }}
                                                        class="sale_factor_summary" readonly>

                                                </td>
                                            </tr>


                                </tbody>
                    @endforeach
            @endif
            @endforeach
            <tfoot>
                <tr>
                    <td width="10">
                        &emsp;
                    </td>

                    <td style="text-align: center">
                        Total المجموع

                    <td style="text-align: center">

                        <input type="text" name="" id="" readonly class="all_material_summary1"
                            value="{{ $all_material }}">
                    </td>

                    <td style="text-align: center">


                        <input type="text" name="" id="" value="{{ $sumation['total_labour'] }}"
                            class="all_labour_summary1" readonly>
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="" id="" value="{{ $all_tot }}"
                            class="all_tot_summary1" readonly>

                    </td>
                    <td style="text-align: center">

                        <input type="text" name="" value="{{ $qoute->qoute_batch[0]->factor }}"
                            class="factor_summary1" readonly>

                    </td>
                    <td style="text-align: center">

                        <input type="text" value="{{ $all_profit }}" class="sale_factor_summary1" readonly>

                    </td>
                </tr>
            </tfoot>
            </table>

            {{-- <input type="text"  id="{{ $item->id }}"
                        value="0" class="totals border border-1" readonly> --}}
        </div>
        @endif
        @php
            $total_indirect = $all_tot * $qoute->indirect;
            $total_consult = $all_tot * $qoute->consult;
            $total_risk = $all_tot * $qoute->risk;
            $total_addition = $all_tot * $qoute->addition;
            $total_cost = $total_indirect + $total_consult + $total_addition + $all_tot;
            $net_profit = (($all_profit - $total_cost) / ($all_profit || 1)) * 100;
        @endphp
    </div>
    </div>
    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>

        <div class="card-body breif">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-md-center"> Indirect Cost التكاليف غير
                    المباشرة</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  col-3 indrect" name="indrect" id="inputtext"
                        value="{{ $qoute->indrect }}" placeholder="">

                </div>
            </div>
            <div class="form-group row">
                <label for="inputtext" class="col-sm-2 col-form-label text-md-center">Conslunt Builders تكاليف المقاولين
                    بالباطن</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  col-3 consult" name="consult" id="inputtext"
                        placeholder="" value="{{ $qoute->consult }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-md-center">Additional Cost تكاليف إضافية
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 addition" name="addition" id="inputtext"
                        value="{{ $qoute->addition }}" placeholder="">
                </div>

            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-md-center"> Risk المخاطر </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 risk" name="risk" id="inputtext" placeholder=""
                        value="{{ $qoute->risk }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-md-center"> Total Cost التكلفة الكلية
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 total-cost" id="inputtext" placeholder="" readonly
                        value="{{ $total_cost }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputtext" class="col-sm-2 col-form-label text-md-center">Sale Price سعر البيع</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 sale_profit" id="inputtext" placeholder=""
                        value="{{ $all_profit }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputtext" class="col-sm-2 col-form-label text-md-center">Profit الربح</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 net-profit" id="inputtext" placeholder=""
                        value="{{ $net_profit }}%">
                </div>
            </div>
            <div class="form-group col-md-8 d-flex">
                <label for="inputZip"> &emsp14; </label>
                @switch($qoute->statues)
                    @case('موافق')
                        <button class="form-control mx-3  btn-outline-primary border-2 draft " id="inputZip"> كمسودة حفظ
                            Save As Draft </button>
                        <button class="form-control mx-3  btn-outline-primary border-2 contract " id="inputZip">تعميد Make
                            contract</button>
                        <button class="form-control mx-3    btn-outline-danger border-2 contract " id="inputZip">
                            Cancel الغاء </button>
                    @break

                    @case('مسودة')
                        <button class="form-control mx-3 btn-outline-success border-2 saving " id="inputZip">Save حفظ</button>

                        <button class="form-control mx-3  btn-outline-primary border-2 contract " id="inputZip">تعميد Make
                            contract</button>
                        <button class="form-control mx-3    btn-outline-danger border-2 cancel " id="inputZip">
                            Cancel الغاء </button>
                    @break

                    @case('تعميد')
                        <button class="form-control mx-3 btn-outline-success border-2 saving " id="inputZip">Print طباعة</button>
                    @break

                    @case('الغاء')
                        <button class="form-control mx-3  btn-outline-primary border-2 draft " id="inputZip"> كمسودة حفظ
                            Save As Draft </button>
                        <button class="form-control mx-3 btn-outline-success border-2 saving " id="inputZip">Save حفظ</button>

                        <button class="form-control mx-3  btn-outline-primary border-2 contract " id="inputZip">تعميد Make
                            contract</button>
                    @break

                    @default
                @endswitch


            </div>


            {{-- $(".statues").val("تعميد")
                $(".qoute").submit()
                }) --}}



        </div>


        </form>






        {{-- modal for insert items --}}

    </div>
    </div>
    {{-- discount Table  --}}

    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>

        <div class="card-body">

            <div class="table-responsive">
                <div class="d-flex justify-center">
                    <h2 class=" text-2xl bold">حساب القيمة</h2>
                    <div class=" form-row mx-1">
                        <input type="text" name="" id="" class="discount-amount border border-1">
                    </div>
                    <button class="discount-btn btn btn-primary">حساب </button>

                </div>

                <table class=" table table-bordered   overflow-x-scroll" style="text-align: center">
                    <thead class=" overflow-x-scroll bg-blue-50">
                        <tr class=" overflow-x-scroll discount-header">
                            <th width="10">
                                #
                            </th>

                            <th style="text-align: center">

                                الوصف </th>






                            &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody class="discount-body">
                        <?php $i = 1; ?>
                        @foreach ($discount as $key => $value)
                            <tr class="discount-row{{ $key }}">

                                <td width="10">

                                    {{ $i++ }}
                                </td>


                                <td>

                                    {{ $value }}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                {{-- <input type="text"  id="{{ $item->id }}"
                    value="0" class="totals border border-1" readonly> --}}
            </div>



        </div>
    </div>
    {{-- modal for terms --}}


    </div>



    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="{{asset('js/qoute.js')}}"></script>
  @endsection
