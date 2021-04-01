
<div class="info-box">

	<img class="uk-border-circle" src="{{ asset('upload/merchant/profilepic')}}/{{ $profpic[0]->profilepic == '' ? 'default.png' : $profpic[0]->profilepic }}" width="150" height="150" alt="Border pill">
 
  <h5>
  <div class="js-upload uk-placeholder uk-text-center">
    <div uk-form-custom>
        <input type="file" name="file" id="file">
        <span class="uk-link">Change Pic</span>
    </div>
</div>
</h5>

<div class="info-box-ext">
<ul uk-accordion class="list-group-unbordered mb-3">

<li>
<a class="active uk-accordion-title" href="{{ route('profile-contact') }}"><span uk-icon="home"></span> <span class="uk-list-a"> Merchant</span></a>
<div class="uk-accordion-content">
  <p><a href="{{ route('m-user') }}"><span uk-icon="chevron-right"></span>  Profile</a></p>
  <p><a href="{{ route('profile-contact') }}"><span uk-icon="chevron-right"></span>  Contact</a></p>
  <p><a href="{{ route('profile-address') }}"><span uk-icon="chevron-right"></span> Address</a></p>
  <p><a href="{{ route('profile-address') }}"><span uk-icon="chevron-right"></span> Plan & Re-new</a></p>
</div>
</li>

<li>
<a class="uk-accordion-title" href="#"><span uk-icon="settings"></span> <span class="uk-list-a"> Services</span></a>
<div class="uk-accordion-content">
@foreach($services as $service)
<p><a href="{{ route('service',$service->id) }}"><span uk-icon="play"></span> {{ $service->name }}</a></p>
@endforeach 
</div>
</li>

</ul>

<ul class="uk-list">
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('subscribe') }}"><span uk-icon="bolt"></span><span class="uk-list-a"></span> Review</a></li>
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('subscribe') }}"><span uk-icon="bell"></span><span class="uk-list-a"></span> Subscribe</a></li>
<li class="uk-list-spc"><a class="uk-list-a" href="{{ route('myplan') }}"><span uk-icon="nut"></span><span class="uk-list-a"></span> plan</a></li>
</ul>


</div>
</div>
