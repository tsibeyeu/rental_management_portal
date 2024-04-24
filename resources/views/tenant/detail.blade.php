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
                            <li class="breadcrumb-item active">Dashboard Detail Tenant</li>
                        </ol>
                       
                       
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Detail Tenant
                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                   
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>phone_number</th>
                                            <th>address </th>
                                            <th>From </th>
                                            <th>To </th>
                                            <th>Price </th>
                                        </tr>
                                    </thead>
                                           
                                    

                                            
                                    
                                    <tbody>
                                    @foreach($roomTenants as $roomTenant)
                                    
                                    @foreach($roomTenant->licenseAgreements as $licenseAgreement)
                                        <tr>
                                            <td> {{$roomTenant->tenant->name}}</td>
                                            <td>{{$roomTenant->tenant->email}}</td>
                                            <td>{{$roomTenant->tenant->phone_number}}</td>
                                            <td>{{$roomTenant->tenant->address}}</td>
                                            <td> {{$licenseAgreement->start_date}}</td>
                                            <td> {{$licenseAgreement->expire_date}}</td>
                                            <td> {{$licenseAgreement->price}}</td>
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







    