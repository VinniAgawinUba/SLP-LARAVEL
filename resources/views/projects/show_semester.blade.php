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

    #semester-font-style {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 160px;
        font-size: 36px;
    }

    #college-font-style {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 160px;
        font-size: 36px;
    }

    #department-font-style {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 160px;
        font-size: 36px;
    }

    #projects-font-style {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 160px;
        font-size: 36px;
    }

    #project-card {
        box-sizing: border-box;
        background: #FFFFFF;
        border-radius: 10px;
        width: 222px;
        height: auto;
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

    .school-year-header {
        display: flex;
        background-color: #A19158;
        padding: 15px 0;
        margin-left: -12px;
        margin-right: -12px;
        margin-top: -20px;
        justify-content: left;
        align-items: left;
        border-radius: 5px;
    }

    #year-header {
        padding: 20px;
        margin-left: 100px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;
        color: #FFFFFF;
    }

    #sy {
        font-weight: 700;
        font-size: 20px;
        line-height: 16px;
        text-align: center;
        font-style: normal;
        color: #5C80FA;
        mix-blend-mode: normal;
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

    .card-body-featured {
        box-sizing: border-box;
        border-radius: 10px;
        height: 25em;
    }

    .card-title-featured {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 19px;
        padding: 10px;
        color: #000000;
    }

    .card-description-featured {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 15px;
        height: 41.75px;
        padding-left: 10px;
        margin-top: -10px;
        color: #000000;
    }

    .card-title-projects {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 19px;
        color: #000000;
    }

    .card-text-projects {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 15px;
        height: 41.75px;
        margin-top: 5px;
        color: #000000;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-subtitle-projects {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 15px;
        color: #6F6F6F;
        text-align: right;
        margin-right: 30px;
        margin-bottom: 30px;
        text-transform: uppercase;
        margin-right: -3px;
    }
</style>
<h4 class="header">Projects</h4>
<hr class="horizontal-line">
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid" id="first-content">
    <div class="row gy-3" id="background-image">
        <div class="mainContent">
            <div class="row gy-3">
                @php
                // Define static semesters
                $semesters = array("1st Semester", "2nd Semester", "Intersession");
                @endphp
                @foreach ($semesters as $key => $semester)
                    @php
                    $card_id = 'semester_' . ($key + 1);
                    $semester_id = $key + 1;
                    @endphp
                    <div class="col-md-4 mb-6 gy-3" style="display: flex; justify-content: center;" id="three-columns">
                        <!-- Add a unique ID to each semester card and attach a click event -->
                        <a href="{{ url("projects/$school_year_id/$semester_id")}}">
                        <div class="year" id="{{ $card_id }}" style="background: url('{{ asset('assets/images/BGblueBook.png') }}');">
                            <div class="card-body">
                                <h5 class="card-title text-white text-center"></h5>
                                <p class="card-text text-center" id="semester-font-style">{{ $semester }}</p>
                                <!-- You can add more project details here -->
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@include('layout.footer')
@include('layout.scripts')