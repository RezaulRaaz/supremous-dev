@extends('layouts.backend.app')
@push('meta')
@endpush
@push('css')
    <style>
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #000;
            background-color: #ffffff14;
            border-bottom: 1px solid;
        }
    </style>
@endpush
@section('content')


    <div class="row">
        <div class="col-xl-12 col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Item</h4>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Primary</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-4">
                                    <form>
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" placeholder="Product Name" id="name" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Regular Price</label>
                                            <input type="text" class="form-control" placeholder="Price" id="name" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Special Price</label>
                                            <input type="text" class="form-control" placeholder="Price" id="name" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputState">Category</label>
                                            <select id="inputState" class="form-control">
                                                <option selected>Select Category..</option>
                                                <option>Men</option>
                                                <option>Women</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputState">Sub Category</label>
                                            <select id="inputState" class="form-control">
                                                <option selected>Select Category..</option>
                                                <option>Men</option>
                                                <option>Women</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Short Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Long Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputState">Brand(optional)</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Select Brand..</option>
                                            <option>Men</option>
                                            <option>Women</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Per Piece Price</label>
                                        <input type="text" class="form-control" placeholder="Price" id="name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Quantity Of Purchase Product</label>
                                        <input type="text" class="form-control" placeholder="Price" id="name" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">Product review Youtube Video Link (optional)</label>
                                        <input type="text" class="form-control" placeholder="Youtube Link" id="name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Minimum Quantity(optional)</label>
                                        <input type="text" class="form-control" placeholder="Minimum Quantity" id="name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Barcode/Qr code Text</label>
                                        <input type="text" class="form-control" placeholder="Barcode" id="name" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputState">Variation Specifics(Optional)</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Select variation..</option>
                                            <option>Number</option>
                                            <option>Size</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
