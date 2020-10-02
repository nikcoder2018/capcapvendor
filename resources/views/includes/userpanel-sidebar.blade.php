<div class="profile-sidebar-inner brd-rd5">
    <div class="user-info red-bg">
        <img class="brd-rd50" src="{{asset('images/resource/user-avatar.jpg')}}" alt="user-avatar.jpg" itemprop="image">
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
        <li class="active"><a href="{{route('vendors.dashboard')}}"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
        <li><a href="{{route('vendors.products.index')}}"><i class="fa fa-file-text"></i> PRODUCTS</a></li>
        <li><a href="#account-settings"><i class="fa fa-cog"></i> ACCOUNT SETTINGS</a></li>
    </ul>
</div>