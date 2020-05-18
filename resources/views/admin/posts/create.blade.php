@extends('layouts.admin')

@section('content')
      <div class="box">
          {{ Form::open(['route' => 'admin.posts.store', 'files' => true]) }}
        <div class="box-header with-border">
          <h3 class="box-title">Create post</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Thumbnail</label>
              <input type="file" name="thumbnail" id="exampleInputFile">
              <p class="help-block">Must be an image</p>
            </div>
            <div class="form-group">
              <label>Category</label>
                {{ Form::select('category_id',
                $categories,
                null,
                ['class' => 'form-control select2'])
                }}
            </div>
            <div class="form-group">
              <label>Tags</label>
                {{ Form::select('tags[]',
                $tags,
                null,
                ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Pick tags'])
                }}
            </div>
            <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </span>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{ old('date') }}" >
              </div>
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="is_featured">
              </label>
              <label>
                Featured
              </label>
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="status">
              </label>
              <label>
                Draft
              </label>
            </div>
          </div>
          <div class="col-md-12">

              <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea name="description" id="" cols="30" rows="10" class="form-control summernote">{{ old('description') }}</textarea>
              </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Content</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control summernote"></textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
          <div class="box-footer">
              <a href="{{ route('admin.posts.index') }}" class="btn btn-default">Go back</a>
              <button class="btn btn-success pull-right">Create</button>
          </div>
        <!-- /.box-footer-->
      </div>
@endsection
