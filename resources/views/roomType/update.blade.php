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
                <x-alert.alert-status
                       alert="success"
                       />
                       
                            
        

                         <form  action="{{route('room.type.update')}}" method="POST">
    
                                 @csrf
                              <input type="hidden" name="roomType_id" value="{{ $roomType->id }}">
             <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="">
                                        <div class=""><h3 class="text-center font-weight-light my-2"> Update Room type</h3></div>
             
                                          
                                                
    
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"  name="type" value="{{$roomType->type}}" id="inputRoomType"  type="text" placeholder="Enter room type" required />
                                                        <label for="inputRoomType">Room Type</label>
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