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
                   <form  action="{{route('payment.update')}}" method="POST">
                       @csrf
                       @method('PUT') 

                            <input type="hidden" name="paymentHistory_id" value="{{ $paymentHistory->id }}">
                            <input type="hidden" name="licenseAgreement_id" value="{{ $licenseAgreement->id }}">
                        <div class="container">
                            <div class="row justify-content-center  ">
                                <div class="col-md-6">
                                        <div class=""><h4 class="text-center font-weight-light my-2"> Update Payment</h4>
                                        </div> 
                                                    <div class="row mb-3  ">
                                                    <div class="col-md-9 ">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"  value="{{$paymentHistory->from}}" name="from" id="inputFrom" type="date" placeholder="" required/>
                                                        <label for="inputFrom">from</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control"  value="{{$paymentHistory->to}}" name="to" id="inputTo" type="date" placeholder="untill" required />
                                                         <label for="inputTo">To</label>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div> 
                                                        <input class="btn btn-primary "  type="submit" value="Update">
                                                    </div>    
                                                 </div>
                                             </div>
                                         </div>
                     </form>
            </main>
    </div>

       @endsection


       
       






       

