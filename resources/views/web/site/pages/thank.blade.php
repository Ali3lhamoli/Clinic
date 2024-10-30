@extends('web.site.app')
@section('title','contact')
@section('content')
<div class=" me-lg-auto text-center d-flex align-items-center justify-content-center m-1">
    <div class="d-inline-block text-center mx-auto p-4 border rounded shadow-lg bg-white">
        <i class="fa fa-paper-plane fa-2x mb-3 rounded-circle text-bg-success" role="presentation"></i>
        <h1 class="fw-bolder mb-3">Thank You!</h1>
        <input type="hidden" class="js_plausible_push" data-event-name="Lead Generation" data-event-params="{&quot;CTA&quot;: &quot;Contact Us&quot;}">
        <p class="lead mb-2">Your message has been sent.</p>
        <p class="lead mb-4">We will get back to you shortly.</p>
        <a href="{{ route('site.home') }}" class="btn btn-primary">Go to Homepage</a>
    </div>
</div>

@endsection
