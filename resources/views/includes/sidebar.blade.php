@php
	$sidebarClass = (!empty($sidebarTransparent)) ? 'sidebar-transparent' : '';
@endphp
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar {{ $sidebarClass }}">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<img src="{{$avatar}}" alt="" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						{{ $full_name }}
						<small>{{ $position }}</small>
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

			@foreach($modulesAccess as $module)
				@if(count($module->moduleRibbon) > 0)

					<li class="has-sub  {{ (isset($module->active) && ($module->active) === 1) ? ' active' : '' }}">
						<a href="javascript:;">
							<b class="caret pull-right"></b>
							<i class="fa {{ !empty($module->font_awesome) ? $module->font_awesome : '' }}"></i>
							<span>{{ $module->name }}</span>
						</a>
						<ul class="sub-menu">
							@foreach($module->moduleRibbon as $ribbon)
								@if ($ribbon->active === 1)
									<li class="{{ (isset($ribbon->active) && ($ribbon->active) === 1) ? ' active' : '' }}">
										<a href="/{{ $ribbon->ribbon_path }}">{{ $ribbon->ribbon_name }}</a></li>
								@endif
							@endforeach
						</ul>
					</li>
			@endif
		@endforeach
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

