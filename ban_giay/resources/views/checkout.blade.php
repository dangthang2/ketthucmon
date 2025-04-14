@extends('layout.master')

@section('content')
<div class="container mt-5">

    {{-- Ảnh sản phẩm --}}
    @if($product->hinh_anh && file_exists(public_path('images/' . $product->hinh_anh)))
        <div class="text-center mb-4">
            <img src="{{ asset('images/' . $product->hinh_anh) }}" alt="{{ $product->ten_giay }}" style="max-width: 300px; height: auto; object-fit: cover;">
        </div>
    @else
        <div class="text-center mb-4">
            <img src="{{ asset('images/default-image.jpg') }}" alt="Ảnh mặc định" style="max-width: 300px; height: auto;">
        </div>
    @endif

    <h2>Đặt hàng: {{ $product->ten_giay }}</h2>
    <p><strong>Giá:</strong> {{ number_format($product->gia) }} đồng</p>
    <p><strong>Mô tả:</strong> {{ $product->mo_ta }}</p>

    {{-- Form đặt hàng --}}
    <form action="{{ route('checkout.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="form-group">
            <label>Số lượng</label>
            <input type="number" name="quantity" class="form-control" value="1" min="1" required>
        </div>

        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Giới tính</label>
            <select name="gender" class="form-control">
                <option value="">-- Chọn giới tính --</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Ghi chú</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Phương thức thanh toán</label>
            <select name="payment_method" class="form-control">
                <option value="COD">COD</option>
                <option value="Chuyển khoản">Chuyển khoản</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Đặt hàng</button>
    </form>
</div>
@endsection
