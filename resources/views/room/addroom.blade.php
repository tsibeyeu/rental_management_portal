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
    
                <form  action="{{route('room.add')}}" method="POST">
                           @csrf
                         <input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
                       <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 mt-5">
                                    <div class="">
                                        <div class="col-md-8"><h3 class="text-center font-weight-light my-2"> Add Room</h3></div>
             
                                           <div class="row mb-3 ">
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-3 mb-md-0 "> 
                                                            <select class="form-control" name="room_id">
                                                                @foreach($rooms as $room)
                                                                <option  class="text-center alert alert-info" value="{{$room->id}}"> {{$room->room_number}}      </option>
                                                                @endforeach
                                                            </select>
                                                            <label>room number</label>
                                                        </div>
                                                    </div>
                                                    </div>
           
                                                    <div class=""> <input class="btn btn-primary "  type="submit" value="Add"> </div>
                                                </div>    
           
                                             </div>
                                      </div>
                                </div>
                          </div>
                    </form>
                         
                </main>
              
            </div>
        </div>
       @endsection





       
       



       

     


       



