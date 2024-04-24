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
                     
                <form  action="{{route('admin.roles.update',$role->id)}}" method="POST">
        
        @csrf
        @method('PUT')
        <div class="container">
                       <div class="row justify-content-center  ">
                           <div class="col-md-6">
                               <div class="">
                                   <div class=""><h4 class="text-center font-weight-light my-2"> update roles</h4></div>
          
                                               <div class="row mb-3  ">
                                               <div class="col-md-9 ">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                   <input class="form-control" name="name" id="inputFrom" type="text" value="{{$role->name}}" placeholder="" required/>
                                                   </div>
                                                   @error('name') <span>{{$message}}</span>@enderror
                                               </div>
                                               </div>
                                           
                                              
                                              
                         
      
                                               <div >
                                               <div> <input class="btn btn-primary "  type="submit" value="update"> </div>
                                           </div>    
                                      </div>
                                </div>
                          </div>
                    </div>
    
       </form>
       <div class="row justify-content-center  ">
                           <div class="col-md-6">
                               <div class="">
                                   <div class=""><h4 class="text-center font-weight-light my-2">role permissions</h4></div>
                                   @foreach($role->permissions as $role->permission)
                                   <form action="{{route('admin.roles.permissions.revoke',[$role->id,$role->permission->id])}}" method="post">
                                                 @csrf
                                                 @method('DELETE')
                                                      <button onclick="return confirm('Are you sure you want to delete this Permission?')" class="btn btn-outline-danger" type="submit">{{$role->permission->name}}</button>
                                                    </form>
                                                    @endforeach

    <form  action="{{route('admin.roles.permissions',$role->id)}}" method="POST">
        
        @csrf
        <div class="container">
                       <div class="row justify-content-center  ">
                           <div class="col-md-6">
                               <div class="">
                                  

                                   <div class="row mb-3  ">
                                               <div class="col-md-9 ">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                  <select name="permission" id="">
                                                    @foreach($permissions as $permission)
                                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                                                    @endforeach
                                                  </select>
                                                   @error('name') <span>{{$message}}</span>@enderror
                                               </div>
                                               </div>
      
                                               <div >
                                               <div> <input class="btn btn-primary "  type="submit" value="Assign"> </div>
                                           </div>    
                                           </div>    
                                           </div>    
                                           </div>    
                                           
</form>   
                                 </div>
                                </div>
                            </div>
                            
        

             
                         
                </main>
               
            </div>
        </div>
@endsection




       
       



