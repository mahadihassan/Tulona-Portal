@extends('layouts.backend')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Company Create</h3>
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
              <form role="form" method="post" action="{{route('admin.company.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Name <font color="red">*</font></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Company Name">
                  </div>

                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" id="name" name="email" placeholder="Enter Company Email">
                  </div>

                  <div class="form-group">
                    <label for="name">Contact Number</label>
                    <input type="text" class="form-control" id="name" name="phone" placeholder="Enter Company Contact Number">
                  </div>

                  <div class="form-group">
                    <label for="name">Website Link</label>
                    <input type="text" class="form-control" id="name" name="website_link" placeholder="Enter Company website link">
                  </div>

                  <div class="form-group">
                    <label for="file">Logo</label>
                      <input type="file" class="form-control-file" name="image">
                      <small class="form-text text-muted"><font color="red">image must be jpeg,png,jpg,gif,svg</font></small>
                  </div>

                  <div class="form-group">
                    <label for="descripation">Address</label>
                    <textarea class="textarea" name="address" rows="4" placeholder="Enter Product Descripation"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="descripation">Descripation</label>
                    <input class="form-control" type="text" name="descripation" id="descripation" placeholder="Enter Company Descripation">
                  </div>

                  <div class="form-group">
                    <label for="published">Published</label>
                    <select class="form-control" name="published">
                      <option value="1" selected>Yes</option>
                      <option value="0" >No</option>
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