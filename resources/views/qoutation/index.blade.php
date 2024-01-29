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
            <form>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputCity">العميل</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">تاريخ التسعيرة</label>
                        <input type="date" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputCity">رقم التسعيرة</label>
                        <input type="text" class="form-control" id="inputCity" value="{{ $qoute_id }}" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip"> &emsp14; </label>
                        <input type="submit" value="أضافة نشاط" class="form-control btn-bd-primary new_line"
                            id="inputZip">
                    </div>
                </div>






        </div>
    </div>
    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>

        <div class="card-body">
            <div class="line_form">
                <div class="details">
                    <div class="form-row ">

                        <div class="form-group col-md-2">
                            <label for="inputZip">العامل</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">النشاط</label>
                            <select id="inputState" class="form-control">
                                <option selected>-- إختر --</option>
                                <option>...</option>
                            </select>
                        </div>

                    </div>

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

                </div>
            </div>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">

                        </div>

                        <div class="card-body">
                            <form action="{{ route('brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">الشركة المصنعة*</label>
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

console.log("trur");
// /
        $(".new_line").click(function(e) {
            e.preventDefault();
console.log("true");

            $(".line_form").append(`      <div class="details">
                    <div class="form-row ">

                        <div class="form-group col-md-2">
                            <label for="inputZip">العامل</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">النشاط</label>
                            <select id="inputState" class="form-control">
                                <option selected>-- إختر --</option>
                                <option>...</option>
                            </select>
                        </div>

                    </div>

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

                </div>`);




            // $('#updateModal #id').val(this.parent().find('#name'))
            // console.log($(this).parent().parent().find('td #name').val());

        })
        // $(".remove_line").click(function(e) {
        //     e.preventDefault();
        //     $(this).parent().parent().remove()
        //     console.log()


        //     // $('#updateModal #id').val(this.parent().find('#name'))
        //     // console.log($(this).parent().parent().find('td #name').val());

        // })
        // function remove_details(e) {
        //     e.preventDefault();
        //     $(this).parent().remove()
        //     console.log( $(this).parent().html(()))
        // }
    });
    </script>
@endsection


@endsection
