@extends('layouts.masterlogin')

@section('content')
<div class="login-box animated rotateIn delay-1s">
  <div class="login-logo">
    <a href="admin_lte/index2.html"></b></a>
  </div>
  <!-- /.login-logo -->
    <div class="login-box-body">
            <div class="card">
                <p class="login-box-msg">{{ __('Reset Password') }}</p>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <inp ut type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group  has-feedback">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group  has-feedback">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="New password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group  has-feedback">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        <div class="form-group  has-feedback mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
