<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\BanGiay;
use App\Models\LienHe;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showOrderDetail($id)
    {
        $order = Checkout::with('banGiay')->findOrFail($id);
        return view('donhang-detail', compact('order'));
    }

    public function showOrders()
    {
        $orders = Checkout::with('banGiay')->get();
        return view('donhang', compact('orders'));
    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);  
        $products = BanGiay::where('danhmuc_id', $id)->get();  
        return view('by_category', compact('category', 'products'));
    }

    public function gioithieu()
    {
        return view('gioithieu');
    }

    public function addToCart(Request $request, $id)
    {
        $product = BanGiay::find($id);
        if (!$product) return redirect()->back()->with('message', 'Sản phẩm không tồn tại');

        $size = $request->input('size');
        $color = $request->input('color');
        $cart = session()->get('cart', new Cart);
        $cart->add($product, $id, 1, $size, $color);
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if ($cart) {
            $cart->remove($id);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('message', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }

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
            $cart->totalQty = collect($cart->items)->sum('qty');
            $cart->totalPrice = collect($cart->items)->sum('price');
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('message', 'Cập nhật giỏ hàng thành công');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('giohang')->with('message', 'Đã xóa giỏ hàng');
    }

    public function showCart()
    {
        $cart = session('cart') ?? new Cart();
        return view('giohang', compact('cart'));
    }

    // === ĐẶT HÀNG ===
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
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|in:Nam,Nữ',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
            'payment_method' => 'required|string|in:COD,Chuyển khoản',
        ]);

        Checkout::create($request->all());
        return redirect()->route('thankyou')->with('success', 'Đặt hàng thành công!');

    }

    public function thankYou()
    {
        return view('thankyou');  // Đảm bảo 'thankyou' là tên đúng của view
    }

    // === LIÊN HỆ ===
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
