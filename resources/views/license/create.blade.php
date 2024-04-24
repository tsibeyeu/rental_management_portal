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
                   
                       
                            
        
                <form  action="{{route('create.newlicense',$roomTenantId)}}" method="POST">
        
        @csrf
        <div class="container">
                       <div class="row justify-content-center  ">
                           <div class="col-lg-10">
                               <div class="">
                                   <div class=""><h3 class="text-center font-weight-light my-2"> Create New License</h3></div>
        
                                     
                                             
                                               <div class="row mb-3">
                                               <div class="col-md-9">
                                                   <div class="form-floating mb-3 mb-md-0">
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
                                                   <input class="form-control" value="{{$room->total_price}}" name="price" id="inputPrice" type="text"  required/>
                                           <label for="inputPrice" > Price</label>
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






       
       



    
     
       
   
   




       
       



       

     