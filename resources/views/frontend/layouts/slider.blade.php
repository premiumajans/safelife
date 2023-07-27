<div class="element-slider-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="service-gallery">
                    @foreach($sliders as $slider)
                        <div class="item"><img src="{{ asset($slider->photo) }}" alt="{{ $slider->alt }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
