
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
                    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                                    <img src="{{asset('backendAsset/app-assets/images/pages/forgot-password.png')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2 py-1">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Recover your password</h4>
                                            </div>
                                        </div>
                                        <p class="px-2 mb-0">Please enter your email address and we'll send you instructions on how to reset your password.</p>
                                        <div class="card-content">
                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf
                                            <div class="card-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                                        <label for="inputEmail">Email</label>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                <div class="float-md-left d-block mb-1">
                                                <a href="{{route('login')}}" class="btn btn-outline-primary btn-block px-75">Back to Login</a>
                                                </div>
                                                <div class="float-md-right d-block mb-1">
                                                    <button type="submit" class="btn btn-primary btn-block px-75">Recover Password</button>
                                                </div>
                                            </div>
                                        </form>
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
