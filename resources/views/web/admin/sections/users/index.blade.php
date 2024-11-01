@extends('web.admin.app')
@section('title', 'users')
@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ALL Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">ALL Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @include('web.inc.success')
    <a class="m-1 btn btn-primary" href="{{ route('admin.users.create') }}">Add New Users</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $user->name }}</td>
                            
                            <td>
                                @if ($user->role->is_admin )
                                <h5><b>{{'admin'}}</b></h5>
                            @endif 
                            @if ($user->role->is_doctor )
                                <h5><b>{{'doctor'}}</h5></b>
                            @endif 
                            @if ($user->role->is_patient )
                                <h5><b>{{'patient'}}</h5></b>
                            @endif 
                            </td>
                            <td>
                                <img class="profile-user-img img-fluid img-circle" src="{{ get_file_url($user->image) }}"
                                    alt="Image">
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary">show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer clearfix">
                {{ $users->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
