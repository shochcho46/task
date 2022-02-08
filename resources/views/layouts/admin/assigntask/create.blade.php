@extends('layouts.admin.main')

@section('content')
 <div class="container">

    <div class="row mb-3">



        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            @include('layouts.common.message.message')

                 <form method="POST" action="{{ route('assingtask.store') }}" enctype="multipart/form-data">
                    @csrf

                        <div class="card">


                            <h5 class="card-header primary-color white-text text-center py-4">
                                <strong>কাজ বরাদ্দ করুন</strong>
                            </h5>
                            <div class="card-body px-lg-5">
                            <div class="md-form ">
                                <select name ="user_id" class="mdb-select colorful-select dropdown-primary" searchable="Search here.." required>
                                    <option value="" disabled selected>কর্মী</option>

                                        @foreach ($user as $uvalue)
                                        <option value="{{ $uvalue->id }}">{{ $uvalue->name }}</option>
                                        @endforeach

                                </select>
                                <label class="mdb-main-label">কর্মী সংযুক্ত করুণ </label>

                                @if($errors->has('user_id'))
                                <div class="error text-danger m-2">{{ $errors->first('user_id') }}</div>
                                 @endif
                            </div>


                            <div class="md-form ">
                                <select name ="project_id" class="mdb-select colorful-select dropdown-primary" searchable="Search here.." required>
                                    <option value="" disabled selected>ঘর</option>

                                        @foreach ($project as $pvalue)
                                        <option value="{{ $pvalue->id }}">{{ $pvalue->name }}</option>
                                        @endforeach

                                </select>
                                <label class="mdb-main-label">ঘর সংযুক্ত করুণ </label>

                                @if($errors->has('project_id'))
                                <div class="error text-danger m-2">{{ $errors->first('project_id') }}</div>
                                 @endif
                            </div>




                            <div class="md-form ">
                                <select name ="task_id[]" class="mdb-select md-form colorful-select dropdown-primary" multiple searchable="Search here.." required>
                                    <option value="" disabled selected>কাজ</option>

                                        @foreach ($task as $tvalue)
                                        <option value="{{ $tvalue->id }}">{{ $tvalue->detail }}</option>
                                        @endforeach

                                </select>
                                <label class="mdb-main-label">কাজ সংযুক্ত করুণ </label>

                                @if($errors->has('task_id'))
                                <div class="error text-danger m-2">{{ $errors->first('task_id') }}</div>
                                 @endif
                            </div>


                            


                                    <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">SUBMIT</button>




                            </div>

                        </div>

                    </form>

        </div>





</div>


 </div>





@endsection

@section('subscript')

<script type="text/javascript">
 $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>
@endsection

