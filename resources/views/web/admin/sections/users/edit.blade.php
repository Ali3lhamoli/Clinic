@extends('web.admin.app')
@section('title', 'users')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Users</h1>
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

    @include('web.inc.errors')
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('admin.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name',$user->name)}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{old('email',$user->email)}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone',$user->phone)}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" id="password" value="{{old('password',$user->password)}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" name="role" type="radio" value="doctor" id="doctor" {{ ($user_role[0]->is_doctor == 1) ? 'checked':''}}>
                        <label class="form-check-label" for="doctor">
                          doctor
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="role" type="radio" value="admin" id="admin" {{ ($user_role[0]->is_admin== 1) ? 'checked':''}}>
                        <label class="form-check-label" for="admin">
                          admin
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="role" type="radio" value="patient" id="patient" {{ ($user_role[0]->is_patient== 1) ? 'checked':''}}>
                        <label class="form-check-label" for="patient">
                          patient
                        </label>
                      </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection
