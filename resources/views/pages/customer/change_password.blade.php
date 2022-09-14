@extends('pages.customer.index')
@section('title', 'Change Password')
@section('customer')
<section id="dashboard">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                @include('pages.customer.sidebar')
            </div>
            <div class="col-md-7">
                <div class="customer_profile">
                    <h4 class="text-black fw-bold text-center mb-3"><i class="fa fa-key" aria-hidden="true"></i> Update Password</h4>
                    <div class="customer_form">
                        <form action="{{ route('customer.password.update') }}" method="post">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Old Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="old_password" value="{{ old('old_password') }}" class="form-control shadow-none" id="" placeholder="Old Password">
                                    @error('old_password')<span style="color: red;">{{ $message }}</span>@enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-2">
                                <label for="inputPassword" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control shadow-none" id="" placeholder="New Password">
                                    @error('password')<span style="color: red;">{{ $message }}</span>@enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-2">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control shadow-none" id="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')<span style="color: red;">{{ $message }}</span>@enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9 d-flex justify-content-end">
                                    <button class="btn btn-success shadow-none" type="submit">Update change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection