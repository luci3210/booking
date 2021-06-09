<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('image/logo/logo.png') }}" 
             alt="AdminLTE Logo">
        <!-- <span class="brand-text font-weight-light">{{ config('app.name') }}</span> -->
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Merchant Account</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('product') }}" class="nav-link">
      <i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i>
          <p>
        Profile
      </p>
    </a>
</li>


<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i>
      <p>
        Services
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
<ul class="nav nav-treeview">

  @foreach($service_list as $service)

  <li class="nav-item">
    <a href="{{ $service->name }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>{{ $service->name }}</p>
    </a>
  </li>

  @endforeach

</ul>
</li>


<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i>
    <!-- <i class="fa fa-get-pocket" aria-hidden="true"></i> -->
    <p>
      Inclusions
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
<ul class="nav nav-treeview">

@foreach($services as $service)
  <li class="nav-item">
    <a href="{{ route('inclusion',$service->id) }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>{{ $service->name }}</p>
    </a>
  </li>
@endforeach
</ul>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i>
    <!-- <i class="fa fa-get-pocket" aria-hidden="true"></i> -->
    <p>
      Manage Location
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
<ul class="nav nav-treeview">

@foreach($menu_location as $location)
  <li class="nav-item">
    <a href="{{ route('locations',$location->id) }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>{{ $location->name }}</p>
    </a>
  </li>
@endforeach


</ul>
</li>

<li class="nav-item">
  <a href="{{ route('destination_addnew') }}" class="nav-link">
    <i class="nav-icon fa fa-database" aria-hidden="true"></i>
        <p>
      Manage Destination
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ route('update_form') }}" class="nav-link">
    <i class="nav-icon fa fa-database" aria-hidden="true"></i>
        <p>
      Manage Exlusive
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ route('banner_form') }}" class="nav-link">
    <i class="nav-icon fa fa-database" aria-hidden="true"></i>
      <p>
        Manage Banner  
      </p>
  </a>
</li>




<li class="nav-item">
  <a href="{{ route('product') }}" class="nav-link">
    <i class="nav-icon fa fa-database" aria-hidden="true"></i>
        <p>
      System Log
    </p>
  </a>
</li>
          
            </ul>
        </nav>
    </div>

</aside>
