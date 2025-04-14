<!-- resources/views/admin/header.blade.php -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Admin Bán Hàng</a>
    </div>
    
    <!-- Đoạn mã menu trái -->
    <div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav side-nav">
        <li>
    <a href="{{ route('admin.cate-list') }}">
        <i class="fa fa-fw fa-table"></i> Quản lý Danh mục
    </a>
</li>
<li>
    <a href="{{ route('admin.bangiay-list') }}">
        <i class="fa fa-fw fa-table"></i> Quản lý Giày
    </a>
</li>
<li>
    <a href="{{ route('admin.user-list') }}">
        <i class="fa fa-fw fa-cogs"></i> Quản lý User
    </a>
</li>
<li><a href="{{ route('admin.checkout-list') }}">
    <i class="fa fa-fw fa-cogs"></i> Quản lý Đơn hàng
</a></li>
<li><a href="{{ route('admin.lienhe-list') }}">
    <i class="fa fa-fw fa-cogs"></i> Liên hệ 
</a></li>



            <!-- Thêm các mục menu khác ở đây -->
        </ul>

        <!-- Đoạn mã cho phần user info và logout -->
        <ul class="nav navbar-nav navbar-right navbar-user">
            @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('trangadmin') }}">Thông tin cá nhân</a></li>
                        <li><a href="{{ route('trangchu') }}">Đăng xuất</a></li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}"><i class="fa fa-fw fa-sign-in"></i> Đăng nhập</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
