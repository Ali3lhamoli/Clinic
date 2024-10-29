@extends('web.admin.app')
@section('title', 'majors')
@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ALL Majors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">ALL Majors</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @include('web.inc.success')
    <a class="m-1 btn btn-primary" href="{{ route('admin.majors.create') }}">Add New Major</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($majors as $major)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $major->title }}</td>
                            <td>
                                <img class="profile-user-img img-fluid img-circle" src="{{ get_file_url($major->image) }}"
                                    alt="Image">
                            </td>
                            <td>
                                <a href="{{ route('admin.majors.edit', $major->id) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('admin.majors.destroy', $major->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('admin.majors.show', $major->id) }}" class="btn btn-primary">show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer clearfix">
                {{ $majors->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
