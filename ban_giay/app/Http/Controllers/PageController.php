<?php
namespace App\Http\Controllers;
use App\Models\Checkout;
use App\Models\BanGiay; // nếu bạn dùng model này cho sản phẩm
use Illuminate\Http\Request;
use App\Models\LienHe;
use App\Models\Category;
use App\Models\Order; 

use App\Models\Cart;

class PageController extends Controller
{
    public function showOrderDetail($id)
    {
        // Lấy đơn hàng theo ID và bao gồm thông tin sản phẩm liên quan
        $order = Checkout::with('banGiay')->findOrFail($id);
        
        return view('donhang-detail', compact('order'));
    }
    
    public function showOrders()
    {
        // Lấy danh sách đơn hàng với thông tin sản phẩm từ bảng ban_giay
        $orders = Checkout::with('BanGiay')->get();
        return view('donhang', compact('orders'));
    }
    
    public function showByCategory($id)
    {
        // Lấy danh mục
        $category = Category::findOrFail($id);  
        
        // Lấy sản phẩm từ bảng ban_giay theo danh mục
        $products = BanGiay::where('danhmuc_id', $id)->get();  
    
        // Trả về view với dữ liệu
        return view('by_category', compact('category', 'products'));
    }
    
    public function gioithieu()
    {
        return view('gioithieu');
    }
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id)
    {
        $product = BanGiay::find($id);

        if (!$product) {
            return redirect()->back()->with('message', 'Sản phẩm không tồn tại');
        }

        // Lấy thông tin kích thước và màu sắc
        $size = $request->input('size');
        $color = $request->input('color');

        // Lấy giỏ hàng từ session hoặc tạo mới
        $cart = session()->get('cart', new Cart);

        // Thêm sản phẩm vào giỏ hàng
        $cart->add($product, $id, 1, $size, $color);

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($id)
    {
        $cart = session()->get('cart');

        if ($cart) {
            $cart->remove($id);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('message', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }

    // Cập nhật giỏ hàng
    public function updateCart(Request $request)
    {
        $cart = session('cart');
        if ($cart) {
            foreach ($request->product_id as $key => $id) {
                if (isset($cart->items[$id])) {
                    $cart->items[$id]['qty'] = $request->quantity[$key];
                    $cart->items[$id]['price'] = $cart->items[$id]['qty'] * $cart->items[$id]['item']->gia;
                }
            }

            // Tính lại tổng giỏ hàng
            $cart->totalQty = collect($cart->items)->sum('qty');
            $cart->totalPrice = collect($cart->items)->sum('price');

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('message', 'Cập nhật giỏ hàng thành công');
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('giohang')->with('message', 'Đã xóa giỏ hàng');
    }

    // Hiển thị giỏ hàng
    public function showCart()
    {
        $cart = session('cart') ?? new Cart();
        return view('giohang', compact('cart'));
    }
    public function showCheckoutForm($id)
    {
        $product = BanGiay::findOrFail($id);
        return view('checkout', compact('product'));
    }

    public function submitCheckout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:ban_giay,id',
            'quantity' => 'required|integer|min:1',
            'name' => 'required|string',
            'gender' => 'nullable|in:Nam,Nữ',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        Checkout::create($request->all());

        return redirect()->route('trangchu')->with('success', 'Đặt hàng thành công!');
    }
    public function form($id)
{
    $product = BanGiay::findOrFail($id);
    return view('checkout', compact('product'));
}

public function submit(Request $request)
{
    Checkout::create($request->all());
    return redirect()->route('trangchu')->with('success', 'Đặt hàng thành công!');
}
public function showForm()
{
    return view('lienhe');
}

public function submitForm(Request $request)
{
    $request->validate([
        'ten' => 'required|string|max:255',
        'email' => 'required|email',
        'sodienthoai' => 'nullable|string|max:20',
        'noidung' => 'required|string',
    ]);

    LienHe::create($request->only('ten', 'email', 'sodienthoai', 'noidung'));

    return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ!');
}
}
