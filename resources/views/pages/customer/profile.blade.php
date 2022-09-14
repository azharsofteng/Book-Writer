@extends('pages.customer.index')
@section('title', 'Update Profile')
@section('customer')
<section id="dashboard">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                @include('pages.customer.sidebar')
            </div>
            <div class="col-md-6">
                <div class="customer_profile">
                    <h4 class="text-black fw-bold text-center mb-3"><i class="fa fa-user-edit" aria-hidden="true"></i> Update Your Profile</h4>
                    <div class="customer_form">
                        <form action="{{ route('customer.profile.update', Auth::guard('customer')->user()->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-2">
                              <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                <input type="text" name="name" value="{{ Auth::guard('customer')->user()->name }}" class="form-control shadow-none" id="" placeholder="Enter Name">
                              </div>
                            </div>
    
                            <div class="form-group row mb-2">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" name="email" value="{{ Auth::guard('customer')->user()->email }}" class="form-control shadow-none" id="" placeholder="Enter Email">
                                </div>
                            </div>
    
                            <div class="form-group row mb-2">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                  <input type="text" name="phone" value="{{ Auth::guard('customer')->user()->phone }}" class="form-control shadow-none" id="" placeholder="Enter Phone">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                  <textarea name="address" class="form-control shadow-none" rows="4"> {{ Auth::guard('customer')->user()->address }}</textarea>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 d-flex justify-content-end mt-2">
                                    <button class="btn btn-primary shadow-none" type="submit">Update Profile</button>
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