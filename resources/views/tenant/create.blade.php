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
                   
                       
                            
        

                <form  action="{{route('tenant.create',$room->id)}}" method="POST">
        
             @csrf
             <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="">
                                        <div class=""><h3 class="text-center font-weight-light my-2"> Create New Tenant</h3></div>
             
                                           <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"  name="name" id="inputFirstName" type="text" placeholder="Enter tenant name" required />
                                                        <label for="inputFirstName">Full name</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
    
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"  name="phone_number" id="mobile_number" type="tel" placeholder="Enter phone_number" required />
                                                        <label for="mobile_number">phone number</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="address" id="address" type="text" placeholder="Adress" required/>
                                                <label for="address" > Address</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class=""><h3 class="text-center font-weight-light my-2"> Create Agreement</h3></div>
                                                
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control"  name="start_date" id="inputStartDate" type="date" placeholder="start daate" required />
                                                        <label for="inputStartDate">Start date</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="expire_date" id="inputExpireDate" type="date" placeholder="End Date" required/>
                                                <label for="inputExpireDate" > End date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="price" id="inputPrice" type="text" value="{{$room->total_price}}" required/>
                                                <label for="inputPrice" > Price</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-header"><h3 class="text-center font-weight-light my-2"> Payment</h3></div>

                                                <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="from" id="inputFrom" type="date" placeholder="" required/>
                                                        <label for="inputFrom">from</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control"  name="to" id="inputTo" type="date" placeholder="untill" required />
                                                 <label for="inputTo">To</label>
                                                        </div>
                                                    </div>
                                                </div>
                              
           
                                                    <div class=" ">
                                                    <div class=""> <input class="btn btn-primary "  type="submit" value="Create"> </div>
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




       
       

