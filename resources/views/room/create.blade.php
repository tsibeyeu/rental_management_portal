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

        <form action="{{route('room.create')}}" method="POST">
        
             @csrf
             <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="">
                                        <div class=""><h3 class="text-center font-weight-light my-2"> Create New Room</h3></div>
             
                                           <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control"  name="floor" id="inputFloor" type="text" placeholder="Floor " required />
                                                            <label for="inputFloor">Floor</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="room_number" id="inputRoomNumber" type="text" placeholder="Room number" required/>
                                                    <label for="inputRoomNumber">Room Number</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="roomType_id">
                                                        @foreach($roomTypes as $roomType)
                                                            <option class="form-control"  id="inputRoomType"  type="text" value="{{$roomType->id}}">
                                                                {{$roomType->type}} 

                                                            </option>
                                                            @endforeach
                                                          </select>
                                                           
                                                        </div>
                                                    </div>
                                                 </div>
                                               
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" name="square_area" id="inputSquareArea"  type="text" placeholder="Enter in square area meter" required />
                                                            <label for="inputSquareArea">Square Area Meter</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                            <input class="form-control"  name="price_per_area" id="inputPricePerArea" type="text" placeholder="Enter Price In Square Meter" required/>
                                                            <label for="inputPricePerArea" > Price Per Square Meter</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control"  name="total_price" id="inputTotalPrice" type="text" placeholder="Enter Price" required/>
                                                    <label for="inputPricePerArea" > Total Price</label>
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




       
       



    
     
       
   
   