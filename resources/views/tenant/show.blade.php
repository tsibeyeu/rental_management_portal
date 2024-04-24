@extends('layouts.layout')
@section('content')
   <x-navbar.navbar-items/>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard tenant</li>
                        </ol>
                       
                       
                        </div>
                        <div class="card mb-4">
                        <x-alert.alert-status
                           alert="success"
                            />
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tentants
                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                   
                                    <thead>
                                    <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone_number</th>
                                            <th>Address </th>
                                            @can('update tenant')
                                            <th class="text-center " >Update Action</th>
                                            @endcan
                                            @can('view tenant room')
                                            <th class="text-center " >View Room Action</th>
                                            @endcan
                                            @can('delete tenant')
                                            <th class="text-center " >Delete Action</th>
                                            @endcan
                                            
                        
                                                
                                            </tr>
                                    </thead>
                                           
                                    

                                            
                                    
                                    <tbody>
                                    @foreach($tenants as $tenant)
                                        <tr>
                                            <td> {{$tenant->name}}</td>
                                            <td>{{$tenant->email}}</td>
                                            <td>{{$tenant->phone_number}}</td>
                                            <td> {{$tenant->address}}</td>
                                            
                                            
                                            
                                            @can('update tenant')
                                            <td>
                                                <a class="btn btn-outline-success" href="{{route('tenant.edit',$tenant->id)}}">Update</a>
                                            </td>
                                            @endcan
                                            @can('view tenant room')
                                            <td>
                                                <a class="btn btn-outline-info" href="{{route('room.show',$tenant->id)}}">Room</a>
                                            </td>
                                            @endcan
                                            @can('delete tenant')
                                            <td> 
                                                <form action="{{route('tenant.delete')}}" method="post">
                                                 @method('DELETE')
                                                 @csrf
                                                 <input type="hidden" name="tenant_id" value="{{$tenant->id}}"/>
                                                  <button onclick="return confirm('Are you sure you want to delete this Tenant?')" class="btn btn-outline-danger" type="submit">Delete</button>
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








    




    























    
   
    
    
   






















    
   
    
    
   































    























    
   
    
    
   












