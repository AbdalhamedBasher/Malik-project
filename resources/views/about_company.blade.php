@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">About Company</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">

{{-- show here the logo  --}}
@
            @if(isset($logo))


            <img src="{{ Storage::url($logo->logo) }}" style="width: 200px; height: 200px;">
            @endif
        </div>
    </div>
    <form method="POST" action="{{ route('about_company.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Company Name / الشركة</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($about_company) ? $about_company->name : old('name') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email / الايميل</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($about_company) ? $about_company->email : old('email') }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone/ رقم الهاتف</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ isset($about_company) ? $about_company->phone : old('phone') }}" required>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">

                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*" >
                    @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea class="form-control @error('about') is-invalid @enderror" id="about" name="about" rows="3" required>{{ isset($about_company) ? $about_company->about : old('about') }}</textarea>
                    @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ isset($about_company) ? 'Update' : 'Create' }}</button>
            @if(isset($about_company))
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
            @endif
        </div>
    </form>
</div>
@section(("styles"))
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .card {
        margin-top: 20px;
    }

    .img-thumbnail {
        max-width: 100%;
        height: auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        margin-top: 20px;
    }
</style>
@endsection

@if(isset($about_company))
@section('scripts')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var companyId = button.data('companyid');
        var modal = $(this);
        modal.find('.modal-body #company_id').val(companyId);
    });
</script>
@endsection
@endif
