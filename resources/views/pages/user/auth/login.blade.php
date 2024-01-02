@extends('layouts.user')

@section('title', 'Login')

@section('content')
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Log in now</h2>
            <form method="post" action="{{ route('loginProcess') }}">
            @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="username" id="username" class="form-control" name="username" value="{{ old('username') }}"/>
                <label class="form-label" for="username">Username</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="password" />
                <label class="form-label" for="password">Password</label>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start ml-2 mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="remember_token" name="remember_token" checked />
                <label class="form-check-label" for="remember_token">
                  Remember Me
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Log In
              </button>

              <!-- Belum Punya Akun? -->
              <p>Belum punya akun? <a href="/register.html">Register</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
