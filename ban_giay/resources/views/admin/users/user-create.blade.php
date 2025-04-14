@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Thêm User</h2>
    <form action="{{ route('admin.user-store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Vai trò</label>
            <select name="vaitro" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="khachhang">Khách hàng</option>
            </select>
        </div>
        <button class="btn btn-success">Thêm</button>
        <a href="{{ route('admin.user-list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
