@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Dashboard')
@push('pagecss')
@endpush
@push('css')
@endpush
@section('breadcrumb')
@endsection
@section('content')
<productedit-component
    :price="{{$price}}"
    :product="{{$product}}"
    :inventory="{{$inventory}}"
    :release="{{$release}}"
    :category="{{$category}}"
    :categoryprd="{{$prdCategory}}"
    :prdbrand="{{$prdbrand}}"
    :prdvairiants="{{$prdvairiants}}"
></productedit-component>
@endsection
@push('pagejs')
@endpush
@push('js')

@endpush
