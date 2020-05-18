@extends('layouts.admin')

@section('content')
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Posts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Create new post</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Категория</th>
                  <th>Теги</th>
                  <th>Картинка</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->getCategoryTitle() }}</td>
                  <td>{{ $post->getTagsTitles() }}</td>
                    <td>
                        <img src="{{ url($post->getImage()) }}" alt="" class="img-responsive" width="150">
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="fas fa-pencil-alt"></a>
                        {{ Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'delete']) }}
                        <button onclick="return confirm('Are you sure?')" class="delete-task" type="submit">
                            <i class="fas fa-times"></i>
                        </button>
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
