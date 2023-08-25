@extends('adminlayout.main')
@section('title')
    Color
@endsection
@section('breadcrumb_one')
    Color
@endsection
@section('breadcrumb_link')
/color
@endsection
@section('breadcrumb')
Color
@endsection 

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Color </h5>
                <div class="ibox-tools">
                    
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
            @foreach ($data['colors'] as $color)
            <tr class="grade">
                <td> {{$loop->iteration}} </td>
                <td> {{$color['name']}} </td>
             
                <td> <button class="btn btn-primary" data-toggle="modal" > <a href="#"> <i class="fa fa-edit text-white"></i></a> </button>  </td>
            </tr>
            

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
                {extend: 'excel', title: 'Colors'},
                {extend: 'pdf', title: 'Colors'},

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



    
    $('.delete-color').on('click',function(e){
      var ask = confirm("Are you sure you want to delete this color ? This can not be undone.  ");
      if( ask == true){ 
        let the_user_id = $(this).data('id'); 
                    
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        url = '/color/'+the_user_id,
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












