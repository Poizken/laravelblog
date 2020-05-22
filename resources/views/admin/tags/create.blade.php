@extends('layouts.admin')

@section('content')
    {{ Form::open(['route' => 'admin.tags.store']) }}
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create new tag</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('admin.tags.index') }}" class="btn btn-default">Go back</a>
          <button class="btn btn-success pull-right">Create</button>
        </div>
        <!-- /.box-footer-->
      </div>
    {{ Form::close() }}
@endsection
