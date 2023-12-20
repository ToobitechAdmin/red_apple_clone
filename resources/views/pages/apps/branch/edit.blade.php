<!-- resources/views/audios/edit.blade.php -->

<x-default-layout>

    @section('title')
        Edit Branch
    @endsection

    @section('breadcrumbs')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('branch.index') }}">Branch Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Branch</li>
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
                        <h2 class="fw-bold">Edit Branch</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Content-->
                <div class="card-body py-4 mx-20">
                    <!--begin::Form-->
                    <form action="{{ route('branch.update', $data['branch']->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Branch Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter Area Name" value="{{ $data['branch']->name??'' }}"/>
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Address</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="address" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter Address" value="{{ $data['branch']->address??'' }}" />
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Contact Number</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="number" name="number" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter Contact Number"  value="{{ $data['branch']->number??'' }}"/>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">City </label>
                            <!--end::Label-->

                            <select name="city_id" aria-label="Select a City" data-control="select2"
                                data-placeholder="date_period" id="select2-theme"
                                class="form-select form-select-sm form-select-solid form-control form-control-solid mb-3 mb-lg-0">
                                @foreach ($data['city'] as $item)
                                    <option @if ($item->id == $data['branch']->city->id) selected @endif
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <!--begin::Actions-->
                        <div class="text-center pt-10 mb-5">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
