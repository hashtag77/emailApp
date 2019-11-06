@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header input-group">
                    <div class="col-md-9"><strong>Email Template List</strong></div>
                    <a href="{{url('template/add')}}" class="text-light col-md-3 btn btn-primary">Add Template</a>
                    
                </div>
                

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                          <tr>
                            <th>Template Name</th>
                            <th>Template Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($email_template as $value)
                            <tr>
                                <td>{{$value->template_name}}</td>
                                @if($value->template_status == 1)
                                <td>Active</td>
                                @else
                                <td>Inactive</td>
                                @endif
                                <td>
                                    <a class="btn btn-primary" href="{{ url('template/edit/'.$value->id) }}">Edit
                                    </a>
                                    <button class="btn btn-danger" onClick="deleteTemplate(this,{{$value->id}})">Delete</button>
                                </td>
                            </tr>
                            @empty
                                <tr><td>No Templates Found.</td></tr>
                            @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Records</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this record?
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{url('/template/delete')}}">
                @csrf
                <input type="hidden" name="delid" id="delbtn" />
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function deleteTemplate(delthis, id){
            $('#exampleModal').modal('show');
            $('#delbtn').val(id);

        }
    </script>

@endsection
