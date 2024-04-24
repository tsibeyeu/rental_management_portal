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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                       
                        </div>
                        <div class="card mb-4">
                        <x-alert.alert-status
                          alert="success"
                            />
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Rooms
                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th >floor</th>
                                            <th>room_number</th>
                                            <th>type</th>
                                            <th>Square area</th>
                                            <th>price Per Sq Area </th>
                                            <th>Total price</th>
                                            @can('renting permission')
                                            <th>Status</th>
                                            @endcan
                                            @can('update room')
                                            <th class="text-center " >Update Action</th>
                                            @endcan
                                            @can('view room detail')
                                            <th class="text-center " >Detail Action</th>
                                            @endcan
                                            @can('delete room')
                                            <th class="text-center " >Delete Action</th>
                                            @endcan
                                        </tr>
                                           
                                    </thead>

                                            
                                    <tbody>
                                        @foreach($rooms as $room)
                                        <tr>
                                            <td>{{$room->floor}}</td>
                                            <td>{{$room->room_number}}</td>
                                            <td>{{$room->roomType->type}}</td>
                                            <td>{{$room->square_area}}</td>
                                            <td>{{$room->price_per_area}}</td>
                                            <td>{{$room->total_price}}</td>
                                            
                                            @can('renting permission')
                                            <td>
                                            <form action="{{route('show.tenant.create')}}" method="POST">
                                                 
                                                 @csrf
                                                 <input type="hidden" name="room_id" value="{{$room->id}}"/>
                                                  <button {{$room->status ?"":"disabled"}}  class="btn btn-primary" type="submit">{{$room->status ? "Rent":"Rented"}}</button>
                                                 </form>
                                            </td>
                                            @endcan
                                            @can('update room')
                                            <td> 
                                            <form action="{{route('room.edited')}}" method="POST">
                                                 
                                                 @csrf
                                                 <input type="hidden" name="room_id" value="{{$room->id}}"/>
                                                  <button class="btn btn-outline-success" type="submit">Update</button>
                                                 </form>
                                             </td>
                                             @endcan
                                             @can('view room detail')
                                            <td>
                                            <form action="{{route('room.detail')}}" method="POST">
                                                 
                                                 @csrf
                                                 <input type="hidden" name="room_id" value="{{$room->id}}"/>
                                                  <button class="btn btn-outline-info" type="submit">Detail</button>
                                                 </form>
                                        </td>
                                        @endcan
                                        @can('delete room')
                                            <td>
                                                <form action="{{route('room.delete')}}" method="post">
                                                    
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="room_id" value="{{$room->id}}"/>
                                                    
                                                    <button onclick="return confirm('Are you sure you want to delete this Room?')" class="btn btn-outline-danger" type="submit" >Delete</button>
                                                </form>
                                                
                                            </td>
                                            @endcan
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