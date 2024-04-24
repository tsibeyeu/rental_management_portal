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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        </div>
                        <div class="card mb-4">
                        <x-alert.alert-status
                       alert="success"
                       />
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tenant Rooms
                                <a href="{{route('show.room.add',$tenant->id)}}" class="btn btn-danger float-end">Add Room</a>

                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                   
                                    <thead>
                                    <tr>
                                            <th >Floor</th>
                                            <th>Room_number</th>
                                            <th>Type</th>
                                            <th>Sq area</th>
                                            <th>Price per Sq area </th>
                                            <th>Total price</th>
                                            <th>Status</th> 
                                            @can('release room')
                                            <th class="text-center " >Release Action</th>
                                            @endcan
                                            <th class="text-center " >License Action</th>   
                                            </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($roomTenants as $roomTenant)
                                    
                                           <tr>
                                            <td>{{$roomTenant->floor}}</td>
                                            <td>{{$roomTenant->room_number}}</td>
                                            <td>{{$roomTenant->room->roomType->type}}</td>
                                            <td>{{$roomTenant->square_area}}</td>
                                            <td>{{$roomTenant->price_per_area}}</td>
                                            <td>{{$roomTenant->total_price}}</td>
                                            <td>{{$roomTenant->status ? "❌" :"✅"}}</td>
                                            
                                            
                                            @can('release room')
                                            <td>      
                                                 <form action="{{route('room.release')}}" method="post">
                                                 
                                                 @csrf
                                                 <input type="hidden" name="room_id" value="{{$roomTenant->room->id}}"/>
                                                 <input type="hidden" name="tenant_id" value="{{$roomTenant->tenant->id}}"/>
                                                  <button  {{$roomTenant->status  ? "disabled":""}} class="btn btn-outline-danger" type="submit" >{{$roomTenant->status  ? "Released":"Release"}}</button>
                                                 </form>
                                             </td>
                                             @endcan

                                            
                                            
                                            <td>      
                                                 <form action="{{route('license.show',$roomTenant->room->id)}}" method="get">
                                                 
                                                 <input type="hidden" name="tenant_id" value="{{$id}}"/>
                                                  <button  class="btn btn-outline-success" type="submit">License</button>
                                                 </form>
                                                 </td>
                                               
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>   
                                </table>
                            </div>
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








    




    























    
   
    
    
   






















    
   
    
    
   























