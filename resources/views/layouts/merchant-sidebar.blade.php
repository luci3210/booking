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
    <a href="{{ route('profile_index') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Merchant Account</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('profile_index') }}" class="nav-link">
      <i class="nav-icon far fa-address-card aria-hidden="true""></i>
          <p>
        Profile
      </p>
    </a>
</li>


<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-box-open" aria-hidden="true"></i>
      <p>
        Post Services
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
<ul class="nav nav-treeview">

  @foreach($service_list as $service)

  <li class="nav-item">
    <a href="{{ route('service_listing',$service->description) }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>{{ $service->name }}</p>
    </a>
  </li>

  @endforeach

</ul>

</li>

<li class="nav-item">
  <a href="{{ route('service_listing',$service_exlusive->description) }}" class="nav-link">
    <i class="nav-icon fas fa-border-all" aria-hidden="true"></i>
        <p>
          Post Exlusive
        </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ route('booking-index', ['service'=> 'service', 'payment'=> 'payment', 'status'=> 'status','refid'=>'refid' ] ) }}" class="nav-link">
    <i class="nav-icon fas fa-book-reader" aria-hidden="true"></i>
        <p>
      Booking
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="" class="nav-link">
    <i class="nav-icon far fa-star" aria-hidden="true" ></i>
        <p>
      Manage Reviews
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="" class="nav-link">
    <i class="nav-icon fas fa-clipboard-check" aria-hidden="true"></i>
        <p>
      Manage Wishlist
    </p>
  </a>
</li>






<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-wallet" aria-hidden="true"></i>
      <p>
        Finance
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
<ul class="nav nav-treeview">

  <li class="nav-item">
    <a href="{{route('income_index')}}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>My Income</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('mybalance') }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>My Balance</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('bank') }}" class="nav-link">
      <i class="far fa fa-circle-o nav-icon" aria-hidden="true"></i>
      <p>Bank Account</p>
    </a>
  </li>

</ul>

</li>








<li class="nav-item">
  <a href="{{ route('banner_form') }}" class="nav-link">
    <i class="nav-icon fa fa-database" aria-hidden="true"></i>
      <p>
        Manage Ads  
      </p>
  </a>
</li>


          
            </ul>
        </nav>
    </div>

</aside>
