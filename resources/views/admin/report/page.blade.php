@extends('layouts.backend')
@section('content')
<div class="card">
	<div class="card-header">
		<form action="{{route('admin.list-product')}}" method="GET">
		@csrf
		@method('GET')
			<div class="form-group">
		        <label for="category_id">Parent Category <font color="red">*</font></label>
		            <select class="form-control category" name="category_id" id="category_id">
		                <option value="">Select Category</option>
		                    @foreach ($category as $categorys)
		                        <option value="{{$categorys->id}}">{{$categorys->name}}</option>
		                    @endforeach
		            </select> 
		        </div>

		        <div class="form-group" id="sub_category">
		         	
		         </div>

		        <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
		</form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('backend/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/select2/css/select2-bootstrap4.min.css')}}">
<script src="{{asset('backend/select2/js/select2.full.min.js')}}"></script>

<script type="text/javascript">
  $('.category').change(function(){
      $(".mcategory").remove();
      var serviceTypeID = $(this).val();
      var i=1; 
      recurive(serviceTypeID, i);
       function recurive(serviceTypeID, i){
        $.ajax({
          dataType: "json",
           type:"GET",
           url:"{{route('admin.categorys')}}?category_id="+serviceTypeID,
           success:function(res){           
            if(res != 0){
            $("#sub_category").append('<select class="form-control mcategory my-3" id="category'+i+'" name="category_id">');
                $("#category".concat(i)).append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#category".concat(i)).append('<option value="'+value.id+'">'+value.name+'</option>');
                    $("#sub_category").append('</select>');
                });
              }
            else{

            }
            $("#category".concat(i)).change(function(){
              var rem = $("#category".concat(i))
              if(rem)
              {
                rem.change(function(){
                  $("#category".concat(i-1)).remove();
                });
              }
             
              serviceTypeID = $(this).val();
              i++;
              recurive(serviceTypeID, i);
            });
            }
        });  
      } 
  });
</script>
@endsection