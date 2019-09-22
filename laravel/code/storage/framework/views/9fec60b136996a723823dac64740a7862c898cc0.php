<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('title.description', 'all users list'); ?>

<?php $__env->startSection('head'); ?>
	<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('buttons'); ?>
	<div class="content-header btn-group pull-right">
      <button type="button" class="btn btn-default btn-flat" onclick="javascript:window.location='<?php echo e(route('users.create')); ?>'"><?php echo e(__('Add a new user')); ?></button>
      
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
		    $('#users-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '<?php echo route('users.data'); ?>',
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
		              		'<form name="form'+data+'" action="users/'+data+'" method="POST" class="inline"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?> <a href="javascript:document.form'+data+'.submit()" class="btn"><i class="fa fa-remove"></i></a></form>';
		              }
		        	}
		        ]
		    });
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel/resources/views/admin/users/index.blade.php ENDPATH**/ ?>