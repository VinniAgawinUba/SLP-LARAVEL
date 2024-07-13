<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Modules</div>
                <a class="nav-link" href="{{route('admin')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!--- Projects -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProjects" aria-expanded="false" aria-controls="collapseProjects">
                    <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                    Projects
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                
                <div class="collapse" id="collapseProjects" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.projectsAdd')}}">Add Projects</a>
                        <a class="nav-link" href="{{route('admin.projectsView')}}">View Projects</a>
                    </nav>
                </div>

                @if(auth()->check() && in_array(auth()->user()->auth_role, ['super']))
                    <a class="nav-link" href="{{route('admin.registerView')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Registered Users
                    </a>
                @endif

                <!--- Faculty -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaculty" aria-expanded="false" aria-controls="collapseFaculty">
                    <div class="sb-nav-link-icon"><span class="fas fa-users"> Faculty </span></div>
                    Faculty
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseFaculty" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.facultyAdd')}}">Add Faculty</a>
                        <a class="nav-link" href="{{route('admin.facultyView')}}">View Faculty</a>
                    </nav>
                </div>

                <!--- Partners -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePartners" aria-expanded="false" aria-controls="collapsePartners">
                    <div class="sb-nav-link-icon"><span class="fas fa-users"> Partners </span></div>
                    Partners
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapsePartners" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.partnersAdd')}}">Add Partners</a>
                        <a class="nav-link" href="{{route('admin.partnersView')}}">View Partners</a>
                    </nav>
                </div>

                <!--- Articles -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArticles" aria-expanded="false" aria-controls="collapseArticles">
                    <div class="sb-nav-link-icon material-symbols-outlined"><span class="fas fa-newspaper">Article</span></div>
                    Articles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseArticles" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.articlesAdd')}}">Add Article</a>
                        <a class="nav-link" href="{{route('admin.articlesView')}}">View Article</a>
                    </nav>
                </div>

                <!--- Gallery -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseGallery" aria-expanded="false" aria-controls="collapseGallery">
                    <div class="sb-nav-link-icon material-symbols-outlined"><span class="fas fa-image">Gallery</span></div>
                    Gallery
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseGallery" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.galleryAdd')}}">Add Gallery</a>
                        <a class="nav-link" href="{{route('admin.galleryView')}}">View Gallery</a>
                    </nav>
                </div>

                <!-- Interfaces -->
                @if(auth()->check() && in_array(auth()->user()->auth_role, ['super']))
                <div class="sb-sidenav-menu-heading">Interface - Colleges, Departments, SY</div>
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
                                <a class="nav-link" href="{{route('admin.collegesAdd')}}">Add Colleges</a>
                                <a class="nav-link" href="{{route('admin.collegesView')}}">View Colleges</a>
                            </nav>
                        </div>

                        {{-- 🏬 Departments--}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseDepartments" aria-expanded="false" aria-controls="pagesCollapseDepartments">
                            <span class="material-symbols-outlined" style="margin-right: 10px;"> apartment </span>Departments
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseDepartments" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.departmentsAdd')}}">Add Departments</a>
                                <a class="nav-link" href="{{route('admin.departmentsView')}}">View Departments</a>
                            </nav>
                        </div>

                        <!--  📅 routing to school year view -->
                        <a class="nav-link" href="{{route('admin.schoolYearsView')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                            School Years
                        </a>
                    </nav>
                    
                </div>
                @endif

                 <!--  📅 routing to Frontpage Announcements view -->
                 <a class="nav-link" href="{{route('runningText.view')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                    Announcements
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{auth()->user()->email}}</div>
                




            <a class="small" href="{{route('index')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i>Return to Front Page</div>

            </a>



        </div>

    </nav>
</div>
