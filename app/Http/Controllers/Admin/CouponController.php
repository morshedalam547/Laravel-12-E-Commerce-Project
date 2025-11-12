<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    // 🧾 Index Page
    public function index()
    {
        $coupons = Coupon::latest()->paginate(10);
        return view('admin.coupons.index', compact('coupons'));
    }

    // ➕ Create Page
    public function create()
    {
        return view('admin.coupons.create');
    }

    // 💾 Store Coupon
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'cart_value' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date',
            'status'=>'required|boolean',
        ]);

        Coupon::create($request->all());

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon created successfully!');
    }

    // ✏️ Edit Page
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    // 🔄 Update Coupon
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:coupons,code,' . $coupon->id,
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'cart_value' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date',
        ]);

        $coupon->update($request->all());

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated successfully!');
    }

    // ❌ Delete Coupon
    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted successfully!');
    }
}
