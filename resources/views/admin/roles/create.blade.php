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
            <div class="container mt-5">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Role
                                    <a href="{{route('admin.roles.index')}}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.roles.store')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="role">Role name</label>
                                        <input type="text" id="role" name="name" class="form-control" required />
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





       
       



