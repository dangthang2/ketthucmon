@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Sản phẩm thuộc danh mục: {{ $category->name }}</h2>
    <div class="row mt-4">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/' . $product->hinh_anh) }}" class="card-img-top" alt="{{ $product->ten_giay }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->ten_giay }}</h5>
                        <p class="card-text">{{ number_format($product->gia, 0, ',', '.') }} VNĐ</p>
                        <a class="beta-btn primary" href="{{ route('chitietgiay', $product->id) }}">
                            Chi tiết <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>Không có sản phẩm nào trong danh mục này.</p>
        @endforelse
    </div>
</div>
@endsection
