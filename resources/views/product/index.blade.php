@extends('adminlayout.main')
@section('title')
    Product Index
@endsection
@section('breadcrumb_one')
    Product Index
@endsection
@section('breadcrumb_link')
/product
@endsection
@section('breadcrumb')
All Products
@endsection 
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> Products On Store Front </h5>
                @can('manage-products',Auth::user())
                <div class="ibox-tools">
                    <a href="{{ url('product/create')}}">
                    <button class="btn btn-primary"  > Add  Product </button>
                    </a>
                </div>
                @endcan 
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th> S/N</th>
                <th >Name</th>
                <th style="max-width: 20px">Description </th>
                <th> Price </th>
                <th> Display On App </th>
                <th> Availability </th>
                <th> Weight </th>
                <th> Image </th>
                <th style="max-width: 2px !important "> Amount in Stock </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data['products'] as $product)
                    <tr class="gradeX">
                        <td>{{$loop->iteration}}</td>
                        <td> {{ $product->name }} </td>
                        <td > {{ $product->description }}</td>
                        <td class="center"> $ {{$product->price}} </td>
                        <td>
                            <div style="display: inline;" class="custom-control custom-switch">
                                <input 
                                  type="checkbox" 
                                  data-id="{{$product->id}}"
                                  value="{{ $product->id }}"
                                  data-toggle="toggle"
                                  data-on="Active"
                                  data-off="InActive"
                                  class="activateSwitch custom-control-input" 
                                  id="customSwitch{{ $loop->iteration }}"
                                  {{ $product->status == 1 ? 'checked' : ''}}>
                                <label style="margin-top: 4px;" class="custom-control-label" for="customSwitch{{ $loop->iteration }}"></label>
                            </div>
                        </td>
                        @if ($product->is_available == 1)
                        <td> <span class="label label-info">Available</span> </td>
                        @else
                        <td> <span class="label label-warning"> Unavailable</span> </td>
                        @endif
                        <td> {{ $product->weight }} (kg) </td>
                        <td class="lightGallery">  <span title="product images" > <img src="{{$product->image}}" width="100%" height="70px" > </span> </td>
                        <td class="center"> {{ number_format($product->amount_in_stock)}}</td>
                        <td class=""> <button class="btn btn-success"> <a href="{{route('product.show',$product->id )}}"> <i class="fa fa-eye text-white"></i> </a> </button> | <button class="btn btn-primary"> <a href="{{route('product.edit', $product->id )}}"> <i class="fa fa-edit text-white"></i></a> </button> |
                            <form id="delete-form-{{$product->id}}" method="post" action="{{route('product.destroy',$product->id)}}" style="display:none">
                                @csrf
                                {{ method_field('DELETE') }}
                              </form>
                              <a class="btn btn-danger m-2" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!" onclick="
                              if(confirm('Are you sure you want to delete? '))
                              {
                              event.preventDefault();
                              document.getElementById('delete-form-{{$product->id}}').submit();
                            }
                              else{
                              event.preventDefault();
                            }">
                             <i class="fa fa-trash"></i>
                             </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th> S/N</th>
                <th>Name</th>
                <th>Description </th>
                <th> Price </th>
                <th> Display On App </th>
                <th> Availability </th>
                <th> Weight </th>
                <th> Image </th>
                <th> Amount in Stock </th>
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

$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

$(document).ready(function(){
    let thetable = $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'product'},
            {extend: 'pdf', title: 'product'},

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




    $('.activateSwitch').on('click', function (e) {
        
        var product_id = $(this).data('id'); 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
    
            url = '/activate-product',
            formData = {
                id : product_id,
            }
        
            $.post(url, formData).done(function (data) {
                    // alert("Activation Done. Thank you.");
                    // console.log(data);
                }).fail(function (error) {
                    console.log(error);
                });
    });

</script>
    
@endsection





