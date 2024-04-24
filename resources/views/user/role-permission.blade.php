
@extends('layouts.layout')
@section('content')
   <x-navbar.navbar-items>
         

                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                User & Role
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Users
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">create user</a>
                                            <a class="nav-link" href="{{route('admin.users.index')}}">view user</a>
                                            
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Roles & Permission
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{route('admin.roles.index')}}">Role</a>
                                            <a class="nav-link" href="{{route('admin.permissions.index')}}">Permission</a>
                                            
                                        </nav>
                                    </div>
                                </nav>
                            </div>


        
    </x-navbar.navbar-items>
          
            
     <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard Detail Tenant</li>
                    </ol>            
             </div>
             <div class="container mt-5">
                <div class="row ">
                    <div class="col-md-12">
                        @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                            <h4>User:{{$user->first_name}} {{$user->second_name}}
                                    <a href="{{route('admin.users.index')}}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                    <div class="mb-3">
                                        <label > User Permission:</label>
                                        <div class="row">
                                        @foreach($user->roles as $user->role)
                                            <div class="col-md-1">
                                                <label >
                                                <form action="{{route('admin.users.roles.remove',[$user->id,$user->role->id])}}" method="POST">
                                                 @csrf
                                                 @method('DELETE')
                                                      <button onclick="return confirm('Are you sure you want to delete this Role?')" class="btn btn-outline-danger" type="submit">{{$user->role->name}}</button>
                                                    </form>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div> 
                            </div>
           
                   
                        
                               
                
                            <div class="card-body">
                            <form  action="{{route('admin.users.roles',$user->id)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                   
                                    <div class="mb-3">
                                        <label >Assign Role:</label>
                                        <div class="row">
                                                <select class="form-control" name="role" >
                                                            <option>Select Role</option>
                                                        @foreach($roles as $role)
                                                            <option  type="text" value="{{$role->name}}">
                                                                {{$role->name}} 

                                                            </option>
                                                            @endforeach
                                                 </select>
                                                 @error('permission') <span>{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" type="submit">Assign</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row ">
                    <div class="col-md-12">
                        @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                
                            </div>
                            <div class="card-body">
                                    <div class="mb-3">
                                        <label > User Permission:</label>
                                        <div class="row">
                                            @foreach($user->permissions as $user->permission)
                                            <div class="col-md-2">
                                                <label >
                                                <form action="{{route('admin.users.permissions.revoke',[$user->id,$user->permission->id])}}" method="POST">
                                                 @csrf
                                                 @method('DELETE')
                                                      <button onclick="return confirm('Are you sure you want to delete this Permission?')" class="btn btn-outline-danger" type="submit">{{$user->permission->name}}</button>
                                                    </form>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div> 
                            </div>
                            <div class="card-body">
                            <form  action="{{route('admin.users.permissions',$user->id)}}" method="POST">
                                    @csrf
                                     @method('POST')
                                    <div class="mb-3">
                                        <label >Assign Permission:</label>
                                        <div class="row">
                                                <select class="form-control" name="permission" >
                                                         <option>Select Permission</option>
                                                            @foreach($permissions as $permission)
                                                        <option value="{{$permission->name}}">
                                                            {{$permission->name}}

                                                        </option>
                                                              
                                                            @endforeach
                                                 </select>
                                                 @error('permission') <span>{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" type="submit">Assign</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
   </div>
 @endsection





       
       




   
         

               