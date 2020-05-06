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
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                  </div>

                  <div class="form-group">
                   <label>Product Featured <font color="red">*</font></label>
                   <div class="form-check">
                    <input class="form-check-input" type="checkbox" @if($product->featured == 1) checked @endif name="featured" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Yes
                    </label>
                  </div>
                 </div>

                  <div class="form-group">
                    <label for="category_id">Category <font color="red">*</font></label>
                        <select class="form-control category" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($category as $categorys)
                                @if($categorys->id == $product->categorys_id)
                                    <option value="{{$categorys->id}}" selected="">{{$categorys->name}}</option>
                                @else
                                    <option value="{{$categorys->id}}">{{$categorys->name}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group" id="sub_category">

                    </div>

                    <div class="form-group">
                    <label for="brand_id">Product Type <font color="red">*</font></label>
                        <select class="form-control" name="product_type">
                            <option value="">Select Product</option>
                            @foreach ($product_type as $product_types)
                              @if($product_types->id == $product->product_types_id)
                                <option value="{{$product_types->id}}" selected="">{{$product_types->name}}</option>
                              @else
                                 <option value="{{$product_types->id}}">{{$product_types->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>

                  <div class="form-group">
                    <label for="brand_id">Brand <font color="red">*</font></label>
                        <select class="form-control" name="brand_id">
                            <option value="">Select Brand</option>
                            @foreach ($brand as $brands)
                              @if($brands->id == $product->brands_id)
                                <option value="{{$brands->id}}" selected="">{{$brands->name}}</option>
                              @else
                                <option value="{{$brands->id}}">{{$brands->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>

                  <div class="form-group">
                    <label for="brand_id">Company <font color="red">*</font></label>
                        <select class="form-control" name="company">
                            <option value="">Select Company</option>
                            @foreach ($company as $companys)
                              @if($companys->id == $product->companies_id)
                                <option value="{{$companys->id}}" selected>{{$companys->name}}</option>
                              @else
                                <option value="{{$companys->id}}" selected>{{$companys->name}}</option>
                              @endif
                            @endforeach
                        </select> 
                    </div>

                  <div class="form-group">
                    <label for="name">Model <font color="red">*</font></label>
                    <input type="text" class="form-control" name="model" value="{{$product->model}}">
                  </div>

                  <div class="form-group">
                    <label for="name">MRP <font color="red">*</font></label>
                    <input type="text" class="form-control" id="mrp" name="mrp" value="{{$product->mrp}}">
                  </div>

                  @php
                    $dd =$product->image;
                    $data = explode(',', $dd);
                  @endphp
                  @foreach($data as $value)
                    <img style="width:20%;" class="img-responsive my-2" src="{{ asset('Image/Product') }}/{{ $value }}">
                  @endforeach

                  <div class="form-group">
                    <label for="file">Product file Image <font color="red">*</font></label>
                      <input type="file" class="form-control-file" name="image[]" multiple="" id="file">
                  </div>

                    <h5 class="text-center"><b>Dynamic Attribute</b></h5>
                   @foreach($product->attributes as $key => $value)
                   <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Attribute Name</label>
                      <input type="text" class="form-control" id="name" name="attribute_name[]" value="{{$key}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Attribute Value</label>
                      <input type="text" class="form-control" id="name" name="attribute_value[]" value="{{$value}}">
                    </div>
                  </div>
                  </div>
                  @endforeach

                  <div class="form-group" id="field_add">
                        
                  </div>
                  
                  <div class="form-group">
                    <label for="descripation">Short Descripation <font color="red">*</font></label>
                    <textarea class="form-control textarea" name="short_descripation" id="descripation" rows="4">{{$product->short_descripation}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="descripation">Long Descripation</label>
                    <textarea class="form-control textarea" name="long_descripation" rows="4">{{$product->short_descripation}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="brand_id">Country <font color="red">*</font></label>
                        <select class="form-control" name="country">
                            <option value="">Select Company</option>
                            @foreach ($country as $countrys)
                              <option value="{{$countrys->id}}">{{$countrys->name}}</option>
                            @endforeach
                        </select> 
                    </div>


                  <div class="form-group">
                    <label>Meta Tage <font color="red">*</font></label>
                      <input type="text" name="meta_tag[]" class="form-control" value="{{$product->meta_tag}}">
                </div>

                  <div class="form-group">
                    <label>Status <font color="red">*</font></label>
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
      var serviceTypeID = $(this).val();
      recurive(serviceTypeID);
       function recurive(serviceTypeID){
        $.ajax({
          dataType: "json",
           type:"GET",
           url:"{{route('admin.categorys')}}?category_id="+serviceTypeID,
           success:function(res){               
            if(res != 0){
                $("#sub_category").append('<select class="form-control mcategory my-3" name="category_id">');
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

<script>
$(document).ready(function(){
 var count = 1;
 dynamic_field(count);
function dynamic_field(number)
{
  html = '<div class="row">';
    html += '<div class= "col-md-6">';
      html += '<label>Field Name</label>';
      html += '<select class="form-control select2" data-dropdown-css-class="select2-purple"   multiple="multiple" name="attribute_name[]" placeholder="Field Name">';
      @foreach($attribute as $value)
      html +='<option value="{{$value->name}}">{{$value->name}}</option>';
     @endforeach
      html += '</select>';
      html += '</div>';
      html += '<div class="col-md-6">'
      html += '<label>Field Value</label>';
      html += '<input type="text" name="attribute_value[]" class="form-control" placeholder="Value"/>';
      html += '</div>'
     
    if(number > 1)
    {
      html += '<button type="button" name="add" id="add" class="btn btn-success btn-block my-2">Add</button>';
      html += '<button type="button" id="remove" class="btn btn-danger btn-block my-2">Remove</button>';
      $('#field_add').append(html);
      $(function () {
        $('.select2').select2({
          tags: true
        })
    });
    }
    else
    {  
      html += '<button type="button" name="add" id="add" class="btn btn-success btn-block my-3">Add</button>';
      html += '<button type="button" id="remove" class="btn btn-danger btn-block my-2">Remove</button></div>';
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
    $(this).closest("div").remove();
 });
});
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script type="text/javascript">
  $('.category').change(function(){
    var serviceTypeID = $(this).val();
      recurive(serviceTypeID);
       function recurive(serviceTypeID){
        $.ajax({
          dataType: "json",
           type:"GET",
           url:"{{url('admin/get-category')}}?category_id="+serviceTypeID,
           success:function(res){               
            if(res != 0){
                $('.category').prop('disabled', true);
                $("#sub_category").append('<select class="form-control category my-3" name="category_id">');
                $(".category").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $(".category").append('<option value="'+value.id+'">'+value.name+'</option>');
                    $("#sub_category").append('</select>');
                });
                
              }
            else{

            }
            $('.category').change(function(){
              serviceTypeID = $(this).val();
              recurive(serviceTypeID);
            });
            }
        });  
      } 
  });
</script>
      
<link rel="stylesheet" href="{{asset('backend/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/select2/css/select2-bootstrap4.min.css')}}">
<script src="{{asset('backend/select2/js/select2.full.min.js')}}"></script>
<script>
@endsection