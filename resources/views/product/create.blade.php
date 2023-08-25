@extends('adminlayout.main')
@section('title')
    Create Product
@endsection
@section('breadcrumb_one')
     Product Index
@endsection
@section('breadcrumb_link')
/product
@endsection
@section('breadcrumb')
Create Products
@endsection 
@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Create Product </a></li>
                        {{-- <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Most Recent </a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> Discount</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"> Images</a></li> --}}
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                {{-- @include('includes.messages') --}}
                                <fieldset>
                                    <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data" >
                                        @csrf 
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Category :</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" @error('category_id') is-invalid @enderror name="category_id" required  class="form-control">
                                                <option value=""> Select Category </option>
                                                @foreach ($data['categories'] as $category)
                                                    <option value={{$category->id}}> {{$category->name }} </option>
                                                @endforeach
                                                </select>
                                                @error('category_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" required value="{{ old('name')}}" @error('name') is-invalid @enderror class="form-control" placeholder="Product name">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Price:</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="any" name="price" required value="{{ old('price')}}" @error('price') is-invalid @enderror class="form-control" placeholder="$ Price">
                                              @error('price')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Description:</label>
                                        <div class="col-sm-10">
                                            <textarea  name="description" required class="form-control"  @error('description') is-invalid @enderror id="exampleFormControlTextarea1" rows="4"> {{ old('description')}} </textarea>
                                             @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Amount in stock</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="amount_in_stock"  value="{{ old('amount_in_stock')}}" @error('amount_in_stock') is-invalid @enderror class="form-control" required placeholder="amount in stock">
                                             @error('amount_in_stock')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Weight Per Unit(kg) </label>
                                        <div class="col-sm-10">
                                            <input type="number" name="weight" step="any" value="{{ old('weight')}}" @error('weight') is-invalid @enderror class="form-control" required placeholder="weight">
                                             @error('weight')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Brand :</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" @error('brand_id') is-invalid @enderror name="brand_id" required class="form-control">
                                                <option value=""> Select Brand </option>
                                                @foreach ($data['brands'] as $brand)
                                                   <option value={{$brand->id}}> {{$brand->name }} </option>
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
                                                <option value={{$color['name'] }}> {{$color['name'] }} </option>
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
                                                <option value={{$size}}> {{$size }} </option>
                                                @endforeach
                                              </select>
                                              @error('size')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"> Deal Status :</label>
                                        <div class="col-sm-10">
                                            <select id="deal_status" @error('deal_status') is-invalid @enderror name="deal_status" required class="form-control">
                                                <option value=""> Deal_status </option>
                                                @foreach ($data['deal_statuses'] as $deal_status)
                                                <option value={{$deal_status}}> {{$deal_status }} </option>
                                                @endforeach
                                              </select>
                                              @error('deal_status')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Placeholder Image:</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" accept="image/*" @error('image') is-invalid @enderror class="form-control" required >
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Other Images:</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="other_images[]" accept="image/*" multiple @error('other_images') is-invalid @enderror class="form-control" >
                                                @error('other_images')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Product Availability:</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" @error('is_available') is-invalid @enderror name="is_available" required class="form-control">
                                                <option value=""> Select Availability</option>
                                                <option value=1> Available (In Stock)</option>
                                                <option value=2> Not Available (Out of Stock)</option>
                                              </select>
                                              @error('is_available')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>
                                   
                                    <input type="submit"  class="form-control btn btn-primary bg-primary col-sm-2" value="Submit">
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
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-stripped table-bordered">

                                        <thead>
                                        <tr>
                                            <th>
                                                Group
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Discount
                                            </th>
                                            <th style="width: 20%">
                                                Date start
                                            </th>
                                            <th style="width: 20%">
                                                Date end
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                    <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image preview
                                            </th>
                                            <th>
                                                Image url
                                            </th>
                                            <th>
                                                Sort order
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/2s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="../../www.mydomain.com/images/image1.html">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="1">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/1s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="../../www.mydomain.com/images/image2.html">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="2">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/3s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="../../www.mydomain.com/images/image3.html">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="3">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/4s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="../../www.mydomain.com/images/image4.html">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="4">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/5s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="../../www.mydomain.com/images/image5.html">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="5">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/6s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="../../www.mydomain.com/images/image6.html">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="6">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/7s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="../../www.mydomain.com/images/image7.html">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="7">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection 




