@extends('web.site.app')
@section('title','contact')
@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('site.home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">contact</li>
        </ol>
    </nav>
    @include('web.inc.errors')
    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
        <form class="form" action="{{route('site.contact.store')}}" method="POST">
            @csrf
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" >
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone')}}" >
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" >
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="subject">subject</label>
                    <input type="text" name="subject" class="form-control" id="subject" value="{{old('subject')}}" >
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="message">message</label>
                    <textarea name="message" class="form-control" id="message" >{{old('message')}}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>

</div>
@endsection