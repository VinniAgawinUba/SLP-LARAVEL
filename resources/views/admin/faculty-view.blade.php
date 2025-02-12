<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')


<div class="container-fluid px-4">
    <h4 class="mt-4">Faculty</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Faculty</li>
    </ol>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>View Faculty
                        <a href="{{ route('admin.facultyAdd') }}" class="btn btn-primary float-end"><span class="material-symbols-outlined"> add </span></a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myFaculty" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>College</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faculty_list as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->fname }}</td>
                                <td>{{ $row->lname }}</td>
                                <td>{{ $row->email }}</td>
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
                                    @if ($row->role == 0)
                                    Faculty
                                    @elseif ($row->role == 1)
                                    Coordinator
                                    @elseif ($row->role == 2)
                                    Department Head
                                    @elseif ($row->role == 3)
                                    Dean
                                    @else
                                    Unknown Role
                                    @endif
                                </td>
                                <td><img src="{{ asset('assets/uploads/faculty/'.$row->image) }}" width="60px" height="60px"></td>

                                <td>
                                    <a href="{{ route('admin.facultyEdit', $row->id) }}" class="btn btn-primary"><span class="material-symbols-outlined"> edit </span></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.facultyDelete', $row->id) }}" method="POST">
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
@else
<script>window.location.href = '/';</script>
@endif
