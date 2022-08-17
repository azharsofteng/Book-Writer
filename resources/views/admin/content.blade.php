@extends('layouts.master')
@section('title', 'Company Content')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a> > Company Content</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Update Company Content 
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="row">
                            <form method="post" action="{{ route('content.update', $content->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="name" id="name" value="{{ $content->name }}">
                                        @error('name') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="short_details" class="col-form-label">Short Description </label>
                                        <textarea name="short_details" class="form-control shadow-none" id="short_details" cols="4" rows="4">{{ $content->short_details }}</textarea>
                                        @error('short_details') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control shadow-none" name="email" id="email" value="{{ $content->email }}" placeholder="Enter email">
                                        @error('email') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="logo" class="col-form-label">Logo Image</label>
                                        <input type="file" name="logo" class="form-control shadow-none" id="logo" onchange="readURL(this);">
                                        @error('logo') <span style="color: red">{{$message}}</span> @enderror
                                        
                                        <div class="">
                                            <img src="#" id="previewImage" style="width: 120px; height: 70px; border: 1px solid #999; padding: 2px;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="phone" class="col-form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="phone" id="phone" value="{{ $content->phone }}" placeholder="Enter phone">
                                        @error('phone') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="address" id="address" value="{{ $content->address }}" placeholder="Enter address">
                                        @error('address') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="map_address" class="col-form-label">Map Address </label>
                                        <input type="url" class="form-control shadow-none" name="map_address" id="map_address" value="{{ $content->map_address }}" placeholder="Enter map address">
                                        @error('map_address') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="clearfix">
                                    <div class="text-end m-auto">
                                        <button type="reset" class="btn btn-reset shadow-none">Reset</button>
                                        <button type="submit" class="btn btn-submit shadow-none">Update</button>
                                    </div>
                                </div>
                            </form> 
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(60);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src="{{ (!empty($content)) ? asset($content->logo) : asset('images/no-image.jpg') }}";
    </script>
@endpush