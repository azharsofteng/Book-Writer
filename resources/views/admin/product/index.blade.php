@extends('layouts.master')
@section('title', 'Product Entry')
@push('admin-css')
   <style>
        .ck.ck-editor__main>.ck-editor__editable{
            height: 150px;
        }
    </style>
@endpush
@section('main-content')
<main>
    <div class="container-fluid" id="Product">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a> > Product</span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        @if (isset($product))
                            <div class="table-head"><i class="fa fa-edit"></i> Product Upate</div>
                        @else
                            <div class="table-head"><i class="fab fa-bandcamp"></i> Product Entry</div>
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
                        <form id="form" method="post" action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-6">
                                    <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ isset($product) ? $product->name : old('name') }}" class="form-control shadow-none form-control-sm @error('name') is-invalid @enderror" placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="price" class="col-form-label mt-1">Price</label>
                                    <input type="number" step="0.00" name="price" id="price" value="{{ isset($product) ? $product->price : old('price') }}" class="form-control shadow-none form-control-sm @error('price') is-invalid @enderror mt-1">
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <label for="category_id" class="col-form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control shadow-none @error('category_id') is-invalid @enderror" id="category_id">
                                        <option value="">--select category--</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" {{ ($item->id == @$product->category_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="discountPrice" class="col-form-label mt-1">Discount(%)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" oninput="Discount()" id="percent"  class="form-control shadow-none mt-1">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="discount" id="discountPrice" value="{{ isset($product) ? $product->discount : old('discount') }}" class="form-control shadow-none mt-1" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <label for="short_details" class="col-form-label">Short Details</label>
                                    <textarea name="short_details" class="form-control shadow-none form-control-sm" id="short_details" cols="5" rows="5" placeholder="Enter short details">{{ isset($product) ? $product->short_details : '' }}</textarea>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <label for="image" class="col-form-label">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control shadow-none @error('image') is-invalid @enderror" id="image" onchange="readURL(this);">
                                    
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <img src="{{ (!empty(@$product)) ? asset(@$product->image) : asset('no-image.jpg') }}" id="previewImage" style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="">
                                    </div>

                                    <label for="is_feature" class="mt-3"><input type="checkbox" name="is_feature" value="1" id="is_feature"> Is Feature</label>
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <label for="Details" class="col-form-label">Details</label>
                                    <textarea name="details" class="form-control shadow-none form-control-sm" id="Details" cols="5" rows="5">{{ isset($product) ? $product->details : '' }}</textarea>
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
            <div class="col-lg-12 mt-2">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Products List</div>
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
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Short Details</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->discount }}</td>
                                        <td>{{ Str::limit($item->short_details, 50, '...') }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="40" height="40" alt=""></td>
                                        <td>
                                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-edit edit-item"><i class="fas fa-edit"></i></a>

                                            <button type="submit" class="btn btn-delete shadow-none" onclick="deleteProduct({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{$item->id}}" action="{{ route('product.delete',$item->id) }}" method="POST" style="display: none;">
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
        // ck editor 
        ClassicEditor
            .create( document.querySelector( '#Details' ) )
            .catch( error => {
                console.error( error );
            });
        
        // image preview
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader    = new FileReader();
                reader.onload = function(e){
                    $('#previewImage').attr('src',e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // product delete
        function deleteProduct(id) {
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

        // Discount calculate
        function Discount() {
            let price = document.getElementById("price").value;
            var percent = document.getElementById("percent").value;
            var discountPrice = parseFloat(price * percent) / 100;
            if (price == '') {
                alert('Please Enter Product Price First');
                document.getElementById("percent").value = 0;
                return; 
            }
            if(percent == '' || percent == 0) {
                document.getElementById("discountPrice").value = 0;
                return;
            }
            document.getElementById("discountPrice").value = discountPrice.toFixed(2);
        }

    </script>
@endpush