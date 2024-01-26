@extends('layouts.app1')
@section('content')
    <div class="row justify-content-center" style="
    text-align: center;
">
        <div class="col-md-6">
            <div class="card " style="
    box-shadow: 0px 3px 19px 5px #c7c7c757;
">
                <div class="card-body " style="
    text-align: center;
">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" style="
    width: 90px;
">
                    <p class="text-muted">تسجيل الدخول</p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>

                            <input id="email" name="email" type="text"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                autocomplete="email" autofocus placeholder="البريد الإلكتروني"
                                value="{{ old('email', null) }}">

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        {{-- <input
  id="username"
  type="text"
  class="form-control @error('username') is-invalid @enderror"
  name="username"
  value="{{ old('username') }}"
  required
  autocomplete="username"
  autofocus
/>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
{{--  --}}
                            <input id="password" name="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                placeholder="كلمة المرور">

                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" style="
    background: #213e21d1;
">
                                    دخول
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
