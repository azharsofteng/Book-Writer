@extends('layouts.master')
@section('title', 'Company Content')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a> > Banner</span>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Update Banner  
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="row">
                            <form method="post" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="title" class="col-form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="title" id="title" value="{{ $banner->title }}">
                                        @error('title') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="sub_title" class="col-form-label">Sub Title <span class="text-danger">*</span></label>
                                        <textarea name="sub_title" class="form-control shadow-none" id="sub_title" cols="4" rows="4">{{ $banner->sub_title }}</textarea>
                                        @error('sub_title') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="btn_url" class="col-form-label">Button URL </label>
                                        <input type="url" class="form-control shadow-none" name="btn_url" id="btn_url" value="{{ $banner->email }}" placeholder="Enter button url">
                                        @error('email') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="image" class="col-form-label">Banner Image</label>
                                        <input type="file" name="image" class="form-control shadow-none" id="image" onchange="readURL(this);">
                                        @error('image') <span style="color: red">{{$message}}</span> @enderror
                                        
                                        <div class="">
                                            <img src="#" id="previewImage" style="width: 120px; height: 70px; border: 1px solid #999; padding: 2px;" alt="">
                                        </div>
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
        document.getElementById("previewImage").src="{{ (!empty($banner)) ? asset($banner->image) : asset('no-image.jpg') }}";
    </script>
@endpush