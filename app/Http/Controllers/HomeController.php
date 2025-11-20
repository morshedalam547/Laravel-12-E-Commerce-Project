<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $sliders = Slider::where('status', 1)->latest()->get();
    $categories = Category::all();
 
    $hotDeals = Product::whereNotNull('sale_price')
        ->orderBy('id', 'DESC')
        ->take(12)
        ->get();
    $latestProduct = Product::whereNotNull('sale_price')
        ->orderBy('id', 'DESC')
        ->take(2)
        ->get();


    return view('welcome', compact('sliders','categories','hotDeals','latestProduct'));
}

public function search(Request $request)
{
    $keyword = $request->input('search-keyword');

    // if (!$keyword) {
    //     return response()->json([]);
    // }

    $products = Product::where('name', 'LIKE', "%{$keyword}%")
        // ->orWhere('short_description', 'LIKE', "%{$keyword}%")
        // ->orWhere('description', 'LIKE', "%{$keyword}%")
        // ->select('id', 'name', 'slug', 'image')
        // ->limit(10)  
        ->get()->take(8);

    return response()->json($products);
}



}
