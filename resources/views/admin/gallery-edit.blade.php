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
                    <h4>Edit Gallery
                        <a href="{{ route('admin.galleryView') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.galleryUpdate', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Gallery Name</label>
                                <input type="text" name="name" value="{{ $gallery->name }}" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="project_id">Associated Project</label>
                                <select name="project_id" required class="form-control select2">
                                    <option value="">--Select Project--</option>
                                    @foreach($projects_list as $project)
                                        <option value="{{ $project->id }}" {{ $gallery->project_id == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="photos">Pictures</label>
                                <input type="file" name="photos[]" multiple class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="galleryUpdate" class="btn btn-primary">Update Gallery</button>
                            </div>
                        </div>
                    </form>
                    <h5>Existing Photos</h5>
                    <div class="row">
                        @foreach($gallery->photos as $photo)
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset($photo->file_path) }}" alt="Photo" class="img-thumbnail">
                                <form action="{{ route('admin.photoDelete', $photo->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
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
