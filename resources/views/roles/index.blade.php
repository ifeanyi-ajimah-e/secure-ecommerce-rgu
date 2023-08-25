@extends('adminlayout.main')

@section('title')
    Roles
@endsection
@section('breadcrumb_one')
    Roles
@endsection
@section('breadcrumb_link')
/role
@endsection
@section('breadcrumb')
Role
@endsection 

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Roles </h5>
                <div class="ibox-tools">
                  @can('manage-roles-and-permissions',Auth::user())
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> Add  Role </button>
                  @endcan 
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th> S/N </th>
                <th>Name </th>
                <th> Description </th>
                <th> Permissions </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
            <tr class="grade">
                <td> {{$loop->iteration}} </td>
                <td> {{$role->name}}</td>
                <td>{{$role->description}}</td>
                <td>
                @foreach ($role->permissions as $item)
                    <div class="badge badge-default"> {{$item->name}} </div> ,
                @endforeach 
              </td>
             
              @can('manage-roles-and-permissions',Auth::user())
                <td>  <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$role->id}}"> <a href="#"> <i class="fa fa-edit text-white"></i></a> </button> | <button data-id="{{$role->id}}" class="btn btn-danger delete-role"> <a href="#"> <i class="fa fa-trash text-white"></i></a> </button> </td>
              @endcan
              </tr>

            <div class="modal fade" id="editModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('role.update',$role->id )}}" enctype="multipart/form-data" >
                        @csrf
                        {{method_field('PUT')}}
                        
                        <div class="form-group">
                          <label for="name"> Name </label>
                          <input type="text" class="form-control" name="name" value="{{$role->name}}" id="name" aria-describedby="emailHelp" placeholder="Enter a unique name ">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" class="form-control" name="description" value="{{$role->description}}" id="description" placeholder="enter description ">
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label  mr-3" required for=""> Select Permission </label>
                              <div class="container">
                              @foreach ($permissions as $permission)
                                 <div class="form-check form-check-inline">
                                 <label class="form-check-label" for="inlineCheckbox{{$permission->id}}"> 
                                      <input class="form-check-input" type="checkbox" name="permissions[]"  id="" value="{{$permission->id}}"
                                      @if( $role->permissions->count() > 0)
                                          @foreach($role->permissions as $rolePermit)
                                          @if($rolePermit->id == $permission->id)
                                                      checked
                                          @endif
                                          @endforeach
                                      @endif
                                      >
                                      {{ $permission->name}}
                                </label>
                                </div>
                              @endforeach
                              </div>
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
                <th> Permissions </th>
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
{{-- <add-role-modal></add-role-modal> --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel"> Add Role </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('role.store')}}"  >
          @csrf

          <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" class="form-control" name="name" id="name" required aria-describedby="emailHelp" placeholder="Enter a unique role name ">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" required id="description" placeholder="enter description ">
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label" required for=""> Select Permission </label>
            <div class="container">
                @foreach ($permissions as $permission)
                   <div class="form-check form-check-inline">
                   <label class="form-check-label" for="inlineCheckbox{{$permission->id}}"> 
                     <input class="form-check-input" type="checkbox" name="permissions[]"  id="" value="{{$permission->id}}">
                         {{ $permission->name}}
                  </label>
                  </div>
                @endforeach
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Role </button>
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
                {extend: 'excel', title: 'roles'},
                {extend: 'pdf', title: 'roles'},

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



    
    $('.delete-role').on('click',function(e){
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











