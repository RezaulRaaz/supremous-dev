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
                    <h4 class="header-title">Profile</h4>
                    <div class="row">
                        <div class="col-3">
                            <div class="s-member">
                                <div class="media align-items-center">
                                    <img src="assets/images/team/team-author1.jpg" class="d-block ui-w-30 rounded-circle" alt="">
                                    <div class="media-body ml-5">
                                        <p>Amir Hamza</p><span>Manager</span>
                                    </div>
                                    <div class="tm-social">
                                        <a href="#"><i class="fa fa-phone"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
