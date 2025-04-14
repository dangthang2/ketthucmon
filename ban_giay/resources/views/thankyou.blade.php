@extends('layout.master')

@section('content')
<div class="container mt-5 text-center">
    <h2>✅ Đặt hàng thành công!</h2>
    <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ sớm liên hệ với bạn.</p>
    <a href="{{ route('trangchu') }}" class="btn btn-primary mt-3">Quay về trang chủ</a>
</div>
@endsection
