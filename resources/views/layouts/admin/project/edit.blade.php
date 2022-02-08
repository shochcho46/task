@extends('layouts.admin.main')


@section('content')
 <div class="container">

    <div class="row mb-3">


    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3">
    </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">


            <form method="POST" action="{{ route('project.update',$data->id) }}" enctype="multipart/form-data">

                @csrf

                @method('PUT')


                        <div class="card">

                            <h5 class="card-header primary-color white-text text-center py-4">
                                <strong>ঘর এর নাম এডিট করুন </strong>
                            </h5>


                            <div class="card-body px-lg-5">

                                <div class="md-form mt-3">
                                    <input type="text" id="name" name="name"  placeholder="Room Name" value="{{ old('name') ?? $data->name }}"required class="form-control">
                                    <label for="name">ঘর এর নাম</label>
                                </div>
                                @if($errors->has('name'))
                                    <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                                @endif



                                    <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">UPDATE</button>

                                </form>

                            </div>

                        </div>



        </div>


    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3">
    </div>


</div>


 </div>





@endsection

