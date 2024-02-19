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
                                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 100%; max-height: 200px; width: auto; height: auto;">
                                 </div>
                                 <div class="login-wrap p-4 p-md-9">
                                    <div class="d-flex">
                                       <div class="w-100">
                                          <h3 class="mb-4">SMKN 1 CIPANAS</h3>
                                       </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Alumni
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminModal">
                                    Admin
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
      <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('login') }}">
            @csrf
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Login Admin
                     </h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input value="{{ old('email') }}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="modal-footer">
                     <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
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
                </div>
            </form>
            
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Login Alumni
                  </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form method="POST" action="{{ route('login') }}">
                     @csrf
                     <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">NISN</label>
                        <div class="col-md-12">
                           <input id="nisn" type="text" class="form-control" name="nisn" required
                              autocomplete="nisn" autofocus>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="password"
                           class="col-md-6 col-form-label text-md-end">{{ __('Kata Sandi') }}</label>
                        <div class="col-md-12">
                           <input id="password" type="password"
                              class="form-control @error('password') is-invalid @enderror" name="password"
                              required autocomplete="current-password">
                           @error('password')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
               </div>
               <div class="modal-footer">
               <div class="row mb-0">
               <div class="col-md-8 offset-md-4">
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
            </div>
         </div>
      </div>
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>