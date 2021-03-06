    <!-- mobile slider -->
    <div id="carouselExampleIndicators" class="carousel mobile-slider slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($sliders as $key=>$slider)
                 <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{ $key == 0 ? ' active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $key=>$slider)
            <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
            <img class="d-block w-100" src="{{'images/slider/'.$slider->image}}" alt="First slide">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- slider start here -->
    <div id="carouselExampleControls" class="carousel large-slider slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $key=>$slider)
         <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
              <div class="slider" style="background-image: url('{{'images/slider/'.$slider->image}}');">
                    <div class="slider-area d-flex align-items-center">
                        <div class="container">
                            <div class="slider-title">
                            <h1 style="color:{{$slider->text_color}}">{{$slider->title}}</h1>
                                <div class="slider-shop-now-btn d-flex align-items-center">
                                <a href="{{$slider->btn_url}}" style="text-decoration: none">
                                  <div class="btn-icon" style="color:{{$slider->btn_color}};Background-color:{{$slider->bg_color}}">
                                        <span class="material-icons">east</span>&nbsp;<p class="text-uppercase">{{$slider->button_label}}</p>
                                 </div>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="space-gap"></div>
