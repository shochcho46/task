@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        @include('layouts.common.message.message')




            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <form method="POST" action="{{ route('image.store') }}"  enctype="multipart/form-data">

                    <div class="card">

                        <h5 class="card-header primary-color white-text text-center py-4">
                            <strong>ছবি সংযুক্ত করুণ সর্বোচ্চ 15 টি একসাথে </strong>
                        </h5>

                        <div class="card-body px-lg-5">

                            @csrf
                                    <div class="text-center">
                                        @include('layouts.common.imagepicker.imagepicker')
                                    </div>
                                    @if($errors->has('location'))
                                        <div class="error text-danger m-2">{{ $errors->first('location') }}</div>
                                    @endif

                            <input type="hidden"  name="user_id"  value="{{ Auth::id() }}" required  class="form-control">
                            <input type="hidden"  name="project_id"  value="{{ $project_id }}" required  class="form-control">


                            <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>

            </div>





    </div>








@endsection

@section('subscript')

{{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}

<script type="text/javascript">
$(document).ready(function() {



    $(function(){
        $("#titleimge").spartanMultiImagePicker({
            fieldName:        'location[]',
            maxCount:           10,
            rowHeight:        '500px',
            groupClassName:   'col-md-12 col-sm-12 col-xs-12',
            maxFileSize:      '60000000',
            dropFileLabel : "Drop Here",
            onAddRow:       function(index){
                console.log(index);
                console.log('add new row');
            },
            onRenderedPreview : function(index){
                console.log(index);
                console.log('preview rendered');
            },
            onRemoveRow : function(index){
                console.log(index);
            },
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
    });


 });




</script>

@endsection

