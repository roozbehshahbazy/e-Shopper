<!DOCTYPE html>
<html lang="en">
	@include('partials/_head')
	<body>
		@include('partials/_authnav')
		@include('partials/_notifications')
		@yield('content')
		@include('partials/_footer')
		@include('partials/_javascript')
	</body>
</html>