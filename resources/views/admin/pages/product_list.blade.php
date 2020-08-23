@extends('layouts.backend.app')
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Product List</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <a href="#"><span class="badge badge-secondary">Edit</span></a>
                                <a href="#"><span class="badge badge-danger">X</span></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
