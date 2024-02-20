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
                            <label for="inputZip">العميل/customer</label>
                            <select id="inputState" name="customer" class="customer form-control">
                                <option selected>-- إختر --</option>

                                @foreach ($customer as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach


                            </select>

                        </div>
                        @error('customer')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group row-md-3">
                            <label for="inputZip">الوصف/description</label>
                            <input type="text" name="description" class="form-control" id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">المعامل/factor</label>
                            <input type="text" name="factor" class="form-control factor" id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">المشروع/project</label>
                            <input type="text" name="project_name" class="form-control" id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">تاريخ الانشاء/issue date</label>
                            <input type="date" name="qoutation_date" class="form-control qoutation_date" id="inputZip"
                                value="{{ date('m/d/y') }}">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">تاريخ الانتهاء/expire date</label>
                            <input type="date" name="expire_date" class="form-control expire_date" id="inputZip">


                        </div>

                        <input type="text" name="statues" class="statues">

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
                                            <td class=" border-bottom-0  border-top-0 cust-name">&emsp13;</td>



                                        </tr>
                                        <tr class=" border-bottom-0 ">
                                            <td class=" border-bottom-0  border-top-0">رقم الهاتف/Phone Number</td>
                                            <td class=" border-bottom-0  border-top-0  cust-phone">&emsp13;</td>



                                        </tr>
                                        <tr class=" border-bottom-0 ">
                                            <td class=" border-bottom-0  border-top-0">الايميل/Email</td>
                                            <td class=" border-bottom-0  border-top-0 cust-email">&emsp13;</td>



                                        </tr>
                                        <tr class= "border-bottom-0 ">
                                            <td class=" border-bottom-0  border-top-0">السجل التجاري/commercial registration
                                            </td>
                                            <td class=" border-bottom-0  border-top-0 cust-tax-number">&emsp13;</td>



                                        </tr>
                                    </tbody>




                                </table>
                            </div>
                        </div>
                        <div class="form-row">



                        </div>






                    </div>
                </div>
                @foreach ($line as $item)
                    <div class="card mt-1 card-detail border-0">
                        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">
                            {{ $item->name }}
                        </div>

                        @foreach ($item->child_lines as $children)
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
                                                <th> &nbsp;</th>


                                            </tr>
                                        </thead>
                                        <tbody class="line_data" id="{{ $children->id }}">

                                            <tr>
                                                <td class="counter">

                                                </td>

                                                <td style="text-align: center">
                                                    <select class="form-control products  w-full" id="{{ $children->id }}"
                                                        name="item[{{ $children->id }}][]">
                                                        <option selected value=""> </option>
                                                        @foreach ($children->item_lines as $product)
                                                            <option value="{{ $product->id }}"
                                                                data-price="{{ $product->price }}">
                                                                {{ $product->name . ' ' . $product->type_data->name }}
                                                                <span
                                                                    id="{{ $product->id }}">{{ $product->price }}</span>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="" class="product-price" readonly
                                                        id="{{ $children->id }}">
                                                </td>
                                                <td style="text-align: center">

                                                    <select class="form-control select2" id="{{ $children->id }}"
                                                        name="unit[{{ $children->id }}][]">
                                                        <option selected value=""> </option>
                                                        @foreach ($units as $unit)
                                                            <option value="{{ $unit->id }}">{{ $unit->name }}
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
                                                        class="border border-1 qty" id="{{ $children->id }}"
                                                        value="0">
                                                </td>
                                                <td style="text-align: center">

                                                    <input type="text" name="simetot[{{ $children->id }}][]" readonly
                                                        id="{{ $children->id }}" value="0"
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

                                                    <input type="text" name="tot_material[{{ $children->id }}][]"
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


                                                    <input type="text" name="worker_tot[{{ $children->id }}][]"
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
                                    <label for="inputZip"> &emsp14; </label>
                                    <input type="text" name="total[]" id="{{ $children->id }}"
                                        class="total_profit border border-1" readonly>
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

            <div class="card-body">
                @foreach ($line as $item)
                    <div class="table-responsive">


                        <table class=" table table-bordered   overflow-x-scroll" style="text-align: center">
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
                            <tbody class="summary">
                                <?php $i = 1; ?>

                                    @foreach ($item->child_lines as $children)
                                        <tr>
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


                                                <input type="text" id="{{ $children->id }}" value="0"
                                                    class="all_labour_summary" readonly>
                                            </td>
                                            <td style="text-align: center">

                                                <input type="text" id="{{ $children->id }}" value="0"
                                                    class="all_tot_summary" readonly>

                                            </td>
                                            <td style="text-align: center">

                                                <input type="text" id="{{ $children->id }}" value="0"
                                                    class="factor_summary" readonly>

                                            </td>
                                            <td style="text-align: center">

                                                <input type="text" id="{{ $children->id }}" value="0"
                                                    class="sale_factor_summary" readonly>

                                            </td>
                                        </tr>


                            </tbody>

                @endforeach
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

                            <input type="text" name="" id="{{ $children->id }}" value="0"
                                class="factor_summary1" readonly>

                        </td>
                        <td style="text-align: center">

                            <input type="text" id="{{ $children->id }}" value="0" class="sale_factor_summary1"
                                readonly>

                        </td>
                    </tr>
                </tfoot>
                </table>
                {{-- <input type="text"  id="{{ $item->id }}"
                        value="0" class="totals border border-1" readonly> --}}
            </div>



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

            </div>


            {{-- $(".statues").val("تعميد")
                $(".qoute").submit()
                }) --}}



        </div>


        </form>






        {{-- modal for insert items --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">

                        </div>

                        <div class="card-body">
                            <form action="{{ route('item') }}" method="POST" class="form-inlineform-row"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">اﻹسم*</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ old('name', isset($user) ? $user->name : '') }}">
                                        @if ($errors->has('name'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.user.fields.name_helper') }}
                                        </p>
                                    </div>
                                    <div class=" {{ $errors->has('id') ? 'has-error' : '' }}">
                                        <label for="qoutation_date">المرجع*</label>
                                        <input type="text" id="id" name="refrence" class="form-control"
                                            value="{{ old('refrence') }}">
                                        @if ($errors->has('refrence'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('refrence') }}
                                            </em>
                                        @endif

                                    </div>

                                    {{--  customer --}}
                                    <div class=" {{ $errors->has('customer') ? 'has-error' : '' }}"
                                        style="border-radius: 50%;border:1px">
                                        <span style="border-radius: 3rem">
                                        </span>
                                    </div>
                                    <div class=" {{ $errors->has('customer') ? 'has-error' : '' }}">
                                        <label for="qoutation_date">العميل*</label>
                                        <input type="text" id="customer" name="customer" class="form-control"
                                            value="{{ old('customer') }}">
                                        @if ($errors->has('customer'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('customer') }}
                                            </em>
                                        @endif

                                    </div>


                                    <div class=" {{ $errors->has('customer') ? 'has-error' : '' }}"
                                        style="border-radius: 50%;border:1px">
                                        <span style="border-radius: 3rem">
                                        </span>
                                    </div>
                                    <div class=" {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                                        <label for="line_catogery">التصنيف</label>


                                        <select class="form-control" id="exampleFormControlSelect1 main_catog"
                                            name="catogery">
                                            <option selected value="">-- إختر --</option>
                                            @foreach ($catogery as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>



                                        @if ($errors->has('main_line'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('main_line') }}
                                            </em>
                                        @endif


                                    </div>


                                    <div class=" {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                                        <label for="line_catogery">النوع</label>


                                        <select class="form-control" id="exampleFormControlSelect1 main_catog"
                                            name="type">
                                            <option selected value="">-- إختر --</option>
                                            @foreach ($type as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>



                                        @if ($errors->has('main_line'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('main_line') }}
                                            </em>
                                        @endif


                                    </div>
                                    <div class=" {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                                        <label for="line_catogery" class="m-1">المقاس</label>
                                        <div class=" {{ $errors->has('price') ? 'has-error' : '' }}">
                                            <div class="form-row">
                                                <input type="text" id="price" name="size_number"
                                                    class="form-control col-8" value="{{ old('price') }}">
                                                @if ($errors->has('price'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('price') }}
                                                    </em>
                                                @endif
                                                <select class="form-control col-4"
                                                    id="exampleFormControlSelect1 main_catog" name="size">
                                                    <option selected value="">-- إختر --</option>
                                                    @foreach ($size as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                    </div>

                                    @if ($errors->has('main_line'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('main_line') }}
                                        </em>
                                    @endif


                                </div>
                                <div class=" {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                                    <label for="line_catogery">الماركة</label>


                                    <select class="form-control" id="exampleFormControlSelect1 main_catog"
                                        name="brand">
                                        <option selected value="">-- إختر --</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>



                                    @if ($errors->has('main_line'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('main_line') }}
                                        </em>
                                    @endif


                                </div>

                                <hr>

                        </div>
                        <div>

                            <input class="btn btn-primary" style="" type="submit" value="حفظ">
                        </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
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
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">

                    </div>

                    <div class="card-body">
                        <form action="{{ url('brand/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" id="formupdate">
                                <input type="hidden" id="id" name="id" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}">

                                <label for="name">اﻹسم*</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}">
                                @if ($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" id="formupdate">
                                <input type="hidden" id="id" name="id" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}">

                                <label for="name">الشركة الصنعة*</label>
                                <input type="text" id="company" name="company" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}">
                                @if ($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"
                                style="border-radius: 50%;border:1px">
                                <span style="border-radius: 3rem">
                                </span>
                            </div>
                            <hr>
                            <div>

                                <input class="btn btn-primary" style="" type="submit" value="حفظ">
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">

                    </div>

                    <div class="card-body">

                        <P class="text-bold">
                            هل تريد مسح الخدمة؟
                        </P>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" id="formupdate">



                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', isset($user) ? $user->name : '') }}" disabled>
                            @if ($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>



                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"
                            style="border-radius: 50%;border:1px">
                            <span style="border-radius: 3rem">
                            </span>
                        </div>


                        <div class="d-flex">
                            <form action="{{ url('brand/delete') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id" name="id" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}">
                                <input class="btn btn-danger b-a-1" style="" type="submit" value="مسح">
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <div>

            </div>
        </div>

    </div>

    </div>
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

            $(".line_data").find("input").each(function() {
                $(this).val(0);
            })

            $(".summary").find("input").each(function() {
                $(this).val(0);
            })
            $("tfoot").find("input").each(function() {
                $(this).val(0);
            })
            $(".btn-line").click(function(e) {
                e.preventDefault();


                $(".line_data#" + this.id).append(
                    `<tr>
                                            <td width="10" class="counter">
                                                2
                                            </td>
                                            <td style="text-align: center">
                                                <select class="form-control products" id="{{ $item->id }}"
                                                    name="item[{{ $item->id }}][]" >
                                                    <option selected value="">-- إختر --</option>
                                                    @foreach ($items as $product)
                                                        <option value="{{ $product->id }}"
                                                            data-price="{{ $product->price }}">{{ $product->name }} <span
                                                                id="{{ $product->id }}">{{ $product->price }}</span>
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="" class="product-price" readonly
                                                    id="{{ $item->id }}">
                                            </td>
                                            <td style="text-align: center">


                                                <select class="form-control products" id="{{ $item->id }}"
                                                    name="unit[{{ $item->id }}][]" >
                                                    <option selected value="">-- إختر --</option>
                                                    @foreach ($units as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="text-align: center">

                                                <input type="text" name="factor_price[{{ $item->id }}][]"
                                                    class="border border-1 factor_price" readonly
                                                    id="{{ $item->id }}">
                                            </td>
                                            <td style="text-align: center">

                                                <input type="text" name="qty[{{ $item->id }}][]"
                                                    class="border border-1 qty" id="{{ $item->id }}" value="0"
                                                    >
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="simetot[{{ $item->id }}][]" readonly
                                                    id="{{ $item->id }}" value="0"
                                                    class="border border-1 simetot">
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="material[{{ $item->id }}][]"
                                                    id="{{ $item->id }}" value="0"
                                                    class="border border-1 material" >
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="material_acc[{{ $item->id }}][]"
                                                    value="0" id="{{ $item->id }}"
                                                    class="border border-1 material_acc" >
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="material_other[{{ $item->id }}][]"
                                                    value="0" id="{{ $item->id }}"
                                                    class="border border-1 material_other" >
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="tot_material[{{ $item->id }}][]"
                                                    id="{{ $item->id }}" value="0" readonly
                                                    class="border border-1 tot_material">
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="tot_material[{{ $item->id }}][]"
                                                    id="{{ $item->id }}" readonly
                                                    class=" border border-1 all_material px-4" value="0">
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="labour[{{ $item->id }}][]"
                                                    id="{{ $item->id }}" value="0"
                                                    class="border border-1 labour" >
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="labour_other[{{ $item->id }}][]"
                                                    id="{{ $item->id }}" value="0"
                                                    class=" border border-1 labour_other" >
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="worker_tot[{{ $item->id }}][]"
                                                    id="" class=" border border-1 tot_labour" value="0"
                                                    readonly >
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text" name="worker_tot[{{ $item->id }}][]"
                                                    id="{{ $item->id }}" value="0"
                                                    class=" border border-1 all_labour px-4" readonly>
                                            </td>
                                            <td style="text-align: center">
                                                <input type="text"
                                                    id="{{ $item->id }}" value="0"
                                                    class=" border border-1 all_tot" readonly>

                                            </td>
                                            <td style="text-align: center">

                                                <button class="btn-outline-danger btn-close remove-record"></button>

                                            </td>
                                        </tr>`).ready(function() {



                    $(".counter").html()





                    // // material
                    $(".line_data").find("input").each(function() {
                        $(this).val(0);
                    })

                    $(".summary").find("input").each(function() {
                        $(this).val(0);
                    })
                    $("tfoot").find("input").each(function() {
                        $(this).val(0);
                    })



                    $(".remove-record").click(function(e) {
                        e.preventDefault()
                        $
                        $(this).closest("tr").remove()
                    })




                    // let hole_tot = 0;
                    // // product total
                    $('select').select2();
                    $(".products").change(function() {
                        $(this).closest("tr").find(".material").val($(this).find(
                            'option:selected').data('price'));
                        var factor = $(".factor").val() || 0
                        var tot = 0;
                        var product = 0;
                        sum_product($(this))
                        // sumation_all_tot();
                        sumation_all($(this))
                    })




                    $(".qty").keyup(function(e) {

                        var product_factor = $(this).parent().parent().find(".factor_price")
                            .val()
                        var tot = product_factor * $(this).val();

                        $(this).parent().parent().find(".hole_tot").val('');

                        $(this).parent().parent().find(".simetot").val(tot);
                        var all_tot = $(this).parent().parent().find(".all_tot").val(
                            parseInt($(this).parent().parent().find(".all_labour")
                                .val()) + parseInt($(this).parent().parent().find(
                                ".all_material").val()))

                        // sumations_profit($(this));

                        sumations($(this)).done();

                        //  here fire the profit

                        sumation_all_tot();

                        sum_product($(this))

                        total_sale_factor($(this))
                        summary_product_factor();
                        sumation_all($(this))
                    })


                    // // material daim main

                    $(".material").keyup(function(e) {
                        materials_sumation($(this))
                        sumation_all_material($(this))
                        // sumation_all_materials()
                        sumations($(this));

                        sumation_all($(this))
                    })

                    // material Acssories

                    $(".material_acc").keyup(function(e) {

                        materials_sumation($(this))

                        sumation_all_material($(this))
                        // sumation_all_materials()
                        sumations($(this));

                        sumation_all($(this))
                    })



                    // material_other
                    $(".material_other").keyup(function(e) {

                        materials_sumation($(this))
                        sumation_all_material($(this))
                        // sumation_all_materials()
                        sumations($(this));
                        line_detect()
                        // sumation_all_materials()

                        sumation_all($(this))
                    })



                    //labour


                    $(".labour").keydown(function(e) {

                        labour_sumation($(this))


                        // all_labour
                        sumation_all_labour($(this));
                        // sumation_all_labour1($(this));
                        // sumations($(this))
                        sumation_all_tot();
                        sumation_all($(this))
                    })


                    // labour other

                    $(".labour_other").keydown(function() {

                        labour_sumation($(this))
                        sumation_all($(this))
                        sumation_all_labour($(this));
                        total_sale_factor($(this))
                        // sumations($(this))

                        // sumation_all_labour1($(this));

                        all_tot($(this))
                        sumation_all_tot();
                    })








                });
                line_detect()
            });


            $(".products").val("")

            //*******************************************************************************************
            // ********************************** Here is the main *****************************************
            // *********************************************************************************************

            $(".saving").click(function(e) {

                $(".statues").val("موافق")
                $(".qoute").submit()
            })


            $(".draft").click(function(e) {

                $(".statues").val("مسودة")
                $(".qoute").submit()
            })
            $(".contract").click(function(e) {

                $(".statues").val("تعميد")
                $(".qoute").submit()
            })

            $(".line_data").each(function() {
                $(this).find("input").val(0)
            })
            $('select#inputState.customer').select2();
            $('.products').select2();
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
            $(".factor").keydown(function() {
                $(this).valid()

                product_calculation();
                $(".factor_summary").val($(this).val())
                $(".factor_summary1").val($(this).val())
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
                sumation_all_tot();
                sumation_all($(this))
            })




            $(".qty").keydown(function(e) {

                var product_factor = $(this).parent().parent().find(".factor_price")
                    .val()
                var tot = product_factor * $(this).val();

                $(this).parent().parent().find(".hole_tot").val('');

                $(this).parent().parent().find(".simetot").val(tot);
                var all_tot = $(this).parent().parent().find(".all_tot").val(
                    parseInt($(this).parent().parent().find(".all_labour")
                        .val()) + parseInt($(this).parent().parent().find(
                        ".all_material").val()))

                // sumations_profit($(this));

                sumations($(this));

                //  here fire the profit

                sumation_all_tot();

                sum_product($(this))

                total_sale_factor($(this))
                summary_product_factor();
                sumation_all($(this))
            })


            // // material daim main

            $(".material").keydown(function(e) {
                materials_sumation($(this))
                sumation_all_material($(this))
                // sumation_all_materials()
                sumations($(this));
                sumation_all_tot();
                sumation_all($(this))
            })

            // material Acssories

            $(".material_acc").keyup(function(e) {

                materials_sumation($(this))

                sumation_all_material($(this))
                // sumation_all_materials()
                sumations($(this));
                sumation_all_tot();
                sumation_all($(this))
                sumation_all_tot();
                all_tot($(this))
            })



            // material_other
            $(".material_other").keyup(function(e) {

                materials_sumation($(this))
                sumation_all_material($(this))
                // sumation_all_materials()

                line_detect()
                // sumation_all_materials()
                sumations($(this));
                sumation_all_tot();
                sumation_all($(this))

            })



            //labour


            $(".labour").keyup(function(e) {

                labour_sumation($(this))


                // all_labour
                sumation_all_labour($(this));
                // sumation_all_labour1($(this));
                // sumations($(this))
                sumation_all_tot();
                sumation_all($(this))
                sumations($(this))

            })


            // labour other

            $(".labour_other").keyup(function(e) {

                labour_sumation($(this))

                sumation_all_labour($(this));
                total_sale_factor($(this))
                // sumations($(this))

                // sumation_all_labour1($(this));

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

                parent.closest(".line_data").each(function() {
                    $(this).find(".all_tot").each(function() {

                        all_line[id] += parseInt($(this).val())

                        $(this).closest(".card-body").find("input.total").val(isNaN(all_line[id]))

                    })
                    $("input.profit").val(sum)
                })



            }
            var summ = 0;

            function sumation_all_material(parent) {
                // all_line[id]-0;


                var id = parent.attr("id")

                parent.closest(".line_data").each(function() {
                    $(this).find(".all_material").each(function() {

                        all_line[id] += parseInt($(this).val() || 0)
                        $(this).closest(".card-body").find("input.total_material").val(all_line[id])
                        $("#" + id + ".all_material_summary").val(isNaN(all_line[id]))

                    })


                    $("input.profit").val(sum)
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

                sumation_all_labours()
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

            function sum_product(parent) {


                var sum = 0;

                var id = parent.attr("id")

                all_line[id] = 0;
                var qty = [];
                var product = [];

                parent.closest(".line_data").each(function() {

                    $(this).find("select.products option:selected").each(function(index) {
                        product[index] = $(this).data("price") || 0

                    })





                    $(this).children().find(".qty").each(function(index) {
                        qty[index] = $(this).val() || 0


                    })
                    var factor = $('.factor').val() || 0;
                    $(this).find("#" + id + ".factor_price").each(function(index) {
                        $(this).val(product[index] * factor)
                    })
                    $(this).find("#" + id + ".simetot").each(function(index) {
                        $(this).val(qty[index] * product[index] * factor)

                        sum_profit(id)

                    })
                })

            }

            function sum_profit(id) {


                var sum = 0;




                $(".line_data").each(function() {


                    $(this).find("#" + id + ".simetot").each(function() {

                        sum += parseInt($(this).val() || 0);
                        $("#" + id + ".total_profit").val(sum)
                    })

                })

            }



            $(this).find('select').val('');





            function sumation_all(parent) {
                // all_line[id]-0;
                var sum = 0;

                var id = parent.attr("id")
                all_line[id] = 0;


                $(parent).parent().parent().find("#" + id + ".all_tot").each(function() {

                    all_line[id] += parseInt($(this).val() || 0)

                    // $(this).closest(".card-body").find("#"+id+"input.all_tot_summary").val(all_line[id])
                    $("#" + id + ".total").val($(this).val() || 0)

                    $("#" + id + ".all_tot_summary").val($(this).val() || 0);

                })
                // total_factor(parent);





            }



            function total_sale_factor(parent) {
                // all_line[id]-0;
                var sum = 0;

                var id = parent.attr("id")

                $("input#" + parent.attr('id') + ".total_profit").each(function() {

                    sum += (parseInt($(this).val()) || 0);


                })

                $("input#" + id + ".sale_factor_summary").val(sum)


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



            }

            function sumation_all_labours() {
                var sum = 0;


                $(".all_labour_summary").each(function() {
                    let $el = $(this);
                    sum += parseInt(($el.val() || 0));


                });
                // $('#gross_amount').text(gross.toFixed(2));
                $(".all_labour_summary1").val(sum)



            }







            function materials_sumation(parent) {

                if (parent.attr("class") == "border border-1 material_other") {

                    var material = parent.parent().parent().find(".material").val() || 0
                    var material_acc = parent.parent().parent().find(".material_acc").val() || 0
                    var material_other = parent.val() || 0
                } else if (parent.attr("class") == "border border-1 material_acc") {
                    var material_other = parent.parent().parent().find(".material_other").val() || 0
                    var material = parent.parent().parent().find(".material").val() || 0
                    var material_acc = parent.val() || 0

                } else {
                    var material_other = parent.parent().parent().find(".material_other").val() || 0
                    var material_acc = parent.parent().parent().find(".material_acc").val() || 0
                    var material = parent.val() || 0
                }

                tot_material = parseInt(material) + parseInt(material_other) + parseInt(material_acc)


                parent.parent().parent().find(".tot_material").val(tot_material);
                var qty = parent.parent().parent().find(".qty").val() || 0;
                var all_material = parent.parent().parent().find(".all_material").val(tot_material * qty);



            }

            function all_tot(parent) {
                var all_tot = 0;
                var all_material = 0;
                var all_labour = 0;
                all_material = (parseInt(parent.parent().parent().find(".all_material").val()));
                all_labour = (parseInt(parent.parent().parent().find(".all_labour").val()));

                all_tot = (all_material) + (all_labour)
                parent.parent().parent().find(".all_tot").val(all_tot || 0)

            }






            function labour_sumation(parent) {
                var labour_other = 0;
                var labour = 0;
                if (parent.className == "labour_other") {
                    var labour_other = parent.parent().parent().find(".labour").val() || 0
                    var labour = parent.val() || 0
                } else {
                    var labour_other = parseInt(parent.parent().parent().find(".labour_other").val()) || 0
                    var labour = parseInt(parent.val()) || 0
                }
                var tot_labour = 0;
                tot_labour = parseInt(labour) + parseInt(labour_other)


                parent.parent().parent().find(".tot_labour").val(tot_labour);
                var qty = parent.parent().parent().find(".qty").val() || 0;
                var all_labour = parent.parent().parent().find(".all_labour").val(tot_labour * qty);



            }

            function summary_product_factor() {



                var sum = 0;
                $(".summary").each(function() {
                    $(this).find(".sale_factor_summary").each(function() {
                        sum += (parseInt($(this).val() || 0))

                    })
                    $(".sale_factor_summary1").val(sum)

                })


            }

            function sumation_all_tot() {

                var sum = 0;
                $(".summary").each(function() {
                    console.log($(".all_tot_summary").val());
                    $(this).find(".all_tot_summary").each(function() {
                        sum += (parseInt($(this).val() || 0))
                        $(".all_tot_summary1").val(sum)
                    })


                    $(".total-cost").val(sum)
                })





            }


            $(".risk").keyup(function(e) {
                e.preventDefault();

                calcualte()
            })


            $(".indrect").keyup(function(e) {
                e.preventDefault();

                calcualte()
            })
            $(".consult").keyup(function(e) {
                e.preventDefault();

                calcualte()
            })

            function calcualte() {
                var cost = parseInt($(".all_tot_summary1").val() || 0)

                var consult = parseInt($(".consult").val() || 0) / 100;

                var indirect = parseInt($(".indrect").val() || 0) / 100

                var addition_cost = parseInt($(".addition").val() || 0) / 100
                var resk = parseInt($(".risk").val() || 0) / 100

                var result = cost + ((consult * cost) + (indirect * cost) + (addition_cost * cost) + (resk * cost))
                var profit = parseInt($(".sale_factor_summary1").val() || 0)
                $(".sale_profit").val(profit)
                $(".total-cost").val(result.toFixed(2))
                var net = (profit - result) / (profit)

                $(".net-profit").val(net.toFixed(2) + "%")

            }
            $(".discount-btn").click(function(e) {
                e.preventDefault()




                // values from the perevious table

                var cost = parseInt($(".all_tot_summary1").val() || 0)
                var consult = parseInt($(".consult").val() || 0) / 100;
                var indirect = parseInt($(".indrect").val() || 0) / 100
                var resk = parseInt($(".risk").val() || 0) / 100
                var result = cost + ((consult * cost) + (indirect * cost) + (resk * cost))
                var addition_cost = ((consult * cost) + (indirect * cost) + (resk * cost))
                var discount_amount = parseInt($(".discount-amount").val() || 0);
                var profit = Math.abs(parseInt($(
                    ".sale_factor_summary1").val())) - (discount_amount * ($("tr.discount-row0")
                    .children().length - 2))

                console.log((discount_amount * ($("tr.discount-row0").children().length - 2)));
                // the profit from last value

                var net = (profit - result) / profit
                console.log(net);
                var color = "";
                if (net / profit < 17) {
                    color = "bg-danger";

                } else if (net / profit <= 17) {
                    color = "bg-yallow";

                } else {
                    color = "bg-success";

                }
                console.log(color);
                $("tr.discount-row0").append(`<td>` + profit + `</td>`);
                $("tr.discount-row1").append(`<td>` + cost + `</td>`);
                $("tr.discount-row2").append(`<td>` + addition_cost.toFixed(2) + `</td>`);
                $("tr.discount-row3").append(`<td>` + result + `</td>`);
                $("tr.discount-row4").append(`<td>` + net + `</td>`);
                $("tr.discount-row5").append(`<td class='` + color + `'>` + (net / profit).toFixed(2) +
                    `%</td>`);
                $("tr.discount-header").append(`<th>` + discount_amount + `القيمة (ر.س)</th>`)





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


@endsection
