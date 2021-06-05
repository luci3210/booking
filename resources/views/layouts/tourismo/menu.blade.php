



<div class="info-box">




<sidebar>
  <div class="brand">
    <a href="#">α</a>
  </div>
  <button class="app-menu__button">
    <div class="app-icon">
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
    </div>
   </button>
  <nav>
    <button class="menu-collapse" type="button" data-toggle="collapse" data-target="#myContent" aria-expanded="false" aria-controls="collapseExample">
      <span class="caret"></span> My Content
    </button>
    <div class="collapse in" id="myContent">
      <ul class="nav">
        <li>
          <a href="#">
            <svg class="lnr lnr-star"><use xlink:href="#lnr-star"></use></svg>
            Favourites
          </a>
        </li>
        <li class="active">
          <a href="#">
            <svg class="lnr lnr-eye"><use xlink:href="#lnr-eye"></use></svg>
            Following
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-tag"><use xlink:href="#lnr-tag"></use></svg>
            Lists
          </a>
        </li>
      </ul>
    </div>
    
    <button class="menu-collapse" type="button" data-toggle="collapse" data-target="#mainContent" aria-expanded="false" aria-controls="collapseExample">
      <span class="caret"></span> Main
    </button>
    <div class="collapse in" id="mainContent">
      <ul class="nav">
        <li>
          <a href="#">
            <svg class="lnr lnr-heart-pulse"><use xlink:href="#lnr-heart-pulse"></use></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-inbox"><use xlink:href="#lnr-inbox"></use></svg>
            Daily Report
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-download"><use xlink:href="#lnr-download"></use></svg>
            Reports
          </a>
        </li>
      </ul>
    </div>
      
    <button class="menu-collapse" type="button" data-toggle="collapse" data-target="#fundNavigation" aria-expanded="false" aria-controls="collapseExample">
      <span class="caret"></span> Fund
    </button>
    <div class="collapse in" id="fundNavigation">
      <ul class="nav">
        <li>
          <a href="#">
            <svg class="lnr lnr-heart-pulse"><use xlink:href="#lnr-heart-pulse"></use></svg>
            Overview
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-chart-bars"><use xlink:href="#lnr-chart-bars"></use></svg>
            Performance
          </a>
        </li>
        <li>
          <a href="#">
            <span>$</span>
            Unit Prices
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-pie-chart"><use xlink:href="#lnr-pie-chart"></use></svg>
            Allocations
          </a>
        </li>
        <li>
          <a href="#">
            <span style="text-transform: lowercase">%</span>
            Attribution
          </a>
        </li>
        <li>
          <a href="#">
            <span style="text-transform: lowercase">&sigma;</span>
            Risk
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-list"><use xlink:href="#lnr-list"></use></svg>
            Holdings
          </a>
        </li>     
      </ul>     
      
    </div>    
  </nav>
</sidebar>

















@if(empty($profile_photo->profilepic))
<img class="uk-border-circle" src="{{ asset('upload/merchant/profilepic/default.png') }}" width="150" height="150" alt="Border pill">
@else
<img class="uk-border-circle" src="{{ asset('upload/merchant/profilepic') }}/{{ $profile_photo->profilepic }}" width="150" height="150" alt="Border pill">
@endif
 
<h5>
  <div class="js-upload uk-placeholder uk-text-center">
    
        <label class="custom-file-upload">
    	   <input type="file" name="file" id="file"/>
    	   <i class="fa fa-cloud-upload"></i> Upload Photo
	     </label>
    
</div>
</h5>





<div class="info-box-ext">

<!-- <div class="vertical-menu">
  <a href="#" class="active vm">Home</a>
  <a href="#" class="vm">Link 1</a>
  <a href="#" class="vm">Link 2</a>
  <a href="#" class="vm">Link 3</a>
  <a href="#" class="vm">Link 4</a>
</div>

 -->
<ul uk-accordion class="list-group-unbordered mb-3">

<li class="uk-list-spc">
  <a class="uk-list-a" href="{{ route('m-user') }}">
    <span uk-icon="home"></span> Merchant
  </a>
</li>


<li class="uk-list-spc">
  <a class="uk-list-a" href="{{ route('m-services') }}">
    <span uk-icon="git-branch"></span> Services
  </a>
</li>


</ul>

<ul class="uk-list">
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('subscribe') }}"><span uk-icon="comments"></span><span class="uk-list-a"></span> Review</a></li>
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('subscribe') }}"><span uk-icon="bell"></span><span class="uk-list-a"></span> Subscribe</a></li>
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('myplan') }}"><span uk-icon="nut"></span><span class="uk-list-a"></span> plan</a></li>
</ul>


</div>
</div>
