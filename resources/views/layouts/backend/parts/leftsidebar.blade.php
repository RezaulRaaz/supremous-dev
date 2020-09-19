   <!-- BEGIN: Main Menu-->
   <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('admin.dashboard')}}">
        <img src="{{logo()}}" style="width:50%;height:40px;margin:0 auto">
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul  class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="@if(Route::is('admin.dashboard')) active @endif nav-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>

            <li class="nav-item has-sub  @if(Route::is('admin.new*')) sidebar-group-active @endif">
                <a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard">Items/Product</span></a>
                <ul class="menu-content">
                    <li class="@if(Route::is('admin.new.item')) active @endif"><a href="{{route('admin.new.item')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">New Item/Product</span></a>
                    </li>
                    <li class="@if(Route::is('admin.new.products')) active @endif"><a href="{{route('admin.new.products')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Products</span></a>
                    </li>
                     <li class="@if(Route::is('admin.new.brands')) active @endif"><a href="{{route('admin.new.brands')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">New Brands</span></a>
                    </li>
                     <li class="@if(Route::is('admin.new.categories')) active @endif"><a href="{{route('admin.new.categories')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Category</span></a>
                    </li>

                    <li class="@if(Route::is('admin.barcode')) active @endif"><a href="{{route('admin.barcode')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Barcode</span></a>
                    </li>

                </ul>
            </li>
            <li class="@if(Route::is('admin.variations')) active @endif"><a href="{{route('admin.variations')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Variations Specifics</span></a></li>
            <li class="@if(Route::is('admin.menu')) active @endif"><a href="{{route('admin.menu')}}"><i class="feather icon-align-left"></i><span class="menu-title" data-i18n="Dashboard">Menu</span></a></li>
            <li class="nav-item has-sub  @if(Route::is('admin.frontend*')) sidebar-group-active @endif">
            <a href="#"><i class="feather icon-sun"></i><span class="menu-title" data-i18n="Dashboard">{{StoreName()}}</span></a>
                <ul class="menu-content">
                    <li class="@if(Route::is('admin.frontend.home')) active @endif"><a href="{{route('admin.frontend.home')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Home Pages</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
