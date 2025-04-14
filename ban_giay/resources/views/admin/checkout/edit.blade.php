@extends('admin.master')

@section('content')
<div class="container mt-4">
    <h2>Cập nhật trạng thái đơn hàng</h2>

    <form action="{{ route('admin.checkout-update-status', $checkout->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="status">Trạng thái đơn hàng</label>
            <select name="status" class="form-control" required>
                <option value="Chờ xử lý" {{ $checkout->status == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="Đang giao" {{ $checkout->status == 'Đang giao' ? 'selected' : '' }}>Đang giao</option>
                <option value="Hoàn thành" {{ $checkout->status == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('admin.checkout-list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
