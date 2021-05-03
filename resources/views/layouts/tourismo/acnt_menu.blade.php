
<div class="info-box">

	<img class="uk-border-circle" src="{{ asset('upload/merchant/profilepic')}}/{{ $photo->profilepic == '' ? 'default.png' : $photo->profilepic }}" width="150" height="150" alt="Border pill">
 
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
    <a class="uk-list-a" href="{{ route('subscribe') }}">
      <span uk-icon="user"></span><span class="uk-list-a"></span> 
        Profile
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('subscribe') }}">
      <span uk-icon="calendar"></span><span class="uk-list-a"></span> 
        Booking
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('subscribe') }}">
      <span uk-icon="commenting"></span><span class="uk-list-a"></span> 
        Reviews
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('subscribe') }}">
      <span uk-icon="bookmark"></span><span class="uk-list-a"></span> 
        Bookmark
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('subscribe') }}">
      <span uk-icon="check"></span><span class="uk-list-a"></span> 
        Verification
    </a>
  </li>

  <li class="uk-list-spc">
    <a class="uk-list-a" href="{{ route('subscribe') }}">
      <span uk-icon="cog"></span><span class="uk-list-a"></span> 
        Settings
    </a>
  </li>

</ul>


</div>
</div>
