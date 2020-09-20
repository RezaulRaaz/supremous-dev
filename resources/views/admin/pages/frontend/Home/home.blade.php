@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Setiings')
@push('pagecss')
<link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/vendors/css/extensions/swiper.min.css')}}">
   <!-- BEGIN: Page CSS-->
   <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/core/colors/palette-gradient.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('backendAsset/app-assets/css/plugins/extensions/swiper.css')}}">
   <!-- END: Page CSS-->
@endpush
@push('css')
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 mt-5">
            <section id="component-swiper-navigations">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Add New Slider</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                <form enctype="multipart/form-data" action="{{route('admin.frontend.slider')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <label for="name">Slider Title</label>
                                                <input type="text" class="form-control" placeholder="Slider Title" name="Slider_title" id="name" aria-describedby="emailHelp">
                                            </div>
                                           </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Text Color</label>
                                                <input type="color" name="text_color" class="form-control" id="exampleFormControlFile1">
                                            </div>
                                           </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Slider Image</label>
                                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                           <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Button Label</label>
                                                    <input type="text" name="button_label" class="form-control" id="exampleFormControlFile1">
                                                </div>
                                               </div>
                                               <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Btn Bg Color</label>
                                                    <input type="color" name="bg_color" class="form-control" id="exampleFormControlFile1">
                                                </div>
                                               </div>
                                               <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Btn Text Color</label>
                                                    <input type="color" name="btn_text_color" class="form-control" id="exampleFormControlFile1">
                                                </div>
                                               </div>
                                           </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Button Url</label>
                                                <input type="text" name="btn_url" class="form-control" id="exampleFormControlFile1">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <h5>Sliders</h5>
                                    <p></p>
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
                                            @foreach($sliders as $slider)
                                        <tr >
                                            <th scope="row">1</th>
                                            <td>{{ $slider->title}}</td>
                                            <td>
                                                <img src="{{'/images/slider/'.$slider->image}}" width="170ox" height="170px"
                                                     alt="..." class="img-thumbnail">
                                            </td>
                                            <td>
                                            <a href="{{route('admin.frontend.slider.edit',$slider->id)}}"><span class="badge badge-secondary">Edit</span></a>
                                                <a href="{{route('admin.frontend.slider.delete',$slider->id)}}"><span class="badge badge-danger">X</span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('pagejs')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backendAsset/app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
@endpush
@push('js')
  <!-- BEGIN: Page JS-->
  <script src="{{ asset('backendAsset/app-assets/js/scripts/extensions/swiper.js') }}"></script>
  <!-- END: Page JS-->
@endpush
