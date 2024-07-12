@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid px-4">
    <h4 class="mt-4">School Years</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">School Years</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>School Years List
                        <a href="{{ route('admin.schoolYearsAdd') }}" class="btn btn-primary float-end">Add School Year</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="myFaculty" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>School Year</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schoolYears as $schoolYear)
                                <tr>
                                    <td>{{ $schoolYear->id }}</td>
                                    <td>{{ $schoolYear->school_year }}</td>
                                    <td><a href="{{ route('admin.schoolYearsEdit', $schoolYear->id) }}" class="btn btn-primary"><span class="material-symbols-outlined"> edit </span></a></td>
                                    <td>
                                        <form action="{{ route('admin.schoolYearsDelete', $schoolYear->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><span class="material-symbols-outlined"> delete </span></button>
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
