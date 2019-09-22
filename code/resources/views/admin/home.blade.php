@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('title.description', '')

@section('content')

<div class="row">
	<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ \App\Models\User::count() }}</h3>

          <p>{{ __('User Registrations') }}</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('users') }}" class="small-box-footer">
          {{ __('More info') }} <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
</div>

@endsection
