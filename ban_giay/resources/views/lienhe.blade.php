@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h2>Liên hệ với chúng tôi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('lienhe.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="ten" class="form-label">Họ tên</label>
            <input type="text" name="ten" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="sodienthoai" class="form-label">Số điện thoại</label>
            <input type="text" name="sodienthoai" class="form-control">
        </div>

        <div class="mb-3">
            <label for="noidung" class="form-label">Nội dung</label>
            <textarea name="noidung" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
    </form>
</div>
@endsection
