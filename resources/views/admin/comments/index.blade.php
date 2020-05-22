@extends('layouts.admin')

@section('content')
      <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Text</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                  <td>{{ $comment->id }}</td>
                  <td>{{ $comment->text }}</td>
                  <td>
                  @if($comment->status == App\Comment::IS_ACTIVE)
                        <a href="/admin/comments/toggle/{{ $comment->id }}" class="fa fa-lock"></a>
                  @else
                         <a href="/admin/comments/toggle/{{ $comment->id }}" class="fa fa-thumbs-up"></a>
                  @endif
                      {{ Form::open(['route' => ['admin.comments.destroy', $comment->id], 'method' => 'delete']) }}
                      <button onclick="return confirm('Are you sure?')" class="delete-task" type="submit">
                          <i class="fas fa-times"></i>
                      </button>
                    {{ Form::close() }}
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>

@endsection
