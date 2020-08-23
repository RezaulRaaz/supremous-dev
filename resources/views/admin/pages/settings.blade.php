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
                    <h4 class="header-title">Settings</h4>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Store Name</label>
                                <input type="text" class="form-control" placeholder="Store Name" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="name">Website url</label>
                                <input type="text" class="form-control" placeholder="url" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="name">Phone No</label>
                                <input type="text" class="form-control" placeholder="phone" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="name">Alternate Phone No</label>
                                <input type="text" class="form-control" placeholder="phone no" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="name">Address Phone No</label>
                                <input type="text" class="form-control" placeholder="address" id="name" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Store Email</label>
                                <input type="text" class="form-control" placeholder="Store email" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Store Details</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Store Logo</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Fav Icon</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
