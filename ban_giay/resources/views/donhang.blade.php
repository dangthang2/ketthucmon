@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Danh sách đơn hàng</h2>
    <div class="row mt-4">
        @forelse($orders as $order)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Đơn hàng #{{ $order->id }}</h5>

                        {{-- Hiển thị tên sản phẩm từ bảng ban_giay --}}
                        <p class="card-text">Tên sản phẩm: {{ $order->banGiay->ten_giay ?? 'N/A' }}</p>

                        {{-- Hiển thị tên người đặt --}}
                        <p class="card-text">Tên khách hàng: {{ $order->name }}</p>

                        {{-- Hiển thị trạng thái --}}
                        <p class="card-text">Trạng thái: {{ $order->status }}</p>

                        {{-- Link chi tiết đơn hàng --}}
                        <a href="{{ route('donhang.detail', $order->id) }}" class="btn btn-primary">Chi tiết</a>

                    </div>
                </div>
            </div>
        @empty
            <p>Không có đơn hàng nào.</p>
        @endforelse
    </div>
</div>
@endsection
