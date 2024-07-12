@include('layout.header')
@include('layout.navbar')

<div class="container">
    <div class="row">
        @forelse ($gallery->photos as $photo)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($photo->file_name) }}" class="card-img-top" alt="Photo">
                    <div class="card-body">
                        <p class="card-text">Uploaded on {{ date('F j, Y', strtotime($photo->created_at)) }}</p>
                        <!-- You can add more details here as needed -->
                    </div>
                </div>
            </div>
        @empty
            <p>No photos found in this gallery!</p>
        @endforelse
    </div>
</div>

@include('layout.footer')
