<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }} | SIMA</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/bkkbn-icon.png') }}">

    <!-- Custom fonts for this template-->
    <!-- <link href="sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('sb_admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="sb_admin/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="{{ asset('sb_admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <style>
        .required{
            color: #ff0000;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('container')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dittekda BKKBN 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah yakin anda ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-warning">Logout</button>
                    </form>
                    <!-- <a class="btn btn-warning" href="/logout">Logout</a> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb_admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb_admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb_admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('sb_admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('sb_admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb_admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb_admin/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('sb_admin/js/demo/datatables-demo.js') }}"></script>

    <!-- Custom JS -->
    @if(Request::is('pic*'))
    <script src="{{ asset('js/pic.js') }}"></script>
    @elseif(Request::is('app*'))
    <script src="{{ asset('js/app.js') }}"></script>
    @endif

</body>

</html>