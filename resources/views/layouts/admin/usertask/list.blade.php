@extends('layouts.admin.main')

@section('content')


<div class="container-fluid">
    <h4 class="text-center mt-2">কর্মী ভিত্তিক কাজ এর তালিকা</h4>
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


                   <td>{{ $value['user_name'] }}</td>

                   <td>
                      <div class="progress md-progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" style="width: {{ $value['done'] }}%; height: 20px" aria-valuenow="{{ $value['done'] }}" aria-valuemin="0" aria-valuemax="100">{{ $value['done'] }}%</div>
                      </div>


                  </td>



                   <td>

                       <a class="btn-floating btn-sm btn-primary"  href="{{ route('singleusertasklist.show',[$value['project_id'],$value['user_id']]) }}"><i class="mdi mdi-format-list-checks mdi-18px"></i></a>

                       <a class="btn-floating btn-sm btn-primary"  href="{{ route('singleuserimage.show',[$value['project_id'],$value['user_id']]) }}"><i class="mdi mdi-tooltip-image mdi-18px"></i></a>

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
