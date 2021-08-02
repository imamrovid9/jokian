<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/app.css">
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                    </div>
                    <h1 class="auth-title">Admin
                        Log in.
                    </h1>

                    <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Admin Login') }}">
                        @csrf
                        <div class="form-group ">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif
                        </div>

                        <div class="form-group ">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </div>

                        <div class="form-group ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old( 'remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group  mb-0">

                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log
                                in</button>

                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>