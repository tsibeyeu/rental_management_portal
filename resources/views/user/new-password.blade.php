
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
                                    <div class=" brown-hieght brown card-body">
                                      
                                        <form action="{{route('reset.password.post')}}" method="POST">
                                            @csrf
                                            <div class=" brown-margin text-center font-weight-light mt-2 mb-3 " ><h2>Reset password</h2></div>
                                            <input type="hidden" name="token" value="{{$token}}">
                                            <div class="col-10 mb-3 mx-auto ">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="Email address" />
                                            </div>
                                            <div class="col-10 mx-auto mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder=" New Password" />
                                            </div>

                                            <div class="col-10 mx-auto mb-3">
                                                <input class="form-control" name="password_confirmation" id="Password" type="password" placeholder="Confirme  Password" />
                                            </div>
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button class="btn-submit btn " type="submit" >Reset</button>
                                            </div>
                                            {{-- <div class="text-center link-password mb-2 mt-2"><a class="small" href="{{route('forgot.password')}}">Forgot Password?</a>
                                        </div> --}}
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


    

    
