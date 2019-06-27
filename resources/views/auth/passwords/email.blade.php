@extends('layouts.masterlogin')

@section('content')
<div class="login-box animated rotateIn delay-1s">
  <div class="login-logo">
    <a href="admin_lte/index2.html"><b></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please Fill This Email for reset your password</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group has-feedback">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
    <!-- /.social-auth-links -->

    <br/>
    <br/>
    <br/>
  </div>
  <!-- /.login-box-body -->
</div>

@endsection
