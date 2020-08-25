<?php
	$sidebarClass = (!empty($sidebarTransparent)) ? 'sidebar-transparent' : '';
?>
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar <?php echo e($sidebarClass); ?>">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<img src="<?php echo e($avatar); ?>" alt="" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						<?php echo e($full_name); ?>

						<small><?php echo e($position); ?></small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
					<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
					<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
				</ul>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Navigation</li>

			<?php $__currentLoopData = $modulesAccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(count($module->moduleRibbon) > 0): ?>

					<li class="has-sub  <?php echo e((isset($module->active) && ($module->active) === 1) ? ' active' : ''); ?>">
						<a href="javascript:;">
							<b class="caret pull-right"></b>
							<i class="fa <?php echo e(!empty($module->font_awesome) ? $module->font_awesome : ''); ?>"></i>
							<span><?php echo e($module->name); ?></span>
						</a>
						<ul class="sub-menu">
							<?php $__currentLoopData = $module->moduleRibbon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ribbon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($ribbon->active === 1): ?>
									<li class="<?php echo e((isset($ribbon->active) && ($ribbon->active) === 1) ? ' active' : ''); ?>">
										<a href="/<?php echo e($ribbon->ribbon_path); ?>"><?php echo e($ribbon->ribbon_name); ?></a></li>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</li>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

