<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')


<div class="container-fluid px-4">
    <h4 class="mt-4">Gallery</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Gallery</li>
    </ol>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>View Gallery
                        <a href="{{ route('admin.galleryAdd') }}" class="btn btn-primary float-end"><span class="material-symbols-outlined"> add </span></a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myFaculty" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project ID</th>
                                <th>Gallery Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries_list as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->project_id }}</td>
                                <td>{{ $row->name }}</td>
                                

                                <td>
                                    <a href="{{ route('admin.galleryEdit', $row->id) }}" class="btn btn-primary"><span class="material-symbols-outlined"> edit </span></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.galleryDelete', $row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <button type="submit" name="galleryDelete" value="{{ $row->id }}" class="btn btn-danger deleteButton"><span class="material-symbols-outlined"> delete </span></button>
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
