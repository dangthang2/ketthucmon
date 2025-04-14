@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Sửa Giày</h2>

    <form action="{{ route('admin.bangiay-update', $banGiay->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ten_giay">Tên giày</label>
            <input type="text" name="ten_giay" class="form-control" value="{{ $banGiay->ten_giay }}" required>
        </div>

        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="number" name="gia" class="form-control" value="{{ $banGiay->gia }}" required>
        </div>

        <div class="form-group">
            <label for="hinh_anh">Hình ảnh mới</label>
            <input type="file" name="hinh_anh" class="form-control">
            @if ($banGiay->hinh_anh)
                <img src="{{ asset('images/' . $banGiay->hinh_anh) }}" width="100" height="100" alt="Hình ảnh giày hiện tại">
            @endif
        </div>

        <div class="form-group">
            <label for="danhmuc_id">Danh mục</label>
            <select name="danhmuc_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $banGiay->danhmuc_id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.bangiay-list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
