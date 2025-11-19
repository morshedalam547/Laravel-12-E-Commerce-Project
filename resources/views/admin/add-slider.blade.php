@extends('layouts.admin')
@section('content')

<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Slide</h3>
        </div>

        <div class="wg-box">
            <form class="form-new-product form-style-1"
                  action="{{ route('admin.slider.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                
                @csrf

                <fieldset class="name">
                    <div class="body-title">Tagline *</div>
                    <input class="flex-grow" type="text" name="tagline" placeholder="Tagline" required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Title *</div>
                    <input class="flex-grow" type="text" name="title" placeholder="Title" required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Subtitle *</div>
                    <input class="flex-grow" type="text" name="subtitle" placeholder="Subtitle" required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Link *</div>
                    <input class="flex-grow" type="text" name="link" placeholder="Link" required>
                </fieldset>

                <fieldset>
    <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
    <div class="upload-image flex-grow">
        <div class="item up-load">
             <!-- Preview Image -->
    <img id="imagePreview" src="" alt="" 
         style="max-width: 200px; margin-top: 15px; display:none;">
            <label class="uploadfile" for="sliderImage">
                <span class="icon">
                    <i class="icon-upload-cloud"></i>
                </span>
                <span class="body-text">
                    Drop your images here or select 
                    <span class="tf-color">click to browse</span>
                </span>

                <input type="file" id="sliderImage" name="image" onchange="previewImage(event)">
            </label>
        </div>
    </div>

   
</fieldset>



                <fieldset class="category">
                    <div class="body-title">Status</div>
                    <div class="select flex-grow">
                        <select name="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </fieldset>

                <div class="bot">
                    <button class="tf-button w208" type="submit">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection



