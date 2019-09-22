@extends('admin.layouts.master')

@section('title', 'Users')
@section('title.description', 'Create a new user')

@section('head')

@endsection

@section('content')

<div class="box box-primary">
	<!-- form start -->
	<form role="form" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
	  <div class="box-body">
	  	<div class="row">
	  		<div class="col-xs-6">
	  			<div class="form-group">
			      <label for="name">{{ __('Name') }}</label>
			      <input type="text" class="form-control" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name') }}">
			    </div>
			    <div class="form-group">
			      <label for="email">{{ __('Email address') }}</label>
			      <input type="email" class="form-control" name="email" placeholder="{{ __('Enter email address') }}" value="{{ old('email') }}">
			    </div>
			    <div class="form-group">
			      <label for="password">{{ __('Password') }}</label>
			      <input type="password" class="form-control" name="password" placeholder="{{ __('Enter password') }}">
			    </div>
			    <div class="form-group">
			      <label for="password_confirmation">{{ __('Password Confirmation') }}</label>
			      <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Enter password Confirmation') }}">
			    </div>
			    <div class="row">
			    	<div class="col-xs-3">
			    		<div class="form-group">
				    		<label>{{ __('User role:') }}</label>
				    	</div>
			    	</div>
			    	<div class="col-xs-9">
					    <div class="form-group">
					    @can('createSuperAdmin', App\User::class)
				          <div class="radio">
				            <label>
				              <input type="radio" name="role" value="superadmin" {{ old('role') == 'superadmin' ? "checked" : ""}}>
				              {{ __('Super Admin') }}
				            </label>
				          </div>
						@endcan
					    @can('createAdmin', App\User::class)
				          <div class="radio">
				            <label>
				              <input type="radio" name="role" value="admin" {{ old('role') == 'admin' ? "checked" : ""}}>
				              {{ __('Admin') }}
				            </label>
				          </div>
				          <div class="radio">
				            <label>
				              <input type="radio" name="role" value="general" {{ old('role') == 'general' || old('role') == '' ? "checked" : ""}}>
				              {{ __('General') }}
				            </label>
				          </div>
						@endcan
				        </div>
					</div>
			    </div>
			</div>
	  		<div class="col-xs-6">
	  			<div class="form-group">
				    <label for="profile_picture">{{ __('Your Profile Picture') }}</label>
	    			<div class="user-header text-center">
		            	<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	              	</div>
	  			</div>
	  			<div class="form-group">
				      <input type="file" class="form-control" name="profile_photo" placeholder="{{ __('Upload your profile picture') }}">
		    	</div>
	  		</div>
	  	</div>

	  <!-- /.box-body -->

	  <div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
</div>

@endsection

@section('footer')

@endsection