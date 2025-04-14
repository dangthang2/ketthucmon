@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>
    
    {{-- Hiển thị thông tin sản phẩm --}}
    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Thông tin sản phẩm:</h4>
            
            {{-- Hiển thị hình ảnh sản phẩm --}}
            @if($order->banGiay && $order->banGiay->hinh_anh && file_exists(public_path('images/' . $order->banGiay->hinh_anh)))
                <div class="text-center mb-4">
                    <img src="{{ asset('images/' . $order->banGiay->hinh_anh) }}" alt="{{ $order->banGiay->ten_giay }}" style="max-width: 300px; height: auto; object-fit: cover;">
                </div>
            @else
                <div class="text-center mb-4">
                    <img src="{{ asset('images/default-image.jpg') }}" alt="Ảnh mặc định" style="max-width: 300px; height: auto;">
                </div>
            @endif

            {{-- Hiển thị tên sản phẩm --}}
            <p><strong>Tên sản phẩm:</strong> {{ $order->banGiay->ten_giay ?? 'N/A' }}</p>
            {{-- Hiển thị giá sản phẩm --}}
            <p><strong>Giá:</strong> {{ number_format($order->banGiay->gia) }} VNĐ</p>
            {{-- Hiển thị mô tả --}}
            <p><strong>Mô tả:</strong> {{ $order->banGiay->mo_ta }}</p>
        </div>
        
        {{-- Thông tin đơn hàng --}}
        <div class="col-md-6">
            <h4>Thông tin đơn hàng:</h4>
            {{-- Hiển thị tên khách hàng --}}
            <p><strong>Tên khách hàng:</strong> {{ $order->name }}</p>
            {{-- Hiển thị số lượng --}}
            <p><strong>Số lượng:</strong> {{ $order->quantity }}</p>
            {{-- Hiển thị trạng thái --}}
            <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
            {{-- Hiển thị địa chỉ --}}
            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
            {{-- Hiển thị phương thức thanh toán --}}
            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
            {{-- Hiển thị ghi chú --}}
            <p><strong>Ghi chú:</strong> {{ $order->notes }}</p>
        </div>
    </div>
</div>
@endsection
