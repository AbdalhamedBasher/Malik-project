@extends('layouts.admin')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('logo.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="logo">Upload Logo</label>
        <input type="file" class="form-control-file" id="logo" name="logo">
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@endsection
