<!doctype html>
<html lang="en">
@section('title', 'e-Shopper | Dashboard')
  @include('admin/partials/_head')
      @include('admin/partials/_javascript')
  <body class="bg-light">
    @include('admin/partials/_nav')
    @include('admin/partials/_menu')
    <main role="main" class="container">
     {{--  <div class="main-color d-flex align-items-center p-3 my-3 text-white-50 rounded box-shadow"> --}}
      <div class="main-color p-3 my-3 rounded box-shadow text-white-50">
        <a href="{{ route('admin.createuser') }}" class="btn-create-user btn btn-primary">Add New User</a>  
        <div class="lh-100">
           <h2 class="mb-0 text-white lh-100"><i class="fas fa-cogs"></i> Permissions</h2>
        </div> 
      </div>
      {!! $grid !!}
      <script>
         $("#users-grid tr").click(function(){
           window.location = $(this).data('href');
         });
              </script>
    </main>
    @include('admin/partials/_footer')
  </body>
</html>