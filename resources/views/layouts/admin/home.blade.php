@extends('layouts.admin.main')

@section('css')

@endsection

@section('content')
<h1>Admin User</h1>

<div class="container-fluid">
     <br>
  <h4 class="text-center mt-2">Project List</h4>

  @include('layouts.common.message.message')

  <div class="table-responsive m-3">
     <table class="table text-center table-striped" id="tasklistshow">
         <thead class="primary-color white-text">
           <tr>
             <th scope="col">#</th>

             <th scope="col"> Name</th>
             <th scope="col"> Confirm</th>
             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>
             @foreach($data as $kye => $value)





             <tr>
                  <td >{{ $kye +1}}</td>


                 <td>{{ $value['projectName'] }}</td>

                 <td>
                    <div class="progress md-progress" style="height: 20px">
                        <div class="progress-bar" role="progressbar" style="width: {{ $value['done'] }}%; height: 20px" aria-valuenow="{{ $value['done'] }}" aria-valuemin="0" aria-valuemax="100">{{ $value['done'] }}%</div>
                    </div>


                </td>



                 <td>

                    @if((Auth::user()->type == "admin")||(Auth::user()->type == "superadmin"))

                    <a class="btn-floating btn-sm btn-primary"  href="{{ route('usertasklist.show',$value['id']) }}"><i class="mdi mdi-format-list-checks mdi-18px"></i></a>
                    <a class="btn-floating btn-sm btn-primary"  href="{{ route('allimage.show',$value['id']) }}"><i class="mdi mdi-tooltip-image mdi-18px"></i></a>

                    @elseif (Auth::user()->type == "subadmin")

                    <a class="btn-floating btn-sm btn-primary"  href="{{ route('singleusertasklist.show',[$value['id'],Auth::user()->id]) }}"><i class="mdi mdi-format-list-checks mdi-18px"></i></a>

                    <a class="btn-floating btn-sm btn-primary"  href="{{ route('image.index',$value['id']) }}"><i class="mdi mdi-tooltip-image mdi-18px"></i></a>

                    @endif





                 </td>
             </tr>


             @endforeach
          </tbody>
       </table>

   </div>

 <div>

@endsection

@section('subscript')
<script src="{{ asset('js/mydatatable.js') }}"></script>

<script type="text/javascript">

$(document).ready(function() {



});


</script>


@endsection
