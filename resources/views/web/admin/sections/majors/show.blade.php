@extends('web.admin.app')
@section('title', 'majors')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Major</h1>
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

    <div>
        <h1 class="text-center m-3">{{$major->title}}</h1>
        <img style="max-height: 400px" src="{{get_file_url($major->image)}}" class="rounded mx-auto d-block" alt="Image">
    </div>


@endsection
