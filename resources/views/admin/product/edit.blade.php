@extends('layouts.backend')
@section('content')
 <section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Product Edit</h3>
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
              <form role="form" method="post" action="{{route('admin.product.update', $product->id)}}" enctype="multipart/form-data">
                 @csrf
                @method('PUT')
                <div class="card-body">
                   <div class="form-group">
                    <label for="name">Name <font color="red">*</font></label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Enter Product Name">
                  </div>

                 <div class="form-group">
                   <label>Featured</label>
                   <div class="form-check">
                    <input class="form-check-input" type="checkbox" @if($product->featured == 1) checked @else @endif name="featured" id="defaultCheck1">
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
                              @if($product->brands_id == $brands->id)
                                <option value="{{$brands->id}}" selected>{{$brands->name}}</option>
                              @else
                                <option value="{{$brands->id}}">{{$brands->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>

                  <div class="form-group">
                    <label for="brand_id">Company <font color="red">*</font></label>
                        <select class="form-control" name="company_id">
                            <option value="">Select Company</option>
                            @foreach ($company as $companys)
                              @if($product->companies_id == $companys->id)
                                <option value="{{$companys->id}}" selected>{{$companys->name}}</option>
                              @else
                                <option value="{{$companys->id}}" >{{$companys->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>


                   <div class="form-group">
                    <label for="brand_id">Product Type <font color="red">*</font></label>
                        <select class="form-control" name="product_type_id">
                            <option value="">Select Product</option>
                            @foreach ($product_type as $products)
                              @if($product->product_types_id == $products->id)
                                <option value="{{$products->id}}" selected>{{$products->name}}</option>
                              @else
                                <option value="{{$products->id}}" selected>{{$products->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>

                  <div class="form-group">
                    <label for="category_id">Category <font color="red">*</font></label>
                        <select class="form-control category" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach ($category as $categorys)
                              @if($product->categorys_id == $categorys->id)
                                <option value="{{$categorys->id}}" selected>{{$categorys->name}}</option>
                              @else 
                                <option value="{{$categorys->id}}">{{$categorys->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>


                    <div class="form-group" id="sub_category">

                    </div>

                   <div class="form-group">
                    <label for="brand_id">Country <font color="red">*</font></label>
                        <select class="form-control" name="country_id">
                            <option value="">Select Country</option>
                            @foreach ($country as $countrys)
                              @if($product->countrys_id == $countrys->id)
                                <option value="{{$countrys->id}}" selected>{{$countrys->name}}</option>
                              @else
                                <option value="{{$countrys->id}}">{{$countrys->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>
                   
                  <div class="form-group">
                    <label for="name">Model <font color="red">*</font></label>
                    <input type="text" class="form-control" name="model" value="{{$product->model}}" placeholder="Enter Product Model">
                  </div>

                  <div class="form-group">
                    <label for="name">MRP <font color="red">*</font></label>
                    <input type="number" class="form-control" id="mrp" name="mrp" value="{{$product->mrp}}" placeholder="Enter Product MRP">
                  </div>

            <div class="container-fluid">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title text-center">Product Image</h3>
                </div>
                  <div class="card-body">
                      @foreach($product_image as $product_images)
                      <input type="hidden" name="productImageId[{{$loop->index}}][id]" value="{{$product_images->id}}">
                        <div class="row">
                          <div class="form-group col-md-4">
                             <img style="width:20%;" class="img-responsive my-2" src="{{ asset('Image/Product') }}/{{ $product_images->image }}">
                            <label for="name">Image</label>
                            <input type="file" class="form-control-file" name="productImageId[{{$loop->index}}][image]">
                          </div>

                           <div class="form-group col-md-4">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="productImageId[{{$loop->index}}][image_title]" value="{{$product_images->title}}" placeholder="Enter Product Video Link">
                          </div>

                          <div class="col-md-4">

                          </div>
                        </div>
                      @endforeach

                    <div class="form-group" id="product_image">
                      {{-- Product Image Add More Input Box Using Jquery --}}
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
                      @foreach($product_attribute as $product_attributes)
                        <input type="hidden" name="productAttributeId[{{$loop->index}}][id]" value="{{$product_attributes->id}}">
                        <div class="row">
                          <div class="form-group col-md-2">
                            <label for="attributeGroup">Attribute Group</label>
                              <select class="form-control" name="productAttributeId[{{$loop->index}}][attributeGroup]">
                                @foreach($attribute_group as $attribute_groups)
                                  @if($attribute_groups->id == $product_attributes->attribute_group_id)
                                    <option value="{{$attribute_groups->id}}" selected>{{$attribute_groups->name}}</option>
                                  @else
                                    <option value="{{$attribute_groups->id}}">{{$attribute_groups->name}}</option>
                                  @endif
                                @endforeach
                              </select>
                          </div>

                        <div class="form-group col-md-2">
                            <label for="attribute">Attribute</label>
                              <select class="form-control" name="productAttributeId[{{$loop->index}}][attribute]">
                                @foreach($attribute as $attributes)
                                  @if($attributes->id == $product_attributes->attribute_id)
                                    <option value="{{$attributes->id}}" selected>{{$attributes->name}}</option>
                                  @else
                                    <option value="{{$attributes->id}}">{{$attributes->name}}</option>
                                  @endif
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group col-md-2">
                            <label for="unit">Unit</label>
                              <select class="form-control" name="productAttributeId[{{$loop->index}}][unit]">
                                @foreach($unit as $units)
                                  @if($units->id == $product_attributes->unit_id)
                                    <option value="{{$units->id}}" selected>{{$units->name}}</option>
                                  @else
                                    <option value="{{$units->id}}">{{$units->name}}</option>
                                  @endif
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group col-md-2">
                            <label for="price">Price</label>
                              <input type="number" class="form-control" name="productAttributeId[{{$loop->index}}][price]" value="{{$product_attributes->price_increment}}" placeholder="Price">
                          </div>

                           <div class="form-group col-md-1">
                            <label for="qty">qty</label>
                            <input type="text" class="form-control" name="productAttributeId[{{$loop->index}}][qty]" value="{{$product_attributes->qty}}" placeholder="qty">
                          </div>

                          <div class="col-md-2">

                          </div>
                        </div>
                        @endforeach

                        <div class="form-group" id="field_add">
                          {{-- Product Attribute Add More Input Box Using Jquery --}}  
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
                      <input type="text" class="form-control" name="video_title" value="{{$product_video->title}}" placeholder="Enter Product Video Title">
                    </div>

                     <div class="form-group col-md-6">
                      <label for="name">Link</label>
                      <input type="text" class="form-control" name="video_link" value="{{$product_video->video_link}}" placeholder="Enter Product Video Link">
                    </div>
                  </div>
                </div>
              </div>
            </div>


              <div class="form-group">
                <div class="select2-purple">
                  <label>Meta Tage <font color="red">*</font></label>
                    <select class="form-control select2" name="meta_tag[]" multiple="multiple" data-placeholder="Select a Meta Tage"
                              style="width: 100%;">
                    @php
                      $metatag = explode(',', $product->meta_tag);
                    @endphp      
                          @foreach($meta as $tag)
                            @if(in_array($tag->name, $metatag))
                              <option value="{{$tag->name}}" selected="true">{{$tag->name}}</option>
                            @else
                              <option value="{{$tag->name}}">{{$tag->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="descripation">Short Descripation <font color="red">*</font></label>
                    <textarea class="form-control" rows="3" name="short_descripation" id="descripation" rows="4" placeholder="Enter Short Descripation">{{$product->short_descripation}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="descripation">Long Descripation</label>
                    <textarea class="textarea" name="long_descripation" rows="4" placeholder="Enter Long Descripation">{{$product->long_descripation}}</textarea>
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
      html += '<select class="form-control" name="newAttributeGroup[]">';
      html +='<option value="">Select Attribute Group</option>';
     @foreach($attribute_group as $value)
       html +='<option value="{{$value->id}}">{{$value->name}}</option>';
     @endforeach
      html += '</select>';
      html += '</div>';
      html += '<div class="col-md-2">'
      html += '<label>Attribute </label>';
      html += '<select class="form-control" name="newAttribute[]">';
      html +='<option value="">Select Attribute</option>';
      @foreach($attribute as $attributes)
      html +='<option value="{{$attributes->id}}">{{$attributes->name}}</option>';
     @endforeach
      html += '</select>';
      html += '</div>'
      html += '<div class= "col-md-2">';
      html += '<label>Unit</label>';
      html += '<select class="form-control" name="newUnit[]">';
      html +='<option value="">Select Unit</option>';
      @foreach($unit as $units)
        html +='<option value="{{$units->id}}">{{$units->name}}</option>';
      @endforeach
      html += '</select>';
      html += '</div>';
      html += '<div class="col-md-2">'
      html += '<label>Price</label>';
      html += '<input class="form-control" type="number" name="newPrice[]" placeholder="price">';
      html += '</div>'
      html += '<div class="col-md-1">'
      html += '<label>Quantity</label>';
      html += '<input class="form-control" type="text" name="newQty[]" placeholder="qty">';
      html += '</div>'
     
    if(number > 1)
    {
      html += '<div class="col-md-1">';
      html += '<button type="button" name="add" id="add" class="btn btn-success btn-block py-2 my-4">Add</button>';
      html += '</div>';
      html += '<div class="col-md-2">';
      html += '<button type="button" id="remove" class="btn btn-danger btn-block py-2 my-4">Remove</button>';
      html += '</div>';
      $('#field_add').append(html);
      $(function () {
        $('.select2').select2({
          tags: true
        })
    });
    }
    else
    {
      html += '<div class="col-md-2">';  
      html += '<button type="button" name="add" id="add" class="btn btn-success btn-block py-2 my-4">Add</button>';
      html += '</div>'
      $('#field_add').html(html);
      $(function () {
        $('.select2').select2({
           tags: true
        })

    });
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
      html += '<input type="file" class="form-control-file"  name="newImage[]">';
      html += '<small class="form-text text-muted"><font color="red">image must be jpeg,png,jpg,gif,svg and maxsimum size 2 MB</font></small>';
      html += '</div>'
      html += '<div class="col-md-4">'
      html += '<label>Image Title</label>';
      html += '<input class="form-control" type="text" name="newImageTitle[]" placeholder="Enter Product Image Title">';
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
    // Summernote
    $('.textarea').summernote()
  });
</script>
<link rel="stylesheet" href="{{asset('backend/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/select2/css/select2-bootstrap4.min.css')}}">
<script src="{{asset('backend/select2/js/select2.full.min.js')}}"></script>
<script>
@endsection