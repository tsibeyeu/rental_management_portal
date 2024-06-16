@extends('layouts.layout')
@section('content')
<x-nav-bar.navbar/>
<div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"></h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active"></li>
                    </ol>            
             </div>
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-">
                        <div class="card">
                            <div class="card-header">
                                <h4>Member Entry Form
                                    <a href="{{route('member.index')}}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('member.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="training_package_id" value="{{$training_package_id}}">
                                    <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="my-2">
             
                                           <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <label for="inputEmail">Full Name </label>
                                                        <input class="form-control"  name="name" id="inputFirstName" type="text"  required />
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                       
                                                <label for="inputEmail">Email </label>
                                                <input type="text" id="member" name="email" class="form-control" required />
                                                       
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <label for="mobile_number">phone number</label>
                                                        <input class="form-control"  name="phone_number" id="mobile_number" type="tel" required />
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                            <label for="address"> Address</label>
                                                        <input class="form-control" name="address" id="address" type="text" required/>
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <label for="type">membershipType</label>
                                                        <select name="membershipType_id" id="member" class="form-control">
                                                        <option value="" selected disabled>- Select -</option>
                                            @foreach($membershipTypes as $membershipType)
                                            <option value="{{$membershipType->id}}">{{$membershipType->name}}</option>
                                            @endforeach
                                        </select>
                                                    </div>
                                                    </div> 
                                                    
                                                    </div>
                                 <div class="row mb-3">
                                   
                                 <div class="col-md-9">
                                        <label for="member"> package sessionp</label>
                                        <select name="package_session_id" id="member" class="form-control">
                                        <option value="" selected disabled>- Select -</option>
                                            @foreach($packageSessions as $packageSession)
                                            <option value="{{$packageSession->id}}">{{$packageSession->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div> 
                                    </div> 
                                                    <div class="row mb-3">
                                                    <div class="col-md-9" >
                                                        <label for="inputEmail">Join date </label>
                                                        <input class="form-control"  name="join_date" id="inputFirstName" type="date" required />
                                                    </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <label for="inputEmail">End date </label>
                                                        <input class="form-control"  name="expire_date" id="inputFirstName" type="date" required />
                                                    </div>
                                                    </div>
                                 <div class="row mb-3">
                                 <div class="col-md-9">
                                        <label for="member" class="col-sm-3 control-label"> Coache</label>
                                        <select name="coache_id" id="member" class="form-control">
                                        <option value="" selected disabled>- Select -</option>
                                            @foreach($coaches as $coache)
                                            <option value="{{$coache->id}}">Coache {{$coache->name}} Expertise with {{$coache->expertise}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    </div> 
                                   
                                    <div>
                                        <button class="btn btn-primary" type="submit">store</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
   </div>
  
@endsection