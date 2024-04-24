@extends('layouts.layout')
@section('content')
   <x-navbar.navbar-items>
    @can('view tenant')
        <a class="nav-link" href="{{route('tenant.show')}}">
            <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
           </div>
                Tenants
       </a>
       @endcan
    </x-navbar.navbar-items>
            <div id="layoutSidenav_content">
                <main>
                   
                       
                            
        

                <form  action="{{route('tenant.update')}}" method="POST">
    
                                 @csrf
   

                        <input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
             <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="">
                                        <div class=""><h3 class="text-center font-weight-light my-2"> Update Tenant</h3></div>
             
                                           <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"   name="name" value="{{$tenant->name}}" id="inputFirstName" type="text"  required />
                                                        <label for="inputFirstName">Full name</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="email" value="{{$tenant->email}}" id="inputEmail" type="email"  required/>
                                                <label for="inputEmail">Email address</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
    
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"  name="phone_number" value="{{$tenant->phone_number}}" id="mobile_number" type="tel"  required />
                                                        <label for="mobile_number">phone number</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="address" value="{{$tenant->address}}" id="address" type="text"  required/>
                                                <label for="address" > Address</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                   
                                                   
                              
           
                                                    <div class=" ">
                                                    <div class=""> <input class="btn btn-primary "  type="submit" value="Update"> </div>
                                                </div>    
           
           </div>
           </div>
           </div>
           </div>
         
            </form>
                         
                </main>
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
       @endsection





       
       



         
        
         
       
            

       
       

