@extends('layouts.backend')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
            <div class="card-header">
              <h3 class="card-title">Product List Table</h3>
            </div>
            <form class="form" method="GET" action="{{route('admin.report')}}">
            @method('GET')
            <div class="container">
            <div class="row">
            	
              <div class="col-md-3">
                <div class="form-group  my-3">
                <label>Attribute Name</label>
                    <select class="form-control" name="attribute_name">
                      <option value="0">Select Name</option>
                      @foreach($product as $products)
                      @for($i =0; $i<1; ++$i)
                        @foreach($products->attributes[$i] as $value)
                          <option value="{{$value}}" >{{$value}}</option>
                        @endforeach
                      @endfor
                      @endforeach
                  </select>
                  </div>
              </div>

               <div class="col-md-3">
                <div class="form-group  my-3">
                <label>Attribute value</label>
                    <select class="form-control" name="attribute_value">
                      <option value="0">Select value</option>
                      @foreach($product as $products)
                      @for($i =1; $i<2; ++$i)
                        @foreach($products->attributes[$i] as $value)
                          <option value="{{$value}}" >{{$value}}</option>
                        @endforeach
                      @endfor
                      @endforeach
                  </select>
                  </div>
              </div>

               <div class="col-md-3">
                <div class="form-group  my-3">
                <label>Attribute Unit</label>
                    <select class="form-control" name="attribute_unit">
                      <option value="0">Select Unit</option>
                      @foreach($product as $products)
                      @for($i =2; $i<3; ++$i)
                        @foreach($products->attributes[$i] as $value)
                          <option value="{{$value}}" >{{$value}}</option>
                        @endforeach
                      @endfor
                      @endforeach
                  </select>
                  </div>
              </div>

              
{{--
              <div class="col-md-3">
                <div class="form-group  my-3">
                <label>Category</label>
                    <select class="form-control" name="category_id">
                      <option value="0">Select Category</option>
                      @foreach($category as $categorys)
                          <option value="{{$categorys->id}}" >{{$categorys->name}}</option>
                        @endforeach
                  </select>
                  </div>
              </div>

            	<div class="col-md-3">
            		<div class="form-group  my-3">
            		<label>Brand</label>
                    <select class="form-control" name="brand_id">
                    	<option value="0">Select Brand</option>
                    	@foreach($brand as $brands)
                      		<option value="{{$brands->id}}" >{{$brands->name}}</option>
                      	@endforeach
                  </select>
                  </div>
            	</div>

            	<div class="col-md-3">
            		<div class="form-group my-3">
            		<label>Product Type</label>
                    <select class="form-control" name="product_type_id">
                    	<option value="0">Select Product Type</option>
                    	@foreach($producttype as $producttypes)
                      		<option value="{{$producttypes->id}}" >{{$producttypes->name}}</option>
                      	@endforeach
                  </select>
                  </div>
            	</div>
            	<div class="col-md-3">
            		<div class="form-group my-3">
            		<label>Company</label>
                    <select class="form-control" name="company_id">
                    	<option value="0">Select Company</option>
                    	@foreach($company as $companys)
                      		<option value="{{$companys->id}}" >{{$companys->name}}</option>
                      	@endforeach
                  </select>
                  </div>
            	</div>
              --}}
            <button class="btn btn-primary btn-block" type="submit">Submit</button>
        </form>
      </div>
    </div>
             @if(session()->has('message'))
                <div class="">
                    <div class="alert alert-success my-3">
                        <button type="button" class="close" data-dismiss="alert" aira-hidden="true">
                            &times;
                        </button>
                        {{session()->get('message')}}
                    </div>
                </div>
              @endif
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Action</th>
	                  <th>Serial</th>
	                  <th>Name</th>
	                  <th>Category</th>
	                  <th>Product Type</th>
	                  <th>Brand</th>
	                  <th>Company</th>
	                  <th>Image</th>
	                  <th>price</th>
	                  <th>published</th>
	                </tr>
                </thead>
                <tbody>
	                @foreach($product as $key => $products)
		                <tr>
		                  <td class="col-sm-2">
                            <form action="{{route('admin.product.destroy', $products->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger" onclick="return confirm('Are you sure?')"  type="submit"><i class="fas fa-trash"></i></button>
                                <a href="{{route('admin.product.edit', $products->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{route('admin.product.show', $products->id)}}" class="btn btn-success"><i class="fas fa-info"></i></a>
                            </form>
                        	</td>
		                  <td>{{++$key}}</td>
		                  <td>{{$products->name}}</td>
		                  <td>{{cat($products->categorys_id, $i=0)}}</td>
		                  <td>{{$products->producttype->name}}</td>
		                  <td>{{$products->brand->name}}</td>
		                  <td>{{$products->company->name}}</td>
		                  <td>
		                  	@php
		                  		$dd =$products->image;
		                  		$data = explode(',', $dd);
		                  	@endphp
		                  	@foreach($data as $value)
		                  		<img style="width:100%;" class="img-responsive my-2" src="{{ asset('Image/Product') }}/{{ $value }}">
		                  	@endforeach
		                  </td>
		                  <td>{{$products->price}}</td>
		                  <td>
		                  	@if($products->status == 1)
		                  		<span>Yes</span>
		                  	@else
		                  		<span>No</span>
		                  	@endif
		                  </td>
		                </tr>
		                @endforeach
		             
                </tbody>
                <tfoot>
                <tr>
	                  <th>Action</th>
	                  <th>Serial</th>
	                  <th>Name</th>
	                  <th>Category</th>
	                  <th>Product Type</th>
	                  <th>Brand</th>
	                  <th>Company</th>
	                  <th>Image</th>
	                  <th>price</th>
	                  <th>published</th>
	                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
		</div>
	</div>
</section>
@endsection