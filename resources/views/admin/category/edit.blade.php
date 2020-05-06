@extends('layouts.backend')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Category Edit</h3>
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
              <form role="form" method="post" action="{{route('admin.category.update', $cat->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">

                  <div class="form-group">
                    <label for="parent_id">Parent Category <font color="red">*</font></label>
                        <select class="form-control " style="width: 100%;" name="category_id">
                            <option value="0">Parent Category</option>
                            @foreach ($category as $cl)
                              @if($cl["id"] == $cat->category_id)
                                <option value="<?php echo $cl["id"] ?>" selected><?php echo $cl["name"] ?></option>
                              @else
                                <option value="<?php echo $cl["id"] ?>"><?php echo $cl["name"] ?></option>
                              @endif
                            @endforeach
                            
                        </select> 
                    </div>

                  <div class="form-group">
                    <label for="name">Name <font color="red">*</font></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$cat->name}}">
                  </div>

                  <div class="form-group">
                    <label for="descripation">Descripation</label>
                    <textarea class="form-control" name="descripation" id="descripation" rows="4">{{$cat->descripation}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="published">Published</label>
                    <select class="form-control" name="published">
                    @if($cat->status == 1)
                      <option value="1" selected>Yes</option>
                      <option value="0" >No</option>
                    @else
                      <option value="1">Yes</option>
                      <option value="0" selected>No</option>
                    @endif
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection