@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'skilled', 'custodial', 'cworker', 'sworker']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')


@if(isset($faculty_data))
<div class="container-fluid px-4">
    <h4 class="mt-4">Edit Faculty</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Faculty</li>
    </ol>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Faculty
                        <a href="{{ route('admin.facultyView') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.facultyUpdate', $faculty_data['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="fname" value="{{ $faculty_data['fname'] }}" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" value="{{ $faculty_data['lname'] }}" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ $faculty_data['email'] }}" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">College</label>
                                <select name="college_id" required class="form-control select2">
                                    <option value="">--Select College--</option>
                                    @foreach($colleges as $college)
                                    <option value="{{ $college->id }}" {{ $college->id == $faculty_data['college_id'] ? 'selected' : '' }}>
                                        {{ $college->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Department</label>
                                <select name="department_id" required class="form-control select2">
                                    <option value="">--Select Department--</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $department->id == $faculty_data['department_id'] ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Role</label>
                                <select name="role" required class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="0" {{ $faculty_data['role'] == '0' ? 'selected' : '' }}>Faculty</option>
                                    <option value="1" {{ $faculty_data['role'] == '1' ? 'selected' : '' }}>Coordinator</option>
                                    <option value="2" {{ $faculty_data['role'] == '2' ? 'selected' : '' }}>Department Head</option>
                                    <option value="3" {{ $faculty_data['role'] == '3' ? 'selected' : '' }}>Dean</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                                <div class="navbar navbar-light" style="background-color: #e3f2fd;">
                                    <label for="">Current Image:</label>
                                    <img src="{{ asset($faculty_data->image)}}" width="30%" height="30%">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="update_faculty" class="btn btn-primary">Update Faculty</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h4>No Record Found</h4>
@endif

@include('layout.admin-footer')
@include('layout.scripts')
@else
<script>window.location.href = '/home';</script>
@endif
