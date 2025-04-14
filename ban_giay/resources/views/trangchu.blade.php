@extends('layout.master')
@section('content')

<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    <li data-transition="boxfade" data-slotamount="20">
                        <img src="{{ asset('images/logo1.jpg') }}" alt="Cửa hàng 1" style="width: 100%; height: 100%; object-fit: cover;">
                    </li>
                    <li data-transition="boxfade" data-slotamount="20">
                        <img src="{{ asset('images/logo2.jpg') }}" alt="Cửa hàng 2" style="width: 100%; height: 100%; object-fit: cover;">
                    </li>
                    <li data-transition="boxfade" data-slotamount="20">
                        <img src="{{ asset('images/logo3.jpg') }}" alt="Cửa hàng 3" style="width: 100%; height: 100%; object-fit: cover;">
                    </li>
                </ul>
            </div>
        </div>
        <div class="tp-bannertimer"></div>
    </div>
</div>

<div class="beta-products-list">
    <h4>Tất cả sản phẩm</h4>
    <div class="beta-products-details">
        <p class="pull-left">{{ $giay->count() }} sản phẩm được tìm thấy</p>
        <div class="clearfix"></div>
    </div>

    <div class="row">
        @php $stt = 0; @endphp
        @foreach($giay as $item)
            @php $stt++; @endphp
            <div class="col-sm-3">
                <div class="single-item">

                    <div class="single-item-header">
                        <a href="{{ route('chitietgiay', $item->id) }}">
                            @if($item->hinh_anh && file_exists(public_path('images/' . $item->hinh_anh)))
                                <img src="{{ asset('images/' . $item->hinh_anh) }}" alt="{{ $item->ten_giay }}" style="height: 250px; width: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-image.jpg') }}" alt="Ảnh mặc định" height="250px">
                            @endif
                        </a>
                    </div>

                    <div class="single-item-body">
                        <p class="single-item-title">{{ $item->ten_giay }}</p>
                        <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                            <span class="flash-sale">{{ number_format($item->gia) }} đồng</span>
                        </p>
                    </div>

                    <div class="single-item-caption">
                        <a class="add-to-cart pull-left">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <a class="beta-btn primary" href="{{ route('chitietgiay', $item->id) }}">
                            Chi tiết <i class="fa fa-chevron-right"></i>
                        </a>
                        <div class="clearfix"></div>
                    </div>

                    <form action="{{ route('dat-hang', ['id' => $item->id]) }}" method="GET" style="margin-top: 5px;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <input type="hidden" name="product_name" value="{{ $item->ten_giay }}">
                        <input type="hidden" name="product_price" value="{{ $item->gia }}">
                        <a href="{{ route('checkout.form', $item->id) }}" class="btn btn-success">mua ngay</a>


                    </form>
                </div>
            </div>

            @if($stt % 4 == 0)
                <div class="space40">&nbsp;</div>
            @endif
        @endforeach
    </div>
</div>

@endsection
