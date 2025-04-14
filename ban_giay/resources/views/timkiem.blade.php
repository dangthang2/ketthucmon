@extends('layout.master')

@section('content')
    <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>

    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-3">
                    <div class="single-item">

                        {{-- Gắn nhãn Sale nếu có giá khuyến mãi --}}
                        @if(isset($product->gia_khuyen_mai) && $product->gia_khuyen_mai != 0)
                            <div class="ribbon-wrapper">
                                <div class="ribbon sale">Sale</div>
                            </div>
                        @endif

                        {{-- Ảnh sản phẩm --}}
                        <div class="single-item-header">
                            <a href="{{ route('chitietgiay', $product->id) }}">
                                @if($product->hinh_anh && file_exists(public_path('images/' . $product->hinh_anh)))
                                    <img src="{{ asset('images/' . $product->hinh_anh) }}" alt="{{ $product->ten_giay }}" height="250px" style="width: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-image.jpg') }}" alt="Ảnh mặc định" height="250px" style="width: 100%; object-fit: cover;">
                                @endif
                            </a>
                        </div>

                        {{-- Tên và giá sản phẩm --}}
                        <div class="single-item-body">
                            <p class="single-item-title">{{ $product->ten_giay }}</p>
                            <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                                @if($product->gia_khuyen_mai == 0)
                                    <span class="flash-sale">{{ number_format($product->gia) }} đồng</span>
                                @else
                                    <span class="flash-del">{{ number_format($product->gia) }} đồng</span>
                                    <span class="flash-sale">{{ number_format($product->gia_khuyen_mai) }} đồng</span>
                                @endif
                            </p>
                        </div>

                        {{-- Nút chi tiết và mua ngay --}}
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{ route('chitietgiay', $product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>

                        {{-- Nút mua ngay --}}
                        <form action="{{ route('dat-hang', ['id' => $product->id]) }}" method="GET" style="margin-top: 5px;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_name" value="{{ $product->ten_giay }}">
                            <input type="hidden" name="product_price" value="{{ $product->gia }}">
                            <button type="submit" class="beta-btn primary" style="width: 100%;">
                                Mua ngay <i class="fa fa-chevron-right"></i>
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Không tìm thấy sản phẩm nào!</p>
    @endif
@endsection
