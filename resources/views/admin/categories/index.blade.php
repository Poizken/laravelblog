@extends('layouts.admin')

@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Categories</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Create new category</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="fas fa-pencil-alt"></a>
                            {{ Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete']) }}
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
    <!-- /.box -->
</section>
@endsection
