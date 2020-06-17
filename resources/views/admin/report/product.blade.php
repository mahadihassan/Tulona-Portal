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
                <label>Attribute Groups</label>
                    <select class="form-control" name="attribute_group_id">
                      <option value="0">Select Attribute Groups</option>
                      @foreach($attributeGroup as $attributeGroups)
                          <option value="{{$attributeGroups->id}}" >{{$attributeGroups->name}}</option>
                        @endforeach
                  </select>
                  </div>
              </div>

            	<div class="col-md-3">
            		<div class="form-group  my-3">
            		<label>Attribute</label>
                    <select class="form-control" name="attribute_id">
                    	<option value="0">Select Attribute</option>
                    	@foreach($attribute as $attributes)
                      	<option value="{{$attributes->id}}" >{{$attributes->name}}</option>
                      @endforeach
                  </select>
                  </div>
            	</div>

            	<div class="col-md-2">
            		<div class="form-group my-3">
            		<label>Unit</label>
                    <select class="form-control" name="unit_id">
                    	<option value="0">Select Unit</option>
                    	@foreach($unit as $units)
                      	<option value="{{$units->id}}" >{{$units->name}}</option>
                      @endforeach
                  </select>
                  </div>
            	</div>
            	
              <div class="col-md-2">
                <div class="form-group my-3">
                <label>Price From</label>
                    <input type="number" name="fprice" class="form-control" placeholder="Price">
                  </div>
              </div>

              <div class="col-md-2">
                <div class="form-group my-3">
                <label>Price to</label>
                  <input type="number" name="tprice" class="form-control" placeholder="Price">
                  </div>
              </div>
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
	                  <th>Company</th>
	                  <th>Image</th>
	                  <th>MRP</th>
	                  <th>published</th>
	                </tr>
                </thead>
                <tbody>
                @if(!empty($product))
	                @foreach($product as $value)
                    @foreach($value as $key => $products)
		                <tr>
		                  <td class="col">
                            <form action="{{route('admin.product.destroy', $products->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger" onclick="return confirm('Are you sure?')"  type="submit"><i class="fas fa-trash"></i></button>
                                <a href="{{route('admin.product.edit', $products->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{route('admin.product.show', $products->id)}}" class="btn btn-success"><i class="fas fa-info"></i></a>
                            </form>
                        	</td>
		                  <td class="col">{{$products->id}}</td>
		                  <td class="col">{{$products->name}}</td>
		                  <td class="col">{{cat($products->categorys_id, $i=0)}}</td>
		                  <td class="col">{{$products->producttype->name}}</td>
		                  <td class="col">{{$products->company->name}}</td>
		                  <td class="col">
		                  	@php
                          //Product Helpers Function productImage Function Call.
		                  		$data = productImage($products->id);
		                  	@endphp
                        @foreach($data as $value)
		                  		<img style="width:100%;" class="img-responsive my-2" src="{{ asset('Image/Product') }}/{{ $value->image }}">
                        @endforeach
		                  </td>
		                  <td class="col">{{$products->mrp}}</td>
		                  <td class="col">
		                  	@if($products->status == 1)
		                  		<span>Yes</span>
		                  	@else
		                  		<span>No</span>
		                  	@endif
		                  </td>
		                </tr>
		                  @endforeach
                    @endforeach
                  @else

                  @endif
                </tbody>
                <tfoot>
                <tr>
	                  <th>Action</th>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Product Type</th>
                    <th>Company</th>
                    <th>Image</th>
                    <th>MRP</th>
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