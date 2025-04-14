@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Thêm Giày</h2>

    <form action="{{ route('admin.bangiay-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ten_giay">Tên giày</label>
            <input type="text" name="ten_giay" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="number" name="gia" class="form-control" required>
        </div>

        {{-- Thêm mô tả --}}
        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea name="mo_ta" class="form-control" rows="3" required></textarea>
        </div>

        {{-- Thêm chi tiết --}}
        <div class="form-group">
            <label for="chi_tiet">Chi tiết</label>
            <textarea name="chi_tiet" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="hinh_anh">Hình ảnh</label>
            <input type="file" name="hinh_anh" class="form-control">
        </div>

        <div class="form-group">
            <label for="danhmuc_id">Danh mục</label>
            <select name="danhmuc_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.bangiay-list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
