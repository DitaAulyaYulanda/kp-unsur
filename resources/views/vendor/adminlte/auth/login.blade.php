<!doctype html>
<html lang="en">

    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container-fluid">
            <section class="ftco-section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header"> {{ __('Login') }}</div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 text-center mb-5">
                                        <h2 class="heading-section"></h2>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-9 col-lg-9">
                                        <div class="wrap d-md-flex">
                                            <div class="img">
                                                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                                                    style="max-width: 100%; max-height: 200px; width: auto; height: auto;">
                                            </div>
                                            <div class="login-wrap p-4 p-md-9">
                                                <div class="d-flex">
                                                    <div class="w-100">
                                                        <h3 class="mb-4">SMKN 1 CIPANAS</h3>
                                                    </div>
                                                </div>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#adminModal">
                                                    Login Admin
                                                </button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#alumniModal">
                                                    Login Alumni
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="alumniModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nisn">{{ __('NISN') }}</label>
                                <input name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn" autofocus
                                    type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                                    placeholder="Enter NISN">
                                @error('nisn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-alumni">{{ __('Password') }}</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password-alumni"
                                    placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="adminModalLabel">Login
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Enter email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-admin">{{ __('Password') }}</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password-admin"
                                    placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                </form>

            </div>
        </div>



        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>