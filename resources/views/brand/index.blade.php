@extends('adminlayout.main')
@section('title')
    Brand
@endsection
@section('breadcrumb_one')
    Brand
@endsection
@section('breadcrumb_link')
/brand
@endsection
@section('breadcrumb')
Brand
@endsection 

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Brand </h5>
                <div class="ibox-tools">
                    
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> Add  brand </button>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th> S/N </th>
                <th> Name </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($brands as $brand)
            <tr class="grade">
                <td> {{$loop->iteration}} </td>
                <td> {{$brand->name}}</td>
             
                <td> <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$brand->id}}"> <a href="#"> <i class="fa fa-edit text-white"></i></a> </button> | <button data-id="{{$brand->id}}" class="btn btn-danger delete-brand"> <a href="#"> <i class="fa fa-trash text-white"></i></a> </button> </td>
            </tr>

            <div class="modal fade" id="editModal{{$brand->id}}" tabindex="-1" brand="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" brand="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('brand.update',$brand->id )}}"  >
                        @csrf
                        {{method_field('PUT')}} 
                        <div class="form-group">
                          <label for="name"> Name </label>
                          <input type="hidden" name="id" value="{{ $brand->id }}">
                          <input type="text" class="form-control" required name="name" value="{{$brand->name}}" id="name" aria-describedby="emailHelp" placeholder="Enter a unique name ">
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
<div class="modal fade" id="addModal" tabindex="-1" brand="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" brand="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel"> Add brand </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('brand.store')}}"  >
          @csrf

          <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" class="form-control" value="{{old('name')}}" required name="name" id="name" aria-describedby="emailHelp" placeholder="Enter a unique brand name ">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save brand </button>
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
                {extend: 'excel', title: 'Brands'},
                {extend: 'pdf', title: 'Brands'},

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



    
    $('.delete-brand').on('click',function(e){
      var ask = confirm("Are you sure you want to delete this brand ? This can not be undone.  ");
      if( ask == true){ 
        let the_user_id = $(this).data('id'); 
                    
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        url = '/brand/'+the_user_id,
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












