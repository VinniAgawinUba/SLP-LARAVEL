<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('admin')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                @if(auth()->check() && in_array(auth()->user()->auth_role, ['super']))
                    <a class="nav-link" href="{{ route('admin.registerView') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Registered Users
                    </a>

                <!--- Recommending Approval -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRecommendingApproval" aria-expanded="false" aria-controls="collapseRecommendingApproval">
                    <div class="sb-nav-link-icon"><span class="material-symbols-outlined"> approval_delegation </span></div>
                    Recommending Approval
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseRecommendingApproval" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.recommendingAdd.view')}}">Add Recommending Approval</a>
                        <a class="nav-link" href="{{route('admin.recommendingView.view')}}">View Recommending Approval</a>
                    </nav>
                </div>
                @endif

                <!--- Requests -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRequests" aria-expanded="false" aria-controls="collapseRequests">
                    <div class="sb-nav-link-icon"><i class="fas fa-sheet-plastic"></i></div>
                    Requests
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseRequests" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if(auth()->check() && in_array(auth()->user()->auth_role, ['super']))
                        <a class="nav-link" href="{{route('admin.workorder.add')}}">Add Requests</a>
                        @endif
                        <a class="nav-link" href="{{route('admin.workorder.view')}}">View Requests</a>
                    </nav>
                </div>

                <!--- Faculty -->
                @if(auth()->check() && in_array(auth()->user()->auth_role, ['super']))
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaculty" aria-expanded="false" aria-controls="collapseFaculty">
                    <div class="sb-nav-link-icon"><span class="material-symbols-outlined"> groups </span></div>
                    Faculty
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseFaculty" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.facultyAdd')}}">Add Faculty</a>
                        <a class="nav-link" href="{{route('admin.facultyView')}}">View Faculty</a>
                    </nav>
                </div>

                <!--- Location -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLocation" aria-expanded="false" aria-controls="collapseLocation">
                    <div class="sb-nav-link-icon material-symbols-outlined"><span class="material-symbols-outlined" style="margin-left: -5px;">location_on</span></div>
                    Location
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLocation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.locationView')}}">View Location</a>
                        <a class="nav-link" href="{{route('admin.locationAdd')}}">Add Location</a>
                    </nav>
                </div>
                @endif

                <!-- Interfaces -->
                @if(auth()->check() && in_array(auth()->user()->auth_role, ['super']))
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseColleges" aria-expanded="false" aria-controls="collapseColleges">
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    School
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseColleges" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                        {{--🎓  Colleges--}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseColleges" aria-expanded="false" aria-controls="pagesCollapseColleges">
                            <span class="material-symbols-outlined" style="margin-right: 10px;">school</span>Colleges
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseColleges" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.collegeAdd')}}">Add Colleges</a>
                                <a class="nav-link" href="{{route('admin.collegeView')}}">View Colleges</a>
                            </nav>
                        </div>

                        {{-- 🏬 Departments--}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseDepartments" aria-expanded="false" aria-controls="pagesCollapseDepartments">
                            <span class="material-symbols-outlined" style="margin-right: 10px;"> apartment </span>Departments
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseDepartments" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.departmentAdd')}}">Add Departments</a>
                                <a class="nav-link" href="{{route('admin.departmentView')}}">View Departments</a>
                            </nav>
                        </div>

                        <!--  📅 routing to school year view -->
                        <a class="nav-link" href="{{route('admin.school_yearView')}}">
                            <div class="sb-nav-link-icon" style="margin-right: 10px;"><i class="fas fa-calendar"></i></div>
                            School Years
                        </a>
                    </nav>
                </div>
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{auth()->user()->email}}</div>
                




            <a class="small" href="{{route('home')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i>Return to Front Page</div>

            </a>



        </div>

    </nav>
</div>
