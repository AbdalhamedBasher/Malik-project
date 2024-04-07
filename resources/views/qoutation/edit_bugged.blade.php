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
            <form method="POST" action="{{ route('qoute.store') }}" id="qoute">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group row-md-3">
                            <label for="inputZip">المرجع/refrence</label>
                            <input type="text" name="id" class="form-control" value="Q" readonly
                                id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">المشروع/Project</label>
                            <select id="inputState" name="project" class="customer form-control">
                                <option>-- إختر --</option>

                                @foreach ($projects as $proj)
                                    <option value="{{ $proj->id }}" {{ $proj->id == $qoute->project ? 'selected' : '' }}>
                                        {{ $proj->name }}{{ $proj->id == $qoute->project ? 'selected' : '' }}
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
                                <option>-- إختر --</option>

                                @foreach ($customers as $cust)
                                    <option value="{{ $cust->id }}" {{ $cust->id == $qoute->customer ? 'selected' : '' }}>
                                        {{ $cust->name }}
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
                                                value="{{ $qoute_batch[$children->id]->line }}" id="">
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
                                                    <th> &nbsp;</th>


                                                </tr>
                                            </thead>

                                            <tbody class="line_data" id="{{ $children->id }}">
                                                @if (isset($qoute_batch[$children->id]->qoute_lines))
                                                    @php
                                                        $tot_material =
                                                            $value->material +
                                                            $value->material_acc +
                                                            $value->material_other;
                                                        $tot_labour = $value->labour + $value->labour_other;
                                                        $all_material = $tot_material * $value->qty;
                                                        $all_labour = $tot_labour * $value->qty;
                                                        $factor_price =
                                                            $value->qoute_batch_items->factor * $value->items
                                                                ? $value->items->price
                                                                : 0;
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

                                                                    @foreach ($items as $product)
                                                                        <option
                                                                            {{ $product->id == $value->item ? 'selected' : '' }}
                                                                            value="{{ $product->id }}"
                                                                            data-price="{{ $product->price }}">
                                                                            {{ $product->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                            <input type="hidden" name="" class="product-price"
                                                                readonly id="{{ $children->id }}">
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
                                                                name="factor_price[{{ $value->qoute_batch_items->line  }}][]"
                                                                class="border border-1 factor_price" readonly
                                                                id="{{  $value->qoute_batch_items->line  }}"
                                                                value="{{$factor_price ?? 0 }}">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text" name="qty[{{ $value->qoute_batch_items->line }}][]"
                                                                class="border border-1 qty" id="{{ $value->qoute_batch_items->line }}"
                                                                value="{{ $value->qty ?? 0}}">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="product_factor[{{ $value->qoute_batch_items->line }}][]" readonly
                                                                id="{{ $value->qoute_batch_items->line }}" value="{{ $product_factor ?? 0 }}"
                                                                class="border border-1 simetot">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text" name="material[{{  $value->qoute_batch_items->line }}][]"
                                                                id="{{  $value->qoute_batch_items->line }}" value="0"
                                                                class="border border-1 material">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="material_acc[{{  $value->qoute_batch_items->line }}][]" value="0"
                                                                id="{{  $value->qoute_batch_items->line }}"
                                                                class="border border-1 material_acc">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="material_other[{{  $value->qoute_batch_items->line }}][]"
                                                                value="0" id="{{  $value->qoute_batch_items->line }}"
                                                                class="border border-1 material_other">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="tot_material[{{  $value->qoute_batch_items->line }}][]"
                                                                id="{{  $value->qoute_batch_items->line }}" value="0" readonly
                                                                class="border border-1 tot_material">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="total_material[{{  $value->qoute_batch_items->line }}][]"
                                                                id="{{  $value->qoute_batch_items->line }}" readonly
                                                                class=" border border-1 all_material px-4" value="0">
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text" name="labour[{{  $value->qoute_batch_items->line }}][]"
                                                                id="{{  $value->qoute_batch_items->line }}" value="0"
                                                                class="border border-1 labour">
                                                        </td>


                                                        <td style="text-align: center">

                                                            <input type="text"
                                                                name="labour_other[{{  $value->qoute_batch_items->line }}][]"
                                                                id="{{  $value->qoute_batch_items->line }}" value="0"
                                                                class=" border border-1 labour_other">
                                                        </td>
                                                        <td style="text-align: center">


                                                            <input type="text"
                                                                name="worker_tot[{{  $value->qoute_batch_items->line }}][]" id=""
                                                                class=" border border-1 tot_labour" value="0"
                                                                readonly>
                                                        </td>
                                                        <td style="text-align: center">


                                                            <input type="text"
                                                                name="total_labour[{{  $value->qoute_batch_items->line }}][]"
                                                                id="{{  $value->qoute_batch_items->line }}" value="0"
                                                                class=" border border-1 all_labour px-4" readonly>
                                                        </td>
                                                        <td style="text-align: center">

                                                            <input type="text" id="{{  $value->qoute_batch_items->line }}"
                                                                value="0" class=" border border-1 all_tot" readonly>

                                                        </td>

                                                    </tr>

                                                    @endforeach
                                                    @endif
                                            </tbody>
                                        </table>
                                        <input type="submit" value="{{  $value->qoute_batch_items->line }}"
                                            class=" btn btn-primary btn-line col-sm-2" id="{{  $value->qoute_batch_items->line }}">
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>

                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="text" name="total[]" id="{{  $value->qoute_batch_items->line }}"
                                            class="total border border-1 d-none" readonly>
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="text" name="total[]" id="{{  $value->qoute_batch_items->line }}"
                                            class="total_material border border-1 d-none" readonly>
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="text" name="total[]" id="{{  $value->qoute_batch_items->line }}"
                                            class="total_labour border border-1 d-none" readonly>
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip">total_profit {{  $value->qoute_batch_items->line }}</label>
                                        <input type="text" name="total[]" id="{{  $value->qoute_batch_items->line }}"
                                            class="total_profit border border-1 d-none" readonly value="0">
                                    </div>
                                    <div class="form-group col-md-2 justify-center d-none">
                                        <label for="inputZip"> &emsp14; </label>

                                    </div>
                                </div>
                            @endforeach
                        @endforeach


                    </div>
                    <div class="card mt-1">
                        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

                        </div>
                        @if (sizeof($line) > 0)
                            <div class="card-body">
                                @foreach ($line as $item)
                                    <div class="table-responsive">


                                        <table class=" table table-bordered   overflow-x-scroll"
                                            style="text-align: center">
                                            <h2 class=" text-3xl">{{ $item->name }}</h2>
                                            <thead class=" overflow-x-scroll bg-blue-50">
                                                <tr class=" overflow-x-scroll">
                                                    <th width="10">
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
                                                                    class="all_material_summary" value="0">
                                                            </td>

                                                            <td style="text-align: center">


                                                                <input type="text" id="{{ $children->id }}"
                                                                    value="0" class="all_labour_summary" readonly>
                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text" id="{{ $children->id }}"
                                                                    value="0" class="all_tot_summary" readonly>

                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text" id="{{ $children->id }}"
                                                                    value="0" class="factor_summary" readonly>

                                                            </td>
                                                            <td style="text-align: center">

                                                                <input type="text" id="{{ $children->id }}"
                                                                    value="0" class="sale_factor_summary" readonly>

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
                                value="0">
                        </td>

                        <td style="text-align: center">


                            <input type="text" name="" id="" value="0"
                                class="all_labour_summary1" readonly>
                        </td>
                        <td style="text-align: center">

                            <input type="text" name="" id="" value="0" class="all_tot_summary1"
                                readonly>

                        </td>
                        <td style="text-align: center">

                            <input type="text" name="" value="0" class="factor_summary1" readonly>

                        </td>
                        <td style="text-align: center">

                            <input type="text" value="0" class="sale_factor_summary1" readonly>

                        </td>
                    </tr>
                </tfoot>
                </table>

                {{-- <input type="text"  id="{{ $item->id }}"
                        value="0" class="totals border border-1 d-none" readonly> --}}
        </div>
        @endif

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
                        placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputtext" class="col-sm-2 col-form-label text-md-center">Conslunt Builders تكاليف المقاولين
                    بالباطن</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  col-3 consult" name="consult" id="inputtext"
                        placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-md-center">Additional Cost تكاليف إضافية
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 addition" name="addition" id="inputtext"
                        placeholder="">
                </div>

            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-md-center"> Risk المخاطر </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 risk" name="risk" id="inputtext" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-md-center"> Total Cost التكلفة الكلية
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 total-cost" id="inputtext" placeholder="" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputtext" class="col-sm-2 col-form-label text-md-center">Sale Price سعر البيع</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 sale_profit" id="inputtext" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputtext" class="col-sm-2 col-form-label text-md-center">Profit الربح</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-3 net-profit" id="inputtext" placeholder="">
                </div>
            </div>
            <div class="form-group col-md-8 d-flex">
                <label for="inputZip"> &emsp14; </label>
                <button class="form-control mx-3 btn-outline-success border-2 saving " id="inputZip">Save حفظ</button>
                <button class="form-control mx-3  btn-outline-primary border-2 draft " id="inputZip"> كمسودة حفظ
                    Save As Draft </button>
                <button class="form-control mx-3  btn-outline-primary border-2 contract " id="inputZip">تعميد Make
                    contract</button>

                <button class="form-control mx-3    btn-outline-danger border-2 contract " id="inputZip">
                    Cancel الغاء </button>
            </div>


            {{-- $(".statues").val("تعميد")
                $(".qoute").submit()
                }) --}}



        </div>


        </form>






        {{-- modal for insert items --}}

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
    @endsection
    @section('scripts')
        @parent
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                let all_line = {};
                let sum_material = 0;
                line_detect()
                $(".lines").change(function() {
                    line_detect();

                })


                $(".btn-line").click(function(e) {
                    e.preventDefault();
                    //  get data with jquery


                    var id = $(this).attr('id');

                    $.ajax({
                        url: '/lines/show/' + this.id, // replace with your API endpoint
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // assuming data is an array of objects


                            // use each to iterate over the array of objects

                            // create a new row for each line
                            var row = `<tr id="${data.line.id}">
                                        <td class="counter">
                                            ${data.line.id}
                                        </td>
                                        <td style="text-align: center">
                                            <select class="form-control products  w-full"
                                                id="${data.line.id}" name="item[${data.line.id}][]">
                                                <option selected value=""> </option>

                                                ${data.products.map(product => `
                                        <option value="${product.id}" data-price="${product.price}">
                                            ${product.name}
                                        </option>
                                    `).join('')}
                                            <input type="hidden" name="" class="product-price" readonly
                                                id="${data.line.id}">
                                        </td>
                                        <td style="text-align: center">

                                            <select class="form-control select2" id="${data.line.id}"
                                                name="unit[${data.line.id}][]">
                                                <option selected value=""> </option>
                                                ${data.units.map(unit => `
                                        <option value="${unit.id}" data-price="${unit.price}">
                                            ${unit.name}

                                        </option>
                                    `).join('')}
                                            </select>
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="factor_price[${data.line.id}][]"
                                                class="border border-1 factor_price" readonly
                                                id="${data.line.id}">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="qty[${data.line.id}][]"
                                                class="border border-1 qty" id="${data.line.id}"
                                                value="0">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="product_factor[${data.line.id}][]"
                                                readonly id="${data.line.id}" value="0"
                                                class="border border-1 simetot">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="material[${data.line.id}][]"
                                                id="${data.line.id}" value="0"
                                                class="border border-1 material">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="material_acc[${data.line.id}][]"
                                                value="0" id="${data.line.id}"
                                                class="border border-1 material_acc">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="material_other[${data.line.id}][]"
                                                value="0" id="${data.line.id}"
                                                class="border border-1 material_other">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="tot_material[${data.line.id}][]"
                                                id="${data.line.id}" value="0" readonly
                                                class="border border-1 tot_material">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="total_material[${data.line.id}][]"
                                                id="${data.line.id}" readonly
                                                class=" border border-1 all_material px-4" value="0">
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" name="labour[${data.line.id}][]"
                                                id="${data.line.id}" value="0"
                                                class="border border-1 labour">
                                        </td>


                                        <td style="text-align: center">

                                            <input type="text" name="labour_other[${data.line.id}][]"
                                                id="${data.line.id}" value="0"
                                                class=" border border-1 labour_other">
                                        </td>
                                        <td style="text-align: center">


                                            <input type="text" name="worker_tot[${data.line.id}][]"
                                                id="" class=" border border-1 tot_labour" value="0"
                                                readonly>
                                        </td>
                                        <td style="text-align: center">


                                            <input type="text" name="total_labour[${data.line.id}][]"
                                                id="${data.line.id}" value="0"
                                                class=" border border-1 all_labour px-4" readonly>
                                        </td>
                                        <td style="text-align: center">

                                            <input type="text" id="${data.line.id}" value="0"
                                                class=" border border-1 all_tot" readonly>

                                        </td>

                                    </tr>`;



                            console.log("tbody#" + id);
                            $("tbody#" + id).append(row).ready(function() {

                                $(".remove-record").click(function(e) {
                                    e.preventDefault()

                                    $(this).closest("tr").remove()
                                })




                                // let hole_tot = 0;
                                // // product total

                                $(".products").change(function() {
                                    $(this).closest("tr").find(".material").val($(
                                        this).find(
                                        'option:selected').data('price'));
                                    var factor = $(".factor").val() || 0
                                    var tot = 0;
                                    var product = 0;
                                    $(this).valid()
                                    sum_product($(this))

                                    sumation_all($(this))
                                })




                                $(".qty").on('input', function(e) {



                                    sumations($(this));

                                    //  here fire the profit


                                    sum_product($(this))
                                    sum_profit($(this))
                                    all_tot($(this))
                                    total_sale_factor($(this))
                                    summary_product_factor();
                                    sumation_all($(this))
                                    // sum_profit($(this))
                                })


                                // // material daim main

                                $(".material").on('input', function(e) {
                                    materials_sumation($(this))
                                    sumation_all_material($(this))

                                    sumations($(this));
                                    sumation_all($(this))


                                })

                                // material Acssories

                                $(".material_acc").on('input', function(e) {

                                    materials_sumation($(this))

                                    sumation_all_material($(this))

                                    sumations($(this));

                                    sumation_all($(this))

                                    all_tot($(this))
                                })



                                // material_other
                                $(".material_other").on('input', function(e) {

                                    materials_sumation($(this))
                                    sumation_all_material($(this))
                                    // sumation_all_materials()

                                    line_detect()
                                    // sumation_all_materials()
                                    sumations($(this));

                                    sumation_all($(this))

                                })



                                //labour
                                $(".labour").on('input', function(e) {

                                    labour_sumation($(this))


                                    // all_labour
                                    sumation_all_labour($(this));
                                    sumation_all_labours()
                                    sumation_all($(this))
                                    sumations($(this))
                                    all_tot($(this))

                                })

                                $(".labour").on('input', function(e) {

                                    labour_sumation($(this))


                                    // all_labour
                                    sumation_all_labour($(this));

                                    sumation_all($(this))
                                    sumations($(this))
                                    all_tot($(this))

                                })


                                // labour other

                                $(".labour_other").on('input', function(e) {

                                    labour_sumation($(this))

                                    sumation_all_labour($(this));
                                    total_sale_factor($(this))
                                    // sumations($(this))

                                    // sumation_all_labour1($(this));
                                    sumation_all_labours()
                                    all_tot($(this))
                                    sumation_all($(this))
                                    sumation_all_tot
                                        (); // calculate the total of all and put it in the summary
                                })
                                line_detect()
                            });

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error: ' + textStatus); // log the error type
                            console.error('HTTP status: ' + jqXHR
                                .status); // log the HTTP status code
                            console.error('Error message: ' +
                                errorThrown); // log the exception, if one occurred
                        }
                    });







                    //  call the child line with the id of .btn-line


                }); // end of btn-line been copied to edit


                $(".products").val("")

                //*******************************************************************************************
                // ********************************** Here is the main *****************************************
                // *********************************************************************************************

                $(".saving").click(function(e) { //edit

                    $(".statues").val("موافق")
                    $(".qoute").submit()
                })


                $(".draft").click(function(e) { //edit

                    $(".statues").val("مسودة")
                    $(".qoute").submit()
                })
                $(".contract").click(function(e) { //edit

                    $(".statues").val("تعميد")
                    $(".qoute").submit()
                })



                $('.products').select2(); //edit
                $("select#inputState.customer").change(function(e) {
                    $(this).valid();
                    $(".cust-name").html()
                    $(".cust-phone").html("")
                    $(".cust-email").html("")
                    $(".cust-tax-number").html("");
                    $(".cust-name").html("")
                    var custom = this.value;
                    $(this).valid();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'GET',
                        url: 'http://127.0.0.1:8000/customer/data/' + custom,
                        //   data : ({id : $(this).value}),
                        dataType: 'JSON',
                        success: function(response) {
                            $(".cust-name").html(response.data.name)
                            $(".cust-phone").html(response.data.phone_number)
                            $(".cust-email").html(response.data.email)
                            $(".cust-tax-number").html(response.data.tax_number)


                        }









                    })
                })
                $(".factor").on('input', function() {
                    // all summary function
                    $(".factor").valid();
                    $(".factor_summary").val($(this).val());
                    $(".factor_summary1").val($(this).val());




                    // call qty event on input if not null call it with its id
                    $("input.qty").each(function() {

                        // $(this).trigger('input')
                        console.log($(this));

                    })



                    sumations($(this));

                    product_calculation(); // calculate the product * factor factor


                    sumation_all_tot(); // calculate the summary of all and put it in the summary1 factor

                    summary_product_factor(); //calculate the summary of product factor and put it in faactor
                    calcualte(); //factor
                })

                $(".remove-record").click(function(e) {
                    e.preventDefault()
                    $(this).closest("tr").remove()
                })
                $(".products").change(function() {
                    $(this).closest("tr").find(".material").val($(this).find('option:selected').data('price'));
                    var factor = $(".factor").val() || 0
                    var tot = 0;
                    var product = 0;
                    $(this).valid()
                    sum_product($(this))
                    // sumation_all($(this))
                    // calcualte()

                    // sum_profit($(this))
                    // // all summary function
                    // sum_product($(this))
                    // sumation_all_tot();

                    // summary_product_factor();
                    // calcualte()



                })


                // every textfiled in breif in eqaull to 0



                $(".qty").on('input', function(e) {


                    // sumations_profit($(this));

                    sumations($(this));

                    //  here fire the profit

                    sum_product($(this))

                    sum_profit($(this))


                    materials_sumation($(this))
                    // sum_product($(this))

                    total_sale_factor($(this))

                    sumation_all($(this))
                    summary_product_factor();
                    calcualte()
                    $(".labour_other").each(function() {

                        $(this).trigger('input')

                    })
                })


                // // material daim main

                $(".material").on('input', function(e) {

                    $(".material_acc").each(function() {
                        if ($(this).val() != null) {
                            $(this).trigger('input')
                        }
                    })
                })

                // material Acssories

                $(".material_acc").on('input', function(e) {

                    $(".labour_other").each(function() {
                        if ($(this).val() != null) {
                            $(this).trigger('input')
                        }
                    })

                    sumation_all_material($(this))

                    sumations($(this));

                    sumation_all($(this))

                    all_tot($(this))
                })



                // material_other
                $(".material_other").on('input', function(e) {
                    $(".labour_other").each(function() {
                        if ($(this).val() != null) {
                            $(this).trigger('input')
                        }
                    })
                    materials_sumation($(this))
                    sumation_all_material($(this))
                    // sumation_all_materials()

                    line_detect()
                    // sumation_all_materials()
                    sumations($(this));

                    sumation_all($(this))

                })



                //labour


                $(".labour").on('input', function(e) {

                    $(".labour_other").each(function() {
                        if ($(this).val() != null) {
                            $(this).trigger('input')
                        }
                    })
                    labour_sumation($(this))


                    // // all_labour
                    sumation_all_labour($(this));

                    sumation_all($(this))
                    sumations($(this))
                    all_tot($(this))
                    sumation_all_labours()
                })


                // labour other

                $(".labour_other").on('input', function(e) {

                    labour_sumation($(this))

                    sumation_all_labour($(this));

                    sumations($(this))

                    // // sumation_all_labour1($(this));

                    all_tot($(this))
                    sumation_all($(this))
                    sumation_all_tot();
                })


                $(".qoutation_date").val(new Date().toJSON().slice(0, 10));



                // add a day or anyday you like

                todaysDate = new Date()
                var nextDate = new Date(+todaysDate + 7 * 24 * 60 * 60 * 1000);

                $(".expire_date").val(nextDate.toJSON().slice(0, 10))
                $(".expire_date").change(function() {
                    console.log($(this).val());
                })
                // calculation functions
                // *******************************************************
                // ******************************************************
                // * from here is the calaculation for all component
                // * id you ant to add please refer to heree
                // **************************************************
                // ****************************************************************
                function sumations(parent) {
                    // all_line[id]-0;
                    var sum = 0;

                    var id = parent.attr("id")
                    all_line[id] = 0;

                    $(".line_data").each(function() {
                        $(this).find(".all_tot").each(function() {

                            all_line[id] += parseInt($(this).val())

                            $(this).closest(".card-body").find("input.total").val(isNaN(all_line[id]))

                        })

                    })



                }
                var summ = 0;









                function sumation_all_material(parent) {
                    // all_line[id]-0;


                    var id = parent.attr("id")

                    all_line[id] = 0;
                    parent.closest(".line_data").each(function() {
                        $(this).find(".all_material").each(function() {

                            all_line[id] += parseInt($(this).val() || 0)
                            $(this).closest(".card-body").find("input.total_material").val(all_line[id])
                            $("#" + id + ".all_material_summary").val(all_line[id])
                        })

                    })

                    var sum = 0;
                    sumation_all_materials();
                }


                function sumation_all_labour(parent) {
                    // all_line[id]-0;


                    var id = parent.attr("id")
                    all_line[id] = 0;
                    parent.closest(".line_data").each(function() {
                        $(this).find(".all_labour").each(function() {

                            all_line[id] += parseInt($(this).val() || 0)
                            $(this).closest(".card-body").find("input.total_labour").val(all_line[id])
                            $("#" + id + ".all_labour_summary").val(all_line[id])
                        })

                    })


                }





                function line_detect() {
                    $(".lines").each(function() {
                        all_line[this.value] = 0;

                        if (this.checked) {


                            $(this).parent().parent().find('table input').prop('disabled', false);

                            $(this).parent().parent().find('table select').prop('disabled', false);
                        } else {
                            all_line[this.value] = 0;
                            $(this).parent().parent().find('table input').prop('disabled', true);
                            $(this).parent().parent().find('table select').prop('disabled', true);

                        }
                    })
                }

                function product_calculation() {
                    var factor = $(".factor").val() || 0;
                    $(".line_data").each(function() {
                        var factor_price = $(this).find(".factor_price")
                        $(this).find(".products").each(function() {
                            var price = $(this).find('option:selected').data('price') || 0;
                            console.log($(this).parent().parent().find(".factor_price").val(price *
                                factor))

                        })

                    })


                }


                // function for calculate the simtot
                function simtot_calculation() {
                    $(".line_data").each(function() {
                        var factor = $(".factor").val() || 0;
                        $(this).find(".simetot").each(function() {
                            var product = $(this).parent().parent().find(".product").val() || 0;
                            var qty = $(this).parent().parent().find(".qty").val() || 0;
                            var simetot = product * qty * factor;
                            $(this).val(simetot);
                        })

                    })

                }





                function sum_product(parent) {

                    // here the bug
                    var sum = 0;

                    var id = parent.attr("id")




                    var factor = parseInt($(".factor").val()) || 0;
                    var product = parent.parent().parent().find('.products').find('option:selected').data('price') || 0;
                    var qty = (parent.parent().parent().find(".qty").val()) || 0;


                    //  sumation for

                    parent.parent().parent().find(".factor_price").val(product * factor);
                    parent.parent().parent().find(".simetot").val(product * factor * qty)



                }

                function sum_profit(parent) {
                    var id = parent.attr("id")

                    all_line[id] = 0;
                    parent.closest(".line_data").each(function() {
                        console.log($(this).find("#" + id + ".simetot"));
                        $(this).find("#" + id + ".simetot").each(function() {

                            all_line[id] += parseInt($(this).val() || 0)

                            // $(this).closest(".card-body").find("#"+id+"input.all_tot_summary").val(all_line[id])

                            console.log(all_line[id] + " profit");
                            $("#" + id + ".total_profit").val(all_line[id]);

                        })
                    });
                }








                function sumation_all(parent) { // total of all_tot and put it in the total
                    // all_line[id]-0;
                    var sum = 0;

                    var id = parent.attr("id")
                    all_line[id] = 0;






                    all_line[id] = 0;
                    parent.closest(".line_data").each(function() {
                        console.log($(this).find("#" + id + ".simetot"));
                        $(this).find("#" + id + ".all_tot").each(function() {

                            all_line[id] += parseInt($(this).val() || 0)

                            // $(this).closest(".card-body").find("#"+id+"input.all_tot_summary").val(all_line[id])

                            console.log(all_line[id] + " profit");
                            $("#" + id + ".total").val(all_line[id]);
                            $("#" + id + ".all_tot_summary").val(all_line[id])

                        })
                    });

                }

                // all sime_total is gernal functiom for all line_data row multiply by qty
                function sime_total() {
                    $(".simetot").each(function() {
                        var product = parseInt($(this).parent().parent().find(".product").val());
                        var qty = parseInt($(this).parent().parent().find(".qty").val());
                        var factor = parseInt($(".factor").val());
                        var simetot = product * qty * factor;

                        $(this).val(simetot);
                    });

                }



                /**
                 * Calculates the total sale factor based on the given parent element.
                 *
                 * @param {Object} parent - The parent element.
                 */
                function total_sale_factor(parent) {
                    // all_line[id]-0;
                    var sum = 0;

                    var id = parent.attr("id")

                    $("#" + id + ".total_profit").each(function() {
                        sum += (parseInt($(this).val()) || 0);
                    })

                    $("input#" + id + ".sale_factor_summary").val(sum);
                }



                function isNaN(value) {
                    return value || 0;
                }






                let sum = 0;




                function sumation_all_materials() {
                    var sum = 0;


                    $(".all_material_summary").each(function() {
                        let $el = $(this);
                        sum += parseInt(($el.val() || 0));


                    });
                    // $('#gross_amount').text(gross.toFixed(2));
                    $(".all_material_summary1").val(sum)
                    calcualte()



                }

                function sumation_all_labours() {
                    let sum = Array.from($(".all_labour_summary")).reduce((total, element) => {
                        return total + parseInt($(element).val() || 0);
                    }, 0);

                    $(".all_labour_summary1").val(sum);
                    calcualte()


                }







                function materials_sumation(parent) {



                    var material = parent.parent().parent().find(".material").val() || 0
                    var material_acc = parent.parent().parent().find(".material_acc").val() || 0
                    var material_other = parent.parent().parent().find(".material_other").val() || 0

                    tot_material = parseInt(material) + parseInt(material_other) + parseInt(material_acc)


                    parent.parent().parent().find(".tot_material").val(tot_material);
                    var qty = parent.parent().parent().find(".qty").val() || 0;
                    var all_material = parent.parent().parent().find(".all_material").val(tot_material * qty);



                }

                function all_tot(parent) {
                    var all_tot;

                    var all_material = (parseInt(parent.parent().parent().find(".all_material").val())) || 0;
                    var all_labour = (parseInt(parent.parent().parent().find(".all_labour").val())) || 0;

                    all_tot = (all_material) + (all_labour)
                    parent.parent().parent().find(".all_tot").val(all_tot || 0)

                }




                // Labour Sumation and labour * qty sumation

                function labour_sumation(parent) {


                    var labour_other = parseInt(parent.parent().parent().find(".labour_other").val() || 0)
                    var labour = parseInt(parent.parent().parent().find(".labour").val() || 0)


                    var tot_labour;
                    tot_labour = (labour) + labour_other


                    parent.parent().parent().find(".tot_labour").val(tot_labour);
                    console.log(tot_labour);
                    var qty = parent.parent().parent().find(".qty").val() || 0;
                    var all_labour = parent.parent().parent().find(".all_labour").val(tot_labour * qty);



                }

                /**
                 * Calculates the summary of product factors.
                 *
                 * @returns {void}
                 */
                function summary_product_factor() {
                    let sum = Array.from($(".sale_factor_summary")).reduce((total, element) => {
                        return total + parseInt($(element).val() || 0);
                    }, 0);

                    $(".sale_factor_summary1").val(sum);
                }





                //  function that sumation every factor_price in the same line_data row without deail with aid or prent









                function sumation_all_tot() {




                    let sum = Array.from($(".all_tot_summary")).reduce((total, element) => {
                        return total + parseInt($(element).val() || 0);
                    }, 0);

                    $(".all_tot_summary1").val(sum)


                    calcualte()


                }
                // no problem

                $(".risk").on('input', function(e) {
                    e.preventDefault();

                    calcualte()
                })


                $(".indrect").on('input', function(e) {
                    e.preventDefault();

                    calcualte()
                })
                $(".consult").on('input', function(e) {
                    e.preventDefault();

                    calcualte()
                })

                /**
                 * Calculates the total cost, net profit, and sale profit based on the given inputs.
                 */
                function calcualte() {
                    const getVal = (selector) => parseInt($(selector).val() || 0);

                    const cost = getVal(".all_tot_summary1");
                    const consult = getVal(".consult") / 100;
                    const indirect = getVal(".indrect") / 100;
                    const addition_cost = getVal(".addition") / 100;
                    const risk = getVal(".risk") / 100;

                    const result = cost + ((consult + indirect + addition_cost + risk) * cost);
                    const profit = getVal(".sale_factor_summary1");

                    $(".sale_profit").val(profit);
                    $(".total-cost").val(result.toFixed(2));
                    // net is percent of profit after substracting the cost from profit

                    const net = ((profit - result) / profit) * 100;
                    $(".net-profit").val(`${net.toFixed(2)}%`);
                }
                $(".discount-btn").click(function(e) {
                    e.preventDefault()




                    // values from the perevious table

                    var cost = parseInt($(".all_tot_summary1").val() || 0);
                    var consult = parseInt($(".consult").val() || 0) / 100;
                    var indirect = parseInt($(".indrect").val() || 0) / 100;
                    var addition_cost = parseInt($(".addition").val() || 0) / 100;
                    var risk = parseInt($(".risk").val() || 0) / 100;

                    var result = cost + ((consult + indirect + addition_cost + risk) * cost);
                    var profit = parseInt($(".sale_factor_summary1").val() || 0);

                    var discount_amount = parseInt($(".discount-amount").val() || 0);
                    var newprofit = profit - (discount_amount * ($("tr.discount-row0").children().length - 2));
                    // net is percent of profit after substracting the cost from profit

                    var net = ((newprofit - result));
                    var percent = ((net / profit) * 100).toFixed(2);
                    console.log();
                    // the profit from last value


                    console.log(net);
                    var color = "";
                    if (percent > 17) {
                        color = "bg-success";

                    } else if (percent == 17) {
                        color = "bg-yallow";

                    } else {
                        color = "bg-danger";

                    }
                    console.log(color);
                    $("tr.discount-row0").append(`<td>` + newprofit + `</td>`);
                    $("tr.discount-row1").append(`<td>` + cost + `</td>`);
                    $("tr.discount-row2").append(`<td>` + indirect.toFixed(2) + `</td>`);
                    $("tr.discount-row3").append(`<td>` + result + `</td>`);
                    $("tr.discount-row4").append(`<td>` + net.toFixed(2) + `</td>`);
                    $("tr.discount-row5").append(`<td class='` + color + `'>` + percent +
                        `%</td>`);
                    $("tr.discount-header").append(`<th>` + (discount_amount * ($("tr.discount-row0").children()
                        .length - 3)) + `القيمة (ر.س)</th>`)





                })

                $("form").validate({
                    rules: {
                        // simple rule, converted to {required:true}
                        customer: "required",
                        // compound rule
                        factor: {
                            required: true,
                            digits: true,
                            range: [0.0, 100.0]
                        },
                        qoutation_date: {

                        }
                    },
                    messages: {
                        customer: "الرجاء ادخال المستخدم",
                        factor: {
                            required: "الرجاء ادخال المعامل ",

                            digits: "الرجاء ادخال رقم على الاقل"
                        }

                    }
                });

            });
        </script>
    @endsection
