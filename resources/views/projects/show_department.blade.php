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
        padding: 10px;
        border-radius: 20px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 30px;
        line-height: 36px;
        height: 200px;
        width: 300px;
        color: #89A5FF;
        background: url('{{ asset('assets/images/BGbluebook.png') }}');
        /* Ensure correct path */
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

    #year-font-style {
        margin-top: calc(120px / 3);
        justify-content: center;
        text-align: center;
        white-space: pre-wrap;
        padding-bottom: 30px;
    }

    #background-image {
        background-image: url('{{ asset('assets/images/BG.png') }}');
        /* Ensure correct path */
        background-size: cover;
        background-repeat: no-repeat;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
    }

    #sy {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 20px;
        line-height: 24px;
        color: #89A5FF;
        ;
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

    .card-body-featured {
        box-sizing: border-box;
        border-radius: 10px;
        height: 25em;
    }

    a {
        text-decoration: none;
    }
</style>
<h4 class="header">PROJECTS</h4>
<hr class="horizontal-line">
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid" id="first-content">
    <div class="row gy-3" id="background-image">
        <div class="mainContent">
            <div class="row gy-3">

                @foreach ($departments as $item)
                @php
                $department_id = $item->id
                @endphp
                    <div class="col-md-4 mb-6 gy-3" style="display: flex; justify-content: center;" id="three-columns">
                        <!-- Add a unique ID to each semester card and attach a click event -->
                        <a href="{{ url("projects/$school_year_id/$semester_id/$college_id/$department_id") }}">
                            <div class="year" id="{{ $item->id }}"
                                style="background: url('{{ asset('assets/images/BGblueBook.png') }}');">
                                <div class="card-body">
                                    <h5 class="card-title text-white text-center"></h5>
                                    <p class="card-text text-center" id="semester-font-style">{{ $item->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                @if ($departments->isEmpty())
                    <div class="col-md-12 mb-6 gy-3" style="display: flex; justify-content: center;">
                        <div class="year" id="year"
                            style="background: url('{{ asset('assets/images/BGblueBook.png') }}');">
                            <div class="card-body">
                                <h5 class="card-title text-white text-center"></h5>
                                <p class="card-text text-center" id="semester-font-style">No Departments with projects
                                    found</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{ $departments->links('pagination::bootstrap-5') }}
    </div>
</div>


    @include('layout.footer')
