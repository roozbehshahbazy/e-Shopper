
<div class="nav-scroller bg-white box-shadow main-menu">
  <nav class="nav nav-underline">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a class="nav-link" href="{{ route('admin.customer') }}">Manage Customers</a>
    <a class="nav-link" href="{{ route('admin.product') }}">Manage Products</a>
    <a class="nav-link" href="{{ route('admin.order') }}">Manage Orders</a>
   @foreach(Auth::user()->roleadmin as $role)
   @if($role->name == 'admin')
   <a class="nav-link" href="{{ route('admin.permission')}}">Manage Permissions</a>
   @endif
   @endforeach 

  </nav>
</div>