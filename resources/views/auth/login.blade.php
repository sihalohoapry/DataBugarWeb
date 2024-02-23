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
    <link rel="icon" href="{{ asset('logo-databugar.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/basik/style-login.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class=" d-flex align-items-center justify-content-center">
                            <img src="{{ asset('logo-databugar.png') }}" alt="">
                        </div>
                        <h3 class="text-center mb-4"><span style="color: black">Data Bugar</span><span
                                style="color: red"><sup>+</sup></span></h3>
                        <form class="login-form"method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="user" type="text"
                                    class="form-control @error('user') is-invalid @enderror" name="user"
                                    value="{{ old('user') }}" required autocomplete="user" placeholder="User"
                                    autofocus>

                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="ui-check" for="remember">
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <i></i> Ingatkan saya
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success rounded submit p-3 px-5">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
