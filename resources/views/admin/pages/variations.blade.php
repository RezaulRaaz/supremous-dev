@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Page Title')
@push('pagecss')
@endpush
@push('css')
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 mt-5">
           <variation-component></variation-component>
        </div>
    </div>
@endsection
@push('js')
@endpush
