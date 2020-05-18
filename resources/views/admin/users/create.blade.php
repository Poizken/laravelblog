@extends('layouts.admin')

@section('content')
      <div class="box">
          {{ Form::open(['route' => 'admin.users.store', 'files' => true]) }}
        <div class="box-header with-border">
          <h3 class="box-title">Create user</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" value="{{ old('email') }}">
            </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <input type="text" name="description" class="form-control" placeholder="Description" value="{{ old('description') }}">
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="password" class="form-control" autocomplete="new-password" id="exampleInputEmail1" placeholder="">
            </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Password confirmation</label>
              <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="">
          </div>
            <div class="form-group">
              <label for="exampleInputFile">Profile picture</label>
              <input type="file" name="avatar" id="exampleInputFile">

              <p class="help-block">Must be an image</p>
            </div>
        </div>
      </div>
          <!-- /.box-body -->
          <div class="box-footer">
              <a href="{{ route('admin.users.index') }}" class="btn btn-default">Go back</a>
              <button type="submit" class="btn btn-success pull-right">Create</button>
          </div>
          <!-- /.box-footer-->

          {{ Form::close() }}
      </div>
@endsection
