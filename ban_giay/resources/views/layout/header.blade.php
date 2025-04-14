<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
            <ul class="top-details menu-beta l-inline">
    @if(Auth::check())
        <li><span>Xin chào, {{ Auth::user()->name }}</span></li>
        <li><a href="{{ route('logout') }}">🚪 Đăng xuất</a></li>
    @else
        <li><a href="{{ route('login') }}">🔐 Đăng nhập</a></li>
        <li><a href="{{ route('register') }}">📝 Đăng ký</a></li>
    @endif
</ul>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <!-- Đổi đường dẫn logo ở đây -->
                <a id="logo"><img src="{{ asset('images/logo4.jpg') }}" width="200px" alt="Logo"></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" placeholder="Tìm kiếm..." value="{{ request('q') }}">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>
             
                <div class="beta-select">
    <i class="fa fa-shopping-cart"></i> Giỏ hàng 
    <i class="fa fa-chevron-down"></i>
</div>
<div class="beta-dropdown cart-body">
    @if(isset($productCarts) && count($productCarts) > 0)
        @foreach($productCarts as $product)
            <div class="cart-item">
                <a class="cart-item-delete" href="{{ route('banhang.xoagiohang', $product['item']['id']) }}">
                    <i class="fa fa-times"></i>
                </a>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img src="{{ asset('images/' . $product['item']['image']) }}" width="50" height="50" alt="{{ $product['item']['name'] }}">
                    </a>
                    <div class="media-body">
                        <span class="cart-item-title">{{ $product['item']['name'] }}</span>
                        <span class="cart-item-amount">{{ $product['qty'] }} x 
                            {{ number_format($product['item']['promotion_price'] > 0 ? $product['item']['promotion_price'] : $product['item']['unit_price']) }} đ
                        </span>
                        <!-- Hiển thị thông tin kích thước và màu sắc nếu có -->
                        @if(!empty($product['size']) || !empty($product['color']))
                            <div>
                                @if($product['size'])
                                    <span><strong>Kích thước:</strong> {{ $product['size'] }}</span><br>
                                @endif
                                @if($product['color'])
                                    <span><strong>Màu sắc:</strong> {{ $product['color'] }}</span><br>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="cart-footer">
            <a href="{{ route('giohang') }}" class="beta-btn primary text-center">Xem giỏ hàng</a>
        </div>
    @else
        <p>Giỏ hàng trống!</p>
    @endif
</div>


            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
    <ul class="sub-menu">
        @foreach($categories as $category)
            <li><a href="{{ route('byCategory', $category->id) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</li>

                    <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>

                    <li><a href="{{ route('lienhe.form') }}">Liên hệ</a></li>
                    <li><a href="{{ route('donhang') }}">Đơn hàng</a></li>
                    <a href="{{ route('admin.lienhe.khach') }}" class="btn btn-info">Xem phản hồi từ Admin</a>


                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>
