<style>
    .uk-breadcrumb> ul > li>a {
        color: gray!important
    }
</style>

<div uk-grid>
    <div class="uk-inline uk-width-1-1">
        <button class="uk-button uk-button-default uk-width-1-1" type="button"> <span uk-icon="cog"></span> Settings</button>
        <div class="uk-width-1-1" uk-dropdown>
            <ul class="uk-nav uk-dropdown-nav">
                <li><a href="{{ route('accnt_profile') }}"><span uk-icon="user"></span>Profile</a></li>
                <li><a href="{{ route('booking_index', ['service'=> 'service', 'payment'=> 'payment', 'status'=> 'status' ] )}}"><span uk-icon="calendar"></span>Booking</a></li>
                <li><a href="{{ route('reviews_index',['service'=> 'service','status'=> 'status' ] ) }}"><span uk-icon="commenting"></span>Reviews</a></li>
                <li><a href="{{ route('wishlist_index') }}"><span uk-icon="heart"></span>Wishlist</a></li>
            </ul>
        </div>
    </div>

</div>