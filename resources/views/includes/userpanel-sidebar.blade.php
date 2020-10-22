<div class="profile-sidebar-inner brd-rd5">
    <div class="user-info red-bg">
        @php $my = App\User::where('id', auth()->user()->id)->with('profile')->first(); @endphp
        @if($my->profile != null)
            @if($my->profile->avatar != null)
                <img class="brd-rd50" src="{{Storage::disk('admin')->url($my->profile->avatar)}}" itemprop="image" width="76" height="76">
            @else 
                <img class="brd-rd50" src="{{asset('images/resource/user-avatar.jpg')}}" itemprop="image">
            @endif
        @else 
            <img class="brd-rd50" src="{{asset('images/resource/user-avatar.jpg')}}" itemprop="image">
        @endif
        
        <div class="user-info-inner">
            <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{auth()->user()->vendor_name}}</a></h5>
            <span><a href="#" title="" itemprop="url">{{auth()->user()->email}}</a></span>
            <a class="brd-rd3 sign-out-btn yellow-bg" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" itemprop="url"><i class="fa fa-sign-out"></i> SIGN OUT</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
        </div>
    </div>
    <ul class="nav">
        <li class="{{ Request::segment(2) === 'dashboard' ?  'active' : null }}"><a href="{{route('vendors.dashboard')}}"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
        <li class="{{ Request::segment(2) === 'profile' ?  'active' : null }}"><a href="{{route('vendors.profile')}}"><i class="fa fa-user"></i> PROFILE</a></li>
        <li class="{{ Request::segment(2) === 'products' ?  'active' : null }}"><a href="{{route('vendors.products.index')}}"><i class="fa fa-file-text"></i> PRODUCTS</a></li>
        <li class="{{ Request::segment(2) === 'settings' ?  'active' : null }}"><a href="#account-settings"><i class="fa fa-cog"></i> ACCOUNT SETTINGS</a></li>
    </ul>
</div>