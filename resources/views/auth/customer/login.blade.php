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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>
    <body>
        @include('pages.customer.navbar')
        <section>
            <div class="container">
                <div class="row justify-content-center my-4">
                    <div class="col-md-5">
                        <div class="login-area">
                            <h4 class="heading">Sign In</h4>
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{ route('customer.login.check') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="">E-mail Address <span class="text-danger">*</span> </label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="password" class="">Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="password" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="clearfix my-3">
                                    <div class="float-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember-me" />
                                            <label class="custom-control-label" for="remember-me">Remember me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-info btn-block">Login</button>
                                </div>
                            </form>

                            <p class="dont-have">Don’t have an account? <a href="{{ route('customer.registration') }}">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('partials.web_footer')
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
