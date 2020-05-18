@extends('layouts.admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName(), $post) }}
@endsection

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
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Thumbnail</label>
                <input type="file" name="thumbnail" id="exampleInputFile">
                <img src="{{ url($post->getImage()) }}" class="w-50" alt="">
                <p class="help-block">Must be an image</p>
            </div>
            <div class="form-group">
                <label>Category</label>
                {{ Form::select('category_id',
                $categories,
                $post->getCategoryId(),
                ['class' => 'form-control select2'])
                }}
            </div>
            <div class="form-group">
                <label>Tags</label>
                {{ Form::select('tags[]',
                $tags,
                $post->tags->pluck('id')->all(),
                ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Pick tags'])
                }}
            </div>
            <!-- Date -->
            <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{ $post->date }}" >
                </div>
            </div>

            <!-- checkbox -->
            <div class="form-group">
                <label>
                    {{ Form::checkbox('is_featured','1',$post->is_featured, ['class' => 'minimal']) }}
                </label>
                <label>
                    Featured
                </label>
            </div>

            <!-- checkbox -->
            <div class="form-group">
                <label>
                    {{ Form::checkbox('status','1',$post->status, ['class' => 'minimal']) }}
                </label>
                <label>
                    Draft
                </label>
            </div>
        </div>
        <div class="col-md-12">

            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control summernote">{{ $post->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control summernote">{{ $post->content }}</textarea>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-default">Go back</a>
        <button class="btn btn-success pull-right">Commit changes</button>
    </div>
    <!-- /.box-footer-->
</div>
@endsection
