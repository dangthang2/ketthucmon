@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Trạng thái đơn hàng của bạn</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($checkouts as $checkout)
            <tr>
                <td>{{ $checkout->id }}</td>
                <td>{{ $checkout->name }}</td>
                <td>{{ $checkout->email }}</td>
                <td>{{ $checkout->address }}</td>
                <td>{{ $checkout->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
