<!DOCTYPE html>
 <html>
   <head><title>@yield('title')</title>
   <head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="{{URL::asset('enduser/css/sb-admin-2.css') }}">
     <link rel="stylesheet" href="{{URL::asset('enduser/css/sb-admin-2.min.css') }}">
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
 
     <title>College System - register Admin</title>
 
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
         <link href="{{URL::asset('frontend/css/sb-admin-2.min.css') }}" rel="stylesheet">

 </head></head>
 <body class="bg-gradient-primary">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add new Account </h1>
                            </div>
                            <form action="{{route('admin.new_student')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name">Name </label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder=" Name"
                                            name="name" required>
                                    </div>
                                </div>
                    
                    
                                <div class="form-group">
                                    <label for="email">email </label>
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" required>
                                </div>
                    
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Password </label>
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                            placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group row"><select name="is_admin">
                                    <option value=1>admin</option>
                                    <option value=0>student</option>
                                </select></div>
                                
                                <input type="submit" value="register" class="btn btn-primary btn-user btn-block">
                            </form>
                            <form action="{{route('admin.home')}}" method="post">@csrf @method('post') <button class="btn btn-primary btn-user btn-block"> Home </button></form>
                    
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body></html>