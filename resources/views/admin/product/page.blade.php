@extends('layouts.backend')
@section('content')
<div class="card">
	<div class="card-header">
		<form action="{{route('admin.list-product')}}" method="GET">
		@csrf
		@method('GET')
			<div class="form-group">
		        <label for="category_id">Parent Category <font color="red">*</font></label>
		            <select class="form-control category" name="category_id">
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
      var serviceTypeID = $(this).val();
      recurive(serviceTypeID);
       function recurive(serviceTypeID){
        $.ajax({
          dataType: "json",
           type:"GET",
           url:"{{route('admin.categorys')}}?category_id="+serviceTypeID,
           success:function(res){               
            if(res != 0){
                $("#sub_category").append('<select class="form-control mcategory my-3" name="categorys_id">');
                $(".mcategory").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $(".mcategory").append('<option value="'+value.id+'">'+value.name+'</option>');
                    $("#sub_category").append('</select>');
                });
                
              }
            else{

            }
            $('.mcategory').change(function(){
              serviceTypeID = $(this).val();
              recurive(serviceTypeID);
            });
            }
        });  
      } 
  });
</script>
@endsection