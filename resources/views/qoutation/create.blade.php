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
            <form method="POST" action="{{ route('qoute') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group row-md-3">
                            <label for="inputZip">المرجع</label>
                            <input type="text" name="id" class="form-control" value="Q" readonly
                                id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">العميل</label>
                            <select id="inputState" name="customer" class="customer form-control">
                                <option selected>-- إختر --</option>

                                @foreach ($customer as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach


                            </select>

                        </div>



                        <div class="form-group row-md-3">
                            <label for="inputZip">الوصف</label>
                            <input type="text" name="id" class="form-control" id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">المشروع</label>
                            <input type="text" name="id" class="form-control" id="inputZip">


                        </div>
                        <div class="form-group row-md-3">
                            <label for="inputZip">النشاط</label>
                            <input type="text" name="id" class="form-control" id="inputZip">


                        </div>
                        <span class="form-group row-md-3">
                            <label for="inputZip">الحالة</label>
                            <select id="inputState" name="stutes" class="form-control">
                                <option selected>-- الحالة --</option>
                                <option selected> موافق </option>
                                <option selected> مسودة </option>
                                <option selected> تمت فوترة </option>
                                <option selected> بانتظار الموافقة </option>



                            </select>


                        </span>
                    </div>
                    <div class="col">
                        <div class="card mt-1">
                            <div class="card-header  text-3xl" style="background-color: #201843a3 ; color:aliceblue">
                                بيانات العميل
                            </div>
                            {{-- quotaion master --}}
                            <div class="card-body   h-50 ">
                                <table class="table table-auto ">


                                    <tbody class="customer_data">
                                        <tr class=" border-bottom-0">
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>



                                        </tr>
                                        <tr class=" border-bottom-0">
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>



                                        </tr>
                                        <tr class=" border-bottom-0">
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>



                                        </tr>
                                        <tr class= "border-bottom-0">
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>
                                            <td class=" border-bottom-0 border-top-0">&emsp13;</td>



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
                    <div class="card mt-1 card-detail">
                        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">
                            {{ $item->name }}
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
                                                سعر الوحدة
                                            </th>
                                            <th style="text-align: center">
                                                الكمية
                                            </th>
                                            <th style="text-align: center">
                                                المجموع</th>
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
                                                المجموع المواد</th>
                                            <th style="text-align: center">
                                                الايادي العاملة</th>
                                            <th style="text-align: center">
                                                الايادي العاملة</th>

                                            <th style="text-align: center">
                                                غير ذلك- الايادي </th>
                                            <th style="text-align: center">
                                                المجموع العمالة</th>
                                            <th style="text-align: center">
                                                مجموع التكلفة الكلية </th>
                                            &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="line_data" id="{{$item->id}}">

                                        <tr>
                                            <td width="10">
                                                #
                                            </td>

                                            <td style="text-align: center">
                                                اسم المادة
                                            </td>
                                            <td style="text-align: center">
                                                الوحدات
                                            </td>
                                            <td style="text-align: center">
                                                سعر الوحدة
                                            </td>
                                            <td style="text-align: center">
                                                الكمية
                                            </td>
                                            <td style="text-align: center">
                                                المجموع</td>
                                            <td style="text-align: center">
                                                المواد المساعدة
                                            </td>
                                            <td style="text-align: center">
                                                د/المواد
                                            </td>
                                            <td style="text-align: center">
                                                -غير ذلك المواد
                                            </td>
                                            <td style="text-align: center">
                                                المجموع المواد</td>
                                            <td style="text-align: center">
                                                الايادي العاملة</td>
                                            <td style="text-align: center">
                                                الايادي العاملة</td>

                                            <td style="text-align: center">
                                                غير ذلك- الايادي </td>
                                            <td style="text-align: center">
                                                المجموع العمالة</td>
                                            <td style="text-align: center">
                                                مجموع التكلفة الكلية </td>
                                            &nbsp;
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group col-md-2 justify-center">
                                <label for="inputZip"> &emsp14; </label>
                                <input type="submit" value="إضافة" class="form-control btn-bd-primary btn-line" id="{{$item->id}}">
                            </div>
                        </div>
                        <div class="form-group col-md-2 justify-center">
                            <label for="inputZip"> &emsp14; </label>
                            <input type="submit" value="حفظ" class="form-control mx-3 btn-outline-success border-2"
                                id="inputZip">
                        </div>
            </form>
        </div>
        @endforeach

        <div class="card mt-1">
            <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

            </div>

            <div class="card-body">





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
                            <div class="card-header"
                                style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">

                            </div>

                            <div class="card-body">
                                <form action="{{ route('item') }}" method="POST" class="form-inlineform-row"
                                    enctype="multipart/form-data">
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
                                        <div class=" {{ $errors->has('id') ? 'has-error' : '' }}">
                                            <label for="qoutation_date">المرجع*</label>
                                            <input type="text" id="id" name="refrence" class="form-control"
                                                value="{{ old('refrence') }}" required>
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
                                                value="{{ old('customer') }}" required>
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
                                                        class="form-control col-8" value="{{ old('price') }}" required>
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

            $('.new_item').click(function() {
                $('#exampleModal').modal('show');
            })

            $('.customer').change(function() {
                console.log(this.value);
                var custom = this.value;
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
                        console.log(response);
                        $('.customer_data').html(
                            `<td> name</td>` + data.name + `</td><td>رقم الهاتف</td><td>` +
                            data.phone_number + `</td><td></td><td>` + data.id + `</td>`



                        )
                    }

                });





            })

            $(".new_product").click(function(e) {
                e.preventDefault();
                $(".details").append(`
                <div class="details">


<div class="form-row mt-3">
    <div class="form-group col-md-4">
        <label for="inputState">المواد</label>
        <select id="inputState" name="item[]" class="form-control items">



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
        <input type="text" class="form-control" name="labour_acc[]" id="inputZip">
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

</div> `).ready(function() {




                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('item/data') }}",

                        type: 'GET',
                        dataType: 'json',
                        success: function(result) {

                            //    result.forEach(element => {

                            //     });
                            console.log(result);
                        }
                    });


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



        });
    </script>
@endsection


@endsection
