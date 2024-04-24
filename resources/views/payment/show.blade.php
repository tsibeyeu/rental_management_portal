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
                    <x-alert.alert-status
                       alert="success"
                       />
                  
                    <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Payment</li>
                        </ol>
                       
                       
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Payments
                                <a href="{{route('show.create.payment',$id)}}" class="btn btn-primary float-end">New Payment</a>
                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                   
                                    <thead>
                                    <tr>
                                             <th>from</th>
                                            <th>to</th>
                                            <th>paid </th>
                                            
                                            
                                            <th class="text-center " colspan="3">Update Action</th>
                                            <th class="text-center " colspan="3">Delete Action</th>
                                           
                             
                                            </tr>
                                    </thead>
                                           
                                    

                                            
                                    
                                    <tbody>
                                    @foreach($licenseAgreements->paymentHistories as $paymentHistory)
                                        <tr>
                                            <td>{{$paymentHistory->from }}</td>
                                            <td>{{$paymentHistory->to }}</td>
                                            <td>{{$paymentHistory-> price}}</td>
                                            
                                            
                                          

                                            
                                         
                                        
   
   
                                            
                                       <td>
                                           
                                              <form action="{{ route('payment.edit') }}" method="POST">
                                                     @csrf 
                                                     <input type="hidden" name="paymentHistory_id" value="{{ $paymentHistory->id }}">
                                                     <input type="hidden" name="licenseAgreement_id" value="{{ $licenseAgreements->id }}">
                
                                                     <button {{$licenseAgreements->license_status ? "":"disabled"}}  class="btn btn-outline-info" type="submit">update</button>
                                                     </form>           

                                                    
                                                     </td>
                                            
                                            <td>
                                            <form action="{{route('payment.delete')}}" method="post">
                                                 @csrf
                                                 @method('DELETE')
                                                <input type="hidden" name="$paymentHistory_id" value="{{$paymentHistory->id}}"/>
                                                      <button onclick="return confirm('Are you sure you want to delete this Payment?')" class="btn btn-outline-danger" type="submit">Delete</button>
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







    




    























    
   
    
    
   






















    
   
    
    
   































    























    
   
    
    
   















    























    
   
    
    
   






















    
   
    
    
   


































    
   
    
    
   














































    























    
   
    
    
   






















    
   
    
    
   


































    
   
    
    
   






















































    
   
    
    
   



























































