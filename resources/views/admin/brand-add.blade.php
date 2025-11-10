@extends('layouts.admin')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Brand Information</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <a href="{{ route('admin.brands') }}">
                            <div class="text-tiny">Brands</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <div class="text-tiny">New Brand</div>
                    </li>
                </ul>
            </div>

            <!-- new-brand -->
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('admin.brandStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Brand Name --}}
                    <fieldset class="name mb-4">
                        <div class="body-title">Brand Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow form-control" type="text" placeholder="Brand name" name="name"
                            id="brand_name" value="{{ old('name') }}" required>
                    </fieldset>
                    @error('name')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    {{-- Slug --}}
                    <fieldset class="name mb-4">
                        <div class="body-title">Brand Slug <span class="tf-color-1">*</span></div>
                        <input class="flex-grow form-control" type="text" placeholder="Brand Slug" name="slug"
                            id="brand_slug" value="{{ old('slug') }}" readonly>
                    </fieldset>
                    @error('slug')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror


                    {{-- Image Upload --}}
                    <fieldset>
                        <div class="body-title">Upload Image <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">

                            <div id="upload-file" class="item up-load">
                                {{-- ✅ Image Preview Box --}}
                                <div class="mb-3 mt-3">
                                    <img id="preview" src="#" alt="Preview"
                                        style="display:none; max-width:200px; border-radius:10px; margin-top:10px;">
                                </div>
                                <label class="uploadfile" for="myFile">
                                    <span class="icon"><i class="icon-upload-cloud"></i></span>
                                    <span class="body-text">
                                        Drop your image here or <span class="tf-color">click to browse</span>
                                    </span>
                                    <input type="file" id="myFile" name="image" accept="image/*"
                                        onchange="previewImage(event)">
                                </label>

                            </div>


                        </div>
                    </fieldset>


                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ✅ JavaScript for Image Preview --}}
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // preview visible করবে
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        //Auto Slug Jonno
        document.getElementById('brand_name').addEventListener('input', function () {
            let name = this.value;
            let slug = name.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')   // Remove invalid chars
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/-+/g, '-');           // Replace multiple - with single -
            document.getElementById('brand_slug').value = slug;
        });
    </script>

@endsection