@extends('layouts.admin')

@section('content')

{{-- edit --}}
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3> Edit Category</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <a href="#">
                        <div class="text-tiny">Brands</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">New Brand</div></li>
            </ul>
        </div>

        <!-- new-category -->
        <div class="wg-box">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Brand Name --}}
                <fieldset class="name mt-4">
                    <div class="body-title">Category Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Brand name" name="name" 
                          value="{{ $category->name }}" required>
                </fieldset>
                @error('name') 
                    <span class="alert alert-danger text-center">{{ $message }}</span> 
                @enderror

         

                {{-- Image Upload --}}
                <fieldset>
                    <div class="body-title mt-5">Upload Image <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        
                        <div id="upload-file" class="item up-load">
                     {{-- ✅ Image Preview Box --}}
               <div class="mt-3 text-left">
                                <img id="imagePreview" src="{{ $category->image ? asset('uploads/brands/' . $category->image) : '' }}" 
                                     alt="{{ $category->name }}" class="img-thumbnail" style="max-width: 250px;">
                            </div>
                            <label class="uploadfile" for="myFile">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="body-text">
                                    Drop your image here or <span class="tf-color">click to browse</span>
                                </span>
                                <input type="file" id="myFile" name="image" accept="image/*" onchange="previewImage(event)">
                            </label>
                
                        </div>
                

                    </div>
                </fieldset>

               
               <div class="d-flex justify-content-left gap-3 mt-5">
                            <a href="{{ route('admin.brands') }}" class="btn btn-secondary btn-lg px-4">Back</a>
                            <button type="submit" class="btn btn-success btn-lg px-4">Update Category</button>
                        </div>
            </form>
        </div>
    </div>
</div>



<!-- Live Image Preview Script -->
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
