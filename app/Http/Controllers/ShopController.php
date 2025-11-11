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
    $size = $request->query('size', 8);
    $sort = $request->query('sort');
    $p_brand = $request->query('p_brand');
    $p_category = $request->query('p_category');

    $query = Product::query();

    // ✅ Price Range Filter
    $min_price = $request->query('min') ? $request->query('min') : 1;
    $max_price = $request->query('max') ? $request->query('max') : 5000;

    if ($min_price && $max_price) {
        $query->whereRaw('COALESCE(sale_price, regular_price) BETWEEN ? AND ?', [$min_price, $max_price]);
    }

    // ✅ Brand filter
    if ($p_brand && $p_brand !== 'all') {
        $query->where('brand_id', $p_brand);
    }

    // ✅ Category filter
    if ($p_category && $p_category !== 'all') {
        $query->where('category_id', $p_category);
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
        }
    } else {
        $query->orderBy('created_at', 'desc');
    }

    $brands = Brand::orderBy('name', 'asc')->withCount('products')->get();
    $categories = Category::orderBy('name', 'asc')->withCount('products')->get();

    $products = $query->paginate($size)->appends($request->all());

    return view('shop.shop', compact('products', 'brands', 'categories', 'size', 'sort', 'p_brand', 'p_category', 'min_price', 'max_price'));
}




    public function product_details($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $rProducts = product::where('slug','<>',$product_slug)->get()->take(8);
        return view('shop.details', compact('product','rProducts'));
    }
















}
