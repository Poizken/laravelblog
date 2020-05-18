@extends('layouts.admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName(), $category) }}
@endsection

@section('content')

      <!-- Default box -->
      <div class="box">
          {{ Form::open(['route' => ['admin.categories.update', $category->id ], 'method' => 'put']) }}
        <div class="box-header with-border">
          <h3 class="box-title">Edit category</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" value="{{ $category->title }}">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Go back</a>
          <button class="btn btn-warning pull-right">Commit changes</button>
        </div>
          {{ Form::close() }}
      </div>
@endsection
