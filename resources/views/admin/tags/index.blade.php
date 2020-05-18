@extends('layouts.admin')

@section('content')
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tags</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('admin.tags.create') }}" class="btn btn-success">Create new tag</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="fas fa-pencil-alt"></a>
                            {{ Form::open(['route' => ['admin.tags.destroy', $tag->id], 'method' => 'delete']) }}
                            <button onclick="return confirm('Are you sure?')" class="delete-task" type="submit">
                                <i class="fas fa-times"></i>
                            </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
              </table>
            </div>
          </div>
@endsection
