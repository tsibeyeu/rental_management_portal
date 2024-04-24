@extends('layouts.layout')
@section('content')
   <x-navbar.navbar-items>
        <a class="nav-link" href="{{route('tenant.show')}}">
            <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
           </div>
                Tenants
       </a>
    </x-navbar.navbar-items>
            <div id="layoutSidenav_content">
                <main>
                   
                       
                            
        

        <form action="{{route('room.type.create')}}" method="POST">
        
             @csrf
             <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="">
                                        <div class=""><h3 class="text-center font-weight-light my-2"> Create New Room Type</h3></div>
                                             <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" name="type" id="inputRoomType"  type="text" placeholder="Enter room type" required />
                                                            <label for="inputRoomType">Room Type</label>
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
                      <div class="container-fluid px-4">
                       <div class="card-body">

                      <table id="datatablesSimple" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th > Existing Room Type</th>
                                            
                                            <th class="text-center " colspan="3">Update Action</th>
                                            
                                            <th class="text-center " colspan="3">Delete Action</th>
                                        </tr>
                                           
                                    </thead>

                                            
                                    <tbody>
                                        @foreach($roomTypes as $roomType)
                                        <tr>
                                            <td>{{$roomType->type}}</td>
                                            <td> 
                                            <form action="{{route('room.type.edit')}}" method="get">
                                                 
                                                 @csrf
                                                 <input type="hidden" name="roomType_id" value="{{$roomType->id}}"/>
                                                  <button class="btn btn-outline-success" type="submit">Update</button>
                                                 </form>
                                        </td>
                                          
                                            <td>
                                                <form action="{{route('room.type.delete')}}" method="post">
                                                    
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="roomType_id" value="{{$roomType->id}}"/>
                                                    
                                                    <button onclick="return confirm('Are you sure you want to delete this Room Type?')" class="btn btn-outline-danger" type="submit" >Delete</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                 
                                    </tbody>
                                </table>
                            </div>
                            </div>
                         
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