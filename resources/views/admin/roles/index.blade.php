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
                                                   <a class="nav-link" href="{{route('admin.users.create')}}">create user</a>
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
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                       
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Roles
                                <a href="{{route('admin.roles.create')}}" class="btn btn-primary float-end">Add role</a>

                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                   
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th class="text-center " colspan="3">Permission </th>
                                            <th class="text-center " colspan="3">Update Action</th>
                                            <th class="text-center " colspan="3">Delete Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                    
                                        <tr>
                                            <td> {{$role->name}}</td>
                                            <td> 
                                            <form action="{{route('admin.roles.permission.index',$role->id)}}" method="get">  
                                                  <button class="btn btn-outline-success" type="submit">Add Role Permission</button>
                                                 </form>
                                            </td>
                                            <td> 
                                            <form action="{{route('admin.roles.edit',$role->id)}}" method="get">
                                                 
                                                 @csrf
                                                  <button class="btn btn-outline-success" type="submit">Update</button>
                                                 </form>
                                            </td>
                                            <td> 
                                            <form action="{{route('admin.roles.destroy',$role->id)}}" method="POST">
                                                 
                                                 @csrf
                                                 @method('DELETE')
                                                  <button class="btn btn-outline-success"  onclick="return confirm('Are you sure you want to delete this Tenant?')" type="submit">Delete</button>
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
               
            </div>
        </div>
       @endsection




       
       



