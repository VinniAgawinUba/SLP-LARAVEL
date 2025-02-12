@if (auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
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
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Project
                            <a href="{{ route('admin.projectsView') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.projectsUpdate', $project->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $project->name }}" required
                                        class="form-control" placeholder="Project Name">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="type">SL Type</label>
                                    <input type="text" name="sl_type" value="{{ $project->sl_type }}" required
                                        class="form-control" placeholder="SL Type">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="type">Number of Students</label>
                                    <input type="text" name="number_of_students" value="{{ $project->number_of_students }}" required class="form-control" placeholder="#">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" required rows="4" placeholder="Project Description">{{ $project->description }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subject_hosted">Subject Hosted</label>
                                    <input type="text" name="subject_hosted" value="{{ $project->subject_hosted }}"
                                        required class="form-control" placeholder="Subject Hosted Ex. ITCC 42">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="college_id">College</label>
                                    <select name="college_id" id="college_id" required class="form-control select2">
                                        <option value="">--Select College--</option>
                                        @foreach ($colleges as $college)
                                            <option value="{{ $college->id }}"
                                                {{ $project->college_id == $college->id ? 'selected' : '' }}>
                                                {{ $college->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="department_id">Department</label>
                                    <select name="department_id" id="department_id" required class="form-control select2">
                                        <option value="">--Select Department--</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $project->department_id == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="sd_coordinator_id">SD Coordinator</label>
                                    <select name="sd_coordinator_id" class="form-control select2">
                                        <option value="">--Select Coordinator--</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}"
                                                {{ $project->sd_coordinator_id == $faculty->id ? 'selected' : '' }}>
                                                {{ $faculty->fname . ' ' . $faculty->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="partner_id">Partner</label>
                                    <select name="partner_id" required class="form-control select2">
                                        <option value="">--Select Partner--</option>
                                        @foreach ($partners as $partner)
                                            <option value="{{ $partner->id }}"
                                                {{ $project->partner_id == $partner->id ? 'selected' : '' }}>
                                                {{ $partner->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="school_year_id">School Year</label>
                                    <select name="school_year_id" required class="form-control select2">
                                        <option value="">--Select School Year--</option>
                                        @foreach ($schoolYears as $schoolYear)
                                            <option value="{{ $schoolYear->id }}"
                                                {{ $project->school_year_id == $schoolYear->id ? 'selected' : '' }}>
                                                {{ $schoolYear->school_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="semester">Semester</label>
                                    <select name="semester" required class="form-control">
                                        <option value="">--Select Semester--</option>
                                        <option value="1" {{ $project->semester == 1 ? 'selected' : '' }}>First
                                            Semester</option>
                                        <option value="2" {{ $project->semester == 2 ? 'selected' : '' }}>Second
                                            Semester</option>
                                        <option value="3" {{ $project->semester == 3 ? 'selected' : '' }}>
                                            Intersession Summer</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" required class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="In Progress"
                                            {{ $project->status == 'In Progress' ? 'selected' : '' }}>In
                                            Progress</option>
                                        <option value="Finished"
                                            {{ $project->status == 'Finished' ? 'selected' : '' }}>Finished
                                        </option>
                                        <option value="TBD" {{ $project->status == 'TBD' ? 'selected' : '' }}>TBD
                                        </option>
                                        <option value="Cancelled"
                                            {{ $project->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3" id="faculty-select-container">
                                    <label for="faculty[]">Faculty Members</label>
                                    @foreach ($project->faculties as $faculty)
                                        <div class="faculty-select-wrapper">
                                            <select name="faculty[]" class="form-control select2">
                                                <option value="">--Select Faculty--</option>
                                                @foreach ($faculties as $fac)
                                                    <option value="{{ $fac->id }}"
                                                        {{ $faculty->id == $fac->id ? 'selected' : '' }}>
                                                        {{ $fac->fname . ' ' . $fac->lname }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-danger mt-2"
                                                onclick="removeFacultySelect(this)">Remove</button>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-success mt-2"
                                        onclick="addFacultySelect()">Add Faculty</button>
                                </div>

                                <div class="col-md-12 mb-3 card">
                                    <label for="sdgs[]">SDGs Covered</label><br>
                                    <div class="row">
                                        @foreach ($sdgs as $index => $sdg)
                                            <div class="col-md-3 mb-2">
                                                <div class="form-check">
                                                    @if (file_exists(public_path('assets/uploads/SDGs/icons/sdg_' . ($index + 1) . '.png')))
                                                        <img src="{{ asset('assets/uploads/SDGs/icons/sdg_' . ($index + 1) . '.png') }}"
                                                            alt="{{ $sdg }}" class="sdg-icon img-fluid"
                                                            style="height:100px; width:100px">
                                                    @endif
                                                    <input class="form-check-input" type="checkbox" name="sdgs[]"
                                                        id="sdg_{{ strtolower(str_replace(' ', '_', $sdg)) }}"
                                                        value="{{ 'sdg_' . ($index + 1) }}"
                                                        {{ $project->projectSdgs->contains('sdg', 'sdg_' . ($index + 1)) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="sdg_{{ strtolower(str_replace(' ', '_', $sdg)) }}">{{ $sdg }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="project_documents[]">Uploaded Project Files</label><br>
                                    <input type="file" name="project_documents[]" multiple class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary">Update Project</button>
                                </div>
                            </div>
                        </form>

                        <h5>Existing Documents</h5>
                        <div class="row">
                            @foreach ($project->projectDocuments as $document)
                                <div>
                                    <a href="{{ asset($document->file_path) }}"
                                        target="_blank">{{ $document->file_name }}</a>
                                </div>
                                <form action="{{ route('admin.projects.documentDelete', $document->id) }}"
                                    method="POST" class="mt-2">
                                    @csrf
                                    @method('delete')
                                    <button name="documentDelete" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.admin-footer')
    @include('layout.scripts')

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

            @foreach ($faculties as $faculty)
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

        function removeFacultySelect(button) {
            button.parentElement.remove();
        }
    </script>

    {{-- Javascript for making departments show only departments under college choice --}}
<script>
    $(document).ready(function() {
        $('#college_id').on('change', function() {
            var collegeId = $(this).val();
            if (collegeId) {
                $.ajax({
                    url: '/admin/departments/' + collegeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#department_id').empty();
                        $('#department_id').append('<option value="">--Select Department--</option>');
                        $.each(data, function(key, value) {
                            $('#department_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching departments: ' + error);
                    }
                });
            } else {
                $('#department_id').empty();
                $('#department_id').append('<option value="">--Select Department--</option>');
            }
        });
    });
</script>


@else
    <script>
        window.location.href = '/';
    </script>
@endif
