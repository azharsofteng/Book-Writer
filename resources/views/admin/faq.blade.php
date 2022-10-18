@extends('layouts.master')
@section('title', 'Faq')
@section('main-content')
<main>
    <div class="container-fluid" id="Gallery">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a> > FAQ</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        @if (isset($gallery))
                            <div class="table-head"><i class="fa fa-edit"></i> FAQ Upate</div>
                        @else
                            <div class="table-head"><i class="fab fa-bandcamp"></i> Add FAQ</div>
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
                        <form id="form" method="post" action="{{ isset($faq) ? route('faq.update', $faq->id) : route('faq.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="question" class="col-sm-3 col-form-label">Question <span class="text-danger">*</span> </label>
                                <div class="col-sm-9">
                                    <input type="text" name="question" id="question" value="{{ isset($faq) ? $faq->question : old('question') }}" class="form-control shadow-none form-control-sm @error('question') is-invalid @enderror" placeholder="Question">
                                </div>
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="answer" class="col-sm-3 col-form-label">Answer <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="answer" placeholder="Answer" id="answer" cols="30" rows="3" class="form-control shadow-none @error('image') is-invalid @enderror">{{ isset($faq) ? $faq->answer : old('answer') }}</textarea>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                        <div class="table-head"><i class="fas fa-table me-1"></i> FAQ List</div>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $key => $faq)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ Str::limit($faq->answer, 70) }}</td>
                                        <td>
                                            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-edit"><i class="fas fa-edit"></i></a>

                                            <button type="submit" class="btn btn-delete shadow-none" onclick="deleteFaq({{ $faq->id }})"><i class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{$faq->id}}" action="{{ route('faq.delete',$faq->id) }}" method="POST" style="display: none;">
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
       
        function deleteFaq(id) {
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