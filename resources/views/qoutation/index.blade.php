@extends('layouts.admin')
@section('content')

    {{-- @extends('layouts.main') --}}





@section('content')
    <div class="flex items-center markdown">

    </div>


    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>
        {{-- quotaion master --}}
        <div class="card-body">
            <form  method="POST" action="{{route('quote')}}"   >
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputCity">العميل</label>
                        <input type="text" class="form-control" name="customer_name" id="inputCity">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">رقم التسعيرة</label>
                        <input type="text" class="form-control" id="inputCity"  value="Q.{{$qoute_id->id}}" name="qouation_number"  readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">تاريخ التسعيرة</label>
                        <input type="date" class="form-control" name="quotation_date" id="inputZip">
                    </div>
                </div>
                <div class="form-row">



                </div>






        </div>
    </div>
    <div class="card mt-1 card-detail">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>

        <div class="card-body">
            <div class="line_form">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputZip">النشاط</label>
                        <input type="text" class="form-control" value="{{ $line->name}}" readonly id="inputZip">
                        <input type="hidden" name="line_id" value="{{ $line->id}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">العامل</label>
                        <input type="text" class="form-control" name="factor" id="inputZip">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip"> &emsp14; </label>
                        <input type="submit" value="أضافة مادة" class="form-control btn-bd-primary new_product"
                            id="inputZip">
                    </div>

                </div>
                <div class="details">


                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputState">المواد</label>
                            <select id="inputState" name="item[]" class="form-control">
                                <option selected>-- إختر --</option>
                                <option value="new"  class="new_item">-- مادة جديدة --</option>
@foreach ($items as $item )
<option value="{{$item->id}}">{{$item->name.' '.$item->brand.' '.$item->type.' '.$item->size_number.''.$item->size.' '.$item->price}}</option>



