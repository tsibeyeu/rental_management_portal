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
                            <li class="breadcrumb-item active">License</li>
                        </ol>
                       
                       
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Licenses
                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                   
                                    <thead>
                                    <tr>
                                           <th>Start date</th>
                                            <th>Expire Date</th>
                                            <th>Price </th>
                                            <th>Status</th>
                                            <th>Payment</th>
                                            
                                            <th class="text-center " colspan="3">New license Action</th>
                                            <th class="text-center " colspan="3">Update Action</th>
                                            <th class="text-center " colspan="3">Delete Action</th>
                                            
                                               
                                            
                        
                                                
                                            </tr>
                                    </thead>
                                           
                                    

                                            
                                    
                                    <tbody>
                                    @foreach($roomTenants as $roomTenant)

                                        @foreach($roomTenant->licenseAgreements as $licenseAgreement)
                                             <tr>
                                                     <td>{{$licenseAgreement->start_date}}</td>
                                                        <td>{{$licenseAgreement->expire_date}}</td>
                                                            <td>{{$licenseAgreement->price}}</td>
        
                                                                 <td>
                                                                     @if($licenseAgreement->license_status && !($roomTenant->status) )
            
                                                                                Active Tenant
                                                                                  @else
                                                                                         Unactive Tenant
                                                                        @endif
                                                                   </td>
        
        
        
        
        
                                                         <td> 
                                                                     <a class="btn btn-outline-success" href="{{route('payment.show',$licenseAgreement->id)}}">Payment</a>
                                                          </td>

        
                                                            <td>
                                                                    <a class="btn btn-outline-info" href="{{route('show.create.newlicense',$licenseAgreement->id)}}">New license</a>
                                                            </td>
    
                                                           <td>
                                                            <form action="{{route('license.edit')}}" method="POST">
                                                                           @csrf
                                                                        
                                                                                   <input type="hidden" name="licenseAgreement_id" value="{{$licenseAgreement->id}}"/>
                                                                                     <button {{$licenseAgreement->license_status  && !($roomTenant->status) ? "":"disabled"}}  class="btn btn-outline-success" type="submit">Update</button>
                                                                     </form>
        
                                                                </td>
                                                             <td>
                                                                   <form action="{{route('license.delete')}}" method="post">
                                                                           @csrf
                                                                        @method('DELETE')
                                                                                   <input type="hidden" name="licenseAgreement_id" value="{{$licenseAgreement->id}}"/>
                                                                                     <button onclick="return confirm('Are you sure you want to delete this Agreement?')" class="btn btn-outline-danger" type="submit">Delete</button>
                                                                     </form>
                                                                 </td>

                                                            </tr>
                                                             @endforeach
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








    




    























    
   
    
    
   






















    
   
    
    
   































    























    
   
    
    
   















    























    
   
    
    
   






















    
   
    
    
   


































    
   
    
    
   










































