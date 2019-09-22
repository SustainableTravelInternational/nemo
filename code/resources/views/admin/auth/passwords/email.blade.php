@extends('admin.layouts.guest')

@section('body-class', 'login-page')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="/">{{ config('app.name', 'Mojito') }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{ __('Reset Password') }}</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="{{ __('E-Mail Address') }}"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
        <span class="glyphicon glyphicon-envelope form-control-feedback  @error('email') is-invalid @enderror"></span>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="row justify-content-end">

        <div class="col-xs-4">
            <a href="{{ route('login') }}" class="btn btn-block btn-flat">
                {{ __('Back') }}
            </a>
        </div>
        <!-- /.col -->
        <div class="col-xs-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Send Password Reset Link') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection