@extends('layouts.backend')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Unit Create</h3>
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
              <form role="form" method="post" action="{{route('admin.unit.store')}}">
                @csrf
                @method('POST')
                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Name <font color="red">*</font></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Unit Name">
                  </div>

                  <div class="form-group">
                    <label for="descripation">Descripation</label>
                    <textarea class="form-control" name="descripation" id="descripation" rows="4" placeholder="Enter Unit Descripation"></textarea>
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