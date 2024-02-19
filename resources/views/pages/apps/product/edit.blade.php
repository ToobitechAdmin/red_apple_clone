<!-- resources/views/audios/edit.blade.php -->

<x-default-layout>

    @section('title')
        Edit Product
    @endsection

    @section('breadcrumbs')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </nav>
    @endsection

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="fw-bold">Edit Product</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Content-->
                <div class="card-body py-4 mx-20">
                    <!--begin::Form-->
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Product File</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="file" name="image" class="form-control form-control-solid mb-3 mb-lg-0" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2" name="title">Title</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Title" value="{{ $product->title }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2" name="name">Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Name" value="{{ $product->name }}" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2" name="description">Description</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Description" value="{{ $product->description }}" />
                            <!--end::Input-->
                        </div>
                        {{-- <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2" name="price">Price</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Price" value="{{ $product->price }}" />
                            <!--end::Input-->
                        </div> --}}
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Variants</label>
                            <!--end::Label-->
                            @foreach ($product->variants as $item)

                                @if ($item->type === "S")

                                    <div class="input-group mb-5">
                                        <span class="input-group-text" id="">S</span>
                                        <input type="hidden" name="variant_ids[]" value="{{ $item->id }}">
                                        <input type="text" class="form-control" name="small_price" placeholder="Small" value="{{ $item->price }}" aria-label="Small" aria-describedby="basic-addon2"/>
                                    </div>
                                @endif
                                @if ($item->type === "M")

                                    <div class="input-group mb-5">
                                        <span class="input-group-text" id="">M</span>
                                        <input type="hidden" name="variant_ids[]" value="{{ $item->id }}">
                                        <input type="text" class="form-control" name="medium_price" placeholder="Medium" value="{{ $item->price }}" aria-label="Medium" aria-describedby="basic-addon2"/>
                                    </div>
                                @endif
                                @if ($item->type === "L")

                                    <div class="input-group mb-5">
                                        <span class="input-group-text" id="">M</span>
                                        <input type="hidden" name="variant_ids[]" value="{{ $item->id }}">
                                        <input type="text" class="form-control" name="large_price" placeholder="Large" value="{{ $item->price }}" aria-label="Large" aria-describedby="basic-addon2"/>
                                    </div>
                                @endif
                            @endforeach
                            <!--end::Input-->
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="select2-theme form-control" name="category_id"
                                id="select2-theme">
                                @foreach ($categories as $item)

                                    <option @if ($item->id == $product->category_id) selected

                                    @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach



                            </select>
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center pt-10 mb-5">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</x-default-layout>
