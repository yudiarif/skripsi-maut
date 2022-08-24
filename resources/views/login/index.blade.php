<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - SKPTH</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />


    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image pr-3" style="background-image: url('img/login.jpg')">
                            
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sistem Keputusan Penerimaan Tenaga Honorer</h1>
                                    </div>
                                    <form class="user" action="{{ route('login-auth') }}" method="post">
                                        @csrf
                                        <div class="form-group pt-1">
                                            <input autocomplete="off" type="username"  name="username" id="username" placeholder="Masukan Username Anda" autofocus required class="form-control form-control-user"/>
                                        </div>
                                        <div class="form-group pt-1">
                                            <input autocomplete="off" type="password" name="password" id="password" placeholder="Password" required class="form-control form-control-user"/>
                                        </div>
                                        <div class="form-group pl-2">
                                            <input type="checkbox" onclick="showPassword()"> Show Password
                                        </div>
                                    {{-- <input autocomplete="off" type="text" name="password" id="password" required class="form-control"/>
                                        <div class="form-group pt-1">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" aria-describedby="username"
                                                placeholder="Masukan Username Anda" autofocus required>
                                        </div>
                                        <div class="form-group pt-2">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" required>
                                        </div> --}}
                                       <div class="pt-2">
                                       <button type="submit" class="btn btn-info btn-user btn-block"></i> Simpan</button>
                                       </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.j')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('js/show-password.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

   
    
    @include('sweetalert::alert')

</body>

</html>