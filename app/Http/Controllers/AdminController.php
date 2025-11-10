<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AdminController extends Controller
{
   public function index(){
        return view('admin.index');
    }

public function brands(){
    $brands =Brand::orderBy('id','DESC')->paginate(7);
    return view('admin.admin-brand',compact ('brands'));

}


public function addBrands(){
    return view('admin.brand-add');
}

public function storeBrands(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'slug' => [  'unique:brands,slug'],
        'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg','max:2024']
    ]);

    $brand = new Brand();
    $brand->name = $request->name;
    $brand->slug = Str::slug(($request->name));

    // Image upload handle
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/brands'), $filename);
        $brand->image = $filename;
    }
$brand->save();

    return redirect()->route('admin.brands')->with('success', 'Brand created successfully!');
}


public function edit($id)
{
    $brand = Brand::findOrFail($id); // ID অনুযায়ী ব্র্যান্ড খুঁজে বের করা
    return view('admin.brands-edit', compact('brand')); // edit.blade.php ফর্মে ডেটা পাঠানো
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'slug' => [  'unique:brands,slug,'.$id],
        'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg','max:2024']
    ]);

    $brand = Brand::findOrFail($id);
    $brand->name = $request->name;
    $brand->slug = Str::slug(($request->name));

    // Image upload handle
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/brands'), $filename);
        $brand->image = $filename;
    }
    $brand->save();
    return redirect()->route('admin.brands')->with('success', 'Brand updated successfully!');

}

public function delete($id){
    $brand = Brand::findOrFail($id);

        // যদি image থাকে, delete করা
    if($brand->image && file_exists(public_path('uploads/brands/' . $brand->image))){
        unlink(public_path('uploads/brands/' . $brand->image));
    }
    $brand->delete();
    return redirect()->route('admin.brands')->with('success','Brand deleted successfully!');
}



//category Controller function here
public function categories(){
    
   $categories = Category::latest()->paginate(7);

    return view('admin.admin-category',compact('categories'));
}


public function category_add(){
    return view('admin.category-add');
}

public function category_store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'slug' => [  'unique:categories,slug'],
        'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg','max:2024']
    ]);

    $category = new Category();
    $category->name = $request->name;
    $category->slug = Str::slug(($request->name));

    // Image upload handle
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/brands'), $filename);
        $category->image = $filename;
    }
$category->save();

    return redirect()->route('admin.categories')->with('success', 'Category created successfully!');
}



public function category_edit($id)
{
    $category= Category::findOrFail($id); // ID অনুযায়ী ব্র্যান্ড খুঁজে বের করা
    return view('admin.category-edit', compact('category')); // edit.blade.php ফর্মে ডেটা পাঠানো
}

public function category_update(Request $request, $id)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'slug' => [  'unique:brands,slug,'.$id],
        'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg','max:2024']
    ]);

    $category = Category::findOrFail($id);
    $category->name = $request->name;
    $category->slug = Str::slug(($request->name));

    // Image upload handle
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/brands'), $filename);
        $category->image = $filename;
    }
    $category->save();
    return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');

}

public function category_delete($id){
    $category = Category::findOrFail($id);

        // যদি image থাকে, delete করা
    if($category->image && file_exists(public_path('uploads/brands/' . $category->image))){
        unlink(public_path('uploads/brands/' . $category->image));
    }
    $category->delete();
    return redirect()->route('admin.categories')->with('success','Brand deleted successfully!');
}


//Product Controller function here

  // 🔹 সব প্রোডাক্ট দেখানোর জন্য
    public function products()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();

        return view('admin.products.products', compact('products', 'categories', 'brands'));
    }

    // 🔹 প্রোডাক্ট যোগ করার ফর্ম দেখানোর জন্য
    public function products_add()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();

        return view('admin.products.add-product', compact('categories', 'brands'));
    }





