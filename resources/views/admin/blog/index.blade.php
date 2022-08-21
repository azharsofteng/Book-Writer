@extends('layouts.master')
@section('title', 'Blog')
@push('admin-css')
   <style>
        .ck.ck-editor__main>.ck-editor__editable{
            height: 150px;
        }
    </style>
@endpush
@section('main-content')
<main>
    <div class="container-fluid" id="Blog">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a> > Blog</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        @if (isset($blog))
                            <div class="table-head"><i class="fa fa-edit"></i> Blog Upate</div>
                        @else
                            <div class="table-head"><i class="fab fa-bandcamp"></i> Blog Entry</div>
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
                        <form id="form" method="post" action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" id="title" value="{{ isset($blog) ? $blog->title : old('title') }}" class="form-control shadow-none form-control-sm @error('title') is-invalid @enderror" placeholder="Enter Title">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="date" class="col-sm-3 col-form-label">Blog Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" id="date" value="{{ isset($blog) ? $blog->date : date('Y-m-d') }}" class="form-control shadow-none form-control-sm @error('date') is-invalid @enderror">
                                </div>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="Details" class="col-sm-3 col-form-label"> Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control shadow-none form-control-sm" id="Details" cols="5" rows="5" placeholder="Enter Description">{{ isset($blog) ? $blog->description : '' }}</textarea>
                                </div>

                                <label for="inputPassword" class="col-sm-3 col-form-label mt-1">Blog Image</label>
                                <div class="col-sm-9 mt-1">
                                    <input type="file" name="image" class="form-control shadow-none @error('image') is-invalid @enderror" id="image" onchange="readURL(this);">
                                    
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <img src="{{ (!empty(@$blog)) ? asset(@$blog->image) : asset('no-image.jpg') }}" id="previewImage" style="width: 100px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
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
                        <div class="table-head"><i class="fas fa-table me-1"></i> Blog List</div>
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
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $key => $blog)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->date }}</td>
                                        <td>{!! Str::limit($blog->description, 50, '...') !!}</td>
                                        <td><img src="{{ asset($blog->image) }}" width="40" height="40" alt=""></td>
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-edit edit-blog"><i class="fas fa-edit"></i></a>

                                            <button type="submit" class="btn btn-delete shadow-none" onclick="deleteBlog({{ $blog->id }})"><i class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{$blog->id}}" action="{{ route('blog.destroy',$blog->id) }}" method="POST" style="display: none;">
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
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#Details' ) )
            .catch( error => {
                console.error( error );
            });
    
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader    = new FileReader();
                reader.onload = function(e){
                    $('#previewImage').attr('src',e.target.result).width(100).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function deleteBlog(id) {
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