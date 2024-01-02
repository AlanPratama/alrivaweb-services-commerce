@extends('layouts.user')

@section('title', 'Register')

@section('content')
    @if (session('status'))
        <script>
            let timerInterval;
            Swal.fire({
                title: "REGISTER BERHASIL!",
                html: "{{ session('status') }}",
                icon: 'success',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        </script>
    @endif
    <section class="background-radial-gradient overflow-hidden">
        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }

            #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Penawaran terbaik <br />
                        <span style="color: hsl(218, 81%, 75%)">Untuk bisnis Anda</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Selamat datang di layanan pembuatan website berkualitas! Dengan mendaftar, Anda akan mendapatkan
                        akses penuh ke berbagai paket dan fitur yang kami tawarkan untuk menciptakan website yang sesuai
                        dengan kebutuhan bisnis atau proyek Anda!
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post" action="{{ route('registerProcess') }}">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}" />
                                    <label class="form-label" for="name">Email address</label>
                                </div>

                                <!-- 2 column grid layout for the Name and Phone Number -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="{{ old('email') }}" />
                                            <label class="form-label" for="email">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="Telepon" class="form-control" name="telepon"
                                                value="{{ old('telepon') }}" />
                                            <label class="form-label" for="Telepon">Telepon</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Username input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="username" class="form-control" name="username"
                                        value="{{ old('username') }}" />
                                    <label class="form-label" for="username">Username</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control" name="password" />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <!-- Submit button -->
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Sign up
                                    </button>
                                    <p>Sudah punya akun? <a href="/login.html">Log In</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
