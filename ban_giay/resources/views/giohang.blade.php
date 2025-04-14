@extends('layout.master')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giỏ Hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('trangchu') }}">Trang Chủ</a> / <span>Giỏ Hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(Session::has('cart') && count(session('cart')->items) == 0)
            <div class="alert alert-danger">
                Không có sản phẩm nào trong giỏ hàng.
            </div>
        @endif

        @if(Session::has('cart') && count(session('cart')->items) > 0)
            <div class="table-responsive">
                <form action="{{ route('giohang.update') }}" method="POST">
                    @csrf
                    <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name">Sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-status">Trạng thái</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Tổng cộng</th>
                                <th class="product-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('cart')->items as $key => $item)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <div class="media">
                                            <img class="pull-left" src="{{ asset('images/' . $item['item']->hinh_anh) }}" alt="{{ $item['item']->ten_giay }}" width="50" height="50">
                                            <div class="media-body">
                                                <p class="font-large table-title">{{ $item['item']->ten_giay }}</p>
                                                <p class="table-option">Màu sắc: {{ $item['color'] ?? 'Không có' }}</p>
                                                <p class="table-option">Kích thước: {{ $item['size'] ?? 'Không có' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">{{ number_format($item['item']->gia) }} VNĐ</span>
                                    </td>
                                    <td class="product-status">
                                        {{ $item['item']->stock_status }}
                                    </td>
                                    <td class="product-quantity">
                                        <input type="hidden" name="product_id[]" value="{{ $item['item']->id }}">
                                        <input type="number" name="quantity[]" value="{{ $item['qty'] }}" min="1" max="{{ $item['item']->so_luong }}">
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">{{ number_format($item['price']) }} VNĐ</span>
                                    </td>
                                    <td class="product-remove">
                                        <form action="{{ route('giohang.remove', $item['item']->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
                </form>
            </div>

            <!-- Xóa toàn bộ giỏ hàng -->
            <form action="{{ route('giohang.clear') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-warning">Xóa giỏ hàng</button>
            </form>

            <!-- Nút đặt hàng -->
            <a href="{{ route('checkout.form') }}" class="btn btn-success">Đặt hàng</a>


        @endif
    </div>
</div>
@endsection
