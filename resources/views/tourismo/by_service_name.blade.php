@extends('layouts.tourismo.ui', 
['keywords'=> $byname[0]->tour_name,
'img' => asset( 'image/tour/2021/'.$byphotos[0]->photo),
'description' => trim( $byname[0]->tour_expect. ' ' . $byname[0]->tour_desc. ' ' . $byname[0]->roomdesc),
'curUrl'=> route('by_name',[$byname[0]->description,$byname[0]->country,$byname[0]->district,$byname[0]->tour_name])
])
<!-- meta tags  -->

@section('content')

<style type="text/css">
  .text-price {
    color:#ff2f00 !important;
    font-size: 12px !important;
    font-weight: 700 !important;
 }
  .text-price .currency-symbol {
    font-size: 14px;
    display: inline-block !important;

  }
  .mem-title {
    text-transform: capitalize;
  }
  .services {
    margin-top: -10px !important;
  }
  .merchant-profile {
    margin-top: -30px !important;
  }
  .uk-panel {
    height: 200px;
  }
  .uk-panel img {
    height: 200px;
    width: 100%;
  }
  .pointer img {
    height: 50px;
    width: 50px;
  }
  .uk-modal-body {
    border-radius: 4px;
  }

  .rating {
   width: 180px;
}

.rating__star-comment {
   cursor: pointer;
   color: #dabd18b2;
}
.rating__star {
   cursor: pointer;
   color: #dabd18b2;
}


a.page-link {
    color: black!important;
}


.error-msg{
  position: fixed;
  z-index: 999;
  top: 0;
  right: 0;
}


.uk-button-small
{
  background-color: #502672 !important;
  border-radius: 3px !important;
  color: #fff !important;
  border:none !important;
  text-transform: capitalize !important;
  font-weight: 800 !important;
  font-size: 12px !important;
}

.uk-button-small:hover
{
  background-color: #2c0d45 !important;
  border-radius: 3px !important;
  border:none;
  color: #fff !important;
  text-transform: capitalize !important;
  font-weight: 800 !important;
  font-size: 12px !important;
}
.comment-text{
  font-size: .9em;
}

.avatar-border-round{
  border-radius: 50%;
}
</style>

<section class="services team aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" style="margin-top: 35px !important;">
  <div class="container">
    <div class="row">

<div class="col-md-7">
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 5:3;animation: push">

    <ul class="uk-slideshow-items">
        @foreach($byphotos as $list)
        <li>
            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                <img src="/image/tour/2021/{{ $list->photo == '' ? 'default.png' : $list->photo }}" alt="" uk-cover>
            </div>
        </li>
        @endforeach
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>
</div>

