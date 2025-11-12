<?php
namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;

class WishlistController extends Controller
{
    // ✅ Show Wishlist
    public function index()
    {
        $session_id = session()->getId();

        $wishlists = Wishlist::with('product')
            ->where('session_id', $session_id)
            ->get();

        return view('wish.wishlist', compact('wishlists'));
    }

    // ✅ Add to Wishlist
    public function store($product_id)
    {
        $session_id = session()->getId();

        // আগে থেকেই আছে কিনা চেক
        $exists = Wishlist::where('session_id', $session_id)
            ->where('product_id', $product_id)
            ->exists();

        if ($exists) {
            return back()->with('info', 'Already in wishlist.');
        }

        Wishlist::create([
            'session_id' => $session_id,
            'product_id' => $product_id,
        ]);

        return back()->with('success', 'Added to wishlist!');
    }



// Move to cart cController
public function moveToCart($product_id)
{
    $session_id = session()->getId();

    $product = Product::findOrFail($product_id);

    // CartController এর instance তৈরি
    $cartController = new CartController();

    $cartController->add_to_cart(
        request()->merge([
            'id'       => $product->id,
            'name'     => $product->name,
            'quantity' => 1,
            'price'    => $product->sale_price ?: $product->regular_price,
        ])
    );

    // Wishlist থেকে remove
    Wishlist::where('session_id', $session_id)
            ->where('product_id', $product_id)
            ->delete();

    return redirect()->back()->with('success', 'Product moved to cart and removed from wishlist!');
}




    // ✅ Remove from Wishlist
    public function destroy($product_id)
    {
        $session_id = session()->getId();

        Wishlist::where('session_id', $session_id)
            ->where('product_id', $product_id)
            ->delete();

        return back()->with('success', 'Removed from wishlist.');
    }






    
}
