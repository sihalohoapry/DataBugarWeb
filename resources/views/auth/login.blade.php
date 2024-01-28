<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Data Bugar</title>
        <meta name="description" content="Responsive, Bootstrap, BS4" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- style -->
        <!-- build:css ../assets/css/site.min.css -->
        <link rel="stylesheet" href="/basik/assets/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="/basik/assets/css/theme.css" type="text/css" />
        <link rel="stylesheet" href="/basik/assets/css/style.css" type="text/css" />
        <link rel="icon" href="{{ asset('logo.png') }}">

        <!-- endbuild -->
    </head>
    <body class="layout-row">
        <div class="d-flex flex-column flex">
            <div class="row no-gutters h-100">
                <div class="col-md-6 bg-danger" style="background-image: url('basik/assets/img/login.jpg') ; " >
                    <div class="p-3 p-md-5 d-flex flex-column h-100">
                        <h4 class="mb-3 text-white">DATA BUGAR</h4>
                        <div class="text-fade">Website Pencatatan Data Kebugaran Siswa.</div>
                        <div class="d-flex flex align-items-center justify-content-center">
                            {{-- <img src="{{ asset('basik/assets/img/login.jpg') }}" alt=""> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="content-body">
                    <div class="p-3 p-md-5">
                        <h5>Selamat Datang</h5>
                        <p>
                            <small class="text-muted">Silahkan masuk untuk melanjutkan aktifitasmu</small>
                        </p>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label>User</label>
                                <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user" autofocus>
    
                                    @error('user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="checkbox mb-3">
                                <label class="ui-check" for="remember">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <i></i> Ingatkan saya
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
    
                            {{-- <div class="row mb-0">
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
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- build:js ../assets/js/site.min.js -->
        <!-- jQuery -->
        <script src="/basik/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/basik/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="/basik/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- ajax page -->
        <script src="/basik/libs/pjax/pjax.min.js"></script>
        <script src="/basik/assets/js/ajax.js"></script>
        <!-- lazyload plugin -->
        <script src="/basik/assets/js/lazyload.config.js"></script>
        <script src="/basik/assets/js/lazyload.js"></script>
        <script src="/basik/assets/js/plugin.js"></script>
        <!-- scrollreveal -->
        <script src="/basik/libs/scrollreveal/dist/scrollreveal.min.js"></script>
        <!-- feathericon -->
        <script src="/basik/libs/feather-icons/dist/feather.min.js"></script>
        <script src="/basik/assets/js/plugins/feathericon.js"></script>
        <!-- theme -->
        <script src="/basik/assets/js/theme.js"></script>
        <script src="/basik/assets/js/utils.js"></script>
        <!-- endbuild -->
    </body>