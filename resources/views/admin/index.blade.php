@extends('layouts.master')
@section('title', 'Dashboard')
@section('main-content')
<main>
    <div class="container-fluid">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Dashboard</span>
        </div>
        <div class="row mt-3">
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('admin.registration') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Create user</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('category.index') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fab fa-bandcamp fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Create Category</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('blog.index') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-file-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Create Blog</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('gallery.index') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-image fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Create Gallery</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('product.index') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-file-pdf fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Products Entry</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-list-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">All Order</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Public Message</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('logout') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fa fa-sign-out-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Sign Out</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection