<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	<a href="{{ route('admin.dashboard') }}"><img src="{{asset('images/home/logo.png')}}" alt="" /></a>
	<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
		<div class="col user-navbar">
			<ul class="navbar-nav mr-auto float-right">
				<li class="nav-item">
					Logged in as {{ Auth::user()->name  }}
				</li>
				<li>|</li>
				<li class="nav-item">
					{{ date('l, F d, Y') }}
				</li>
				<li>|</li>
				<li class="nav-item">
					<a href={{ route('admin.logout') }}>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>