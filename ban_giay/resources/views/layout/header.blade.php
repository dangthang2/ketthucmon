<div id="header">
    <!-- HEADER TOP -->
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

    <!-- HEADER BODY -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a id="logo" href="{{ route('trangchu') }}">
                    <img src="{{ asset('images/logo4.jpg') }}" width="200px" alt="Logo">
                </a>
            </div>

            <div class="pull-right beta-components space-left ov">
                <div class="beta-comp">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" placeholder="Tìm kiếm..." value="{{ request('q') }}">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>

                <!-- GIỎ HÀNG LINK -->
                <div class="beta-comp ml-3">
                    <a href="{{ route('giohang') }}" class="btn btn-warning text-dark">
                        🛒 Giỏ hàng
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- HEADER NAVIGATION -->
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
                    <li>
                        <a href="{{ route('admin.lienhe.khach') }}" class="btn btn-info text-white">Xem phản hồi từ Admin</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>
