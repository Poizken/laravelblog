@extends('layouts.admin')

@section('content')
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subscribers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('admin.subscribers.create') }}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subs as $sub)
                <tr>
                  <td>{{ $sub->id }}</td>
                  <td>{{ $sub->email }}</td>
                  <td>
                      {{ Form::open(['route' => ['admin.subscribers.destroy', $sub->id], 'method' => 'delete']) }}
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
