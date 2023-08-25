@extends('adminlayout.main')
@section('title')
    Edit Product
@endsection
@section('breadcrumb_one')
     Product Index
@endsection
@section('breadcrumb_link')
/product
@endsection
@section('breadcrumb')
Edit Product
@endsection 
@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Edit Product - {{ $product->name }} </a></li>
                        {{-- <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Most Recent </a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> Discount</a></li> --}}
                        {{-- <li><a class="nav-link" data-toggle="tab" href="#tab-4"> Images</a></li> --}}
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                @include('includes.messages')
                                <fieldset>
                                    <form action="{{ route('product.update', $product->id )}}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        {{method_field('PUT')}} 
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Category :</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" @error('category_id') is-invalid @enderror name="category_id" required  class="form-control">
                                                <option value=""> Select Category </option>
                                                @foreach ($data['categories'] as $category)
                                                    <option @if($product->category_id == $category->id ) selected @endif value={{$category->id}}> {{$category->name }} </option>
                                                @endforeach
                                                </select>
                                                @error('category_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Name:</label>
                                        <div class="col-sm-10"><input type="text" name="name" required value="{{ $product->name }}" @error('name') is-invalid @enderror class="form-control" placeholder="Product name"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Price:</label>
                                        <div class="col-sm-10"><input type="number" step="any" name="price" required value="{{ $product->price }}" @error('price') is-invalid @enderror class="form-control" placeholder="$ Price"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Description:</label>
                                        <div class="col-sm-10">
                                            <textarea  name="description" required class="form-control"  @error('description') is-invalid @enderror id="exampleFormControlTextarea1" rows="4">  {{ $product->description }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Amount in stock</label>
                                        <div class="col-sm-10"><input type="number" name="amount_in_stock"  value="{{ $product->amount_in_stock }}" @error('amount_in_stock') is-invalid @enderror class="form-control" required placeholder="amount in stock"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Weight Per Unit(kg) </label>
                                        <div class="col-sm-10"><input type="number" step="any" name="weight"  value="{{ $product->weight }}" @error('weight') is-invalid @enderror class="form-control" required placeholder="enter weight"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Brand :</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" @error('brand_id') is-invalid @enderror name="brand_id" required class="form-control">
                                                <option value=""> Select Brand </option>
                                                @foreach ($data['brands'] as $brand)
                                                   <option @if($product->brand_id == $brand->id ) selected @endif value={{$brand->id}}> {{$brand->name }} </option>
                                                @endforeach
                                              </select>
                                              @error('brand_id')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Color:</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" @error('color') is-invalid @enderror name="color" required class="form-control">
                                                <option value=""> Select Color </option>
                                                @foreach ( $data['colors'] as $color)
                                                <option @if($product->color == $color['name'] ) selected @endif value={{$color['name'] }}> {{$color['name'] }} </option>
                                                @endforeach
                                              </select>
                                              @error('color')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Size:</label>
                                        <div class="col-sm-10">
                                            <select id="size" @error('size') is-invalid @enderror name="size" required class="form-control">
                                                <option value=""> Size </option>
                                                @foreach ($data['sizes'] as $size)
                                                <option @if($product->size == $size ) selected @endif value={{$size}}> {{$size }} </option>
                                                @endforeach
                                              </select>
                                              @error('size')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Deal Status:</label>
                                        <div class="col-sm-10">
                                            <select id="deal_status" @error('deal_status') is-invalid @enderror name="deal_status" required class="form-control">
                                                <option value=""> Deal Status </option>
                                                @foreach ($data['deal_statuses'] as $deal_status)
                                                <option @if($product->deal_status == $deal_status ) selected @endif value={{$deal_status}}> {{$deal_status }} </option>
                                                @endforeach
                                              </select>
                                              @error('deal_status')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Placeholder Image:</label>
                                        <div class="col-sm-10"><input type="file" accept="image/*" name="image" @error('image') is-invalid @enderror class="form-control"  placeholder="Sheets containing Lorem"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Other Images:</label>
                                        <div class="col-sm-10"><input type="file" accept="image/*" name="other_images[]" multiple @error('other_images') is-invalid @enderror class="form-control" ></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Product Availability:</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" @error('is_available') is-invalid @enderror name="is_available" required class="form-control">
                                                <option value=""> Select Availability</option>
                                                <option @if($product->is_available == 1) selected @endif value=1> Available (In Stock)</option>
                                                <option @if($product->is_available == 0) selected @endif value=0> Not Available (Out of Stock)</option>
                                              </select>
                                        </div>
                                    </div>
                                   
                                    <input type="submit"  class="form-control btn btn-primary bg-primary col-sm-2" value="Update">
                                </form>
                                </fieldset>    

                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">

                                {{-- <div class="row wrapper border-bottom white-bg page-heading">
                                    <div class="col-lg-10">
                                        <h2>Data Tables</h2>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index-2.html">Home</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a>Tables</a>
                                            </li>
                                            <li class="breadcrumb-item active">
                                                <strong>Data Tables</strong>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="col-lg-2">
                    
                                    </div>
                                </div> --}}
                            <div class="wrapper wrapper-content animated fadeInRight">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="ibox ">
                                        <div class="ibox-title">
                                            <h5>Basic Data Tables example with responsive plugin</h5>
                                            <div class="ibox-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user">
                                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                                    </li>
                                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                                    </li>
                                                </ul>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ibox-content">
                    
                                            <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="gradeX">
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0
                                            </td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">X</td>
                                        </tr>
                                        
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                        </tfoot>
                                        </table>
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        
                        
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection 
