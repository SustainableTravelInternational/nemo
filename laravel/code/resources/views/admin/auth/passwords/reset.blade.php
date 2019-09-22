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

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="{{ __('E-Mail Address') }}"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
        <span class="glyphicon glyphicon-envelope form-control-feedback  @error('email') is-invalid @enderror"></span>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>


      <div class="form-group">
        <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}"  name="password" required autocomplete="new-password" />

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="form-group">
        <input type="password" class="form-control  @error('password-confirm') is-invalid @enderror" placeholder="{{ __('Password Confirm') }}"  name="password_confirmation" required autocomplete="new-password" />

        @error('password-confirm')
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
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Reset Password') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
