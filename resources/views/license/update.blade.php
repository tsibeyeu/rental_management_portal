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
                <form  action="{{route('license.update')}}" method="POST">
                    @csrf
                    @method('PUT') 

                    <input type="hidden" name="licenseAgreement_id" value="{{ $licenseAgreement->id }}">
                        <div class="container">
                            <div class="row justify-content-center  ">
                                <div class="col-md-6">
                                        <div class=""><h4 class="text-center font-weight-light my-2"> Update License</h4>
                                        </div> 
                                                    <div class="row mb-3  ">
                                                    <div class="col-md-9 ">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"  name="start_date" id="inputStartDate" value="{{$licenseAgreement->start_date}}" type="date" placeholder="start daate" required />
                                                        <label for="inputStartDate">Start date</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control" name="expire_date" id="inputExpireDate" value="{{$licenseAgreement->expire_date}}" type="date" placeholder="End Date" required/>
                                                       <label for="inputExpireDate" > End date</label>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                        <input class="form-control"  value="{{$licenseAgreement->price}}" name="price" id="inputPrice" type="text" placeholder="Enter price" required/>
                                                <label for="inputPrice" > Price</label>
                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                    <div class="form-floating">
                                                        <select class="form-control " name="license_status">
                                                      <option value="active" {{ $licenseAgreement->license_status == true ? 'selected' : '' }}>Active</option>
                                                       <option value="unactive" {{ $licenseAgreement->license_status == false ? 'selected' : '' }}>Unactive</option>
                                                         </select>
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
        </div>
      @endsection




       
       



       

     


       

