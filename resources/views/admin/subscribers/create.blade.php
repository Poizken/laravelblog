@extends('layouts.admin')

@section('content')
      <div class="box">
          {{ Form::open(['route' => 'admin.subscribers.store']) }}
        <div class="box-header with-border">
          <h3 class="box-title">Add subscriber</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('admin.subscribers.index') }}" class="btn btn-default">Go back</a>
          <button class="btn btn-success pull-right">Add</button>
        </div>
        {{ Form::close() }}
      </div>
@endsection
