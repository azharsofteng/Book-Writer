@extends('layouts.master')
@section('title', 'Category')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a> > Category</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        @if (isset($category))
                            <div class="table-head"><i class="fa fa-edit"></i> Category Upate</div>
                        @else
                            <div class="table-head"><i class="fab fa-bandcamp"></i> Category Entry</div>
                        @endif
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form id="form" method="post" action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Category Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" value="{{ isset($category) ? $category->name : old('name') }}" class="form-control shadow-none form-control-sm @error('name') is-invalid @enderror">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="title" class="col-sm-3 col-form-label">Category Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" id="title" value="{{ isset($category) ? $category->title : old('title') }}" class="form-control shadow-none form-control-sm @error('title') is-invalid @enderror">
                                </div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="name" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control shadow-none form-control-sm" id="description" cols="4" rows="4">{{ isset($category) ? $category->description : '' }}</textarea>
                                </div>

                                <label for="inputPassword" class="col-sm-3 col-form-label">Category Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control shadow-none @error('image') is-invalid @enderror" id="image" onchange="readURL(this);">
                                    
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <img src="{{ (!empty(@$category)) ? asset(@$category->image) : asset('no-image.jpg') }}" id="previewImage" style="width: 100px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-reset shadow-none">Reset</button>
                                    <button type="submit" class="btn btn-submit shadow-none">Save</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>  
            </div>
            <div class="col-lg-7">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Category List</div>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ Str::limit($category->description, 50, '...') }}</td>
                                        <td><img src="{{ asset($category->image) }}" width="40" height="40" alt=""></td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-edit edit-category"><i class="fas fa-edit"></i></a>

                                            {{-- <button type="submit" class="btn btn-delete shadow-none" onclick="deleteCategory({{ $category->id }})"><i class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{$category->id}}" action="{{ route('category.delete',$category->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('script')
    <script>
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader    = new FileReader();
                reader.onload = function(e){
                    $('#previewImage').attr('src',e.target.result).width(100).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush