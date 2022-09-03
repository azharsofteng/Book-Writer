<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Author | Customer Login</title>
        <link rel="icon" href="{{ asset('images/M-favicon.png') }}" type="image/gif" sizes="16x16">
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>
    <body>
        @include('pages.customer.navbar')
        <div class="container">
            <div class="row justify-content-center mt-5 py-md-0">
                <div class="col-md-8">
                    <div class="login-area">
                        <h4 class="heading">Create an Account</h4>
                        <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Full Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror shadow-none" id="name" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">E-Mail Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror shadow-none" id="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Phone Number </label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control shadow-none" id="phone" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control shadow-none" id="address" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror shadow-none" id="password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation">Confirm Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="password_confirmation" value="" class="form-control shadow-none" id="password_confirmation" />
                                </div>
                            </div>
        
                            <div class="clearfix mt-1">
                                <div class="float-md-left">
                                    <button type="submit" class="btn btn-outline-info">Sign Up</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                                <div class="float-md-right mt-2 d-block">Already have an account? <a href="{{ route('customer.login') }}">Sign in</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </body>
</html>
