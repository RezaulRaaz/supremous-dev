@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Dashboard')
@push('pagecss')
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backendAsset/app-assets/css/pages/data-list-view.css')}}">
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 mt-5">
                <!-- Data list view starts -->
              <list-component></list-component>
                <!-- Data list view end -->
        </div>
    </div>
@endsection
@push('pagejs')
    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
@endpush
@push('js')
@endpush
