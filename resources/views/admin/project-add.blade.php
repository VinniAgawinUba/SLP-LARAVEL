
@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid px-4">
    <h4 class="mt-4">Projects</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Projects</li>
    </ol>
    <div class="row">

        <div class="col-md-12">

            @include('shared.success-message')
            @include('shared.error-message')

            <div class="card">
                <div class="card-header">
                    <h4>Add Project
                        <a href="{{ route('admin.projectsView') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.projectsInsert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" required class="form-control" placeholder="Project Name">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="type">SL Type</label>
                                <input type="text" name="sl_type" required class="form-control" placeholder="SL Type">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="type">Number of Students</label>
                                <input type="text" name="number_of_students" class="form-control" placeholder="#">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" required rows="4" placeholder="Project Description"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subject_hosted">Subject Hosted</label>
                                <input type="text" name="subject_hosted" required class="form-control" placeholder="Subject Hosted Ex. ITCC 42">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="college_id">College</label>
                                <select name="college_id" required class="form-control select2">
                                    <option value="">--Select College--</option>
                                    @foreach($colleges as $college)
                                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="department_id">Department</label>
                                <select name="department_id" required class="form-control select2">
                                    <option value="">--Select Department--</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sd_coordinator_id">SD Coordinator</label>
                                <select name="sd_coordinator_id" class="form-control select2">
                                    <option value="">--Select Coordinator--</option>
                                    @foreach($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->fname . ' ' . $faculty->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="partner_id">Partner</label>
                                <select name="partner_id" required class="form-control select2">
                                    <option value="">--Select Partner--</option>
                                    @foreach($partners as $partner)
                                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="school_year_id">School Year</label>
                                <select name="school_year_id" required class="form-control select2">
                                    <option value="">--Select School Year--</option>
                                    @foreach($schoolYears as $schoolYear)
                                        <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="semester">Semester</label>
                                <select name="semester" required class="form-control">
                                    <option value="">--Select Semester--</option>
                                    <option value="1">First Semester</option>
                                    <option value="2">Second Semester</option>
                                    <option value="3">Intersession Summer</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <select name="status" required class="form-control">
                                    <option value="">--Select Status--</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Finished">Finished</option>
                                    <option value="TBD">TBD</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3" id="faculty-select-container">
                                <label for="faculty[]">Faculty Members</label>
                                <div class="faculty-select-wrapper">
                                    <select name="faculty[]" class="form-control select2">
                                        <option value="">--Select Faculty--</option>
                                        @foreach($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->fname . ' ' . $faculty->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-success mt-2" onclick="addFacultySelect()">Add Faculty</button>
                            </div>
                            <div class="col-md-12 mb-3 card">
                                <label for="sdgs[]">SDGs Covered</label><br>
                                <div class="row">
                                    @foreach ($sdgs as $index => $sdg)
                                        <div class="col-md-3 mb-2">
                                            <div class="form-check">
                                                @if(file_exists(public_path('assets/uploads/SDGs/icons/sdg_' . ($index + 1) . '.png')))
                                                    <img src="{{ asset('assets/uploads/SDGs/icons/sdg_' . ($index + 1) . '.png') }}" alt="{{ $sdg }}" class="sdg-icon img-fluid" style="height:100px; width:100px">
                                                @endif
                                                <input class="form-check-input" type="checkbox" name="sdgs[]" id="sdg_{{ strtolower(str_replace(' ', '_', $sdg)) }}" value="{{ 'sdg_' . ($index + 1) }}">
                                                <label class="form-check-label" for="sdg_{{ strtolower(str_replace(' ', '_', $sdg)) }}">{{ $sdg }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="project_documents[]">Upload Project Files</label>
                                <input type="file" name="project_documents[]" multiple class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Add Project</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addFacultySelect() {
        var container = document.getElementById("faculty-select-container");
        var wrapper = document.createElement("div");
        wrapper.classList.add("faculty-select-wrapper");

        var select = document.createElement("select");
        select.name = "faculty[]";
        select.required = true;
        select.classList.add("form-control", "select2");

        var option = document.createElement("option");
        option.value = "";
        option.text = "--Select Faculty--";
        select.appendChild(option);

        @foreach($faculties as $faculty)
            var option = document.createElement("option");
            option.value = "{{ $faculty->id }}";
            option.text = "{{ $faculty->fname . ' ' . $faculty->lname }}";
            select.appendChild(option);
        @endforeach

        wrapper.appendChild(select);

        var removeBtn = document.createElement("button");
        removeBtn.type = "button";
        removeBtn.classList.add("btn", "btn-danger", "mt-2");
        removeBtn.textContent = "Remove";
        removeBtn.onclick = function() {
            container.removeChild(wrapper);
        };

        wrapper.appendChild(removeBtn);

        container.appendChild(wrapper);

        // Initialize Select2 for the new dropdown
        $(select).select2();
    }
</script>


@include('layout.admin-footer')
@include('layout.scripts')
@else
<script>window.location.href = '/';</script>
@endif