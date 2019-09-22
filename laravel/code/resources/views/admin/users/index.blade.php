@extends('admin.layouts.master')

@section('title', 'Users')
@section('title.description', 'all users list')

@section('head')
	<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('buttons')
	<div class="content-header btn-group pull-right">
      <button type="button" class="btn btn-default btn-flat" onclick="javascript:window.location='{{ route('users.create') }}'">{{ __('Add a new user') }}</button>
      {{-- <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('users.create') }}">{{ __('Add a new user') }}</a></li>
      </ul> --}}
    </div>
@endsection

@section('content')

<div class="box">
    <div class="box-body">
    	<table class="table table-bordered table-hover" id="users-table">
	        <thead>
	            <tr>
	                <th>Id</th>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Role</th>
	                <th>Created At</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	    </table>
    </div>
</div>

@endsection

@section('footer')
	<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
		    $('#users-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('users.data') !!}',
		        columns: [
		            { data: 'id', name: 'id' },
		            { data: 'name', name: 'name' },
		            { data: 'email', name: 'email' },
		            { data: 'role', name: 'role' },
		            { data: 'created_at', name: 'created_at' },
		            { data: 'id',
		              name: 'actions',
		              searchable: false,
		              render: function(data) {
		              	return '<a href="users/'+data+'/edit" class="btn"><i class="fa fa-edit"></i></a>' +
		              		'<form name="form'+data+'" action="users/'+data+'" method="POST" class="inline">@csrf @method('DELETE') <a href="javascript:document.form'+data+'.submit()" class="btn"><i class="fa fa-remove"></i></a></form>';
		              }
		        	}
		        ]
		    });
		});
	</script>
@endsection