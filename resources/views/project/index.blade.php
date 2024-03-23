@extends('layouts.admin')
@section('content')

    {{-- @extends('layouts.main') --}}





@section('content')
    <div class="flex items-center markdown">

    </div>





    <div class="card mt-1">
        <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">

        </div>

        <div class="card-body">


            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Course overflow-x-scroll"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th width="10">
                                #
                            </th>
                            <th style="text-align: center">
                                project Code رقم المشروع </th>
                            <th style="text-align: center">
                                customer   العميل </th>
                            <th style="text-align: center">
                                Project Name إسم المشروع  </th>
                            <th> Stautes الحالة </th>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $project->serial }}</td>
                                <td>{{ $project->customers_data->name }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <a href="#" class="btn btm-sm  btn-outline-primary create"> جديد/new</a>
                                    <a href="#" class="btn btm-sm  btn-outline-success update" data-id="{{$project->id}}"  data-serial="{{$project->serial}}" data-name="{{$project->name}}" data-customer="{{$project->customers_data->id}}" data-status="{{$project->status}}"> تعديل/edite</a>

                                </td>
                            </tr>
                        @endforeach






                    </tbody>
                </table>
            </div>


        </div>
    </div>

    </div>
    {{-- modal for terms --}}


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
    <div class="modal fade" id="updateProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">
                            تعديل المشروع Update the project
                    </div>

                    <div class="card-body">
                        <form action="{{ url('project/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" id="formupdate">
                                <input type="hidden" id="id" name="id" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" >

                                <label for="name">اﻹسم*</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }}" id="formupdate">

                                <label for="name">رقم المشروع*</label>
                                <input type="text" id="serial" name="serial" class="form-control"
                                    value="{{ old('serial') }}">
                                @if ($errors->has('serial'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('serial') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}" id="formupdate">
                                <label for="name">  حالة المشروع*</label>

                                <select class="form-control status" id="exampleFormControlSelect1"
                                    name="status">
                                    <option value="">-- إختر --</option>
                                    <option value="finished">منتهي</option>
                                    <option value="working">قيد العمل</option>
                                    <option value="stopped">مجمد</option>

                                </select>
                                @if ($errors->has('status'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('status') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.user.fields.name_helper') }}
                                </p>
                            </div>

                            <div class=" {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                                <label for="line_catogery">العميل</label>


                                <select class="form-control customer" id="exampleFormControlSelect1"
                                    name="customer">
                                    <option  value="">-- إختر --</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>



                                @if ($errors->has('main_line'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('main_line') }}
                                    </em>
                                @endif


                            </div>
                            <div>

                                <input class="btn btn-bd-primary" style="" type="submit" value="حفظ">
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-header" style="background-color:#433483a3  ;color:#e6e4eca3 ; font-size:1rem">
                     إنشاء مشروع جديد New Project
                </div>

                <div class="card-body">
                    <form action="{{ url('project/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" id="formupdate">
                            <input type="hidden" id="id" name="id" class="form-control"
                                value="{{ old('name', isset($user) ? $user->name : '') }}" required>

                            <label for="name">اﻹسم*</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }}" id="formupdate">

                            <label for="name"> رقم المشروع*</label>
                            <input type="text" id="name" name="serial" class="form-control"
                                value="{{ old('serial') }}" required>
                            @if ($errors->has('serial'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('serial') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}" id="formupdate">
                            <label for="name">  حالة المشروع*</label>

                            <select class="form-control catogery" id="exampleFormControlSelect1 catogery"
                                name="status">
                                <option selected value="">-- إختر --</option>
                                <option  value="finished">منتهي</option>
                                <option  value="working">قيد العمل</option>
                                <option  value="stopped">مجمد</option>

                            </select>
                            @if ($errors->has('status'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>

                        <div class=" {{ $errors->has('line_catogery') ? 'has-error' : '' }}">
                            <label for="line_catogery">العميل</label>


                            <select class="form-control catogery" id="exampleFormControlSelect1 catogery"
                                name="customer">
                                <option selected value="">-- إختر --</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>



                            @if ($errors->has('main_line'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('main_line') }}
                                </em>
                            @endif


                        </div>
                        <hr>
                        <div>

                            <input class="btn btn-bd-primary" style="" type="submit" value="حفظ">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script>

        $(document).ready(function() {

        });
    </script>
    <script>
        var options = {
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Free Cash Flow',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
        console.log(chart);
    </script>
@endsection


@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            $(".update").click(function(e) {
                $('#updateProjectModal').modal('show');
                // $('#updateModal .name').val($(this).data('name'))
                $('#updateProjectModal #id').val($(this).data('id'))
                $('#updateProjectModal #serial').val($(this).data('serial'))
                $('#updateProjectModal #name').val($(this).data('name'))
                console.log($(this).data('customer'));
                $('select#exampleFormControlSelect1.form-control.customer').val($(this).data('customer')).change()

                $('select#exampleFormControlSelect1.form-control.status').val($(this).data('status')).change()
                console.log($(this).data("status"));
            });
            $(".create").click(function(e) {
                $('#createProjectModal').modal('show');
            });
        })
    </script>
@endsection
