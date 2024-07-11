<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


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
                    <h4>Registered User
                    <a href="{{ route ('admin.registerAdd') }}" class="btn btn-primary float-end">Add Admin</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="myUsers" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registered Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user_list as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @switch($row->auth_role)
                                            @case("user")
                                                User
                                                @break
                                            @case("super")
                                                Super Admin
                                                @break
                                            @case("approval")
                                                Recommending User Approval
                                                @break
                                            @case("skilled")
                                                Skilled Department Head
                                                @break
                                            @case("custodial")
                                                Custodial Department Head
                                                @break
                                            @case("cworker")
                                                Custodial Worker
                                                @break
                                            @case("sworker")
                                                Skilled Worker
                                                @break
                                            @default
                                                Unknown Role
                                        @endswitch
                                    </td>
                                    <td>{{ $row->created_at }}</td>
                                    <td><a href="{{ route('admin.registerEdit', $row->id) }}" class="btn btn-success"><span class="material-symbols-outlined"> edit </span></a></td>
                                    <td>
                                        <form action="{{ route('admin.registerDelete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            <button type="submit" name="user_delete" value="{{ $row->id }}" class="btn btn-danger deleteButton"><span class="material-symbols-outlined"> delete </span></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Records Found</td>
                                </tr>
                            @endforelse
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
