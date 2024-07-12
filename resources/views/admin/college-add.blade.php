@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid px-4">
    <h4 class="mt-4">College</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">College</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add College
                        <a href="{{ route('admin.collegesView') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.collegesInsert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Dean</label>
                                <select name="dean_id" required class="form-control select2">
                                    <option value="">--Select Faculty--</option>
                                    @foreach($faculty as $row)
                                        <option value="{{ $row->id }}">{{ $row->fname .' '. $row->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="">Logo Image</label>
                                <input type="file" name="logo_image" required class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="collegeInsert" class="btn btn-primary">Add College</button>
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
