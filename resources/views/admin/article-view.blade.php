<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
@include('layout.admin-header')
@include('shared.success-message')
@include('shared.error-message')


<div class="container-fluid px-4">
    <h4 class="mt-4">Articles</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Articles</li>
    </ol>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>View Articles
                        <a href="{{ route('admin.articlesAdd') }}" class="btn btn-primary float-end"><span class="material-symbols-outlined"> add </span></a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myFaculty" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project ID</th>
                                <th>Thumbnail Pic</th>
                                <th>Thumbnail Summary</th>
                                <th>Published Date</th>
                                <th>Featured</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles_list as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->project_id }}</td>
                                <td><img src="{{$row->thumb_nail_pic}}" width="60px" height="60px"></td>
                                <td>{{ $row->thumb_nail_summary }}</td>
                                <td>{{ $row->published_date }}</td>
                                <td>
                                    <input type="checkbox" class="featured-checkbox" data-id="{{ $row->id }}" {{ $row->featured == 1 ? 'checked' : '' }}>
                                </td>

                                <td>
                                    <a href="{{ route('admin.articlesEdit', $row->id) }}" class="btn btn-primary"><span class="material-symbols-outlined"> edit </span></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.articlesDelete', $row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <button type="submit" name="articlesDelete" value="{{ $row->id }}" class="btn btn-danger deleteButton"><span class="material-symbols-outlined"> delete </span></button>
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
<script>
    $(document).ready(function() {
        $('.featured-checkbox').on('change', function() {
            var projectId = $(this).data('id');
            var featuredStatus = $(this).is(':checked') ? 1 : 0;
    
            $.ajax({
                url: '{{ route("admin.articlesUpdateFeatured") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: projectId,
                    featured: featuredStatus
                },
                success: function(response) {
                    alert('Featured status updated successfully! Will now be displayed on the homepage.');
                },
                error: function(response) {
                    alert('An error occurred while updating the featured status.');
                }
            });
        });
    });
    </script>
@else
<script>window.location.href = '/';</script>
@endif
