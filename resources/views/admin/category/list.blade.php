@extends('layouts.backend')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
            <div class="card-header">
 {{--    
     	
  <ul>
    @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
        <ul>
        @foreach ($category->childrenCategories as $childCategory)
        	
            @include('admin.child_category', ['child_category' => $childCategory])
   
        @endforeach
        </ul>
    @endforeach
</ul>
--}}


              <h3 class="card-title">Category List Table</h3>
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
            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Action</th>
	                  <th>Serial</th>
	                  <th>Name</th>
	                  <th>Parent Category</th>
	                  <th>Published</th>
	                </tr>
                </thead>
                <tbody>
	                @foreach($category as $key => $categorys)	
		                <tr>
		                  <td>
                            <form action="{{route('admin.category.destroy', $categorys->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger" onclick="return confirm('Are you sure?')"  type="submit"><i class="fas fa-trash"></i></button>
                                <a href="{{route('admin.category.edit', $categorys->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            </form>
                        	</td>
		                  <td>{{++$key}}</td>
		                  <td>{{$categorys->name}}</td>
		                  <td>{{parentcategory($categorys->category_id)}}</td>
		                  <td>
		                  	@if($categorys->status == 1)
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
	                <th>Descripation</th>
	                <th>published</th>
	                </tr>
                </tfoot>
              </table>
            </div>
          </div>
		</div>
	</div>
</section>
@endsection