@extends('layouts.admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName(), $user) }}
@endsection

@section('content')
    <div class="box">
        {{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'put', 'files' => true]) }}
        <div class="box-header with-border">
            <h3 class="box-title">Edit user</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $user->description }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" autocomplete="new-password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Password confirmation">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Profile picture</label>
                    <input type="file" name="avatar" id="exampleInputFile">
                    <img src="{{ url($user->getImage()) }}" class="w-50" alt="">

                    <p class="help-block">Must be an image</p>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('admin.users.index') }}" class="btn btn-default">Go back</a>
            <button type="submit" class="btn btn-success pull-right">Commit changes</button>
        </div>
        <!-- /.box-footer-->

        {{ Form::close() }}
    </div>
@endsection
