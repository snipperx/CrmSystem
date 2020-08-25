<?php $__env->startSection('title', 'Page without Sidebar'); ?>

<?php $__env->startSection('content'); ?>
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
		<li class="breadcrumb-item active">Page without Sidebar</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Page without Sidebar <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
			<h4 class="panel-title">Panel Title here</h4>
		</div>
		<div class="panel-body">
			<p>
				Panel Content Here
			</p>
		</div>
	</div>
	<!-- end panel -->
	<p>
		<a href="javascript:history.back(-1);" class="btn btn-success">
			<i class="fa fa-arrow-circle-left"></i> Back to previous page
		</a>
	</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', ['sidebarHide' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>