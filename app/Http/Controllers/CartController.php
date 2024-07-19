<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $quantity = $request->input('quantity');
        // $productImage = $request->input('image');

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => $quantity,
                // 'image' => $productImage, 
            ];
        }
        // dd( $cart);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã Thêm vào giỏ hàng');
    }

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    public function remove(Request $request)
    {   $request->id;  
        $cart = session()->get('cart', []);
        $productId = $request->id;
// dd( $productId);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->quantities as $productId => $quantity) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
            }
        }
        // dd( $cart);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated successfully');
    }
    public function clear()
    { 
        //  dd('vào');
        // echo'vào';
        session()->forget('cart');

        return redirect()->back()->with('success', 'All items have been removed from your cart!');
    }
}
