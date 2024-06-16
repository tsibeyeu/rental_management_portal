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
                                               @can('create user')
                                                   <a class="nav-link" href="{{route('admin.users.create')}}">create user</a>
                                                   @endcan
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
                        <h3 class="mt-4">All users</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                       
                        <x-alert.alert-status
                       alert="success"/>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                users
                            </div>
                            <div class="container-fluid px-4">
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover">
                                   
                                    <thead>
                                    <tr>
                                            
                                            <th >Name</th>
                                            <th>Email</th>
                                            <th>phone number</th>
                                           
                                            <th class="text-center " >Role Action</th>
                                            <th class="text-center " >Update Action</th>
                                            <th class="text-center " >Delete Action</th>
                                            
                                                
                                                
                                               
                                                
                                            </tr>
                                    </thead>
                                           
                                    

                                            
                                    
                                    <tbody>
                                    
                                    @foreach($users as $user)
                                    
                                         <tr>
                                            <td>{{$user->first_name}}   {{$user->second_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_number}}</td>
                                           
                                            
                                            
                                            
                                            <td>      
                                                 <form action="{{route('admin.users.show',$user->id)}}" method="GET">
                                                 
                                                 
                                                  <button   class="btn btn-outline-info" type="submit" >Role</button>
                                                 </form>
                                             </td>

                                            
                                            <td>
                                                 <form action="{{route('admin.users.edit',$user->id)}}" method="POST">
                                                 @csrf
                                                  <button 
                                                  class="btn btn-outline-warning" 
                                                  type="submit">Update
                                                </button>
                                                 </form>
                                                </td>
                                            <td>
                                                 <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
                                                 @method('DELETE')
                                                 @csrf
                                                  <button
                                                   onclick="return confirm('Are you sure you want to delete this user?')" 
                                                  class="btn btn-outline-danger" 
                                                  type="submit">Delete
                                                </button>
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







    




    























    
   
    
    
   






















    
   
    
    
   























