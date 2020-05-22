@extends('layouts.admin')

@section('content')
      <div class="box">
          {{ Form::open(['route' => 'admin.categories.store']) }}
        <div class="box-header with-border">
          <h3 class="box-title">Create new category</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="title">
            </div>
        </div>
      </div>
        <div class="box-footer">
          <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Go back</a>
          <button class="btn btn-success pull-right">Create</button>
        </div>
          {{ Form::close() }}
      </div>
@endsection
