@extends('layouts.admin')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add Product</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <a href="{{ route('admin.products') }}">
                            <div class="text-tiny">Products</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <div class="text-tiny">Add Product</div>
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
                class="tf-section-2 form-add-product">
                @csrf

                <div class="wg-box">
                    <!-- Product Name -->
                    <fieldset class="name">
                        <div class="body-title mb-10">Product Name <span class="text-danger">*</span></div>
                        <input type="text" class="mb-10 form-control" name="name" id="product_name" placeholder="Enter product name"
                            value="{{ old('name') }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </fieldset>


                    <!-- Slug -->
                    <fieldset class="name">
                        <div class="body-title mb-10">Slug <span class="text-danger">*</span></div> 
                        <input type="text" class="mb-10 form-control" name="slug"  id="product_slug"  placeholder="Enter product slug"
                            value="{{ old('slug') }}"   required> @error('slug') <small
                            class="text-danger">{{ $message }}</small> @enderror
                    </fieldset>

        
                    <!-- Category / Brand -->
                    <div class="gap22 cols">
                        <fieldset class="category">
                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>

                        <fieldset class="brand">
                            <div class="body-title mb-10">Brand <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select name="brand_id">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Short Description -->
                    <fieldset class="shortdescription">
                        <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10 ht-150" name="short_description" placeholder="Short Description"
                            required>{{ old('short_description') }}</textarea>
                    </fieldset>

                    <!-- Description -->
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" name="description" placeholder="Description"
                            required>{{ old('description') }}</textarea>
                    </fieldset>
                </div>

                <div class="wg-box">
                    <!-- Main Image Upload -->
                    <fieldset>
                        <div class="body-title">Upload Main Image <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgPreview" style="display:none">
                                <img id="mainPreviewImg" src="#" class="effect8" alt="Preview"
                                    style="max-width: 150px; border-radius: 8px;">
                            </div>
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon"><i class="icon-upload-cloud"></i></span>
                                    <span class="body-text">Drop your image here or select
                                        <span class="tf-color">click to browse</span>
                                    </span>
                                    <input type="file" id="myFile" name="image" accept="image/*" required>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Gallery Upload -->
                    <fieldset>
                        <div class="body-title mb-10">Upload Gallery Images</div>
                        <div class="upload-image mb-16">
                            <div id="galleryPreview" class="flex flex-wrap gap-2 mb-3"></div>
                            <div id="galUpload" class="item up-load">
                                <label class="uploadfile" for="gFile">
                                    <span class="icon"><i class="icon-upload-cloud"></i></span>
                                    <span class="text-tiny">Drop your images here or select
                                        <span class="tf-color">click to browse</span>
                                    </span>
                                    <input type="file" id="gFile" name="images[]" accept="image/*" multiple>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Price Fields -->
                    <div class="cols gap22">
                        <fieldset>
                            <div class="body-title mb-10">Regular Price <span class="text-danger">*</span></div>
                            <input type="number" name="regular_price" class="form-control mb-10"
                                value="{{ old('regular_price') }}" placeholder="Enter regular price" required>
                        </fieldset>
                        <fieldset>
                            <div class="body-title mb-10">Sale Price</div>
                            <input type="number" name="sale_price" class="form-control mb-10"
                                value="{{ old('sale_price') }}" placeholder="Enter sale price">
                        </fieldset>
                    </div>

                    <!-- SKU / Quantity -->
                    <div class="cols gap22">
                        <fieldset>
                            <div class="body-title mb-10">SKU <span class="text-danger">*</span></div>
                            <input type="text" name="SKU" class="form-control mb-10" placeholder="Enter SKU"
                                value="{{ old('SKU') }}" required>
                        </fieldset>
                        <fieldset>
                            <div class="body-title mb-10">Quantity <span class="text-danger">*</span></div>
                            <input type="number" name="quantity" class="form-control mb-10" placeholder="Enter quantity"
                                value="{{ old('quantity') }}" required>
                        </fieldset>
                    </div>

                    <!-- Stock / Featured -->
                    <div class="cols gap22">
                        <fieldset>
                            <div class="body-title mb-10">Stock Status</div>
                            <select name="stock_status" class="form-select">
                                <option value="instock" {{ old('stock_status') == 'instock' ? 'selected' : '' }}>In Stock
                                </option>
                                <option value="outofstock" {{ old('stock_status') == 'outofstock' ? 'selected' : '' }}>Out of
                                    Stock</option>
                            </select>
                        </fieldset>

                        <fieldset>
                            <div class="body-title mb-10">Featured</div>
                            <select name="featured" class="form-select">
                                <option value="0" {{ old('featured') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </fieldset>
                    </div>

                    <div class="cols gap10 mt-4">
                        <button type="submit" class="tf-button w-full btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Main Image Preview
            const mainImageInput = document.getElementById('myFile');
            const imgPreview = document.getElementById('imgPreview');
            const mainPreviewImg = document.getElementById('mainPreviewImg');

            mainImageInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    mainPreviewImg.src = URL.createObjectURL(file);
                    imgPreview.style.display = 'block';
                }
            });

            // Gallery Images Preview
            const galleryInput = document.getElementById('gFile');
            const galleryPreview = document.getElementById('galleryPreview');

            // Store previously selected files
            let galleryFiles = [];

            galleryInput.addEventListener('change', function (e) {
                // Add new selected files to existing ones
                const newFiles = Array.from(e.target.files);
                galleryFiles = galleryFiles.concat(newFiles);

                // Clear preview and render all selected images
                galleryPreview.innerHTML = '';
                galleryFiles.forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '100px';
                    img.style.margin = '4px';
                    img.style.borderRadius = '8px';
                    galleryPreview.appendChild(img);
                });
            });
        });







          //Auto Slug Jonno
        
        
        
        
        
        
        
          document.getElementById('product_name').addEventListener('input', function () {
            let name = this.value;
            let slug = name.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')   // Remove invalid chars
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/-+/g, '-');           // Replace multiple - with single -
            document.getElementById('product_slug').value = slug;
        });
    </script>





@endsection