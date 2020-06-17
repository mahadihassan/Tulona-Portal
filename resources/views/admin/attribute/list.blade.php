@extends('layouts.backend')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
            <div class="card-header">
              <h3 class="card-title">Attribute List Table</h3>
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
                    <th>Attribute Group Name</th>
	                  <th>published</th>
	                </tr>
                </thead>
                <tbody>
	                @foreach($attribute as $key => $attributes)	
		                <tr>
		                  <td>
                            <form action="{{route('admin.attributes.destroy', $attributes->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger" onclick="return confirm('Are you sure?')"  type="submit"><i class="fas fa-trash"></i></button>
                                <a href="{{route('admin.attributes.edit', $attributes->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            </form>
                        	</td>
		                  <td>{{++$key}}</td>
		                  <td>{{$attributes->name}}</td>
                          <td>
                            @if($attributes->attribute_group_id == 0)

                            @else
                                {{$attributes->attributegroup->name}}
                            @endif
                          </td>
		                  <td>
		                  	@if($attributes->status == 1)
		                  		<span class="badge badge-success">Yes</span>
		                  	@else
		                  		<span class="badge badge-danger">No</span>
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
                  <th>Attribute Group Name</th>
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