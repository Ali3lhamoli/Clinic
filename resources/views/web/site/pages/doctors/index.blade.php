@extends('web.site.app')
@section('title', 'doctors')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('site.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">doctors</li>
            </ol>
        </nav>

        <div class="doctors-grid">

            @forelse ($doctors as $doctor)
                <div class="card p-2" style="width: 18rem;">
                    <img src="{{ get_file_url($doctor->user->image) }}"
                        class="card-img-top rounded-circle card-image-circle" alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">{{ $doctor->user->name }}</h4>
                        @php
                            $major = \App\Models\Major::find($doctor->major_id);
                        @endphp
                        <h6 class="card-title fw-bold text-center">{{ $major->title }}</h6>
                        <a href="{{ route('site.doctors.doctor', ['doctor_id' => $doctor->user->id, 'major' => $major->title]) }}"
                            class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-primary text-center">No doctors found</div>
            @endforelse


        </div>
        <nav class="mt-5" aria-label="navigation">
            <ul class="pagination justify-content-center">
                <div class="card-footer clearfix">
                    {{ $doctors->links() }}
                </div>
            </ul>
        </nav>
    </div>
@endsection
