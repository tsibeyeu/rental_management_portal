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
                   
                       
                            
                  

        <form action="{{route('admin.users.store')}}" method="POST">
        
             @csrf
             <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="">
                                        <div class=""><h3 class="text-center font-weight-light my-2"> Create user</h3></div>
             
                                           <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control"  name="first_name"  type="text" placeholder="Floor " required />
                                                            <label >First name</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="second_name"  type="text" placeholder="Room number" required/>
                                                    <label >Last name</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" name="email"   type="text" placeholder="Enter in square area meter" required />
                                                            <label >Email</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" name="password"   type="text" placeholder="Enter in square area meter" required />
                                                            <label >Password</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                            <input class="form-control"  name="phone_number"  type="text" placeholder="Enter Price In Square Meter" required/>
                                                            <label >Phone number</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="roles[]" >
                                                            <option>Select Role</option>
                                                        @foreach($roles as $role)
                                                            <option class="form-control" type="text" value="{{$role->id}}">
                                                                {{$role->name}} 

                                                            </option>
                                                            @endforeach
                                                          </select>
                                                           
                                                        </div>
                                                    </div>
                                                 </div>
                                                   
                                                    <div > <input class="btn btn-primary "  type="submit" value="Create"> </div>
           
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




       
       



    
     
       
   
   