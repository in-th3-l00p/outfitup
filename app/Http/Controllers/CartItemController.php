<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller {
    public function __construct() {
        return $this->authorizeResource(CartItem::class);
    }

    public function index() {
        $items = Auth::user()
            ->cart_items()
            ->with("product")
            ->get();
        $total = $items->reduce(function ($carry, $item) {
            return $carry + $item->product->price * $item->quantity;
        }, 0);

        return view("cart.index", [
            'cartItems' => $items,
            'total' => $total
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if (CartItem::query()
            ->existsByProduct(Product::findOrFail($request->product_id))
        ) {
            $item = CartItem::query()
                ->findByProduct(Product::findOrFail($request->product_id));
            $item->update([
                'quantity' => $item->quantity + $request->quantity
            ]);
            return redirect()->route("cart.index");
        }

        Auth::user()->cart_items()->create($request->all());
        return redirect()->route("cart.index");
    }

    public function update(Request $request, CartItem $cartItem) {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->update($request->all());
    }

    public function destroy(CartItem $cartItem) {
        $cartItem->delete();
    }

}
