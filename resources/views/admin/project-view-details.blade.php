@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .project-image {
        width: 500px;
        margin-top: 50px;
        display: block;
        /* Ensures the image aligns correctly within its container */
    }

    .text-description {
        text-align: left;
        /* Changed from justify to left */
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 18px;
        line-height: 22px;
        color: #283971;
    }

    .card-title {
        margin-top: 50px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 900;
        font-size: 25px;
        line-height: 102.02%;
        letter-spacing: 0.2em;
        color: #283971;
        text-align: left;
        /* Ensure titles are left-aligned */
    }

    .card {
        border-radius: 10px;
        text-align: left;
        /* Align text inside the card to the left */
    }

    .card-status {
        width: 269px;
        height: 44px;
        border-radius: 0px 30px 30px 0px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 15px;
        line-height: 102.02%;
        color: #FFFFFF;
        padding: 14px 50px;
        text-align: left;
        /* Align status text to the left */
    }

    .card-text {
        font-family: 'Inter', sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        margin-top: 5px;
        color: #283971;
        text-align: left;
        /* Align card text to the left */
    }

    .card-text strong {
        color: #283971;
    }

    .cards {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: left;
        /* Align content inside cards to the left */
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px 8px 0 0;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        /* Align header text to the left */
    }

    .container {
        margin-top: 20px;
        text-align: left;
        /* Ensure overall container aligns everything to the left */
    }

    .row {
        margin-bottom: 15px;
    }

    .sdg-icon {
        width: 50px;
    }

    .detail-title {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 29px;
        text-align: left;
        /* Align detailed titles to the left */
        letter-spacing: 0.2em;
        color: #283971;
    }

    .logo-name {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 23px;
        line-height: 28px;
        letter-spacing: 0.2em;
        color: #6E6E6E;
        width: 500px;
    }

    .dean-name {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        line-height: 29px;
        color: #283971;
    }
</style>
<div class="container mt-4" id="container">
    <div class="row">
        @if ($project)
            <div class="col-md-12 mb-4">
                <div class="cards shadow-sm" style="padding: 20px 60px;">
                    <div class="card-body">
                        <a href="{{ route('admin.projectsView') }}" class="btn btn-danger float-end">BACK</a>
                        <div class="row">
                            <!-- Column 1 of Card -->
                            <div class="col-md-6">
                                @if ($photo)
                                   <img class="project-image" src="{{ asset($photo->file_name) }}" alt="project photo">
                                @else
                                    <p>No project photo available.</p>
                                @endif
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>Type:</strong> {{ $project->sl_type }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>Subject Hosted:</strong>
                                                {{ $project->subject_hosted }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>College Name:</strong>
                                                {{ $college->name ?? 'Not Found' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>Department Name:</strong>
                                                {{ $department->name ?? 'Not Found' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>Partner Name:</strong>
                                                {{ $partner->name ?? 'Not Found' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>School Year:</strong>
                                                {{ $schoolYear->school_year ?? 'Not Found' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>Semester:</strong>
                                                @switch($project->semester)
                                                    @case(1)
                                                        First Semester
                                                    @break

                                                    @case(2)
                                                        Second Semester
                                                    @break

                                                    @case(3)
                                                        Interssession
                                                    @break

                                                    @default
                                                        Unknown Semester
                                                @endswitch
                                            </p>
                                        </div>

                                        {{-- Number Of Students --}}
                                        <div class="col-md-6">
                                            <p class="card-text"><strong>Number of Students:</strong>
                                                {{ $project->number_of_students }}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Column 2 of Card -->
                            <div class="col-md-6">
                                <h5 class="card-title">{{ $project->name }}</h5>
                                <p class="card-status"
                                    style="background: 
                                        @switch($project->status)
                                            @case("In Progress") #F4A836 @break
                                            @case("Finished") #28a745 @break
                                            @case("TBD") #6c757d @break
                                            @case("Cancelled") #dc3545 @break
                                            @default #6c757d
                                        @endswitch;">
                                    Status:
                                   {{ $project->status}}
                                </p>
                                <p class="text-description">{{ $project->description }}</p>
                            </div>
                        </div>
                        <hr>
                        <!-- Row 2: College Details -->
                        <div class="row mt-4">
                            @if ($college)
                                <div class="col-md-6">
                                    <h5 class="detail-title">COLLEGE DETAILS</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><img src="{{ asset('assets/uploads/college_logos/' . $college->logo_image) }}"
                                                    alt="College Logo" style="max-width: 200px;"></p>
                                            <p class="logo-name">{{ $college->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="dean-name"><strong>Dean:</strong>
                                        {{ $dean->fname . ' ' . $dean->lname ?? 'Dean not found!' }}
                                    </p>
                                    <div class="col-md-12">
                                        <h5>Involved Faculty</h5>
                                    </div>
                                    @foreach ($involvedFaculties as $faculty)
                                        <div class="col-md-12 mb-4">
                                            <p><strong>Name:</strong> {{ $faculty->fname . ' ' . $faculty->lname }}</p>
                                            <p><strong>Profile Pic:</strong> <img
                                                    src="{{ asset('assets/uploads/faculty/' . $faculty->image) }}"
                                                    alt="Faculty Image" class="img-fluid rounded-circle"
                                                    style="max-width: 100px;"></p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>College details not found!</p>
                            @endif
                        </div>
                        <hr>
                        <!-- Row 3: Involved Faculty -->
                        <!-- Row 4: SDGs Covered -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5>SDGs Covered</h5>
                                <div class="row">
                                    @foreach ($sdgs as $sdg)
                                        <div class="col-md-3 mb-2">
                                            <div class="form-check">
                                                <img src="{{ asset('assets/uploads/SDGs/icons/' . $sdg . '.png') }}" alt="{{ $sdg }}" class="sdg-icon img-fluid mb-2" style="height:200px; width:200px">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Row 5: Project Documents -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5>Project Documents</h5>
                                @if ($project->projectDocuments->isNotEmpty())
                                    <ul class="list-group">
                                        @foreach ($project->projectDocuments as $document)
                                            <li class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <span>{{ $document->file_name }}</span>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <a href="{{ route('download.document', $document->id) }}" class="btn btn-sm btn-primary mr-2">Download</a>
                                                        @if (in_array($document->extension, ['pdf', 'jpg', 'jpeg', 'png', 'gif']))
                                                            <a href="{{ asset('path_to_your_documents/' . $document->file_name) }}" target="_blank" class="btn btn-sm btn-info">Preview</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No project documents found.</p>
                                @endif
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- You can add more details here as needed -->
            </div>
        @else
            <div class='alert alert-warning' role='alert'>No Projects found!</div>
        @endif
    </div>
</div>

@include('layout.scripts')
@endif