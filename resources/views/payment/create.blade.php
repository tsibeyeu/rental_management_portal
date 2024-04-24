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
                   
                       
                            
        

                <form  action="{{route('create.payment',$licenseAgreementId)}}" method="POST">
        
             @csrf
             <div class="container">
                            <div class="row justify-content-center  ">
                                <div class="col-md-6">
                                    <div class="">
                                        <div class=""><h4 class="text-center font-weight-light my-2"> Create New Payment</h4></div>
             
                                          
                                                  
                                                    <div class="row mb-3  ">
                                                    <div class="col-md-9 ">
                                                        <div class="form-floating mb-3 mb-md-0">
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
               
            </div>
        </div>
       @endsection

       
       



