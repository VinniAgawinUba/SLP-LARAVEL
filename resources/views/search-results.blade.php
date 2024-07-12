@include('layout.header')
@include('layout.navbar')

<div class="container mt-4">
    <h2>Search Results for "{{ $query }}"</h2>

    @if ($projects->isEmpty() && $articles->isEmpty() && $galleries->isEmpty())
        <p>No results found.</p>
    @else
        @if (!$projects->isEmpty())
            <h3>Projects</h3>
            <ul class="list-group mb-4">
                @foreach ($projects as $project)
                    <li class="list-group-item">
                        <a href="{{ route('projects.show_project_view', $project->id) }}">
                            <h5 class="mb-1">{{ $project->name }}</h5>
                            <small>{{ Str::limit($project->description, 150) }}</small>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-center">
                {{ $projects->appends(['query' => $query])->links('pagination::bootstrap-5') }}
            </div>
        @endif

        @if (!$articles->isEmpty())
            <h3>Articles</h3>
            <ul class="list-group mb-4">
                @foreach ($articles as $article)
                    <li class="list-group-item">
                        <a href="{{ route('articles.Details', $article->id) }}">
                            <h5 class="mb-1">{{ $article->thumb_nail_title }}</h5>
                            <small>{{ Str::limit($article->content, 150) }}</small>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-center">
                {{ $articles->appends(['query' => $query])->links('pagination::bootstrap-5') }}
            </div>
        @endif

        @if (!$galleries->isEmpty())
            <h3>Galleries</h3>
            <ul class="list-group mb-4">
                @foreach ($galleries as $gallery)
                    <li class="list-group-item">
                        <a href="{{ route('gallery.details', $gallery->id) }}">
                            <h5 class="mb-1">{{ $gallery->name }}</h5>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-center">
                {{ $galleries->appends(['query' => $query])->links('pagination::bootstrap-5') }}
            </div>
        @endif
    @endif
</div>

@include('layout.footer')
