@include('layout.header')
@include('layout.navbar')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<style>
    .headers {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 58px;
        text-align: center;
        color: #283971;
        margin-top: 40px; /* Reduced margin-top for a better fit */
    }

    .horizontal-line {
        background-color: #283971;
        width: 50%;
        margin: auto;
        border-top: 4px solid #283971 !important;
        border-radius: 14px;
        margin-top: 36px;
        margin-bottom: 57px;
    }

    #card {
        background: #FFFFFF;
        border-radius: 10px;
        width: 270px; /* Adjusted size of the cards */
        height: 420px; /* Adjusted height */
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    #card-box {
        display: flex;
        justify-content: center;
        margin: 0 auto;
        text-overflow: ellipsis;
    }

    #card-box:hover {
        transition: transform 0.2s;
        transform: scale(1.05);
    }

    #title {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 19px;
        line-height: 23px;
        color: #000000;
        margin-top: 26px;
        overflow: visible; /* Allow title to take more than one line */
        white-space: normal; /* Allow wrapping */
    }

    #card-text {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 12px; /* Increased font size for better readability */
        line-height: 16px; /* Increased line height */
        margin-top: 8px;
        color: #000000;
        margin-bottom: 0px;
        text-align: justify;
        max-height: 60px; /* Limited height to avoid overflow */
        overflow: hidden;
        text-overflow: ellipsis;
    }

    #card-date {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 8px;
        line-height: 10px;
        color: #6F6F6F;
        text-align: right;
        margin-right: 30px;
        margin-bottom: 30px;
    }

    /* Pagination Styling */
    .pagination {
        padding: 20px 0;
        text-align: center;
        justify-content: center;
        position: relative; /* Ensures it's placed outside background */
        z-index: 1; /* Makes sure it stays on top of any background images */
    }

    .pagination a {
        color: #283971;
        padding: 8px 16px;
        border: 1px solid #ddd;
        margin: 0 4px;
        text-decoration: none;
        transition: background-color .3s;
    }

    .pagination a.active {
        background-color: #283971;
        color: white;
        border: 1px solid #283971;
    }

    .pagination a:hover:not(.active) {
        background-color: #f5f5f5;
    }

    /* Grid layout to adjust the number of cards per row */
    .articles-container {
        min-height: 70vh; /* Ensure the container adapts to content */
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 30px;
        margin-bottom: 20px;
    }

    .container-fluid.custombg-image-row {
        padding-bottom: 40px; /* Ensure no clipping of pagination */
    }

    /* Add a padding to ensure the pagination does not overlap the image */
    .custombg-image-row {
        padding-bottom: 100px; /* Adjust this padding to create space below the articles */
    }
</style>
<style>
    /* Limit the thumbnail image height */
    #card img {
        max-height: 100px; /* Adjust this value to control the height of the thumbnail */
        width: 100%; /* Ensures the image maintains aspect ratio and fits the width of the card */
        object-fit: cover; /* Ensures the image fills the area without distortion */
    }

    #card-body {
        flex-grow: 1; /* Ensures content takes available space */
    }

    #card-date {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 8px;
        line-height: 10px;
        color: #6F6F6F;
        text-align: right;
        margin-right: 30px;
        margin-bottom: 30px;
    }
</style>


<h1 class="headers">ARTICLES</h1>
<hr class="horizontal-line">

<div class="container-fluid custombg-image-row">
    <div class="articles-container">
        @if($articles->isNotEmpty())
            @foreach ($articles as $item)
            <div id="card-box">
                <a href="{{ route('articles.Details', ['article_id' => $item->id]) }}" style="text-decoration: none; color: inherit;">
                    <div class="card" id="card">
                        <img src="{{ asset('assets/uploads/articles/' . $item->thumb_nail_pic) }}" alt="{{ $item->thumb_nail_title }}">
                        <div class="card-body">
                            <h5 class="card-title" id="title">{{ $item->thumb_nail_title }}</h5>
                            <p class="card-text" id="card-text">{{ Str::limit($item->thumb_nail_summary, 120) }}</p> <!-- Increased limit for summary -->
                        </div>
                        <p style="font-size: 12px; padding: 5px; text-align: right; color: #6F6F6F;" id="card-date">{{ date('F j, Y', strtotime($item->published_date)) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        @else
            <p>No articles found.</p>
        @endif
    </div>

</div>

<!-- Pagination Outside the Background Image -->
<div class="pagination">
    {{ $articles->links('pagination::bootstrap-5') }}
</div>

@include('layout.footer')
