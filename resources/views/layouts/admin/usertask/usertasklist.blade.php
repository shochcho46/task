@extends('layouts.admin.main')

@section('content')


<div class="container-fluid">
    <h4 class="text-center mt-2">কর্মী এর কাজ এর তালিকা</h4>
    @include('layouts.common.message.message')

    <div class="table-responsive m-3">
       <table class="table text-center table-striped" id="tasklistshow">
           <thead class="primary-color white-text">
             <tr>
               <th scope="col">#</th>

               <th scope="col"> Task </th>
               <th scope="col"> Staus</th>
               <th scope="col"> Date</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
               @foreach($data as $kye => $value)





               <tr>
                    <td >{{ $kye +1}}</td>


                   <td>{{ $value->task->detail }}</td>


                   <td>
                       @if ($value->status == 0)
                           Pending
                       @else
                           Done
                       @endif



                  </td>

                  <td>{{ $value->created_at->diffForHumans() }}</td>

                   <td>

                    @if ((Auth::user()->type == "admin")||(Auth::user()->type == "superadmin"))

                    <a class="btn-floating btn-sm btn-danger"  href="{{ route('assingtask.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                        <i class="mdi mdi-trash-can mdi-18px"></i>
                    </a>



                    <form method="POST" id="del{{$value->id}}" action="{{ route('assingtask.destroy', $value->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')


                    </form>

                    @elseif(Auth::user()->type == "subadmin")

                        @if ($value->status == 0)

                            @php
                                $status = "1"
                            @endphp

                        <a class="btn btn-md btn-success"  href="{{ route('taskstatus.action',[$value->id,$status]) }}" onclick="event.preventDefault(); document.getElementById('disa{{$value->id}}').submit();">
                             Action
                        </a>



                        <form method="POST" id="disa{{$value->id}}" action="{{ route('taskstatus.action', [$value->id,$status]) }}" style="display: none;">
                            @csrf
                            @method('patch')


                        </form>

                        @else

                        @php
                        $status = "0"
                         @endphp

                        <a class="btn btn-md btn-dark"  href="{{ route('taskstatus.action',[$value->id,$status]) }}" onclick="event.preventDefault(); document.getElementById('disa{{$value->id}}').submit();">
                            Action
                        </a>



                       <form method="POST" id="disa{{$value->id}}" action="{{ route('taskstatus.action', [$value->id,$status]) }}" style="display: none;">
                           @csrf
                           @method('patch')


                       </form>



                        @endif



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
