@extends('layouts.admin.main')

@section('content')

<h4 class="text-center mt-2">কর্মী এর কাজ এর ছবির তালিকা</h4>


<div class="container-fluid">
    @include('layouts.common.message.message')
    <div class="text-left">
        <a class="btn-floating btn-sm btn-primary"  href="{{ route('image.create',$project_id) }}"><i class="mdi mdi-plus-thick mdi-18px"></i></a>
        <small class=""> ছবি সংযুক্ত করুণ </small>

       


    </div>
    <div class="table-responsive m-3">
       <table class="table text-center table-striped" id="tasklistshow">
           <thead class="primary-color white-text">
             <tr>
               <th scope="col">#</th>

               <th scope="col"> Name</th>
               <th scope="col"> View</th>
               <th scope="col"> Date</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
               @foreach($data as $kye => $value)





               <tr>
                    <td >{{ $kye +1}}</td>


                   <td>{{ $value->pic_name }}</td>

                   <td>

                        <img class="img-fluid" src="{{ url($value->location) }}" width="200">

                  </td>

                  <td>{{  $value->created_at->diffForHumans() }}</td>

                   <td>

                    <a class="btn-floating btn-sm btn-danger"  href="{{ route('image.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                        <i class="mdi mdi-trash-can mdi-18px"></i>
                    </a>



                    <form method="POST" id="del{{$value->id}}" action="{{ route('image.destroy', $value->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')


                    </form>

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
