<!DOCTYPE html>
<html lang="en">

@include('partials/_head')

<body>

@include('partials/_nav')

@include('partials/_accsidebar')


@yield('content')


@include('partials/_footer')
    
@include('partials/_javascript')

</body>
</html>