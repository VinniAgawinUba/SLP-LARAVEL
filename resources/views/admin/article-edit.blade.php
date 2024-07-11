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
                        <h4>Edit Article
                            <a href="{{ route('admin.articlesView') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.articlesUpdate', $article->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="thumb_nail_title" value="{{ $article->thumb_nail_title }}" required class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="project_id">Associated Project</label>
                                    <select name="project_id" required class="form-control select2">
                                        <option value="">--Select Project--</option>
                                        @foreach($projects_list as $project)
                                            <option value="{{ $project->id }}" {{ $article->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control" required rows="24">{{ $article->content }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="thumb_nail_summary">Thumbnail Summary</label>
                                    <textarea name="thumb_nail_summary" required max="191" class="form-control" placeholder="Brief Summary of Article to entice viewers, Maximum of 500 characters" maxlength="500">{{ $article->thumb_nail_summary }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="thumb_nail_pic">Thumbnail Pic</label>
                                    <input type="file" name="thumb_nail_pic" class="form-control">
                                    @if($article->thumb_nail_pic)
                                        <img src="{{ asset($article->thumb_nail_pic) }}" alt="Thumbnail Pic" class="img-thumbnail mt-2" width="100">
                                    @endif
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="articlesUpdate" class="btn btn-primary">Update Article</button>
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
