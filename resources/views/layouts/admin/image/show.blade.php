@extends('layouts.admin.main')


@section('css')

<link href="{{ asset('gallery/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('gallery/js/highslide/highslide.css') }}" rel="stylesheet">

@endsection

@section('content')

<h4 class="text-center mt-2">কাজ এর ছবি </h4>
<div class="container-fluid">
    {{--  @include('layouts.common.message.message')  --}}

    <div class="row  mt-5">
        <div class="text-center">

        
        <form method="POST" action="{{ route('image.getpicdate') }}" enctype="multipart/form-data">
            @csrf


            <select class="mdb-select md-form" name="date">
                <option value="all" selected>ALL</option>
                    @foreach ($dataFilter as $dateval)
                <option value="{{ $dateval }}">{{ $dateval }}</option>
                @endforeach
               
               
              </select>

              <input type="hidden" id="projectId" name="projectId" value="{{ $project_id }}">
                              
            <button class="btn btn-outline-primary btn-rounded btn-sm z-depth-0 my-4 waves-effect" type="submit">SUBMIT</button>
              
        </form>

    </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">

            <div class="highslide-gallery">
                <div class="grid">
                  <div class="grid-sizer"></div>

                  <div class="grid-item"></div>

                  @foreach ($data as $picture)

                 
                  <div class="grid-item grid-item">

                    <a href="{{ url($picture->location) }}" class="highslide" onclick="return hs.expand(this)">
                                <img src="{{ url($picture->location) }}" alt="Highslide JS"
                                    title="Click to enlarge" />
                        </a>
                  </div>

                  @endforeach


                </div>
                </div>

            



                

        </div>

        </div>

    </div>

    
     <input type="hidden" id="url" value="{{ url('gallery/js/highslide/graphics/') }}">

<div>


@endsection

@section('script')

<script src="{{ asset('gallery/js/highslide/highslide-with-gallery.min.js') }}" ></script>
<script src="{{ asset('gallery/js/masonry.js') }}" ></script>

<script type="text/javascript">


$(document).ready(function() {
    $('.mdb-select').materialSelect();


});


</script>

<script type="text/javascript">

    var url = $('#url').val();
    hs.graphicsDir = url+'/';

    // hs.graphicsDir = 'http://127.0.0.1:8000/epaper/js/highslide/graphics/';

    hs.align = 'center';
    hs.transitions = ['expand', 'crossfade'];
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'controls-in-heading';
    hs.fadeInOut = true;
    //hs.dimmingOpacity = 0.75;

    // Add the controlbar
    if (hs.addSlideshow) hs.addSlideshow({
        //slideshowGroup: 'group1',
        interval: 5000,
        repeat: false,
        useControls: true,
        fixedControls: false,
        overlayOptions: {
            opacity: 1,
            position: 'top right',
            hideOnMouseOut: false
        }
    });
</script>

<script type="text/javascript">
    $( document ).ready(function() {


// external js: masonry.pkgd.js, imagesloaded.pkgd.js

// init Masonry
var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    columnWidth: '.grid-sizer',
   // columnWidth: 200
    // horizontalOrder: true
});


// layout Masonry after each image loads
$grid.imagesLoaded().progress( function() {
$grid.masonry();
});


});
</script>


@endsection
