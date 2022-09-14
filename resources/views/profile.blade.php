
<!DOCTYPE html>
<html>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <head><title>@yield('title')profile</title>

        <link  href="{{URL::asset('frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
    href="{{URL::asset("https//www.fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i")}}"
    rel="stylesheet">
    <link href="{{URL::asset('frontend/css/sb-admin-2.min.css') }}" rel="stylesheet"></head>
    <body id="page-top">

<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Website College System</sup></div>
        </a>



    </ul>



    <div id="content-wrapper" class="d-flex flex-column">

      
        <div id="content">

       
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

        
              

           
                <ul class="navbar-nav ml-auto">

                   
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                    
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                 
                    


                </ul>

            </nav>
              <div class="container-fluid">
                  <h1 class="h5 mb-4 text-gray-800"> @yield('title')'s Details</h1>
                  <h6 class="h5 mb-4 text-gray-800">Email address:{{$user->email}}</h6>
                  <h6 class="h5 mb-4 text-gray-800">Id:{{$user->id}}</h6>
                  @yield('options')
                  <h6 class="h5 mb-4 text-gray-800">@yield('GPA','')</h6>
              </div>
            </div>


        </div>
            </div>


        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>


    </div>


</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
{{-- @yield('options') --}}
<script src="public/frontend/vendor/jquery/jquery.min.js"></script>
<script src="public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="public/frontend/vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="{{URL::asset('/frontend/js/sb-admin-2.min.js')}}"></script> 

</body>
{{-- @yield('options') --}}
</html>