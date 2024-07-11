@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'skilled', 'custodial', 'cworker', 'sworker']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid px-4">
        <h4 class="mt-4">Users</h4>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Users</li>
            </ol>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add User/Admin
                            <a href="{{ route('admin.registerView') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <form action="{{ route('admin.registerInsert') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" name="email" required class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" required class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Role</label>
                                    <select name="auth_role" required class="form-control">
                                        <option value="">--Select Role--</option>
                                        <option value="user">User</option>
                                        <option value="super">Super Admin</option>
                                        <option value="approval">Recommending User Approval</option>
                                        <option value="skilled">Skilled Department Head</option>
                                        <option value="custodial">Custodial Department Head</option>
                                        <option value="cworker">Custodial Worker</option>
                                        <option value="sworker">Skilled Worker</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name = "add_user" class="btn btn-primary">Add Admin/User</button>

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
<script>window.location.href = '/home';</script>
@endif
