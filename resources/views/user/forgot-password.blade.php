
{{-- @extends('layouts.layout')
@section('content')
    <body class="text-brown">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                   
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                                    <p>Enter your email address and we will send you a link to reset your password.</p>
                                    <div class="card-body">
                                        <form action="{{route('forgot.password')}}" method="post">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                           
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" >Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    <x-alert.alert-status
                                        alert="error"
                                        />
                                    <x-alert.alert-status
                                        alert="success"
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
                                <div class="card marginTop  border-0  ">
                                    
                                    <x-alert.alert-status
                                    alert="success"
                                     />
                                    <x-alert.alert-status
                                    alert="error"
                                    />
                                    <div class=" logo-text text-center font-weight-light mb-2 ">
                                         <h2>Password Recovery</h2>
                                        </div>
                                    <div class=" brown-hieght brown card-body">
                                        <form action="{{route('forgot.password')}}" method="post">
                                            @csrf
                                            <div class=" brown-margin text-center font-weight-light mt-2 mb-5 " ><p>Enter your email address and we will send you a link to reset your password.</p></div>
                                            <div class="col-10 mb-3 mx-auto ">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="Email address" />
                                            </div>
                                          
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button class="btn-submit btn " type="submit" >send</button>
                                            </div>
                                            <div class="text-center  link-password mb-2 mt-2"><a class="small" href="{{route('user.showLogin')}}">back</a>
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


    

    
