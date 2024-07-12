@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid px-4">
    <h4 class="mt-4">Add School Year</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">School Years</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add School Year
                        <a href="{{ route('admin.schoolYearsView') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.schoolYearsInsert') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">School Year</label>
                                <input type="text" name="school_year" required class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Add School Year</button>
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
