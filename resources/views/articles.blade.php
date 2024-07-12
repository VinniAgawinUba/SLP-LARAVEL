<!-- resources/views/home.blade.php -->
@include('layout.header')
@include('layout.navbar')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .header {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 58px;
        text-align: center;
        color: #283971;
        margin-top: 99px;
    }

    .centered-textfield {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #textfield {
        width: 40%;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 78px;
        border-radius: 15px;
        padding: 8px 12px;
        background: url("https://static.thenounproject.com/png/101791-200.png") no-repeat 10px;
        border: 3px solid #ccc;
        padding-left: 40px;
        background-size: 20px;
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

    .horizontal-line {
        background-color: #283971;
        width: 50%;
        margin: auto;
        border-top: 4px solid #283971 !important;
        border-radius: 14px;
        margin-top: 36px;
        margin-bottom: 57px;
    }

    .year {
        border-radius: 20px;
        margin-top: 30px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 30px;
        line-height: 36px;
        width: 300px;
        height: 178px;
        color: #89A5FF;
        background: url('{{ asset('assets/images/BGbluebook.png') }}'); /* Ensure correct path */
        padding: 50px;
        padding-top: 10px;
        background-size: cover;
        background-position: center;
    }

    .year:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
        box-shadow: 0px 0px 5px #FFFFFF;
        cursor: pointer;
    }

    #three-columns {
        flex-basis: 36px;
        margin: 29px;
    }

 


    #background-image {
        background-image: url('{{ asset('assets/images/BG.png') }}'); /* Ensure correct path */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 70vw;
        object-fit: contain;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
    }


    #college-of {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 13px;
        line-height: 16px;
        text-align: center;
        letter-spacing: 0.205em;
        color: #5C80FA;
        mix-blend-mode: normal;
    }

    .header-container {
        display: flex;
        background-color: #A19158;
        padding: 15px 0;
        margin-left: -12px;
        margin-right: -12px;
        justify-content: left;
        align-items: left;
        border-radius: 5px;
    }

    #featured-header {
        padding: 20px;
        margin-left: 100px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;
        color: #FFFFFF;
    }

    .featured-section {
        margin-top: -50px;
    }

   

    .card-body-featured {
        background: #FFFFFF;
        border-radius: 10px;
        width: 303px;
        height: 475px;
    }

    .hidden {
        display: none;
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
        height: 40%;
        width: 80%;
    }

    #card-box:hover {
        transition: transform 0.2s;
        transform: scale(1.05);
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
<h4 class="header">ARTICLES</h4>
<hr class="horizontal-line">
@include('shared.success-message')
@include('shared.error-message')

    <div class="container-fluid" id="first-content">
        <div class="row gy-3" id="background-image">
            <div class="mainContent">
                <div class="row gy-3">
               
                    @if($articles->isNotEmpty())
                        @foreach ($articles as $item)
                        @php
                        $article_id = $item->id;
                        @endphp
                        <div style="display: flex; justify-content: center;" id="card-box">
                            <a href="{{ route('articles.Details', ['article_id' => $item->id]) }}" style="text-decoration: none; color: inherit;">
                                <div class="card h-100" style="margin-top: 50px !important;" id="card">
                                    <img src="{{ asset('assets/uploads/articles/' . $item->thumb_nail_pic) }}" class="customPic"> <!-- Placeholder for image-->
                                    <div class="card-body">
                                        <h5 id="title">{{ $item->thumb_nail_title }}</h5>
                                        <p id="card-text">{{ $item->thumb_nail_summary }}</p>
                                        <!-- You can add more project details here -->
                                    </div>
                                    <!--Bottom of Card to place date-->
                                    <p style="padding:5px; font-size:12px" id="card-date">{{ date('F j, Y', strtotime($item->published_date)) }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>


@include('layout.footer')