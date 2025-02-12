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

<div class="container">
    <div class="row">
        @forelse ($gallery->photos as $photo)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{asset('assets/uploads/gallery_photos/' . $photo->file_name)}}" class="card-img-top" alt="Photo">
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
