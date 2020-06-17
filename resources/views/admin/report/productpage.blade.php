@extends('layouts.backend')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
            <div class="card-header">
              <h3 class="card-title">Product List Table</h3>
            </div>

             @if(session()->has('message'))
                <div class="">
                    <div class="alert alert-success">
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