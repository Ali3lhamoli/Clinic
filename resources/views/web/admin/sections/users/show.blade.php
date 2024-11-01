@extends('web.admin.app')
@section('title', 'users')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
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

    <div>
        <h1 class="text-center m-3">{{$user->name}}</h1>
        <img style="max-height: 400px" src="{{get_file_url($user->image)}}" class="rounded mx-auto d-block" alt="Image">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>الاسم:</strong> {{ $user->name }}</li>
                <li class="list-group-item"><strong class="d-block">Role:</strong>
                    @if ($user->role->is_admin )
                        <h5>{{'admin'}}</h5>
                    @endif 
                    @if ($user->role->is_doctor )
                        <h5><b>{{'doctor'}}</h5></b>
                    @endif 
                    @if ($user->role->is_patient )
                        <h5><b>{{'patient'}}</h5></b>
                    @endif 
                </li>
                <li class="list-group-item"><strong>البريد الإلكتروني:</strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>رقم الهاتف:</strong> {{ $user->phone }}</li>
                <li class="list-group-item"><strong>تاريخ الإنشاء:</strong> {{ $user->created_at }}</li>
                <li class="list-group-item"><strong>تاريخ التحديث:</strong> {{ $user->updated_at }}</li>
            </ul>
        </div>
    </div>


@endsection