public function products_store(Request $request)
{
    // ✅ 1️⃣ Validation
    $request->validate([
        'name'              => 'required|string|max:255',
        'category_id'       => 'required|exists:categories,id',
        'brand_id'          => 'required|exists:brands,id',
        'short_description' => 'required|string|max:255',
        'description'       => 'required|string',
        'regular_price'     => 'required|numeric|min:0',
        'sale_price'        => 'nullable|numeric|min:0',
        'SKU'               => 'required|string|max:100|unique:products,SKU',
        'quantity'          => 'required|integer|min:0',
        'image'             => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'images.*'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // ✅ 2️⃣ Create Product Object
    $product = new Product();
    $product->name = $request->name;
    $product->slug = str()->slug($request->name);
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;
    $product->short_description = $request->short_description;
    $product->description = $request->description;
    $product->regular_price = $request->regular_price;
    $product->sale_price = $request->sale_price;
    $product->SKU = $request->SKU;
    $product->quantity = $request->quantity;
    $product->stock_status = $request->stock_status ?? 'instock';
    $product->featured = $request->featured ?? 0;



// ✅ 3️⃣ Handle Main Image
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imageName = time() . '.' . $image->extension();

    // Main Image Upload
    $image->move(public_path('uploads/products/'), $imageName);

  
$manager = new ImageManager(new Driver());

// Thumbnail তৈরি
$thumbPath = public_path('uploads/products/thumbnails/');
if (!file_exists($thumbPath)) {
    mkdir($thumbPath, 0777, true);
}

$imagePath = public_path('uploads/products/' . $imageName);

$manager->read($imagePath)
    ->cover(300, 300)
    ->save($thumbPath . $imageName);

$product->image = $imageName;

}

  // ✅ 4️⃣ Handle Gallery Images
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $galleryImg) {
        $galleryName = uniqid() . '.' . $galleryImg->extension();

        // যদি folder না থাকে, তাহলে বানিয়ে নেওয়া
        $galleryPath = public_path('uploads/products/gallery');
        if (!file_exists($galleryPath)) {
            mkdir($galleryPath, 0777, true);
        }

       $galleryImg->move($galleryPath, $galleryName);

            // ইমেজ নাম array তে রাখো
            $galleryImages[] = $galleryName;
        }

        // ✅ JSON আকারে DB তে save করো
        $product->images = json_encode($galleryImages);
    }


// ✅ 5️⃣ Save Product (main image সহ)
$product->save();

    // ✅ 6️⃣ Redirect with Message
    return redirect()
        ->route('admin.products')
        ->with('success', 'Product added successfully!');
}


// public function products_store(Request $request)
// {
//     // ✅ 1️⃣ Validation
//     $request->validate([
//         'name'              => 'required|string|max:255',
//         'category_id'       => 'required|exists:categories,id',
//         'brand_id'          => 'required|exists:brands,id',
//         'short_description' => 'required|string|max:255',
//         'description'       => 'required|string',
//         'regular_price'     => 'required|numeric|min:0',
//         'sale_price'        => 'nullable|numeric|min:0',
//         'SKU'               => 'required|string|max:100|unique:products,SKU',
//         'quantity'          => 'required|integer|min:0',
//         'image'             => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
//         'images.*'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
//     ]);

//     // ✅ 2️⃣ Create Product Object
//     $product = new Product();
//     $product->name = $request->name;
//     $product->slug = str()->slug($request->name);
//     $product->category_id = $request->category_id;
//     $product->brand_id = $request->brand_id;
//     $product->short_description = $request->short_description;
//     $product->description = $request->description;
//     $product->regular_price = $request->regular_price;
//     $product->sale_price = $request->sale_price;
//     $product->SKU = $request->SKU;
//     $product->quantity = $request->quantity;
//     $product->stock_status = $request->stock_status ?? 'instock';
//     $product->featured = $request->featured ?? 0;

//     // ✅ 3️⃣ Handle Main Image
//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $imageName = time() . '.' . $image->extension();

//         // Main Image Upload
//         $image->move(public_path('uploads/products/'), $imageName);

