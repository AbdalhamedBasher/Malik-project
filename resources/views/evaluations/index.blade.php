@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            قائمة التققيمات
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Course">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            المعرف
                        </th>
                        <th>
                            الدورة
                        </th>
                        <th>
                            رمز الدورة
                        </th>
                        <th>
                            رقم الدورة
                        </th>
                        <th>
                            التاريخ
                        </th>
                        <th>
                            المدة المتبقية
                            على نهاية الدورة
                        </th>
                        <th>
                            عدد الطلبة
                        </th>
                        <th>
                            شروط الالتحاق بالدورة
                        </th>
                        <th>
                            الحالة
                        </th>
                        <th>
                            بواسطة
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($course_training_plans as $value)
                        @foreach($value as $course_training_plan)
                            <tr data-entry-id="{{ $course_training_plan->id }}">

                            <td>

                            </td>
                            <td>
                                {{ $course_training_plan->id ?? '' }} {{-- المعرف --}}
                            </td>
                            <td>
                                {{ $course_training_plan->course->name ?? '' }} {{-- الدورة --}}
                            </td>
                            <td>
                                {{ $course_training_plan->course->code ?? '' }} {{-- رمز الدورة --}}
                            </td>
                            <td>
                            {{ $course_training_plan->patch_number ?? '' }} {{-- رقم الدورة --}}
                            </td>
                            <td>
                                <span class="badge badge-info">{{ convertToHijri($course_training_plan->start_at) ?? '' }}</span> -
                                <span class="badge badge-info">{{ convertToHijri($course_training_plan->end_at) ?? '' }}</span> {{-- البداية والنهاية --}}
                            </td>
                            <td>
                                {{ $course_training_plan->end_at->diffInDays(now()) ?? '' }} {{-- الأيام المتبقية --}}
                            </td>
                            <td>
                                {{ $course_training_plan->trainee_number ?? '' }} {{-- الدورة --}}
                            </td>
                            <td>
                                {{ $course_training_plan->enrollment_conditions ?? '' }} {{-- الدورة --}}
                            </td>
                            <td>
                                {{ $course_training_plan->status ?? '' }} {{-- الدورة --}}
                            </td>
                            <td>
                                {{ $course_training_plan->user->name ?? '' }} {{-- الدورة --}}
                            </td>
                            <td>
                                @can('course_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.courses.show', $course_training_plan->course->id) }}">
                                        عرض
                                    </a> {{-- الدورة --}}
                                @endcan
                                @can('course_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('courses.print', $course_training_plan->course->id) }}" target="_blank">
                                        طباعة
                                    </a> {{-- الدورة --}}
                                @endcan
                            </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('course_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.courses.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-Course:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
