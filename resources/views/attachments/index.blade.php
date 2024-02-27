@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Multiple Photo Upload</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('attach') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="qoute_bath">Qoute Bath:</label>
                <input type="text" name="qoute_bath" id="qoute_bath" class="@error('qoute_bath') is-invalid @enderror">
                @error('qoute_bath')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="photos">Select Photos:</label>
                <input type="file" name="path[]" id="photos" class="photoes" multiple class="@error('photos') is-invalid @enderror">
                @error('photos')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <hr>

        <h2>Uploaded Photos</h2>

        <div class="row">
            @foreach ($photos as $photo)
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $photo->path) }}" alt="Photo" class="img-thumbnail">
                </div>
            @endforeach
        </div>
        <input type="button" class="add_button  btn btn-primary" value="Add More Photos" />
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
<script>
// make button to add more photos
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="file" name="photos[]" id="photos" multiple class="@error('photos') is-invalid @enderror"><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields


            $(wrapper).append(fieldHTML); //Add field html

    });


});
</script>
@endsection