//         // Thumbnail তৈরি
//         $manager = new ImageManager(new Driver());
//         $thumbPath = public_path('uploads/products/thumbnails/');
//         if (!file_exists($thumbPath)) {
//             mkdir($thumbPath, 0777, true);
//         }

//         $imagePath = public_path('uploads/products/' . $imageName);
//         $manager->read($imagePath)
//             ->cover(300, 300)
//             ->save($thumbPath . $imageName);

//         $product->image = $imageName;
//     }

//     // ✅ 4️⃣ Handle Gallery Images (সঠিকভাবে)
//     $galleryImages = [];
//     if ($request->hasFile('images')) {
//         foreach ($request->file('images') as $galleryImg) {
//             $galleryName = uniqid() . '.' . $galleryImg->extension();

//             $galleryPath = public_path('uploads/products/gallery/');
//             if (!file_exists($galleryPath)) {
//                 mkdir($galleryPath, 0777, true);
//             }

//             $galleryImg->move($galleryPath, $galleryName);

//             // ইমেজ নাম array তে রাখো
//             $galleryImages[] = $galleryName;
//         }

//         // ✅ JSON আকারে DB তে save করো
//         $product->images = json_encode($galleryImages);
//     }

//     // ✅ 5️⃣ Save Product
//     $product->save();

//     // ✅ 6️⃣ Redirect with Message
//     return redirect()
//         ->route('admin.products')
//         ->with('success', '✅ Product added successfully!');
// }






public function viewProduct($id)
{
    $product = Product::with(['category', 'brand'])->findOrFail($id);
    return view('admin.products.view', compact('product'));
}

public function editProduct($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::orderBy('name', 'ASC')->get();
    $brands = Brand::orderBy('name', 'ASC')->get();
    return view('admin.products.edit', compact('product', 'categories', 'brands'));
}

public function updateProduct(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'brand_id' => 'required|integer',
        'regular_price'     => 'required|numeric|min:0',
        'sale_price'        => 'nullable|numeric|min:0',
    ]);

    // Update text fields
    $product->name = $request->name;
    $product->slug = Str::slug($request->name);
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;
    $product->regular_price = $request->regular_price;
    $product->sale_price = $request->sale_price;

  
    $product->description = $request->description ?? $product->description;

    // ✅ Update main image
    if ($request->hasFile('image')) {
        // delete old image if exists
        if (!empty($product->image) && file_exists(public_path('uploads/products/thumbnails/' . $product->image))) {
            unlink(public_path('uploads/products/thumbnails/' . $product->image));
        }

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/products/thumbnails/'), $filename);
        $product->image = $filename;
    }

    // ✅ Update gallery images (multiple)
    if ($request->hasFile('images')) {
        // delete old gallery images if needed
        if (!empty($product->images)) {
            $oldImages = json_decode($product->images, true);
            if (is_array($oldImages)) {
                foreach ($oldImages as $old) {
                    $oldPath = public_path('uploads/products/gallery/' . $old);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
        }

        $gallery = [];
        foreach ($request->file('images') as $file) {
            $imgName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products/gallery/'), $imgName);
            $gallery[] = $imgName;
        }

        $product->images = json_encode($gallery);
    }

    $product->save();

    return redirect()->route('admin.products')
        ->with('success', '✅ Product updated successfully.');
}

public function deleteProduct($id)
{
    $product = Product::findOrFail($id);

    // 🖼️ Main image delete
    if ($product->image) {
        $mainPath = public_path('uploads/products/' . $product->image);
        $thumbPath = public_path('uploads/products/thumbnails/' . $product->image);

        if (file_exists($mainPath)) {
            unlink($mainPath);
        }

        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }
    }

    // 🗂️ Gallery images delete (if any)
    if ($product->images) {
        foreach (json_decode($product->images) as $img) {
            $galleryPath = public_path('uploads/products/gallery/' . $img);
            if (file_exists($galleryPath)) {
                unlink($galleryPath);
            }
        }
    }

    // 🗑️ Delete product record
    $product->delete();

    return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
}



}