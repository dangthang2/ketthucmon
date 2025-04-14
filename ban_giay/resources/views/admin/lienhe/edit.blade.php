@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Chỉnh sửa phản hồi từ Admin</h2>

    <form action="{{ route('admin.lienhe-update', $lienhe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="adminphanhoi">Phản hồi từ Admin</label>
            <textarea name="adminphanhoi" class="form-control" rows="4" required>{{ $lienhe->adminphanhoi }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('admin.lienhe-list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
