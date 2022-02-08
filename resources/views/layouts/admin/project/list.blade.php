@extends('layouts.admin.main')

@section('content')


<div class="container-fluid">
   @php
   $i=1
   @endphp
    <br>
 <h4 class="text-center mt-2">ঘর এর তালিকা</h4>

 @include('layouts.common.message.message')

 <div class="table-responsive m-3">
    <table class="table text-center table-striped" id="project">
        <thead class="primary-color white-text">
          <tr>
            <th scope="col">#</th>

            <th scope="col"> Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as  $value)





            <tr>
                 <td >{{ $i }}</td>


                <td>{{ $value->name }}</td>



                <td>

                    <a class="btn-floating btn-sm btn-primary"  href="{{ route('project.edit',$value->id) }}"><i class="mdi mdi-circle-edit-outline mdi-18px"></i></a>

                    <a class="btn-floating btn-sm btn-danger"  href="{{ route('project.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                        <i class="mdi mdi-trash-can mdi-18px"></i>
                    </a>



                    <form method="POST" id="del{{$value->id}}" action="{{ route('project.destroy', $value->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')


                    </form>



                </td>
            </tr>


            @php
             $i=$i+1;
            @endphp

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
