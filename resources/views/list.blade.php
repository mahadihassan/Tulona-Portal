@extends('layouts.backend')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-10">
			<div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Action</th>
	                  <th>Serial</th>
	                  <th>Name</th>
	                  <th>Descripation</th>
	                  <th>published</th>
	                </tr>
                </thead>
                <tbody>
                	<ul>
    @foreach($categories as $category)

        <li>{{ $category->name }}</li>
        <ul>
        @foreach ($category->childrenCategories as $childCategory)
        
            @include('admin.category.child_category', ['child_category' => $childCategory])
        
        @endforeach
        </ul>
    @endforeach
</ul>
                 {{--
	                @foreach($category as $key => $categorys)	
		                <tr>
		                  <td class="col-sm-2">
                            <form action="{{route('admin.category.destroy', $categorys->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger" onclick="return confirm('Are you sure?')"  type="submit"><i class="fas fa-trash"></i></button>
                                <a href="{{route('admin.category.edit', $categorys->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            </form>
                        	</td>
		                  <td>{{++$key}}</td>
		                  <td>{{$categorys->name}}</td>
		                  <td>{{$categorys->descripation}}</td>
		                  <td>
		                  	@if($categorys->status == 1)
		                  		<span>Yes</span>
		                  	@else
		                  		<span>No</span>
		                  	@endif
		                  </td>
		                
		                </tr>
		             @endforeach--}}
                </tbody>
                <tfoot>
                <tr>
	                <th>Action</th>
	                <th>Serial</th>
	                <th>Name</th>
	                <th>Descripation</th>
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