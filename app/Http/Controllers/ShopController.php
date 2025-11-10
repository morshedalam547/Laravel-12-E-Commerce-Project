<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ShopController extends Controller
{
public function index(Request $request)
{
    // ✅ প্রতি পেজে কতগুলো product দেখাবে
    $size = $request->query('size') ? $request->query('size') : 4;

    // ✅ Sorting option
    $sort = $request->query('sort');

    $query = Product::query();

    if ($sort) {
        switch ($sort) {
            case 'price_asc':
                // যদি sale_price থাকে তাহলে ওটা, না থাকলে regular_price
                $query->orderByRaw('COALESCE(sale_price, regular_price) ASC');
                break;

            case 'price_desc':
                $query->orderByRaw('COALESCE(sale_price, regular_price) DESC');
                break;

            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;

            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
                  case 'old_to_new':
                $query->orderBy('created_at', 'asc');
                break;

            case 'new_to_old':
                $query->orderBy('created_at', 'desc');
                break;

            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
    } else {
        $query->orderBy('created_at', 'desc');
    }

    // ✅ Pagination সহ query
    $products = $query->paginate($size)->appends($request->all());

    return view('shop.shop', compact('products', 'size', 'sort'));
}


    public function product_details($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $rProducts = product::where('slug','<>',$product_slug)->get()->take(8);
        return view('shop.details', compact('product','rProducts'));
    }
















}
