

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
