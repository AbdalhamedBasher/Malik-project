@extends('layouts.admin')
@section('content')

    {{-- @extends('layouts.main') --}}





@section('content')
    <div class="flex items-center markdown">

    </div>

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn" id="icons" style="background-color: #433483a3 ; color:aliceblue">
                إضافة خدمة جديد/New Filed
            </a>
        </div>
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
                                اسم النشاط/Feild Name
                            </th>
                            <th style="text-align: center">
                                النشاط الاساسي /Manin Feild
                            </th>
                            <th style="text-align: center">
                                 الشروط و الاحكام /Terms
                            </th>
                            <th style="text-align: center">
                                 غير متضمنة /Not Include
                           </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @php
                            $i = 1;
                        @endphp
                        @foreach ($line_catogery as $item)
                            <tr data-entry-id="{{$item->id}}">
                                <td>{{ $i++ }}</td>
                                <td id="name">{{ $item->name }}</td>
                                <td id="catogery">
                                    @isset($item->main_line)
                                        {{ $item->main_lines->name }}
                                    @endisset
                                </td>

                                <td id="name">{{ $item->terms }}</td>
                                <td id="name">{{ $item->not_include }}</td>
                                <td>

                                    <span class="d-flex space-x-1">
                                        <a class="btn update m-1" style="background-color: #433483a3 ; color:aliceblue"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                            data-catogery="{{ $item->main_line }}">
                                            /updateتعديل </a>

                                        <button type="submit" class="btn btn-danger m-1 delete"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}">مسح/delete</button>

                                    </span>

                                </td>
                            </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">

                    </div>

                    <div class="card-body">
                        <form action="{{ route('lines') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                                <label for="line_catogery">الخدمة الاساسية</label>
                                <select class="form-control" id="exampleFormControlSelect1 main_catog" name="line_catogery">
                                    <option selected value="">-- إختر --</option>
                                    @foreach ($line_catogery as $items)
                                        <option value="{{ $items->id }}">{{ $items->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('main_line'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('main_line') }}
                                    </em>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"
                                style="border-radius: 50%;border:1px">
                                <span style="border-radius: 3rem">
                                </span>
                            </div>

                            <div class="container">
                                <div class="row">

                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#flamingo" role="tab"
                                                aria-controls="pills-flamingo" aria-selected="true">الشروط و الاحكام</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#cuckoo" role="tab"
                                                aria-controls="pills-cuckoo" aria-selected="false"> ما لا يشمله العرض</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content mt-3">
                                        <div class="tab-pane fade show active" id="flamingo" role="tabpanel"
                                            aria-labelledby="flamingo-tab">


                                            <textarea name="terms" id="" class="form-control" cols="30" rows="10" value="{{ old('terms') }}"
                                                placeholder="هنا أكتب الشروط و الاحكام "></textarea>



                                        </div>
                                        <div class="tab-pane fade" id="cuckoo" role="tabpanel"
                                            aria-labelledby="profile-tab">



                                            <textarea name="not_include" id="" class="form-control" cols="30" rows="10"
                                                value="{{ old('not_include') }}" placeholder="هنا أكتب ما لا يشمله العرض"></textarea>


                                            @if ($errors->has('name'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.user.fields.name_helper') }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>



                    <div class="d-flex justify-center">

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
                        <form action="{{ route('lines.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="hidden" name="id" id="id">
                                <label for="name">/اﻹسم*</label>
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
                            <div class="form-group {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                                <label for="line_catogery">Main Feild/الخدمة الاساسية</label>
                                <select class="form-control" id="exampleFormControlSelect1 main_catog" name="line_catogery">
                                    <option selected value="">      </option>
                                    @foreach ($line_catogery as $items)
                                        <option value="{{ $items->id }}">{{ $items->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('main_line'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('main_line') }}
                                    </em>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}"
                                style="border-radius: 50%;border:1px">
                                <span style="border-radius: 3rem">
                                </span>
                            </div>

                            <div class="container">
                                <div class="row">

                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#flamingo" role="tab"
                                                aria-controls="pills-flamingo" aria-selected="true">الشروط و الاحكام Terms</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#cuckoo" role="tab"
                                                aria-controls="pills-cuckoo" aria-selected="false"> ما لا يشمله العرض Not included</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content mt-3">
                                        <div class="tab-pane fade show active" id="flamingo" role="tabpanel"
                                            aria-labelledby="flamingo-tab">


                                            <textarea name="terms" id="" class="form-control" cols="30" rows="10" value="{{ old('terms') }}"
                                                placeholder=" Write here what in the Terms هنا أكتب الشروط و الاحكام "></textarea>



                                        </div>
                                        <div class="tab-pane fade" id="cuckoo" role="tabpanel"
                                            aria-labelledby="profile-tab">



                                            <textarea name="not_include" id="" class="form-control" cols="30" rows="10"
                                                value="{{ old('not_include') }}" placeholder="Write here what is not include in the Qoutation هنا أكتب ما لا يشمله العرض"></textarea>


                                            @if ($errors->has('name'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.user.fields.name_helper') }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>



                    <div class="d-flex justify-center">

                        <input class="btn btn-primary" style="" type="submit" value="حفظ">
                    </div>
                    </form>


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
                        Delete the Feild?    هل تريد مسح الخدمة؟
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
                            <form action="{{ url('lines/delete') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id" name="id" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                                <input class="btn btn-danger b-a-1" style="" type="submit" value="مسح/Delete">
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


            $("#icons").click(function(e) {

                $('#exampleModal').modal('show');


            })
            $("#icons").click(function(e) {

                $('#exampleModal').modal('show');


            })
            $(".terms").click(function(e) {

                $('#termsModal').modal('show');
                $('#termsModal #terms').val(this.id)


            })




            $(".update").click(function(e) {

                $('#updateModal').modal('show');
                $('#updateModal #id').val($(this).data('id'))
                console.log($(this).data('id'));
                $('#updateModal #name').val($(this).data('name'))

                $('#updateModal select').val($(this).data('catogery'))
                console.log($('#updateModal select').val());

                // $('#updateModal #id').val(this.parent().find('#name'))
                // console.log($(this).parent().parent().find('td #name').val());

            })
            $(".icons_modal").click(function(e) {
                e.preventDefault

                $("#icon_name").val(this.id);

                // console.log( $("#icons_modal").find('.fa')[0].attr('id'));
            })
        });

        $(".delete").click(function(e) {

            $('#deleteModal').modal('show');
            $('#deleteModal #id').val($(this).data('id'))
            $('#deleteModal #name').val($(this).data('name'))



            // $('#updateModal #id').val(this.parent().find('#name'))
            // console.log($(this).parent().parent().find('td #name').val());

        })
    </script>
@endsection


@endsection