@endforeach


                            </select>
                        </div>


                        <div class="form-group col-md-2">
                            <label for="inputZip">الكمية</label>
                            <input type="text" class="form-control" name="qty[]" id="inputZip">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputZip">المواد المساعدة</label>
                            <input type="text" class="form-control" name="material[]" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">الديكور -مواد </label>
                            <input type="text" class="form-control" name="material_acc[]" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">غير ذلك -مواد </label>
                            <input type="text" class="form-control" name="material_other[]" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">الايادي العاملة</label>
                            <input type="text" class="form-control" name="labour[]" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">الديكور-ايادي </label>
                            <input type="text" class="form-control"  name="labour_acc[]" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">غير ذلك-أيادي </label>
                            <input type="text" class="form-control" name="labour_other[]" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip"> &emsp14; </label>
                            <input type="submit" value=""
                                class="form-control btn-danger btn-sm btn-close h-6 remove_line" id="inputZip">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group col-md-2 justify-center">
            <label for="inputZip"> &emsp14; </label>
            <input type="submit" value="حفظ" class="form-control btn-bd-primary"
                id="inputZip">
        </div>
        </form>
    </div>


    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>

        <div class="card-body">


            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Course"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th width="10">
                                #
                            </th>

                            <th style="text-align: center">
                                اسم المادة
                            </th>
                            <th style="text-align: center">
                                الوحدات
                            </th>
                            <th style="text-align: center">
                                الكمية
                            </th>
                            <th style="text-align: center">
                                مج/المواد </th>
                            <th style="text-align: center">
                                المواد المساعدة
                            </th>
                            <th style="text-align: center">
                                د/المواد
                            </th>
                            <th style="text-align: center">
                                -غير ذلك المواد
                            </th>
                            <th style="text-align: center">
                                الايادي العاملة</th>
                            <th style="text-align: center">
                                الايادي العاملة</th>
                            <th style="text-align: center">
                                د/ الايادي </th>
                            <th style="text-align: center">
                                غير ذلك- الايادي </th>

                            &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @php
                            $i = 1;
                        @endphp
                        {{-- @foreach ($brands as $item)
                            <tr data-entry-id="">
                                <td>{{ $i++ }}</td>
                                <td id="name">{{ $item->name }}</td>


                                <td id="name">{{ $item->company }}</td>

                                <td>

                                    <span class="d-flex space-x-1">
                                        <a class="btn update m-1" style="background-color: #433483a3 ; color:aliceblue"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}"  data-company="{{ $item->company }}"
                                         ">
                                            تعديل </a>

                                        <button type="submit" class="btn btn-danger m-1 delete"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}">مسح</button>

                                    </span>

                                </td>
                            </tr>
                        @endforeach --}}




                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>

        <div class="card-body">



            <div class="form-row">





                <div class="form-group col-md-2">
                    <label for="inputZip"> مجموع المواد المساعدة</label>
                    <input type="text" class="form-control" id="inputZip" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip"> مجموع الايادي العاملة</label>
                    <input type="text" class="form-control" id="inputZip" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">مجموع الموادالمساعدة/الايادي </label>
                    <input type="text" class="form-control" id="inputZip" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">التوقع للمواد </label>
                    <input type="text" class="form-control" id="inputZip" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">ت/الايادي العاملة</label>
                    <input type="text" class="form-control" id="inputZip" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">المجموع </label>
                    <input type="text" class="form-control" id="inputZip" readonly>
                </div>

            </div>

        </div>

        </form>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">

                    </div>

                    <div class="card-body">
                        <form action="{{ route('item') }}" method="POST"   class="form-inlineform-row" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">اﻹسم*</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                                    @if ($errors->has('name'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.user.fields.name_helper') }}
                                    </p>
                                </div>
                                <div class=" {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <label for="price">السعر*</label>
                                    <input type="text" id="price" name="price" class="form-control"
                                        value="{{ old('price') }}" required  onkeypress="return
                                        onlyNumberKey(event)">
                                    @if ($errors->has('price'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </em>
                                    @endif

                                </div>


                                <div class=" {{ $errors->has('price') ? 'has-error' : '' }}"
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
                                        <input type="text" id="price" name="size_number" class="form-control col-8"
                                            value="{{ old('price') }}" required>
                                        @if ($errors->has('price'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('price') }}
                                            </em>
                                        @endif
                                        <select class="form-control col-4" id="exampleFormControlSelect1 main_catog"
                                        name="size">
                                        <option selected value="">-- إختر --</option>
                                        @foreach ($size as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>

                                <label for="name">اﻹسم*</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>
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
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>

                                <label for="name">الشركة الصنعة*</label>
                                <input type="text" id="company" name="company" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>
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
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>
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
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('course_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "#1",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            $('.datatable-Course:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
        $(document).ready(function() {

            // /

$('.new_item').click(function () {
    $('#exampleModal').modal('show');
})



            $(".new_product").click(function(e) {
                e.preventDefault();
                $(".details").append(`
                        <div class="form-row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">المواد</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>-- إختر --</option>
                                            <option>...</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الكمية</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputZip">المواد المساعدة</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الدكور -مواد </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">غير ذلك -مواد </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الايادي العاملة</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الديكور-ايادي </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">غير ذلك-أيادي </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="submit" value=""
                                            class="form-control btn-danger btn-sm btn-close h-6 remove_line" id="inputZip">
                                    </div>
                                </div>
                        `).ready(function() {
                    $(".remove_line").click(function(e) {
                        e.preventDefault();
                        console.log("true");
                        console.log($(this).parent().parent().remove())

                    })

                })

                e.preventDefault();
                $(".remove_line").click(function(e) {
                    e.preventDefault();
                    console.log("true");
                    console.log($(this).parent().parent().remove())

                })

            });
            $(".remove_line").click(function(e) {
                e.preventDefault();

                console.log($(this).parent().parent().remove())

            })
            // new procut outside the appends
            $(".new_product").click(function(e) {
                e.preventDefault();
                $(".details").append(`<div class="form-row mt-3 p-1">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">المواد</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>-- إختر --</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الكمية</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputZip">المواد المساعدة</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الدكور -مواد </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">غير ذلك -مواد </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الايادي العاملة</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الديكور-ايادي </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">غير ذلك-أيادي </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="submit" value=""
                                            class="form-control btn-danger btn-sm btn-close h-6 remove_line" id="inputZip">
                                    </div>
                                </div>
                        `).ready(function () {
                            e.preventDefault();
                $(".remove_line").click(function(e) {
                    e.preventDefault();
                    console.log("true");
                    console.log($(this).parent().parent().remove())

                })
                        })
            })
            // $('#updateModal #id').val(this.parent().find('#name'))
            // console.log($(this).parent().parent().find('td #name').val());
            /*
                                    <div class="form-row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">المواد</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>-- إختر --</option>
                                            <option>...</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الكمية</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputZip">المواد المساعدة</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الدكور -مواد </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">غير ذلك -مواد </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الايادي العاملة</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">الديكور-ايادي </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">غير ذلك-أيادي </label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip"> &emsp14; </label>
                                        <input type="submit" value=""
                                            class="form-control btn-danger btn-sm btn-close h-6 remove_line" id="inputZip">
                                    </div>
                                </div>





            */
            // })


        });
    </script>
@endsection


@endsection
