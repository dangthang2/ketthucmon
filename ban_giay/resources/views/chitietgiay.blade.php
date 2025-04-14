@extends('layout.master')

@section('content')

<div class="container">
    <h2>{{ $giay->ten_giay }}</h2>
    <img src="{{ asset('images/' . $giay->hinh_anh) }}" alt="{{ $giay->ten_giay }}" style="width: 300px;">
    <p><strong>Giá:</strong> {{ number_format($giay->gia) }} đồng</p>
    <p><strong>Mô tả:</strong> {{ $giay->mo_ta }}</p>
    <p><strong>Chi tiết:</strong> {{ $giay->chi_tiet }}</p>

    <!-- Form thêm sản phẩm vào giỏ hàng -->
    <form action="{{ route('giohang.add', $giay->id) }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $giay->id }}">
    <input type="hidden" name="product_name" value="{{ $giay->ten_giay }}">
    <input type="hidden" name="product_price" value="{{ $giay->gia }}">
    <input type="hidden" name="product_image" value="{{ $giay->hinh_anh }}">

    <!-- Chọn kích thước và màu sắc -->
    <label for="size">Kích thước:</label>
    <select name="size" id="size">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
    </select>

    <label for="color">Màu sắc:</label>
    <select name="color" id="color">
        <option value="Đỏ">Đỏ</option>
        <option value="Xanh">Xanh</option>
        <option value="Vàng">Vàng</option>
    </select>

    <label for="quantity">Số lượng:</label>
    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $giay->so_luong }}">

    <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
</form>


    @if(session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>

@endsection
