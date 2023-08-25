@extends('adminlayout.main')
@section('title')
    Permissions
@endsection
@section('breadcrumb_one')
    Permissions
@endsection
@section('breadcrumb_link')
/permission
@endsection
@section('breadcrumb')
Permission
@endsection 

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Permissions </h5>
                <div class="ibox-tools">
                  @can('manage-roles-and-permissions',Auth::user())
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> Add  permission </button>
                  @endcan 
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th> S/N </th>
                <th> Name </th>
                <th> Description </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($permissions as $permission)
            <tr class="grade">
                <td> {{$loop->iteration}} </td>
                <td> {{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                @can('manage-roles-and-permissions',Auth::user())
                <td> <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$permission->id}}"> <a href="#"> <i class="fa fa-edit text-white"></i></a> </button> | <button data-id="{{$permission->id}}" class="btn btn-danger delete-permission"> <a href="#"> <i class="fa fa-trash text-white"></i></a> </button> </td>
                @endcan 
            </tr>

            <div class="modal fade" id="editModal{{$permission->id}}" tabindex="-1" permission="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" permission="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('permission.update',$permission->id )}}"  >
                        @csrf
                        {{method_field('PUT')}} 
                        <div class="form-group">
                          <label for="name"> Name </label>
                          <input type="text" class="form-control" required name="name" value="{{$permission->name}}" id="name" aria-describedby="emailHelp" placeholder="Enter a unique name ">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" class="form-control" required name="description" value="{{$permission->description}}" id="description" placeholder="enter description ">
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>

            @endforeach
            
            </tbody>
            <tfoot>
            <tr>
                <th> S/N </th>
                <th>Name </th>
                <th> Description </th>
                <th> Action </th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>

{{-- add modal --}}
<div class="modal fade" id="addModal" tabindex="-1" permission="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" permission="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel"> Add permission </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('permission.store')}}"  >
          @csrf

          <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" class="form-control" value="{{old('name')}}" required name="name" id="name" aria-describedby="emailHelp" placeholder="Enter a unique permission name ">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{old('description')}}" required id="description" placeholder="enter description ">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save permission </button>
      </div>
    </form>
    </div>
  </div>
</div>
    


@endsection

@section('scripts')
    
<script>

    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'Permissions'},
                {extend: 'pdf', title: 'Permissions'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]
        });
         $('.dataTables-example tbody ').on('click', 'tr', function () {
    });
    });



    
    $('.delete-permission').on('click',function(e){
      var ask = confirm("Are you sure you want to delete this manager ? This can not be undone.  ");
      if( ask == true){ 
        let the_user_id = $(this).data('id'); 
                    
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        url = '/manager/'+the_user_id,
        formData = {
            id : the_user_id,
        }
        $.post(url, formData).done(function (data) {
            //    alert("deleted")
                location.reload();
            }).fail(function (error) {
                console.log(error);
            });
          } 
          });
</script>

@endsection












