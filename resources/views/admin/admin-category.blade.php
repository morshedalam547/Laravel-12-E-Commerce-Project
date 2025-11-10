@extends('layouts.admin');
@section('content');

    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">

                <h3>Categories</h3>

                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Categories</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('admin.categoryAdd') }}"><i class="icon-plus"></i>Add
                        new</a>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Products</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)

                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td class="pname">

                                            <div class="image">
                                                <img src="{{ asset('uploads/brands/' . $category->image) }}"
                                                    alt="{{ $category->name }}" class="image w-24 h-auto rounded shadow">
                                            </div>
                                            <div class="name">
                                                <a href="#" class="body-title-2">{{ $category->name }}</a>
                                            </div>
                                        </td>
                                        <div class="name">
                                            <td>{{ $category->slug }}</td>

                                        </div>

                                        <td>0</td>

                                        <td>
                                         <div class="list-icon-function">
                                                <a href="{{ route('category.edit', $category->id) }}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>

                                                <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                                    class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-link  text-danger delete-btn"
                                                        title="Delete Brand">
                                                        <i class="icon-trash-2 fs-3 "></i>
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
                        {{  $categories->links('pagination::bootstrap-5') }}

                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            const form = btn.closest(".delete-form");

            Swal.fire({
                title: "⚠️ Are you sure?",
                text: "This brand will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "✅ Yes, delete it!",
                cancelButtonText: "❌ Cancel",
                confirmButtonColor: "#198754",
                cancelButtonColor: "#dc3545",
                width: 480,
                padding: "1.8rem",
                background: "rgba(255, 255, 255, 0.85)",
                customClass: {
                    popup: "swal-popup-lg",
                    title: "swal-title-lg",
                    htmlContainer: "swal-text-lg",
                    confirmButton: "swal-btn-lg",
                    cancelButton: "swal-btn-lg"
                }
            }).then(result => result.isConfirmed && form.submit());
        });
    });
});
</script>

<style>
/* ✅ বড় ও পরিষ্কার লেখা */
.swal-popup-lg { font-size: 15px !important; }
.swal-title-lg { font-size: 22px !important; font-weight: 700 !important; }
.swal-text-lg { font-size: 15px !important; }
.swal-btn-lg {
    font-size: 15px !important;
    padding: 12px 28px !important;
    border-radius: 8px !important;
}
</style>




@endsection