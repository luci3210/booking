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
  <a href="{{ route('get_posting_request',$url) }}" class="nav-link">
    <i class="nav-icon fas fa-clipboard"  aria-hidden="true"></i>
      <p>
        Posting Request  
      </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ route('merchant_verification') }}" class="nav-link">
    <i class="nav-icon fas fa-user-check"  aria-hidden="true"></i>
      <p>
        Verification Request  
      </p>
  </a>
</li>


<li class="nav-item">
  <a href="{{ route('manage_bank',$url) }}" class="nav-link">
    <i class="nav-icon fas fa-university" aria-hidden=true></i>
      <p>
        Manage Bank  
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
          