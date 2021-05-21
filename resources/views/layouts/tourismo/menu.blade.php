



<div class="info-box">

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

<li class="marg_menu">
<a class="active uk-accordion-title" href="{{ route('profile-contact') }}"><span uk-icon="home"></span> <span class="uk-list-a"> Merchant</span></a>
<div class="uk-accordion-content">
  <p><a href="{{ route('m-user') }}" class="uk-link"><span uk-icon="check"></span>  Profile</a></p>
  <p><a href="{{ route('profile-contact') }}" class="uk-link"><span uk-icon="check"></span>  Contact</a></p>
  <p><a href="{{ route('profile-address') }}" class="uk-link"><span uk-icon="check"></span> Address</a></p>
  <p><a href="{{ route('profile-address') }}" class="uk-link"><span uk-icon="check"></span> Plan & Re-new</a></p>
</div>
</li>

<li class="marg_menu mm_mrg">
<a class="uk-accordion-title" href="#"><span uk-icon="album"></span> <span class="uk-list-a"> Services</span></a>
	<div class="uk-accordion-content">
	@foreach($services as $service)
	<p><a href="{{ route('service',$service->id) }}" class="uk-link"><span uk-icon="check"></span> {{ $service->name }}</a></p>
	@endforeach 
	</div>
</li>


<li class="marg_menu mm_mrg">
<a class="uk-accordion-title" href="#"><span uk-icon="album"></span> <span class="uk-list-a"> Booking</span></a>
  <div class="uk-accordion-content">
    <p><a href="{{ route('merchant_booked') }}" class="uk-link"><span uk-icon="check">Booked</span></a></p>
    <p><a href="#" class="uk-link"><span uk-icon="check"></span></a></p>
  </div>
</li>


</ul>

<ul class="uk-list">
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('subscribe') }}"><span uk-icon="comments"></span><span class="uk-list-a"></span> Review</a></li>
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('subscribe') }}"><span uk-icon="bell"></span><span class="uk-list-a"></span> Subscribe</a></li>
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('myplan') }}"><span uk-icon="nut"></span><span class="uk-list-a"></span> plan</a></li>
</ul>


</div>
</div>
