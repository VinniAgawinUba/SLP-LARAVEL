@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid px-4">
    <h4 class="mt-4">Edit User</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User
                        <a href="{{ route('admin.registerView') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.registerUpdate', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $user['name'] }}" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $user['email'] }}" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Role</label>
                                <select name="auth_role" required class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="user" {{ $user['auth_role'] == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="super" {{ $user['auth_role'] == 'super' ? 'selected' : '' }}>Super Admin</option>
                                    <option value="approval" {{ $user['auth_role'] == 'approval' ? 'selected' : '' }}>Recommending User Approval</option>
                                    <option value="skilled" {{ $user['auth_role'] == 'skilled' ? 'selected' : '' }}>Skilled Department Head</option>
                                    <option value="custodial" {{ $user['auth_role'] == 'custodial' ? 'selected' : '' }}>Custodial Department Head</option>
                                    <option value="cworker" {{ $user['auth_role'] == 'cworker' ? 'selected' : '' }}>Custodial Worker</option>
                                    <option value="sworker" {{ $user['auth_role'] == 'sworker' ? 'selected' : '' }}>Skilled Worker</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
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
