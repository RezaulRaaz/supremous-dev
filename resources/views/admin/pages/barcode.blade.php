@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Barcode')
@push('pagecss')
@endpush
@push('css')
@endpush
@section('breadcrumb')
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">
                    Barcode

                    <div class="barcode" style="max-width:150px;">
                        <p style="font-size:12px;margin:0;" class="name">Supremouse</p>
                        {!! DNS1D::getBarcodeHTML('Supremouse barcode', "C128",1.4,40) !!}
                        <p style="font-size:12px;margin:0;">1234</p>
                    </div>

                    <br>
                    <br>

                    @for($i = 0; $i <=20;$i++ )
                    <div style="float:left;margin-right:30px;height:150px">    <p style="font-size:14px;text-align:center">neerveek</p>
                        {!! \DNS2D::getBarcodeSVG("price:130, http://supremous.com/", "QRCODE"); !!}</div>&nbsp; &nbsp; &nbsp;

                     @endfor
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    @for($i = 0; $i <=20;$i++ )
                        <div style="float:left;margin-right:30px;height:150px">    <p style="font-size:14px;text-align:center">neerveek</p>
                            {!! \DNS1D::getBarcodeSVG("price:590", 'C128'); !!}</div>&nbsp; &nbsp; &nbsp;


                    @endfor

                    {{-- <br>
                    <br>
                    <br>
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('14556', 'C39')}}" alt="barcode" />

                    <br>
                    <br>
                    <br>
                    <br>
                {!!\DNS2D::getBarcodeSVG('4445645656', 'DATAMATRIX');!!}
                <br>
                <br>
                <br>
                {!! \DNS2D::getBarcodeSVG("dsfodsjafjds", "QRCODE"); !!}
                </h4> --}}

            </div>
        </div>
    </div>
</div>
@endsection
@push('pagejs')
@endpush
@push('js')
@endpush
