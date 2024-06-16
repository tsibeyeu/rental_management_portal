
{{-- @extends('layouts.layout')
@section('content')
    <body class="text-brown">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                   
                        <div class="row justify-content-center">
                            <x-alert.alert-status
                            alert="success"
                             />
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="{{route('user.Login')}}" method="post">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="{{route('forgot.password')}}">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    <x-alert.alert-status
                                        alert="error"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
    </body>
@endsection --}}


@extends('layouts.layout')
@section('content')
    <body class="bg-white">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="  container">
                   
                        <div class="row justify-content-center">
                           
                           
                            <div class="col-lg-5">
                                <div class="card  border-0  mt-3">
                                    <div class=" logo-text text-center font-weight-light mb-2  ">
                                    <img src="{{ asset('omishtu.jpg') }}" alt="icon" style="width: 220px; margin-bottom:-35px ">
                                        
                                    </div>
                                    <x-alert.alert-status
                                    alert="success"
                                     />
                                    <x-alert.alert-status
                                    alert="error"
                                    />
                                    <div class=" brown-hieght brown card-body">
                                      
                                        <form action="{{route('user.Login')}}" method="post">
                                            @csrf
                                            <div class=" brown-margin text-center font-weight-light mt-2" ><h2>SIGN IN</h2></div>
                                            <div class="col-10 mb-3 mx-auto ">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="Email" />
                                            </div>
                                            <div class="col-10 mx-auto mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                            </div>
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button class="btn-submit btn " type="submit" >Sign In</button>
                                            </div>
                                            <div class="text-center link-password mb-2 mt-2"><a class="small" href="{{route('forgot.password')}}">Forgot Password?</a>
                                        </div>
                                        </form>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                </main>
            </div>
                <footer class="py-4 bg-white mx-auto">
                            <div class="text-muted small flex align-items-center justify-center">Copyright &copy; omishtu-joy 2024</div>
                </footer>
            
        </div>
        
    </body>
@endsection


    

    



    

    
