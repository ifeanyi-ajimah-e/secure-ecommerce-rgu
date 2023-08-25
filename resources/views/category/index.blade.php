@extends('adminlayout.main')
@section('title')
    Category
@endsection
@section('breadcrumb_one')
    Category
@endsection
@section('breadcrumb_link')
/category
@endsection
@section('breadcrumb')
Category
@endsection 

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Category </h5>
                <div class="ibox-tools">
                  @can('manage-categories',Auth::user())
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> Add  category </button>
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
            @foreach ($categories as $category)
            <tr class="grade">
                <td> {{$loop->iteration}} </td>
                <td> {{$category->name}}</td>
                <td>{{$category->description}}</td>
             
                <td>
                  @can('manage-categories',Auth::user())
                    
                  <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$category->id}}"> <a href="#"> <i class="fa fa-edit text-white"></i></a> </button> | <button data-id="{{$category->id}}" class="btn btn-danger delete-category"> <a href="#"> <i class="fa fa-trash text-white"></i></a> </button>
                  @endcan
                 </td>
            </tr>

            <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" category="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" category="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('category.update',$category->id )}}"  >
                        @csrf
                        {{method_field('PUT')}} 
                        <div class="form-group">
                          <label for="name"> Name </label>
                          <input type="hidden" name="id" value="{{ $category->id }}">
                          <input type="text" class="form-control" required name="name" value="{{$category->name}}" id="name" aria-describedby="emailHelp" placeholder="Enter a unique name ">
                        </div>
                        <div class="form-group">
                          <label for="description">Description (optional) </label>
                          <input type="text" class="form-control"  name="description" value="{{$category->description}}" id="description" placeholder="enter description ">
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
<div class="modal fade" id="addModal" tabindex="-1" category="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" category="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel"> Add category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('category.store')}}"  >
          @csrf

          <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" class="form-control" value="{{old('name')}}" required name="name" id="name" aria-describedby="emailHelp" placeholder="Enter a unique category name ">
          </div>
          <div class="form-group">
            <label for="description">Description (optional) </label>
            <input type="text" class="form-control" name="description" value="{{old('description')}}"  id="description" placeholder="enter description ">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save category </button>
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
                {extend: 'excel', title: 'Categorys'},
                {extend: 'pdf', title: 'Categorys'},

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



    
    $('.delete-category').on('click',function(e){
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












