<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Author | Customer Login</title>
        <link rel="icon" href="{{ asset('images/M-favicon.png') }}" type="image/gif" sizes="16x16">
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>
    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card login-card">
                            <div class="row no-gutters">
                                <form action="{{ route('customer.login.check') }}" method="POST">
                                    <div class="card-body">
                                        <p class="login-card-description">CREATE AN ACCOUNT</p>
                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
        
                                        @if (session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        <div class="col-md-6">
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                                @csrf
                                                <div class="form-group">
                                                    <label for="email" class="sr-only">E-mail</label>
                                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror shadow-none" value="{{ old('email') }}" placeholder="email" />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
            
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="password" class="sr-only">Password</label>
                                                    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('phone') is-invalid @enderror shadow-none" placeholder="Password" />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4 shadow-none"  value="Login" />
            
                                                {{-- <a href="#!" class="forgot-password-link">Forgot password?</a> --}}
                                                <nav class="login-card-footer-nav">
                                                <a href="#!">Copyright &copy; {{ date('Y') }}</a>
                                                <a href="#!">MMC</a>
                                            </nav>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-4.min.js') }}"></script>
        <script>
            $("document").ready(function(){
                setTimeout(function(){
                $("div.alert").remove();
                }, 3000 ); // 5 secs
            });
        </script>
    </body>
</html>