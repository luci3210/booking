<!-- need to remove -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
	<a href="{{ route('product') }}" class="nav-link">
	  <i class="nav-icon fas fa-th"></i>
	  <p>
	    Product
	    <span class="right badge badge-danger">New</span>
	  </p>
	</a>
</li>

<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
	  <i class="nav-icon fas fa-copy"></i>
	  <p>
	    Layout Options
	    <i class="fas fa-angle-left right"></i>
	    <span class="badge badge-info right">6</span>
	  </p>
	</a>
<ul class="nav nav-treeview">
  
  <li class="nav-item">
    <a href="pages/layout/top-nav.html" class="nav-link">
      <i class="far fa-circle nav-icon"></i>
      <p>Top Navigation</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
      <i class="far fa-circle nav-icon"></i>
      <p>Top Navigation + Sidebar</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="pages/layout/boxed.html" class="nav-link">
      <i class="far fa-circle nav-icon"></i>
      <p>Boxed</p>
    </a>
  </li>

</ul>
</li>
          