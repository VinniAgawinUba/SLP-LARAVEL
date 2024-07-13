<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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

            <div class="card">
                <div class="card-header">
                    <h4>View Projects
                        <a href="{{ route('admin.projectsAdd') }}" class="btn btn-primary float-end"><span class="material-symbols-outlined"> add </span></a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myFaculty" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Learning Project</th>
                                <th>Description</th>
                                <th>SL Type</th>
                                <th>Hosted</th>
                                <th>Faculty</th>
                                <th>College</th>
                                <th>Department</th>
                                <th>Partner</th>
                                <th>School Year</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td><a href="{{route('admin.projectsViewDetails', $row->id)}}">{{ $row->name }}</a></td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->sl_type }}</td>
                                <td>{{ $row->subject_hosted }}</td>
                                <td>
                                    @if($row->faculties)
                                    @foreach($row->faculties as $faculty)
                                    {{ $faculty->fname }} {{ $faculty->lname }}<br>
                                    @endforeach
                                    @else
                                    No Faculty Found
                                    @endif
                                </td>

                                <td>
                                    @if($row->college)
                                    {{ $row->college->name }}
                                    @else
                                    No College Found
                                    @endif
                                </td>
                                <td>
                                    @if($row->department)
                                    {{ $row->department->name }}
                                    @else
                                    No Department Found
                                    @endif
                                </td>
                                <td>
                                    @if($row->partner)
                                    {{ $row->partner->name }}
                                    @else
                                    No Partner Found
                                    @endif
                                </td>
                                <td>{{ $row->schoolYear->school_year }}</td>
                                <td>{{$row->semester}}</td>
                                <td>{{$row->status}}</td>
                                <td>
                                    <input type="checkbox" class="featured-checkbox" data-id="{{ $row->id }}" {{ $row->featured == 1 ? 'checked' : '' }}>
                                </td>
                                

                                <td>
                                    <a href="{{ route('admin.projectsEdit', $row->id) }}" class="btn btn-primary"><span class="material-symbols-outlined"> edit </span></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.projectsDelete', $row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <button type="submit" name="FacultyDelete" value="{{ $row->id }}" class="btn btn-danger deleteButton"><span class="material-symbols-outlined"> delete </span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>



@include('layout.admin-footer')
@include('layout.scripts')

<script>
    $(document).ready(function() {
        $('.featured-checkbox').on('change', function() {
            var projectId = $(this).data('id');
            var featuredStatus = $(this).is(':checked') ? 1 : 0;
    
            $.ajax({
                url: '{{ route("admin.projectsUpdateFeatured") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: projectId,
                    featured: featuredStatus
                },
                success: function(response) {
                    alert('Featured status updated successfully! Will now be displayed on the homepage.');
                },
                error: function(response) {
                    alert('An error occurred while updating the featured status.');
                }
            });
        });
    });
    </script>
@else
<script>window.location.href = '/';</script>
@endif
