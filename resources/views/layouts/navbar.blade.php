			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						<li class="nav-item dropdown hidden-caret">
							{{-- <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-language"></i>
							</a> --}}
							{{-- <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="{{ url('switch/en') }}">
												<div class="notif-icon notif-primary"> <i class="fa fa-flag"></i> </div>
												<div class="notif-content">
													<span class="block">
														English
													</span>
												</div>
											</a>
											<a href="{{ url('switch/id') }}">
												<div class="notif-icon notif-danger"> <i class="fa fa-flag"></i> </div>
												<div class="notif-content">
													<span class="block">
														Indonesian
													</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								
							</ul> --}}
						</li>
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('template-dashboard') }}/img/profile.jpg" alt="avatar" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="{{ asset('template-dashboard') }}/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ Auth::user()->name }}</h4>
												<p class="text-muted">{{ Auth::user()->username }}</p>
												<p class="text-muted">{{ Auth::user()->email }}</p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
										
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->