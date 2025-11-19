@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edit Slider</h3>
        </div>

        <div class="wg-box">
            <form class="form-new-product form-style-1"
                  action="{{ route('slider.update', $slider->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <fieldset class="name">
                    <div class="body-title">Tagline *</div>
                    <input class="flex-grow" type="text" name="tagline"
                           placeholder="Tagline" value="{{ old('tagline', $slider->tagline) }}" required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Title *</div>
                    <input class="flex-grow" type="text" name="title"
                           placeholder="Title" value="{{ old('title', $slider->title) }}" required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Subtitle *</div>
                    <input class="flex-grow" type="text" name="subtitle"
                           placeholder="Subtitle" value="{{ old('subtitle', $slider->subtitle) }}" required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Link *</div>
                    <input class="flex-grow" type="text" name="link"
                           placeholder="Link" value="{{ old('link', $slider->link) }}" required>
                </fieldset>

                <fieldset>
                    <div class="body-title">Upload Image *</div>
                    <div class="upload-image flex-grow">
                        <div class="item up-load">
                            <label class="uploadfile" for="sliderImage">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="body-text">
                                    Drop your image or click to browse
                                </span>
                                <input type="file" id="sliderImage" name="image" accept="image/*" onchange="previewImage(event)">
                            </label>
                        </div>
                    </div>

                    {{-- Preview Image --}}
                    <img id="imagePreview" 
                         src="{{ $slider->image ? asset('uploads/sliders/'.$slider->image) : '' }}" 
                         alt="Slider Image" 
                         style="max-width: 200px; margin-top: 15px; display: {{ $slider->image ? 'block' : 'none' }};">
                </fieldset>

                <fieldset class="category">
                    <div class="body-title">Status</div>
                    <div class="select flex-grow">
                        <select name="status" >
                            <option value="Active" {{ old('status', $slider->status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status', $slider->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </fieldset>

                <div class="bot">
                    <button class="tf-button w208" type="submit">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
function previewImage(event) {
    const input = event.target;
    if(input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const output = document.getElementById('imagePreview');
            output.src = e.target.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection



