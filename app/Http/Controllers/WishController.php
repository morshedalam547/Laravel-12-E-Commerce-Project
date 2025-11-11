<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishController extends Controller
{
    public function wish_index(){
        return view('wish.wish');
    }
}
