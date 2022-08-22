<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Admin | @yield('title')</title>
        @stack('admin-css')
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <body class="sb-nav-fixed">
        
        @include('partials.navbar')

        <div id="layoutSidenav">
            
            @include('partials.sidebar')

            <div id="layoutSidenav_content">

                @yield('main-content') 
                
                @include('partials.footer')
                
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header py-2">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-key"></i> Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('password.change') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label for="">Old Password <span class="text-danger">*</span></label>
                                <input type="password" name="old_password" class="form-control shadow-none mb-1"
                                    placeholder="Enter Old Password" required>
                                <label for="">New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control shadow-none" name="password"
                                    placeholder="Enter New password" required>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-reset shadow-none">Reset</button>
                                <button type="submit" class="btn btn-submit shadow-none">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src=" {{ asset('js/all.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/simple-datatables@latest.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        @stack('script')
        <script type="text/javascript">
            setInterval(function() {

                var currentTime = new Date ( );

                var currentHours = currentTime.getHours ( );

                var currentMinutes = currentTime.getMinutes ( );

                var currentSeconds = currentTime.getSeconds ( );

                currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;

                currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

                var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

                currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

                currentHours = ( currentHours == 0 ) ? 12 : currentHours;

                var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

                document.getElementById("timer").innerHTML = currentTimeString;

            }, 1000);

        </script>
    </body>
</html>
