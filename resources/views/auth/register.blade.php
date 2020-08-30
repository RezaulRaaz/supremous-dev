<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/vendors/css/vendors.min.css')}}">
        <!-- END: Vendor CSS-->
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/themes/semi-dark-layout.css')}}">
        <!-- End: Theme CSS-->
            <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/core/colors/palette-gradient.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/pages/authentication.css')}}">
            <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/assets/css/style.css')}}">
        <!-- END: Custom CSS-->
    <title>Document</title>
</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" >
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="{{asset('backendAsset/app-assets/images/pages/register.jpg')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Create Account</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Fill the below form to create a new account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputName" value="{{ old('name') }}" name="name" autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror" placeholder="Name" required>
                                                        <label for="inputName">Name</label>
                                                    </div>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                     @enderror
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                                                        <label for="inputEmail">Email</label>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                                        <label for="inputPassword">Password</label>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputConfPassword" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                                                        <label for="inputConfPassword">Confirm Password</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                <a href="{{route('login')}}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
      <!-- BEGIN: Vendor JS-->
      <script src="{{ asset('backendAsset/app-assets/vendors/js/vendors.min.js')}}"></script>
      <!-- BEGIN Vendor JS-->
      <script src="{{ asset('js/app.js') }}"></script>
      <!-- BEGIN: Theme JS-->
      <script src="{{asset('backendAsset/app-assets/js/core/app-menu.js')}}"></script>
      <script src="{{asset('backendAsset/app-assets/js/core/app.js')}}"></script>
      <script src="{{asset('backendAsset/app-assets/js/scripts/components.js')}}"></script>
      <!-- END: Theme JS-->
</body>
</html>
