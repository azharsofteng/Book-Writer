@extends('layouts.master')
@section('title', 'Update About')
@push('web-css')
    <style>
        ul li a {
            color: #000 !important;
        }
    </style>
@endpush
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="{{ route('dashboard') }}" href="">Home</a> > Company Profile</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Update Your About Information
                        </div>
                    </div>
                    
                    <div class="card-body table-card-body">
                        <div class="row">
                            <form method="post" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="name" id="name" value="{{ $about->name }}">
                                        @error('name') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="cover_letter" class="col-form-label">Cover Letter <span class="text-danger">*</span></label>
                                        <textarea name="cover_letter" class="form-control shadow-none" id="cover_letter" cols="3" rows="3">{{ $about->cover_letter }}</textarea>
                                        @error('cover_letter') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="facebook" class="col-form-label">Facebook </label>
                                        <input type="url" class="form-control shadow-none" name="facebook" id="facebook" value="{{ $about->facebook }}" placeholder="facebook url">
                                        @error('facebook') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="instagram" class="col-form-label">Instagram </label>
                                        <input type="url" class="form-control shadow-none" name="instagram" id="instagram" value="{{ $about->instagram }}" placeholder="instagram url">
                                        @error('instagram') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="inputPassword" class="col-form-label">Image</label>
                                        <input type="file" name="image" class="form-control shadow-none" id="image" onchange="readURL(this)">
                                        @error('image') <span style="color: red">{{$message}}</span> @enderror
                                        
                                        <div class="">
                                            <img src="#" id="previewImage" style="width: 100px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <label for="biography" class="col-form-label">Biography <span class="text-danger">*</span></label>
                                        <textarea name="biography" class="form-control shadow-none" id="biography cols="3" rows="6">{{ $about->biography }}</textarea>
                                        @error('biography') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="twitter" class="col-form-label">Twitter </label>
                                        <input type="url" class="form-control shadow-none" name="twitter" id="twitter" value="{{ $about->twitter }}" placeholder="twitter url">
                                        @error('twitter') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="google" class="col-form-label">Email </label>
                                        <input type="email" class="form-control shadow-none" name="google" id="google" value="{{ $about->google }}" placeholder="Enter email">
                                        @error('google') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="inputPassword" class="col-form-label">Signature</label>
                                        <input type="file" name="signature" class="form-control shadow-none" id="signature" onchange="readSignature(this)">
                                        @error('signature') <span style="color: red">{{$message}}</span> @enderror
                                        
                                        <div class="">
                                            <img src="#" id="previewSignature" style="width: 140px; height: 60px; border: 1px solid #999; padding: 2px;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="about_books" class="col-form-label">About Books </label>
                                        <textarea name="about_books" class="form-control shadow-none" id="about_books cols="3" rows="4" placeholder="Enter About Books">{{ $about->about_books }}</textarea>
                                        @error('about_books') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="want_meet" class="col-form-label">Meet Me? </label>
                                        <textarea name="want_meet" class="form-control shadow-none" id="want_meet cols="3" rows="4" placeholder="Want to meet?">{{ $about->want_meet }}</textarea>
                                        @error('want_meet') <span style="color: red">{{$message}}</span> @enderror

                                        <label for="inspiration" class="col-form-label">Inspiration </label>
                                        <textarea name="inspiration" class="form-control shadow-none" id="inspiration cols="3" rows="4" placeholder="Enter Inspiration">{{ $about->inspiration }}</textarea>
                                        @error('inspiration') <span style="color: red">{{$message}}</span> @enderror
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
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src="{{ (!empty($about)) ? asset($about->image) : asset('no-image.jpg') }}";

        function readSignature(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewSignature')
                        .attr('src', e.target.result)
                        .width(160)
                        .height(60);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewSignature").src="{{ (!empty($about)) ? asset($about->signature) : asset('no-image.jpg') }}";
    </script>
@endpush