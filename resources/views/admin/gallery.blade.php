@extends('layouts.master')
@section('title', 'Gallery')
@section('main-content')
<main>
    <div class="container-fluid" id="Gallery">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a> > Gallery</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        @if (isset($gallery))
                            <div class="table-head"><i class="fa fa-edit"></i> Gallery Upate</div>
                        @else
                            <div class="table-head"><i class="fab fa-bandcamp"></i> Add Gallery</div>
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
                        <form id="form" method="post" action="{{ isset($gallery) ? route('gallery.update', $gallery->id) : route('gallery.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Gallery Title </label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" id="title" value="{{ isset($gallery) ? $gallery->title : old('title') }}" class="form-control shadow-none form-control-sm @error('title') is-invalid @enderror">
                                </div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="inputPassword" class="col-sm-3 col-form-label">Image <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control shadow-none @error('image') is-invalid @enderror" id="image" onchange="readURL(this);">
                                    
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <img src="{{ (!empty(@$gallery)) ? asset(@$gallery->image) : asset('no-image.jpg') }}" id="previewImage" style="width: 100px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
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
                        <div class="table-head"><i class="fas fa-table me-1"></i> Gallery List</div>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $key => $image)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $image->title }}</td>
                                        <td><img src="{{ asset($image->image) }}" width="40" height="40" alt=""></td>
                                        <td>
                                            <a href="{{ route('gallery.edit', $image->id) }}" class="btn btn-edit"><i class="fas fa-edit"></i></a>

                                            <button type="submit" class="btn btn-delete shadow-none" onclick="deleteGallery({{ $image->id }})"><i class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{$image->id}}" action="{{ route('gallery.delete',$image->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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

        function deleteGallery(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush