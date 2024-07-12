<!-- resources/views/home.blade.php -->
@include('layout.header')
@include('layout.navbar')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .title-container {
        padding: 28px;
        
    }

    #card-title {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 30px;
        line-height: 48px;
        text-align: left;
    
        color: black;
        text-align: justify;
        color: #283971;
    }

    .publish-date-text {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 24px;
        text-align: left;
        

        color: blacks;
    }

    .col-md-12 {
        width: 967px;
        background-color: #283971;
    }

    #card {
        border-color: #FFFFFF;
        border: none;
    }

    #article-text {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        color: #283971;
    }

    #super-container {
        height: auto;
        padding: 36px;
        scrollbar-width: none;
        justify-content: space-between;
        text-align: justify;
        color: #283971;
    }

    #card-body {
        background-color: #283971;
        border: 1px solid #FFFFFF;
        border-radius: 5px;
    }

    #customPic {
        width: 500px;
        height: auto;
        float: left;
        margin-right: 30px;
        margin-bottom: 10px;
        flex: 1;
    }


    .article-container {
        flex: 1;
        /* Let the article content occupy remaining space */

    }


    .content-container {
        display: flex;
        align-items: flex-start;
        /* Ensure content aligns to the start */
    }
</style>
@include('shared.success-message')
@include('shared.error-message')

    <div class="container-fluid" id="first-content">
        <div class="row gy-3">
            <div class="mainContent">
                <div class="row gy-3">
                   
                         @foreach ($article_list as $article)
                        
                        <body>
                            <div class="title-container">
                            </div>
                            <div id="super-container">
                                <div class="container">
                                    <div class="content-container"> <!-- New container for article content -->
                                        <aside>
                                            <img src="uploads/articles/{{ $article['thumb_nail_pic'] }}" id="customPic" alt="Article Thumbnail Picture">
                                        </aside>
                                        <article class="article-container">
                                            <h2 id="card-title">{{ $article->thumb_nail_title }}</h2>
                                            <p class="publish-date-text">{{ date('F j, Y', strtotime($article->published_date)) }}</p>
                                            <p>{{ $article->content}}</p>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </body>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

@include('layout.footer')