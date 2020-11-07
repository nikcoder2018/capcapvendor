<header class="stick">
    <div class="logo-menu-sec">
        <div class="container">
            <div class="logo">
                <h1 itemprop="headline">
                    <a href="{{route('home')}}" title="Home" itemprop="url">
                        <img src="{{asset('images/CapCaplogo.png')}}" alt="logo.png" itemprop="image" width="130">
                    </a>
                </h1>
            </div>
            <nav>
                <div class="menu-sec">
                    <ul>
                        <li><a href="{{route('home')}}" itemprop="url"><span></span>HOME</a></li>
                        <li class="menu-item-has-children"><span></span><a href="#" itemprop="url">CATEGORIES</a>
                            @if($AppCategories)
                            <ul class="sub-dropdown">
                                @foreach($AppCategories as $category)
                                    @if(isset($category['childrens']))
                                    <li class="menu-item-has-children"><a href="{{route('category', $category['parent']->slug)}}" title="BLOG" itemprop="url">{{$category['parent']->name}}</a>
                                        <ul class="sub-dropdown">
                                            @foreach($category['childrens'] as $key=>$children)
                                            <li><a href="{{route('category',$children->slug)}}" title="BLOG DETAIL WITH RIGHT SIDEBAR" itemprop="url">{{$children->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else 
                                        <li><a href="{{route('category',$category->slug)}}" title="FOOD DETAIL" itemprop="url">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        <li><a href="{{route('vendors')}}" itemprop="url"><span></span>RESTAURANTS</a></li>
                        
                        <li><a href="{{route('blogs')}}" itemprop="url"><span></span>BLOGS</a></li>
                    </ul>
                    @guest
                        <a class="red-bg brd-rd4" href="{{route('register')}}" itemprop="url">CREATE RESTAURANT</a>
                        <a class="yellow-bg brd-rd4" href="{{route('login')}}" itemprop="url">SELLER LOGIN</a>
                    @endguest

                    @auth
                        <a class="yellow-bg brd-rd4" href="{{route('vendors.dashboard')}}" itemprop="url">MY ACCOUNT</a>
                    @endauth
                </div>
            </nav><!-- Navigation -->
        </div>
    </div><!-- Logo Menu Section -->
</header><!-- Header -->
<div class="responsive-header">
    <div class="responsive-logomenu">
        <div class="logo"><h1 itemprop="headline"><a href="{{route('home')}}" title="Home" itemprop="url"><img src="{{asset('images/CapCaplogo.png')}}"  itemprop="image"></a></h1></div>
        <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
    </div>
    <div class="responsive-menu">
        <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
        <div class="menu-lst">
            <ul>
                <li><a href="{{route('home')}}" itemprop="url"><span></span>HOME</a></li>
                <li class="menu-item-has-children"><span></span><a href="#" itemprop="url">CATEGORIES</a>
                    @if($AppCategories)
                    <ul class="sub-dropdown">
                        @foreach($AppCategories as $category)
                            @if(isset($category['childrens']))
                            <li class="menu-item-has-children"><a href="{{route('category', $category['parent']->slug)}}" title="BLOG" itemprop="url">{{$category['parent']->name}}</a>
                                <ul class="sub-dropdown">
                                    @foreach($category['childrens'] as $key=>$children)
                                    <li><a href="{{route('category',$children->slug)}}" title="BLOG DETAIL WITH RIGHT SIDEBAR" itemprop="url">{{$children->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @else 
                                <li><a href="{{route('category',$category->slug)}}" title="FOOD DETAIL" itemprop="url">{{$category->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li><a href="{{route('vendors')}}" itemprop="url"><span></span>RESTAURANTS</a></li>
                
                <li><a href="{{route('blogs')}}" itemprop="url"><span></span>BLOGS</a></li>
            </ul>
        </div>
        @guest
        <div class="register-btn">
            <a class="red-bg brd-rd4" href="{{route('register')}}" itemprop="url" style="margin-bottom: 10px;">CREATE RESTAURANT</a>
            <a class="yellow-bg brd-rd4" href="{{route('login')}}" itemprop="url">SELLER LOGIN</a>
        </div>
        @endguest

        @auth
        <div class="register-btn">
            <a class="yellow-bg brd-rd4" href="{{route('vendors.dashboard')}}" itemprop="url">MY ACCOUNT</a>
        </div>
        @endauth
        
    </div><!-- Responsive Menu -->
</div><!-- Responsive Header -->
