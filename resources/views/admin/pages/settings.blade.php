@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Setiings')
@push('pagecss')
<link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/vendors/css/forms/select/select2.min.css')}}">
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('backendAsset/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('backendAsset/app-assets/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('backendAsset/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<!-- END: Vendor CSS-->
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/plugins/forms/validation/form-validation.css')}}">
@endpush
@section('content')
           <!-- account setting page start -->
           <section id="page-account-settings">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                <i class="feather icon-globe mr-50 font-medium-3"></i>
                                General
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                <i class="feather icon-lock mr-50 font-medium-3"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                <i class="feather icon-info mr-50 font-medium-3"></i>
                                Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                <i class="feather icon-link mr-50 font-medium-3"></i>
                                Social links
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                <i class="feather icon-feather mr-50 font-medium-3"></i>
                                Connect Plugins
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                Notifications
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                        <form action="{{route('admin.add.setting',$setting->id)}}" method="post"  enctype="multipart/form-data" >
                                            @csrf
                                        <div class="row">
                                            <div class="col-lg-4 col-xl-6">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                    <img src="{{favIcon()}}" id="blah" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <input type="file" name="fav_icon" id="account-upload input"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Upload fav Icon. 64x64 pixels
                                                                size of
                                                                100kB</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-6">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                    <img id="logo" src="{{logo()}}" class="rounded mr-75" alt="profile image" width="100%">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <input name="logo" type="file" id="account-upload"  onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>
                                                                200kB</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-username">Store Name</label>
                                                            <input type="text" class="form-control" name="Store_name" id="account-username" placeholder="Store name" value="{{$setting->Store_name}}" required data-validation-required-message="This store name field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-name">Store Phone</label>
                                                            <input type="text" class="form-control" name="Store_phone" id="account-name" placeholder="phone" value="{{$setting->store_mobile}}" required data-validation-required-message="This phone field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-name">Alternate Phone</label>
                                                            <input type="text" class="form-control"  name="alternate_phone" id="account-name" placeholder="phone" value="{{$setting->store_alterNate_mobile}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-e-mail">E-mail</label>
                                                            <input type="email" class="form-control" name="store_email" id="account-e-mail" placeholder="Email" value="{{$setting->store_email}}" required data-validation-required-message="This email field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="accountTextarea">Address</label>
                                                        <textarea class="form-control" id="accountTextarea" name="address" rows="3" placeholder="Your Company Description...">{{$setting->store_address}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="accountTextarea">Description</label>
                                                        <textarea class="form-control" id="accountTextarea" name="Dsc" rows="3" placeholder="Your Company Description...">{{$setting->strore_description}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                        <form novalidate>
                                           <password-component></password-component>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                        <form novalidate>
                                        <info-component></info-component>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                       <social-component></social-component>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                       <connect-component :massenger="{{Massenger()}}"></connect-component>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                        <div class="row">
                                            <h6 class="m-1">Activity</h6>
                                            <div class="col-12 mb-1">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                                                    <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                    <span class="switch-label w-100">Email me when someone comments
                                                        onmy
                                                        article</span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                                                    <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                    <span class="switch-label w-100">Email me when someone answers on
                                                        my
                                                        form</span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                    <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                    <span class="switch-label w-100">Email me hen someone follows
                                                        me</span>
                                                </div>
                                            </div>
                                            <h6 class="m-1">Application</h6>
                                            <div class="col-12 mb-1">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch4">
                                                    <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                    <span class="switch-label w-100">News and announcements</span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                    <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                    <span class="switch-label w-100">Weekly product updates</span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                                                    <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                    <span class="switch-label w-100">Weekly blog digest</span>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- account setting page end -->
@endsection
@push('pagejs')
  <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('backendAsset/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backendAsset/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('backendAsset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('backendAsset/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{ asset('backendAsset/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{ asset('backendAsset/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
@endpush
@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{asset('backendAsset/app-assets/js/scripts/pages/account-setting.js')}}"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('backendAsset/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <!-- END: Page JS-->
@endpush
