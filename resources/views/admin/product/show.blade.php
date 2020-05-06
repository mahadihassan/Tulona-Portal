@extends('layouts.backend')
@section('content')
<!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title"><b>Product Show Table</b></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <ul class="list-group">
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Product Name</h6>
				    <span class="badge badge-primary badge-pill">{{$product->name}}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Category </h6>
				    <span class="badge badge-primary badge-pill">{{$product->category->name}}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Product Type</h6>
				    <span class="badge badge-primary badge-pill">{{$product->producttype->name}}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Brand</h6>
				    <span class="badge badge-primary badge-pill">{{$product->brand->name}}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Company</h6>
				    <span class="badge badge-primary badge-pill">{{$product->company->name}}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Product Model</h6>
				    <span class="badge badge-primary badge-pill">{{$product->model}}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>MRP</h6>
				    <span class="badge badge-primary badge-pill">{{$product->mrp}}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Price</h6>
				    <span class="badge badge-primary badge-pill">{{$product->price}}</span>
				  </li><li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Product Image</h6>
				    <p class="text-right">
				    	@php
		                  	$productimage =$product->image;
		                  	$imagearray = explode(',', $productimage);
		                @endphp
		                @foreach($imagearray as $value)
		                  	<img style="width:5%;" class="img-responsive my-2" src="{{ asset('Image/Product') }}/{{ $value }}">
		                @endforeach
		            </p>
				  </li><li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Product Attributs</h6>
				    @foreach($product->attributes as $key => $value)
				    	<p class="text-right text-uppercase">{{$key}}</p>
				    	<p class="text-right">{{$value}}</p>
				    @endforeach
				  </li><li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Short Descripation</h6>
				    <p>{{$product->short_descripation}}</p>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Long Descripation</h6>
				    <p>{{$product->long_descripation}}</p>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <h6>Country Name</h6>
				    <span class="badge badge-primary badge-pill">{{$product->country->name}}</span>
				  </li>
				</ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.
@endsection