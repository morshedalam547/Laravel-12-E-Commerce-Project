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




}
