<body class="sb-nav-fixed">
    
    <nav class=" sb-topnav navbar navbar-expand navbar-dark " id="id" style="border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:rgb(228, 228, 228);" >
    <!-- Navbar Brand-->
   
         
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" style="text-decoration:none; color:#ccc;"  href="#!">
            <i class="fas fa-bars"></i>
             
         </button>
        <a class="navbar-brand ps-3" style="text-decoration:none; color:#ccc; font-size:1rem;"  href="#">Home</a>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
               
            </div>
        </form>
        <!-- Navbar-->
         <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <div   style="margin-right:1rem;" >
                <img  src="{{ asset('gym.jpg') }}" alt="icon" style="width: 40px;  border: 1px solid #ccc; border-radius: 50%;">
            </div>
                <a style="text-decoration:none;
                          font-size:1rem; color:rgb(22,228,228);" 
                          class="ms-auto ms-md-0 me-3 me-lg-4 " 
                           href="#">
                           {{ auth()->user()->name }}
                 </a>
            <li class="nav-item dropdown">
                <a  style=" color:rgb(228,228,228)" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                   
                    <li><a class="dropdown-item" href="{{route('manager.logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <a class="navbar-brand ps-3 mb-12 gym-nav navbar-dark bg-dark" >
                       <span style="
                       postion:fixed;
                       left:0;
                       right:0;
                       padding-bottom:0.4rem;
                       display:block; 
                       margin-left:10px;
                       margin-top:13px; 
                       font-size:1.5rem;
                       border-bottom-width:1px; 
                       border-bottom-style:solid; 
                       border-bottom-color:rgba(228, 228, 228,0.4);
                       ">My-Digital ID</span>
                       <div style=" 
                             margin-top:0.2rem;
                             margin-bottom:0.4rem;
                             ">
                           <img style="width: 40px; 
                              border-radius: 50%; display: 
                              inline-block; text-align: center;
                               border-bottom: 1px solid #ccc; 
                               margin-top:10px;" src="{{ asset('gym.jpg') }}"    alt=""> 
                           <span style="width:1px;  display:inline-block; ">
                           Signature Residence
                        </span>
                       </div>
                       <div style=" 
                             border-bottom-width:1px; 
                             border-bottom-style:solid; 
                             border-bottom-color:rgba(228, 228, 228,0.4);">
                             </div>
                               </a>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">
                        </div>
                        <div class="sb-sidenav-menu-heading">
                        </div>
                        <a class="nav-link mt" href="{{route('user.dashboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                            Revenue
                        </a> -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseGymManager" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Gym Manager
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseGymManager" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('manager.show')}}">View Managers</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCoaches" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Coaches
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseCoaches" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('coache.index')}}">View Coaches</a>
                                
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Member
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('member.index')}}">View Member</a>
                                <a class="nav-link" href="{{route('membershipType.index')}}">View MembershipType</a>
                                
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTrainingPackages" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                            Training Package
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseTrainingPackages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('trainingpackage.index')}}">View Package</a>
                               
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTrainingSessions" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Training Session
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseTrainingSessions" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('packagesession.index')}}">View Session</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                            Coache Attendance
                        </a>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                            Member Attendance
                        </a>
                    </div>
                </div>
                
            </nav>
        </div>
        
      