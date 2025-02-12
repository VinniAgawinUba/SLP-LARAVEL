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
                    <h4>Add Faculty
                        <a href="{{ route('admin.facultyView') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.facultyInsert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="fname" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">College</label>
                                <select name="college_id" required class="form-control select2">
                                    <option value="">--Select College--</option>
                                    @foreach($colleges as $college)
                                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Department</label>
                                <select name="department_id" required class="form-control select2">
                                    <option value="">--Select Department--</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Role</label>
                                <select name="role" required class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="0">Faculty</option>
                                    <option value="1">Coordinator</option>
                                    <option value="2">Department Head</option>
                                    <option value="3">Dean</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" required class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="FacultyInsert" class="btn btn-primary">Add Faculty</button>
                            </div>
                        </div>
                    </form>
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
