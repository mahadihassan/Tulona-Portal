@extends('layouts.backend')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Attribute Create</h3>
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
              <form role="form" method="post" action="{{route('admin.attributes.store')}}">
                @csrf
                @method('POST')
                <div class="card-body">

                   <div class="form-group">
                    <label for="published">Attribute Group</label>
                    <select class="form-control" name="attribute_group_id" >
                      <option value="0" selected>Select Attribute Group Name</option>
                      @foreach($attributeGroup as $attributeGroups)
                        <option value="{{$attributeGroups->id}}" >{{$attributeGroups->name}}</option>
                      @endforeach
                  </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Name <font color="red">*</font></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Unit Name">
                  </div>

                   <div class="form-group">
                    <label for="name">Descripation</label>
                    <input type="text" class="form-control" name="descripation" placeholder="Enter Attribute Descripation">
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