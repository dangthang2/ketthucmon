@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">🎉 Giới thiệu về Shop Giày Cao Cấp</h2>

    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/anh2.jpg') }}" alt="Cửa hàng giày" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h4>Sứ mệnh của chúng tôi</h4>
            <p style="font-size: 16px; line-height: 1.8;">
                Với phương châm <strong>“Tôn vinh từng bước chân”</strong>, Shop Giày Cao Cấp luôn không ngừng cải tiến để mang đến những sản phẩm chất lượng, dịch vụ tận tâm và trải nghiệm mua sắm tốt nhất cho khách hàng.
            </p>
            <p>
                Chúng tôi cung cấp đa dạng mẫu mã từ giày sneaker trẻ trung, giày da sang trọng cho đến giày thể thao năng động – tất cả đều là hàng chính hãng, bảo hành đầy đủ.
            </p>
        </div>
    </div>

    <div class="row mb-5 align-items-center">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('images/anh1.jpg') }}" alt="Giày trưng bày" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6 order-md-1">
            <h4>Không gian cửa hàng</h4>
            <p style="font-size: 16px; line-height: 1.8;">
                Tọa lạc tại trung tâm TP.HCM, cửa hàng được thiết kế hiện đại, thân thiện, tạo cảm giác thoải mái cho khách hàng khi đến tham quan, thử giày và mua sắm.
            </p>
            <p>Chúng tôi luôn có đội ngũ nhân viên tư vấn tận tình, giúp bạn chọn được đôi giày phù hợp nhất với phong cách và nhu cầu.</p>
        </div>
    </div>

    <div class="text-center">
        <h4>📦 Dịch vụ và chính sách</h4>
        <ul style="font-size: 16px; line-height: 2;">
            <li>✅ Miễn phí vận chuyển toàn quốc cho đơn hàng từ 500.000đ</li>
            <li>✅ Đổi trả trong vòng 7 ngày nếu lỗi từ nhà sản xuất</li>
            <li>✅ Thanh toán linh hoạt: COD, chuyển khoản, ví điện tử</li>
            <li>✅ Ưu đãi cho thành viên thân thiết và sinh viên</li>
        </ul>
        <p>👉 Hãy trải nghiệm dịch vụ của chúng tôi và cảm nhận sự khác biệt!</p>
    </div>
</div>
@endsection
