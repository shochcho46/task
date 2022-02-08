@extends('layouts.admin.main')

@section('content')
 <div class="container">

    <div class="row mb-3">



        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            @include('layouts.common.message.message')

                 <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                    @csrf

                        <div class="card">

                            <h5 class="card-header primary-color white-text text-center py-4">
                                <strong>কাজ সংযুক্ত করুন</strong>
                            </h5>


                            <div class="card-body px-lg-5">


                                    <div class="md-form mt-3">
                                        <input type="text" id="detail" name="detail"  placeholder="কাজ এর নাম " value="{{ old('detail') }}"required class="form-control">
                                        <label for="detail">কাজ এর নাম </label>
                                    </div>
                                    @if($errors->has('detail'))
                                        <div class="error text-danger m-2">{{ $errors->first('detail') }}</div>
                                    @endif

                                    <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">SUBMIT</button>

                                </form>


                            </div>

                        </div>



        </div>





</div>


 </div>





@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection

