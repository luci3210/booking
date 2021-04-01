<!-- need to remove -->
<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
	<a href="{{ route('product') }}" class="nav-link">
	  <i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i>
    	  <p>
	    Services
	  </p>
	</a>
</li>


<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
	  <i class="nav-icon fa fa-get-pocket" aria-hidden="true"></i>
    <!-- <i class="fa fa-get-pocket" aria-hidden="true"></i> -->
	  <p>
	    Plan & Package
	    <i class="fas fa-angle-left right"></i>
	  </p>
	</a>
<ul class="nav nav-treeview">

  <li class="nav-item">
    <a href="{{ route('plan') }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>Plan</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('planpackage') }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>Package</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('planpackage') }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>Service Settings</p>
    </a>
  </li>

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
  <a href="{{ route('product') }}" class="nav-link">
    <i class="nav-icon fa fa-database" aria-hidden="true"></i>
        <p>
      System Log
    </p>
  </a>
</li>
          