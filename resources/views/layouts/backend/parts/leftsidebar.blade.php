<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('admin.dashboard')}}"><img src="{{asset('backend/assets/images/icon/logo.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="@if(Route::is('admin.dashboard')) active @endif">
                        <a href="{{route('admin.dashboard')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>
                    <li class="
                        @if(Route::is('admin.new*')) active @endif
                     ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cart-arrow-down"></i><span>Items/Product</span></a>
                        <ul class="collapse
                            @if(Route::is('admin.new*')) in @endif
                         ">
                            <li class="@if(Route::is('admin.new.item')) active @endif"><a href="{{route('admin.new.item')}}">New Item/Product</a></li>
                            <li class="@if(Route::is('admin.new.products')) active @endif"><a href="{{route('admin.new.products')}}">Products</a></li>

                            <li class="@if(Route::is('admin.new.brands')) active @endif"><a href="{{route('admin.new.brands')}}">New Brands</a></li>
                            <li class="@if(Route::is('admin.new.categories')) active @endif"><a href="{{route('admin.new.categories')}}">New Category</a></li>
                        </ul>
                    </li>
                    <li class="@if(Route::is('admin.variations')) active @endif" >
                        <a href="{{route('admin.variations')}}" aria-expanded="true"><i class="fa fa-asterisk"></i><span>Variations Specifics</span></a>
                    </li>
                    <li class="@if(Route::is('admin.menu')) active @endif" >
                        <a href="{{route('admin.menu')}}" aria-expanded="true"><i class="fa fa-align-left"></i><span>Menu</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
