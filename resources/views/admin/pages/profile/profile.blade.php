@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Profile Page')
@push('pagecss')
<link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/pages/users.css')}}">
@endpush
@push('css')
@section('breadcrumb')

@endsection
@section('content')
<div id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="profile-header mb-2">
                <div class="relative">
                    <div class="cover-container" style="width:100%;">
                    <img class="img-fluid bg-cover rounded-0 w-100"  style="width:100%" src="{{asset('backendAsset/app-assets/images/profile/user-uploads/cover.jpg')}}" alt="User Profile Image">
                    </div>
                    <div class="profile-img-container d-flex align-items-center justify-content-between">

                            <img src="{{imgPath('profile/'.Auth::User()->avatar)}}" id="Profile" with="100%" class="rounded-circle img-border box-shadow-1" alt="Card image">

                        <div class="float-right">
                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <div class="dropdown-menu">
                            <form class="px-2 py-2" action="{{route('admin.add.profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleDropdownFormEmail1">Profile Image</label>
                                        <input type="file" class="form-control" id="exampleDropdownFormEmail1" name="avatar" onchange="document.getElementById('Profile').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleDropdownFormPassword1">Cover Image</label>
                                        <input type="file" class="form-control" name="cover" onchange="document.getElementById('cover').src = window.URL.createObjectURL(this.files[0])" id="exampleDropdownFormPassword1">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <p class="dropdown-item">Profile Picture Size 85x85 Suggested</p>
                                <p class="dropdown-item">Cover Picture Size 1000x320 suggested</p>
                            </div>

                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary">
                                <i class="feather icon-settings"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center profile-header-nav">
                    <nav class="navbar navbar-expand-sm w-100 pr-0">
                        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-around w-75 ml-sm-auto">
                                <li class="nav-item px-sm-0">
                                    <a href="#" class="nav-link font-small-3">Timeline</a>
                                </li>
                                <li class="nav-item px-sm-0">
                                    <a href="#" class="nav-link font-small-3">About</a>
                                </li>
                                <li class="nav-item px-sm-0">
                                    <a href="#" class="nav-link font-small-3">Photos</a>
                                </li>
                                <li class="nav-item px-sm-0">
                                    <a href="#" class="nav-link font-small-3">Friends</a>
                                </li>
                                <li class="nav-item px-sm-0">
                                    <a href="#" class="nav-link font-small-3">Videos</a>
                                </li>
                                <li class="nav-item px-sm-0">
                                    <a href="#" class="nav-link font-small-3">Events</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section id="profile-info">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>{{Auth::User()->name}}</h4>
                        <a href="#" class="" >

                        </a>
                        <div class="btn-group mr-1 mb-1">
                            <div class="dropdown">
                                <a type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal cursor-pointer"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit Profile</a>
                                    <a class="dropdown-item" href="#">Option 2</a>
                                    <a class="dropdown-item" href="#">Option 3</a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Option 1</a>
                            <a class="dropdown-item" href="#">Option 2</a>
                            <a class="dropdown-item" href="#">Option 3</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-1">
                            <h6 class="mb-0">About:</h6>
                        <p>{{Auth::User()->about}}</p>
                        </div>
                        <div class="mt-1">
                            <h6 class="mb-0">Joined:</h6>
                            <p>November 15, 2015</p>
                        </div>
                        <div class="mt-1">
                            <h6 class="mb-0">Lives:</h6>
                            <p>{{Auth::User()->address}}</p>
                        </div>
                        <div class="mt-1">
                            <h6 class="mb-0">Email:</h6>
                            <p>{{Auth::User()->email}}</p>
                        </div>
                        <div class="mt-1">
                            <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25"><i class="feather icon-facebook"></i></button>
                            <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25"><i class="feather icon-twitter"></i></button>
                            <button type="button" class="btn btn-sm btn-icon btn-primary p-25"><i class="feather icon-instagram"></i></button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <div class="avatar mr-1">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-01.jpg')}}" alt="avtar img holder" height="45" width="45">
                            </div>
                            <div class="user-page-info">
                                <p class="mb-0">Leeanna Alvord</p>
                                <span class="font-small-2">12 Dec 2018 at 1:16 AM</span>
                            </div>
                            <div class="ml-auto user-like text-danger"><i class="fa fa-heart"></i></div>
                        </div>
                        <p>I love jujubes wafer pie ice cream tiramisu. Chocolate I love pastry pastry sesame snaps wafer. Pastry topping biscuit lollipop topping I love lemon drops sweet roll bonbon. Brownie donut icing.</p>
                    <img class="img-fluid card-img-top rounded-sm mb-2" src="{{asset('backendAsset/app-assets/images/profile/post-media/2.jpg')}}" alt="avtar img holder">
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <div class="d-flex align-items-center">
                                <i class="feather icon-heart font-medium-2 mr-50"></i>
                                <span>145</span>
                            </div>
                            <div class="ml-2">
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Trina Lynes" class="avatar pull-up">
                                        <img class="media-object rounded-circle" src="{{asset('backendAsset/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lilian Nenez" class="avatar pull-up">
                                        <img class="media-object rounded-circle" src="{{asset('backendAsset/app-assets/images/portrait/small/avatar-s-2.jpg')}}"alt="Avatar" height="30" width="30">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Alberto Glotzbach" class="avatar pull-up">
                                        <img class="media-object rounded-circle" src="{{asset('backendAsset/app-assets/images/portrait/small/avatar-s-3.jpg')}}" alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="George Nordic" class="avatar pull-up">
                                        <img class="media-object rounded-circle" src="{{asset('backendAsset/app-assets/images/portrait/small/avatar-s-5.jpg')}}" alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                        <img class="media-object rounded-circle" src="{{asset('backendAsset/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <span>+140 more</span>
                                    </li>
                                </ul>
                            </div>
                            <p class="ml-auto d-flex align-items-center">
                                <i class="feather icon-message-square font-medium-2 mr-50"></i>77
                            </p>
                        </div>
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <div class="avatar mr-50">
                                <img src="{{asset('backendAsset/app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" height="30" width="30">
                            </div>
                            <div class="user-page-info">
                                <h6 class="mb-0">Kitty Allanson</h6>
                                <span class="font-small-2">orthoplumbate morningtide naphthaline exarteritis</span>
                            </div>
                            <div class="ml-auto cursor-pointer">
                                <i class="feather icon-heart mr-50"></i>
                                <i class="feather icon-message-square"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start align-items-center mb-2">
                            <div class="avatar mr-50">
                                <img src="{{asset('backendAsset/app-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="Avatar" height="30" width="30">
                            </div>
                            <div class="user-page-info">
                                <h6 class="mb-0">Jeanie Bulgrin</h6>
                                <span class="font-small-2">blockiness pandemy metaxylene speckle coppy</span>
                            </div>
                            <div class="ml-auto cursor-pointer">
                                <i class="feather icon-heart mr-50"></i>
                                <i class="feather icon-message-square"></i>
                            </div>
                        </div>
                        <fieldset class="form-label-group mb-50">
                            <textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
                            <label for="label-textarea">Add Comment</label>
                        </fieldset>
                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Photos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-6 user-latest-img">
                            <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-01.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-02.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-03.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-04.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-05.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-06.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-07.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-08.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                            <div class="col-md-4 col-6 user-latest-img">
                                <img src="{{asset('backendAsset/app-assets/images/profile/user-uploads/user-09.jpg')}}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary block-element mb-1">Load More</button>
            </div>
        </div>
    </section>
</div>
@endsection
@push('js')
    <!-- BEGIN: Page JS-->
<script src="{{asset('backendAsset/app-assets/js/scripts/pages/user-profile.js')}}"></script>
    <!-- END: Page JS-->
@endpush
