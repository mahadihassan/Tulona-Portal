@extends('layouts.backend')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Brand Edit</h3>
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
              <form role="form" method="post" action="{{route('admin.brand.update', $brand->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Name <font color="red">*</font></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$brand->name}}">
                  </div>

                  <div class="form-group">
                    <label for="descripation">Descripation</label>
                    <textarea class="form-control" name="descripation" id="descripation" rows="4">{{$brand->descripation}}</textarea>
                  </div>

                  @if(empty($brand->logo))

                  @else
                    <img style="width:20%;" class="img-responsive my-2" src="{{ asset('Image/Brand') }}/{{ $brand->logo }}">
                  @endif
                   <div class="form-group">
                    <label for="file">Logo</label>
                      <input type="file" class="form-control-file" name="image" id="file">
                      <small class="form-text text-muted"><font color="red">image must be jpeg,png,jpg,gif,svg</font></small>
                  </div>

                  <div class="form-group">
                    <label for="published">Published</label>
                    <select class="form-control" name="published">
                      <option value="1" selected>Yes</option>
                      <option value="0">No</option>
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