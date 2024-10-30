@extends('web.site.app')
@section('title','doctor')
@section('content')
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="fw-bold my-4 h4">
    <ol class="breadcrumb justify-content-center">
      <li class="breadcrumb-item">
        <a class="text-decoration-none" href="{{route('site.home')}}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a class="text-decoration-none" href="{{route('site.doctors')}}">doctors</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{$doctor->name}}
      </li>
    </ol>
  </nav>
  <div class="d-flex flex-column gap-3 details-card doctor-details">
    <div class="details d-flex gap-2 align-items-center">
      <img src="{{get_file_url($doctor->image)}}" alt="doctor" class="img-fluid rounded-circle" height="150"
        width="150" />
      <div class="details-info d-flex flex-column gap-3">
        <h4 class="card-title fw-bold">{{$doctor->name}}</h4>
        <h6 class="card-title fw-bold">
          {{($major)}}
        </h6>
      </div>
    </div>
    <hr />
    @include('web.inc.errors')
    <form class="form" action="{{route('site.doctors.doctor.store')}}" method="POST">
      @csrf
      <div class="form-items">
        <div class="mb-3" style="display: none;">
          <input type="number" hidden name="doctor_id" value="{{$doctor->id}}" />
        </div>
        <div class="mb-3">
          <label class="form-label required-label" for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" />
        </div>
        <div class="mb-3">
          <label class="form-label required-label" for="phone">Phone</label>
          <input type="text" name="phone" class="form-control" id="phone" />
        </div>
        <div class="mb-3">
          <label class="form-label required-label" for="email">Email</label>
          <input type="text" name="email" class="form-control" id="email" />
        </div>
        <div class="mb-3">
          @php
              $currentDateTime = date('Y-m-d\TH:i');
              $oneWeekLater = date('Y-m-d\TH:i', strtotime('+1 week'));
          @endphp
          <label class="form-label required-label" for="appointment">appointment</label>
          <input type="datetime-local" name="appointment" min="{{$currentDateTime}}" max="{{$oneWeekLater}}" class="form-control" id="appointment" />
          <script>
              const appointmentInput = document.getElementById('appointment');
            
              appointmentInput.addEventListener('input', function () {
                  const selectedDate = new Date(this.value);
      
                  if (selectedDate.getDay() === 5) {
                      alert("Friday is not selectable. Please choose another day.");
                      this.value = ''; 
                      return;
                  }
      
                  const selectedHour = selectedDate.getHours();
                  if (selectedHour < 10 || selectedHour >= 20) {
                      alert("Please select a time between 10:00 AM and 8:00 PM.");
                      this.value = ''; 
                  }
              });
          </script>
      </div>
      
      </div>
      <button type="submit" class="btn btn-primary">
        Confirm Booking
      </button>
    </form>
  </div>
</div>
@endsection




@push('script_for_home')
    <script>
        const stars = document.querySelectorAll(".star");

        stars.forEach((star, index) => {
        star.addEventListener("click", () => {
            const isActive = star.classList.contains("active");
            if (isActive) {
            star.classList.remove("active");
            } else {
            star.classList.add("active");
            }
            for (let i = 0; i < index; i++) {
            stars[i].classList.add("active");
            }
            for (let i = index + 1; i < stars.length; i++) {
            stars[i].classList.remove("active");
            }
        });
        });
    </script>
  @endpush