
<div class="info-box">
	<img class="uk-border-circle" src="{{ asset('upload/merchant/profilepic')}}/{{ $profilePic != null ? $profilePic: 'default.png' }}" width="150" height="150" alt="Border pill">
<h5>
  <div class="js-upload uk-placeholder uk-text-center">
      <label class="custom-file-upload">
    	<input type="file" name="file" id="file"/>
    	<i class="fa fa-cloud-upload"></i> Upload Photo
	</label>
    
</div>

</h5>

<div class="info-box-ext">

<ul class="uk-list">
  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('accnt_profile') }}">
      <span uk-icon="user"></span><span class="uk-list-a"></span> 
        Profile
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('booking_index', ['service'=> 'service', 'payment'=> 'payment', 'status'=> 'status' ] )}}">
      <span uk-icon="calendar"></span><span class="uk-list-a"></span> 
        Booking
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('reviews_index',['service'=> 'service','status'=> 'status' ] ) }}">
      <span uk-icon="commenting"></span><span class="uk-list-a"></span> 
        Reviews
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('wishlist_index') }}">
      <span uk-icon="heart"></span><span class="uk-list-a"></span> 
        Wishlist
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{route('show_resend_email', '?data='.base64_encode($data['data']['account'][0]->email))}}">
      <span uk-icon="check"></span><span class="uk-list-a"></span> 
        Verification
    </a>
  </li>

  <!-- <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('subscribe') }}">
      <span uk-icon="cog"></span><span class="uk-list-a"></span> 
        Settings
    </a>
  </li> -->

</ul>


</div>
</div>
