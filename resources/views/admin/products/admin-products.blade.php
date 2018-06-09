<!doctype html>
<html lang="en">
@section('title', 'e-Shopper | Products')
  @include('admin/partials/_head')
  <body class="bg-light">
    @include('admin/partials/_nav')
    @include('admin/partials/_menu')
    <main role="main" class="container">
      <div class="main-color d-flex align-items-center p-3 my-3 text-white-50 rounded box-shadow">
        <div class="lh-100">
          <h2 class="mb-0 text-white lh-100"><i class="fas fa-cogs"></i> Products</h2>
        </div>
      </div>
    </main>
    @include('admin/partials/_javascript')
    @include('admin/partials/_footer')
  </body>
</html>