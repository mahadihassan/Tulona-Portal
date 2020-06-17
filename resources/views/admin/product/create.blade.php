@extends('layouts.backend')
@section('content')
 <section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Product Create</h3>
              </div>
              @if($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                  </div>
              @endif
              <form role="form" method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body">

                   <div class="form-group">
                    <label for="name">Name <font color="red">*</font></label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter Product Name">
                  </div>

                 <div class="form-group">
                   <label>Featured</label>
                   <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="featured" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Yes
                    </label>
                  </div>
                 </div>

                 <div class="form-group">
                    <label for="brand_id">Brand <font color="red">*</font></label>
                        <select class="form-control" name="brand_id">
                            <option value="">Select Brand</option>
                            @foreach ($brand as $brands)
                              <option value="{{$brands->id}}">{{$brands->name}}</option>
                            @endforeach
                        </select> 
                    </div>

                  <div class="form-group">
                    <label for="brand_id">Company <font color="red">*</font></label>
                        <select class="form-control" name="company">
                            <option value="">Select Company</option>
                            @foreach ($company as $companys)
                              <option value="{{$companys->id}}">{{$companys->name}}</option>
                            @endforeach
                        </select> 
                    </div>


                   <div class="form-group">
                    <label for="brand_id">Product Type <font color="red">*</font></label>
                        <select class="form-control" name="product_type">
                            <option value="">Select Product</option>
                            @foreach ($product_type as $products)
                              <option value="{{$products->id}}">{{$products->name}}</option>
                            @endforeach
                        </select> 
                    </div>

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
                    <label for="brand_id">Country <font color="red">*</font></label>
                        <select class="form-control" name="country">
                            <option value="">Select Country</option>
                            @foreach ($country as $countrys)
                              <option value="{{$countrys->id}}">{{$countrys->name}}</option>
                            @endforeach
                        </select> 
                    </div>
                   
                  <div class="form-group">
                    <label for="name">Model <font color="red">*</font></label>
                    <input type="text" class="form-control" name="model" value="{{old('model')}}" placeholder="Enter Product Model">
                  </div>

                  <div class="form-group">
                    <label for="name">MRP <font color="red">*</font></label>
                    <input type="number" class="form-control" id="mrp" name="mrp" value="{{old('mrp')}}" placeholder="Enter Product MRP">
                  </div>

                    <div class="container-fluid">
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title text-center">Product Image</h3>
                        </div>
                          <div class="card-body">
                            <div class="form-group" id="product_image">
                                
                            </div>
                        </div>
                      </div>
                    </div>

                  

                  <div class="container-fluid">
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title text-center">Product Attribute</h3>
                      </div>
                    <div class="card-body">
                      <div class="form-group" id="product_attribute">
                            
                      </div>
                    </div>
                  </div>
                </div>

              <div class="container-fluid">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title text-center">Product Video</h3>
                  </div>
                  <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Title</label>
                        <input type="text" class="form-control" name="video_title" value="{{old('title')}}" placeholder="Enter Product Video Title">
                      </div>

                       <div class="form-group col-md-6">
                        <label for="name">Link</label>
                        <input type="text" class="form-control" name="video_link" value="{{old('video_link')}}" placeholder="Enter Product Video Link">
                    </div>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                    <div class="select2-purple">
                      <label>Meta Tage <font color="red">*</font></label>
                        <select class="form-control select2" name="meta_tag[]" multiple="multiple" data-placeholder="Select a Meta Tage"
                              style="width: 100%;">
                          @foreach($meta as $tag)
                            <option value="{{$tag->name}}">{{$tag->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="descripation">Short Descripation <font color="red">*</font></label>
                    <textarea class="form-control" rows="3" name="short_descripation" id="descripation" rows="4" placeholder="Enter Short Descripation"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="descripation">Long Descripation</label>
                    <textarea class="textarea" name="long_descripation" rows="4" placeholder="Enter Long Descripation"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="published">
                      <option value="1" selected>Yes</option>
                      <option value="0" >No</option>
                  </select>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
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

<script>
$(document).ready(function(){
  var count = 1;
  dynamic_field(count);
  function dynamic_field(number)
  {
    html = '<div class="row data">';
    html += '<div class= "col-md-2">';
      html += '<label>Attribute Group</label>';
      html += '<select class="form-control" name="attributeGroup[]">';
      html +='<option value="">Select Attribute Group</option>';
     @foreach($attributeGroup as $value)
       html +='<option value="{{$value->id}}">{{$value->name}}</option>';
     @endforeach
      html += '</select>';
      html += '</div>';
      html += '<div class="col-md-2">'
      html += '<label>Attribute </label>';
      html += '<select class="form-control" name="attribute[]">';
      html +='<option value="">Select Attribute</option>';
      @foreach($attribute as $attributes)
      html +='<option value="{{$attributes->id}}">{{$attributes->name}}</option>';
     @endforeach
      html += '</select>';
      html += '</div>'
      html += '<div class= "col-md-2">';
      html += '<label>Unit</label>';
      html += '<select class="form-control" name="unit[]">';
      html +='<option value="">Select Unit</option>';
      @foreach($unit as $units)
        html +='<option value="{{$units->id}}">{{$units->name}}</option>';
      @endforeach
      html += '</select>';
      html += '</div>';
      html += '<div class="col-md-2">'
      html += '<label>Price</label>';
      html += '<input class="form-control" type="number" name="price[]" placeholder="price">';
      html += '</div>'
      html += '<div class="col-md-1">'
      html += '<label>Quantity</label>';
      html += '<input class="form-control" type="number" name="qty[]" placeholder="qty">';
      html += '</div>'
     
    if(number > 1)
    {
      html += '<div class="col-md-1">';
      html += '<button type="button" name="add" id="add" class="btn btn-success btn-block py-2 my-4">Add</button>';
      html += '</div>';
      html += '<div class="col-md-2">';
      html += '<button type="button" id="remove" class="btn btn-danger btn-block py-2 my-4">Remove</button>';
      html += '</div>';
      $('#product_attribute').append(html);
    }
    else
    {
      html += '<div class="col-md-2">';  
      html += '<button type="button" name="add" id="add" class="btn btn-success btn-block py-2 my-4">Add</button>';
      html += '</div>'
      $('#product_attribute').html(html);    
    }

}
  $(document).on('click', '#add', function(){
    count++;
    dynamic_field(count);
  });

  $(document).on('click', '#remove', function(){
    count--;
    $(this).closest(".data").remove();
 });

});
</script>


<script>
$(document).ready(function(){
  var count = 1;
  dynamic_field(count);
  function dynamic_field(number)
  {
    html = '<div class="row images">';
      html += '<div class="col-md-4">'
      html += '<label>Image </label>';
      html += '<input type="file" class="form-control-file"  name="image[]">';
      html += '<small class="form-text text-muted"><font color="red">image must be jpeg,png,jpg,gif,svg and maxsimum size 2 MB</font></small>';
      html += '</div>'
      html += '<div class="col-md-4">'
      html += '<label>Title</label>';
      html += '<input class="form-control" type="text" name="image_title[]" placeholder="Enter Product Image Title">';
      html += '</div>'
     
    if(number > 1)
    {
      html += '<div class="col-md-2">';
      html += '<button type="button" name="add" id="add_image" class="btn btn-success btn-block py-2 my-4">Add</button>';
      html += '</div>';
      html += '<div class="col-md-2">';
      html += '<button type="button" id="remove_image" class="btn btn-danger btn-block py-2 my-4">Remove</button>';
      html += '</div>';
      $('#product_image').append(html);
    }
    else
    {
      html += '<div class="col-md-2">';  
      html += '<button type="button" name="add" id="add_image" class="btn btn-success btn-block py-2 my-4">Add</button>';
      html += '</div>'
      $('#product_image').html(html);
    }
}

  $(document).on('click', '#add_image', function(){
    count++;
    dynamic_field(count);
  });

  $(document).on('click', '#remove_image', function(){
    count--;
    $(this).closest(".images").remove();
  });

});
</script>
<script>
  $(function () {
    $('.select2').select2({
      tags: true
    });
    $('.textarea').summernote()
  });
</script>
<link rel="stylesheet" href="{{asset('backend/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/select2/css/select2-bootstrap4.min.css')}}">
<script src="{{asset('backend/select2/js/select2.full.min.js')}}"></script>
<script>
@endsection