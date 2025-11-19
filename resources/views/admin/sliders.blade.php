@extends('layouts.admin')

@section('content')

    <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Slider</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Slider</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{ route('admin.add.slider') }}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Tagline</th>
                                                    <th>Title</th>
                                                    <th>Subtitle</th>
                                                    <th>Link</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                    @foreach($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
<td>
    <img src="{{ asset('uploads/sliders/'.$slider->image) }}" style="width:50px; height:auto;">
</td>

                                        <td>{{ $slider->tagline }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->subtitle }}</td>
                                        <td>{{ $slider->link }}</td>
                                        <td>
                                            @if ($slider->status == "Active")
                                                <span class="badge bg-success px-3 py-2">Active</span>
                                            @else
                                                <span class="badge bg-danger px-3 py-2">Inactive</span>
                                            @endif
                                        </td>
                                            <td>
                                    <div class="list-icon-function" style="display: flex; align-items: center; gap: 15px;">
                                  
                                        <a href="{{ route('slider.edit', $slider->id) }}" class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </a>

                                        <form action="{{ route('admin.slider.delete', $slider->id) }}" method="POST"
                                            style="margin: 0; padding: 0; display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item text-danger delete"
                                                style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                        </table>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                                    </div>
                                </div>
                            </div>
                        </div>

@endsection
