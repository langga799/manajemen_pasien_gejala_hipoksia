<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    {{-- CSS Build Mix --}}
    <link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
</head>
<body>

    {{-- Preloader Start --}}
    <div class="base-load preloader">
        <span></span>
    </div>
    {{-- Preloader End --}}

    {{-- Login Start --}}
    <section class="login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 bg-blue">
                    <div class="app-img">
                        <img src="{{ asset('storage/web-picture/splash-screen-app.png') }}" alt="splash-screen-app">
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="content">
                        <div class="title-text">
                            <h2>AmadO<span>2</span></h2>
                            <h4>Log In</h4>
                        </div>
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1">Email address</label>
                              <input onfocus="this.value=''" type="email" name="email" class="form-login form-control-user @error('email') is-invalid @enderror" placeholder="Email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1">Password</label>
                              <input onfocus="this.value=''" type="password" name="password" class="form-login form-control-user @error('password') is-invalid @enderror" placeholder="Password" id="exampleInputPassword1">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button autocomplete="off" type="submit" class="btn btn-primary bg-blue">Submit</button>
                        </form>
                        <div class="check">
                            <div class="forgot-password">
                                <a href="#">Lupa Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Login End --}}
    
    <script src="{{ asset('/js/login-page.js') }}"></script>
</body>
</html>

