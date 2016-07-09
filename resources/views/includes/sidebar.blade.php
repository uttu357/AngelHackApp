<div class="col-xs-12 col-md-1 height-full sidebar-container">
	<div class="col-xs-12 sidebar">
		<ul class="sidebar-list">
			@if(Auth::user())
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link active" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">Ongoing Treatment</span>
						</div>	
					</a>
				</li>
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">Medical History</span>
						</div>	
					</a>
				</li>
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">Family</span>
						</div>	
					</a>
				</li>
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">My Profile</span>
						</div>	
					</a>
				</li>
			@else
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link active" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">Ongoing Treatment</span>
						</div>	
					</a>
				</li>
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">Medical History</span>
						</div>	
					</a>
				</li>
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">Family</span>
						</div>	
					</a>
				</li>
				<li class="sidebar-list-item">
					<a class="sidebar-list-item-link" href="">
						<div class="row">	
							<i class="col-xs-2 fa fa-users sidebar-list-item-icon"></i>
							<span class="col-xs-9 sidebar-list-item-desc">My Profile</span>
						</div>	
					</a>
				</li>
			@endif
		</ul>
	</div>
</div>