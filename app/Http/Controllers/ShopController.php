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
    $size = $request->query('size', 4);
    $sort = $request->query('sort');
    $p_brand = $request->query('p_brand');

    $query = Product::query();

    // ✅ Brand filter
    if ($p_brand && $p_brand !== 'all') {
        $query->where('brand_id', $p_brand);
    }

    // ✅ Sorting
    if ($sort) {
        switch ($sort) {
            case 'price_asc':
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

    // ✅ Load brands
    $brands = Brand::orderBy('name', 'asc')->withCount('products')->get();

    // ✅ Paginate
    $products = $query->paginate($size)->appends($request->all());

    return view('shop.shop', compact('products', 'brands', 'size', 'sort', 'p_brand'));
}



    public function product_details($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $rProducts = product::where('slug','<>',$product_slug)->get()->take(8);
        return view('shop.details', compact('product','rProducts'));
    }
















}
