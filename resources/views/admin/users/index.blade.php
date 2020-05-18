@extends('layouts.admin')

@section('content')
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Create new user</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Profile pic.</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <img src="{{ url($user->getImage()) }}" alt="" class="img-responsive" width="150">
                  </td>
                  <td>
                      @if($user->status == App\User::IS_UNBANNED)
                          <a href="{{ route('admin.users.toggle', $user->id) }}" class="fa fa-lock"></a>
                      @else
                          <a href="{{ route('admin.users.toggle', $user->id) }}" class="fa fa-thumbs-up"></a>
                      @endif
                      <a href="{{ route('admin.users.edit', $user->id) }}" class="fas fa-pencil-alt"></a>
                      {{ Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) }}
                      <button onclick="return confirm('Are you sure?')" class="delete-task" type="submit">
                          <i class="fas fa-times"></i>
                      </button>
                      {{ Form::close() }}
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