<div class="col-6 col-md-5">
  <h3>{{ $byname[0]->tour_name }}</h3>
  <p style="margin-top: -19px;font-size: 12px;"><i class="fas fa-building"></i> 
    {{ $byname[0]->company }}</p>
  
  <p style="margin-top: -19px;font-size: 12px;"><i class="fas fa-map-marker-alt"></i> 
    {{ $byname[0]->address }}
  </p>
  <p style="margin-top: -15px;font-size: 12px;"><i class="fas fa-star"></i> | 0 Reviews | 0 Book</p>



  @if($byname[0]->description == 'hotel_and_resort')
  
  <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
      No. of night :{{ $byname[0]->nonight }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-eye"></i>
      View: {{ $byname[0]->viewdeck }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
      Max guest: {{ $byname[0]->noguest }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-person-booth"></i>
      Room size: {{ $byname[0]->roomsize }}
  </p>

  @elseif($byname[0]->description == 'tour_operator')

  <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
      No. of night :{{ $byname[0]->nonight }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
      Max guest: {{ $byname[0]->noguest }}
  </p>

  @elseif($byname[0]->description == 'exclusive')

  <p style="margin-top: -5px;font-size: 14px;"><i class="fas fa-cloud-moon"></i>
      No. of night :{{ $byname[0]->nonight }}
  </p>
  <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-user-tie"></i>
      Max guest: {{ $byname[0]->noguest }}
  </p>
  
  @else
    <p style="margin-top: -18px;font-size: 14px;"><i class="fas fa-person-booth"></i>
      Category is not exist.
  </p>
  @endif

  
<div style="height:60px;width:100%; background-color:#f4f4f4; padding: 12px 10px 5px;">
<p  style="font-size:23px;font-weight:700;color:#f7442e">₱ {{ $byname[0]->price }}</p>
</div>
  <p style="margin-top: 8px; margin-bottom: 10px;font-size:13px;">
    {{ $byname[0]->name }} » {{ $byname[0]->country }} » {{ $byname[0]->district }}
  </p>
@if(Auth::check())
   @auth
    <a href="{{ route('book',[$byname[0]->description,$byname[0]->country,$byname[0]->district,$byname[0]->tour_name]) }}" class="btn btn-block btn-warning btn-flat">Book Now</a>
    @endauth
@else
<a href="javascript:void(0)" uk-toggle="target: #login" class="btn btn-block btn-warning btn-flat">Book Now</a>
@endif
<button type="button" class="btn btn-block btn-primary btn-flat" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#global-share"  onclick="openShare('{{$byname[0]}}')" >Share</button>

</div>



<div class="col-7">

@if($byname[0]->description == 'hotel_and_resort')

  <div class="card-body">

  <strong>Room Description</strong>

  <p class="text-muted" style="font-size: 14px;">
      {{ $byname[0]->roomdesc }}
  </p>

  <hr>

  <strong>Room Facilities</strong>

  <p class="text-muted">
    @foreach(explode(',', $byname[0]->room_facilities) as $list)
      <li style="font-size: 14px; margin-left:15px;">{{ $list }}</li>
    @endforeach
  </p>

  <hr>

  <strong>Building Facilities</strong>
    <p class="text-muted">
      @foreach(explode(',', $byname[0]->building_facilities) as $list)
        <li style="font-size: 14px; margin-left:15px;">{{ $list }}</li>
      @endforeach
    </p>
  
  <hr>

  <strong>Package</strong>
    <p class="text-muted">
      @foreach(explode(',', $byname[0]->booking_package) as $list)
        <li style="font-size: 14px; margin-left:15px;">{{ $list }}</li>
      @endforeach
    </p>
  

  </div>

@elseif($byname[0]->description == 'tour_operator')

  <div class="card-body">
    
  <strong>Tour Package about</strong>

  <p class="text-muted" style="font-size: 14px;">
      {{ $byname[0]->tour_desc }}
  </p>

  <hr>

  <strong>What to expect</strong>

  <p class="text-muted">
    {{ $byname[0]->tour_expect }}
  </p>

  <hr>

  <strong>Cancelation and Refund Policy</strong>
    <p class="text-muted">
    </p>
  
  <hr>

  </div>

  
@elseif($byname[0]->description == 'exclusive')
  
  <div class="card-body">
    
  <strong>Tour Package about</strong>

  <p class="text-muted" style="font-size: 14px;">
      {{ $byname[0]->tour_desc }}
  </p>

  <hr>

  <strong>What to expect</strong>

  <p class="text-muted">
    {{ $byname[0]->tour_expect }}
  </p>

  <hr>

  <strong>Cancelation and Refund Policy</strong>
    <p class="text-muted">
    </p>
  
  <hr>

  </div>


@else

  @endif


</div>


<div class="col-5">

  <div class="card-body">

  <strong>More Details</strong>

  <p class="text-muted" style="font-size: 14px;">
      {{ $byname[0]->about }}
  </p>


  <strong>Reviews</strong>
  <br>
  <br>

    @if(Auth::check())
      <form method="post" action="{{route('service_tour_review')}}" role="form">
      @csrf
        <fieldset class="uk-fieldset">
          <div class="uk-margin">
              <textarea class="uk-textarea" id="comment-textarea"  name="pr_review" rows="3"  placeholder="Your comment here"></textarea>
          </div>
          <div class="uk-margin" style="margin: -15px  0 1px !important;">
          <div class="rating">
              <input class="" id="reviews-rating" name="pr_ratings" type="number" hidden />
              <input name="pr_page_id" value="{{ $byname[0]->st_id }}" rows="5" type="number" hidden readonly/>
                <i class="rating__star-comment far fa-star" style="font-size:14px"></i>
                <i class="rating__star-comment far fa-star" style="font-size:14px"></i>
                <i class="rating__star-comment far fa-star" style="font-size:14px"></i>
                <i class="rating__star-comment far fa-star" style="font-size:14px"></i>
                <i class="rating__star-comment far fa-star" style="font-size:14px"></i>
          </div>
          <p class='text-danger error-ratings' style="font-size: 12px; margin: -1px  0 3px;">Ratings is required</p>
          </div>
            @auth
            <button type="button" onclick="submitReview() " class="comment-btn uk-button uk-button-small">Submit</button>
            <button type="submit" id="btn-review" class="comment-btn d-none uk-button uk-button-small" hidden>Submit</button>

            @endauth
            <!-- @if(!Auth::check())
          <a href="javascript:void(0)" uk-toggle="target: #checklogin" class="comment-btn uk-button uk-button-small">Submit</a>
            @endif -->


          <p>Comments</p>
        </fieldset>
      </form>
    @endif


 @if($reviewsData)
  @if(count($reviewsData) >= 1)
  <div class="row">
    @foreach($reviewsData as $data)

      <article class="uk-comment col-md-12 col-sm-12">
          <header class="uk-comment-header">
              <div class="uk-grid-medium uk-flex-middle" uk-grid>
    
    <div class="uk-width-auto avatar-holder">
      <img src="/upload/merchant/profilepic/{{ $data->profpic == '' ? 'default.png' : $data->profpic }}" width="40" height="40" alt="">
    </div>
    
    <div class="uk-width-expand">
      <p class="uk-comment-title uk-margin-remove" style="font-size:14px;">
        <a class="uk-link-reset" href="#" >by. {{ substr($data->name, 0, 5) }}...</a>
      </p>

      <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top" >
          <li>
            <a href="#" style="color:black!important; font-size:12px">
              {{ date("F j, Y, g:i a",strtotime($data->pr_created_at)) }}
            </a>
          </li>
          <li>
            <div class="rating"  style="font-size:12px;">
              @for($x = 1; $x <= $data->pr_ratings; $x++)
                <i class="rating__star fas fa-star"></i>
              @endfor
              @for($x = 1; $x <=  (5-$data->pr_ratings); $x++)
              <i class="rating__star far fa-star"></i>
              @endfor
            </div>
          
          </li>
      </ul>

    </div>


</div>

    </header>
    <div class="uk-comment-body">
        <p class="comment-text" style="font-size:14px;">
          @if(!empty($data->pr_review))
            {{$data->pr_review}}
          @else
            no review
          @endif
        </p>
    </div>
    <hr class="mt-1">
</article>
            <!-- /. article -->
          <!-- </li> -->
          @endforeach
        </div>
        <ul class="pagination pagination-sm m-0 float-left">
            {{$reviewsData->links() }}
        </ul>
      <!-- /.ul -->
        @else
        <h3>no reviews</h3>
        @endif
      @endif
      @if(!$reviewsData)
      <h3>something went wrong</h3>
      @endif







  </div>
</div>









</div>


    </div>
  </div>
</section>

@endsection

@section('js')

<script type="text/javascript">

const ratingStars=[...document.getElementsByClassName("rating__star-comment")];let ratingReview=0;function executeRating(t){const e=t.length;let a;t.map(n=>{n.onclick=(()=>{if(a=t.indexOf(n),"rating__star-comment far fa-star "===n.className)for(;a>=0;--a)t[a].className="rating__star-comment fas fa-star count-star";else for(;a<e;++a)t[a].className="rating__star-comment far fa-star ";ratingReview=$(".count-star").length;var r=$("#comment-textarea").val();$("#reviews-rating").val(parseInt(ratingReview)),ratingReview>=1||r.length>=1?$(".comment-btn").show(500):$(".comment-btn").hide(500)})})}function submitReview(){ratingReview>=1?$("#btn-review").click():$(".error-ratings").show()}executeRating(ratingStars),window.localStorage.removeItem("bookData");


$(document).ready(function(){$(".error-ratings").hide(),$(".comment-btn").hide(),$("#comment-textarea").on("focus",function(t){$(".comment-btn").show(500)}),$("#comment-textarea").on("blur",function(t){var e=$("#comment-textarea").val();ratingReview=$(".count-star").length,e.length>=1||ratingReview>=1||$(".comment-btn").hide(500)})});

</script>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=2142027805833973&autoLogAppEvents=1" nonce="uUSyMk8o"></script>
@endsection
