@extends('adminlayout.main')

@section('title')
    Admin
@endsection
@section('breadcrumb_one')
    Admin
@endsection
@section('breadcrumb_link')
/admin
@endsection
@section('breadcrumb')
Admin
@endsection 

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
  
  {{-- @include('includes.messages') --}}

    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Administrators </h5>
                <div class="ibox-tools">
                  @can('manage-users',Auth::user())
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> Add  Admin </button>
                  @endcan 
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Image </th>
                <th> Email / Phone</th>
                <th> Department </th>
                <th> Job Description </th>
                {{-- <th> Status </th> --}}
                <th> Role </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data['users'] as $user)
            <tr class="grade">
                <td> {{ $loop->iteration }} </td>
                <td> {{$user->name}}</td>
                <td>
                  @if (isset($user->image))
                  <img src="{{ $user->image }}" width="50%" height="60px" alt="{{$user->image}}">
                  @else
                      <img src="/img/human.png" width="50%" height="60px" alt="{{$user->image}}">
                  @endif
                </td>
                <td>{{$user->email}} <br> {{$user->phone}}</td>
                <td>{{$user->department}}</td>
                <td>{{$user->job_description}}</td>
                {{-- <td>
                  <div style="display: inline;" class="custom-control custom-switch">
                      <input 
                        type="checkbox" 
                        data-id="{{$user->id}}"
                        value="{{ $user->id }}"
                        data-toggle="toggle"
                        data-on="Active"
                         data-off="InActive"
                        class="activateSwitch custom-control-input" 
                        id="customSwitch{{ $loop->iteration }}"
                        {{ $user->status == 1 ? 'checked' : ''}}>
                      <label style="margin-top: 4px;" class="custom-control-label" for="customSwitch{{ $loop->iteration }}"></label>
                  </div>
              </td> --}}
                <td>{{$user->role ? $user->role->name : ''}}</td>
             
                <td>
                  @can('manage-users',Auth::user())
                  <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$user->id}}"> <a href="#"> <i class="fa fa-edit text-white"></i></a> </button> | <button data-id="{{$user->id}}" class="btn btn-danger delete-role"> <a href="#"> <i class="fa fa-trash text-white"></i></a> </button>
                  @endcan 
                </td>
            </tr>

            <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form  action="{{route('user.update',$user->id )}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="name"> Name </label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{$user->name }}" id="name" required aria-describedby="emailHelp" placeholder="Enter name ">
                        </div>
                        <div class="form-group">
                          <label for="description">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror " value="{{ $user->email }}" name="email" id="email" placeholder="enter email ">
                        </div>
                        <div class="form-group">
                          <label for="description">Phone</label>
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}" name="phone" id="phone" placeholder="enter phone ">
                        </div>
                        <div class="form-group">
                          <label for="description">Profile Picture </label>
                          <input type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" name="image" id="image" >
                        </div>
                        <div class="form-group">
                          <label for="description">Department</label>
                          <input type="text" class="form-control @error('department') is-invalid @enderror " name="department" value="{{ $user->department }}"  placeholder="enter department ">
                        </div>
                        <div class="form-group">
                          <label for="description">Job Description</label>
                          <input type="text" class="form-control @error('job_description') is-invalid @enderror " name="job_description" value="{{ $user->job_description }}" placeholder="enter job description">
                        </div>
                        <div class="form-group">
                          <label for="description"> Enter Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password" placeholder="enter password ">
                        </div>
                        <div class="form-group">
                          <label for="description"> Password Confirmation </label>
                          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm password ">
                        </div>
                        <div class="form-group">
                          <label for="status" > Status </label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" required class="form-check-input @error('status') is-invalid @enderror " value="1" name="status"
                              @if( $user->status == 1 ) checked   @endif
                              >Activate Now
                            </label>
                          </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" required class="form-check-input @error('status') is-invalid @enderror " value="0" name="status"  @if( $user->status == 1 ) checked   @endif
                              @if( $user->status == 0 ) checked   @endif >
                              No! Maybe Later. 
                            </label>
                        </div>
                        </div> <hr>
                        <div class="form-group">
                          <label for="role"> Select Role </label>
                          <div class="col-md-12">
                            @foreach ($data['roles'] as $role)
                              <div class="form-check form-check-inline">
                              <input class="form-check-input @error('role_id') is-invalid @enderror " required id="gridRadios1{{$role->id}}" type="radio" name="role_id" value="{{ $role->id }}"
                              @if (isset($user->role))
                                @if( $user->role->id == $role->id ) checked @endif
                              @endif
                               />
                                <label class="form-check-label ml-3" for="gridRadios1"> {{ $role->name}} </label>
                            </div>
                            @endforeach
                        </div>
                        </div> 
                        
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Update </button>
                    </div>

                  </form>
                  </div>
                </div>
              </div>

            @endforeach
            
            </tbody>
            <tfoot>
            <tr>
              <th> Name </th>
              <th> Image </th>
              <th> Email / Phone</th>
              <th> Department </th>
              <th> Job Description </th>
              <th> Status </th>
              <th> Role </th>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel"> Add Admin </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data"   >
          @csrf

          <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name" value="{{old('name')}}" required aria-describedby="emailHelp" placeholder="Enter name" >
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror " value="{{old('email')}}" name="email" id="email" placeholder="enter email ">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror " name="phone" value="{{old('phone')}}" id="phone" placeholder="enter phone ">
          </div>
          <div class="form-group">
            <label for="image">Profile Picture </label>
            <input type="file" class="form-control  @error('image') is-invalid @enderror" accept="image/*" name="image"  id="image" >
          </div>
          <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror " name="department" value="{{old('department')}}" id="department" placeholder="enter department ">
          </div>
          <div class="form-group">
            <label for="job_description">Job Description</label>
            <input type="text" class="form-control @error('job_description') is-invalid @enderror " name="job_description" value="{{old('job_description')}}" id="job_description" placeholder="enter job description">
          </div>
          <div class="form-group">
            <label for="password"> Enter Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" required id="password" placeholder="enter password ">
          </div>
          <div class="form-group">
            <label for="confirm_password"> Password Confirmation </label>
            <input type="password" class="form-control" name="password_confirmation" required id="password_confirmation" placeholder="confirm password ">
          </div>
          <div class="form-group">
            <label for="status" > Status </label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" required class="form-check-input @error('status') is-invalid @enderror " value="1" name="status">Activate Now
              </label>
            </div>
          <div class="form-check">
              <label class="form-check-label">
                <input type="radio" required class="form-check-input @error('status') is-invalid @enderror " value="0" name="status">No! Maybe Later. 
              </label>
          </div>
          </div> <hr>
          <div class="form-group">
            <label for="role"> Select Role </label>
            <div class="col-md-12">
              @foreach ($data['roles'] as $role)
                <div class="form-check form-check-inline">
                <input class="form-check-input @error('role_id') is-invalid @enderror " required id="gridRadios1{{$role->id}}" type="radio" name="role_id" value="{{ $role->id }}" />
                  <label class="form-check-label ml-3" for="gridRadios1"> {{ $role->name}} </label>
              </div>
              @endforeach
          </div>
          </div> <hr>
          <div class="form-group">
            <label> Email User Credentials? </label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="1" name="is_emailuser"> Yes Send Login Credentials to User 
              </label>
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save User </button>
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
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

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




