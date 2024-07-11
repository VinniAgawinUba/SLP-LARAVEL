<!-- resources/views/home.blade.php -->
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
        margin-top: 99px;
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

    #textfield {
        border: 4px solid #435283;
        border-radius: 15px;
        left: calc(50% - 798px/2 - 8px);
        width: 40%;
        margin-left: 20%;
        margin-bottom: 78px;
    }

    ::placeholder {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        letter-spacing: 0.205em;

        color: rgba(40, 57, 113, 0.47);
    }

    .filter {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 12px;
        line-height: 15px;
        text-align: center;
        letter-spacing: 0.2em;

        color: #6F6F6F;
        margin-left: 100px;
    }

    .filter-type {
        background: #283971;
        border-radius: 30px;
        width: 157.07px;
        height: 38.96px;
        border: none;
        padding: 8px;
        color: #FFFFFF;
        font-weight: bold;
        border: none;
        text-decoration: none;
    }

    #card {
        background: #FFFFFF;
        border-radius: 10px;
        width: 303px;
        height: 475px;
    }

    #card-box {
        flex-basis: 36px;
        margin: 29px;
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
    }

    #card-text {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 10px;
        line-height: 12px;

        margin-top: 8px;
        color: #000000;
        margin-bottom: 0px;
        text-align: justify;
    }

    #main-body {
        margin-top: 34px;
        height: 1000px;
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

    body {
        margin-left: 100px;
        margin-right: 100px;
    }
    .pagination {
        padding: 20px 0;
        margin-top: 20px;
        text-align: center;
        justify-content: center;
    }

    .pagination a {
        color: #283971;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;
    }

    .pagination a.active {
        background-color: #283971;
        color: white;
        border: 1px solid #283971;
    }

    .pagination a:hover:not(.active) {
        background-color: #ffff;
    }
</style>

<h1 class="headers">GALLERY</h1>
<hr class="horizontal-line">

<div class="container-fluid custombg-image-row">
    <div class="row py-3">
        @forelse ($galleries as $gallery)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div id="carousel{{ $gallery->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($gallery->photos->take(5) as $index => $photo)
                                <button type="button" data-bs-target="#carousel{{ $gallery->id }}" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($gallery->photos->take(5) as $index => $photo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{$photo->file_name }}" class="d-block w-100" alt="{{ $photo->file_name }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $gallery->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $gallery->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->name }}</h5>
                        <a href="#" class="btn btn-primary">View Gallery</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No galleries found.</p>
        @endforelse
    </div>
</div>

<div class="pagination">
    {{ $galleries->links() }}
</div>

@include ('layout.scripts')