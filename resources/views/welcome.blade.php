@include('layout.header');
@include('layout.navbar');

<style>
    #home-box {
        width: 1101px;
        height: 513px;
        display: flex;

        background: url(assets/images/BG.png);
        border-radius: 10px;
        padding: 100px;
        box-shadow: 5px 5px 10px 0 rgba(0, 0, 0, 0.5);
    }


    #home-layer {
        border: none;
        padding-bottom: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        background-color: whitesmoke;
    }

    #home-header {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 900;
        font-size: 28px;
        line-height: 34px;
        letter-spacing: 0.2em;
        color: #FFFFFF;

        float: left;
    }

    #sample-photo {
        width: 20pc;
        height: 20pc;
        flex: 1;
    }

    .home-article {
        flex: 2;
        float: left;
        text-align: left;
        padding: 30px;

    }

    #find-out-more-button {
        width: 140px;
        height: 32px;
        left: 865px;
        top: 2714px;
        border: none;
        background: #283971;
        border-radius: 30px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 13px;
        line-height: 16px;
        text-align: center;
        color: #FFFFFF;
    }

    #find-out-more-button:hover {
        background-color: #A19158;
        transition: color 5s;
    }

    #find-out-more-button:active {
        background-color: #8D7F4D;
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

    #article-header {
        padding: 20px;
        margin-left: 180px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;

        color: #FFFFFF;
    }

    .header {
        display: flex;
        background-color: #A19158;
        padding: 15px 0;
        color: white;

        font-size: 34px;
        font-family: 'Inter';
        font-weight: 800;
        font-style: normal;
        margin-top: -90px;
    }

    #see-all-button {

        background: #FFFFFF;
        width: 95px;
        height: 35px;


        padding: 10px;
        padding-bottom: 10px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 15px;
        text-align: center;
        color: #A19158;

        border-radius: 30px;
        border: none;
        margin-left: 650px;
    }

    #see-all-button:hover {
        background: #283971;
        color: white;
    }

    #see-all-button:active {
        background: hsl(227, 49%, 20%);
        color: white;
    }

    .aside-button {
        margin-top: 15px;
    }

    #article-header {
        margin-top: 10px;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
    }

    .card-body {
        box-sizing: border-box;
        border-radius: 10px;
        height: 120px;
    }

    a {
        text-decoration: none;
    }
    #title {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 19px;

        color: #000000;
    }

    #card-text {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 15px;
        height: 41.75px;

        color: #000000;
    }

    #publish-date {

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
    }

    #project-header {
        padding: 20px;
        margin-left: 180px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;

        color: #FFFFFF;
    }

    .project-header {
        display: flex;
        background-color: #A19158;
        padding: 15px 0;
        color: white;

        font-size: 34px;
        font-family: 'Inter';
        font-weight: 800;
        font-style: normal;
    }

    #first-content {
        background-image: url('assets/images/BG.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 50vw;
        object-fit: contain;
        margin-top: 100px;
    }

    #second-content {
        background-image: url('assets/images/BG.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 40vw;
        object-fit: contain;
    }

    #projects-card {
        background: #FFFFFF;
        border-radius: 10px;
        width: 266px;
    }

    #project-title {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 19px;
        padding: 10px;
        color: #000000;
    }

    #project-text {
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

    .card-body-projects {
        box-sizing: border-box;
        border-radius: 10px;
        height: 15em;
    }
</style>
<link rel="stylesheet" href="assets/css/custom.css">
<body>
    <div class="card headImage" id="home-layer"">
        <div class="" id="home-box">
            <aside>
                <img src="assets/images/BG.png" alt="sample-photo" id="sample-photo">
            </aside>
            <article class="home-article">
                <h4 id="home-header">SERVICE LEARNING PROGRAM</h4>
                <p class="" style="color: white;">Service learning provides relevant and meaningful service in the community, enhances academic learning, translates theory into practice, and ideas into action and creates an opportunity for purposeful civic learning through a lived experience of the Jesuit mission – solidarity with those in need (preferential option for the poor), and in the light and provision of the Jesuit Province Roadmap and of the United Nations’ Sustainable Development Goals.
                </p>
                <a href="about-us.php" style="text-decoration: none; color: inherit;">
                    <button id="find-out-more-button">Find out more</button>
                </a>
            </article>
        </div>
    </div>
    <div class="container-fluid" id="first-content">
        <div class="row gy-3">
            <!-- Main Body -->
            <div class="mainContent">
                <div class="row gy-3">
                    <div class="header">
                        <h5 id="article-header">ARTICLES</h5>
                        <aside class="aside-button">
                            <a href="articles.php">
                                <button id="see-all-button">
                                    See All...
                                </button>
                            </a>
                        </aside>
                    </div>
                    <?php

                    $query = "SELECT * FROM articles WHERE featured = 1 ORDER BY published_date DESC LIMIT 3";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $item) {
                    ?>
                            <div class="col-md-3" class="cardClass">
                                <a href="article-view.php?id=<?= $item['id']; ?>" style="text-decoration: none; color: inherit;">
                                    <div class="card h-100" style="margin-top: 50px !important;" id="card">
                                        <img src="uploads/articles/<?= $item['thumb_nail_pic']; ?>" class="customPic"> <!-- Placeholder for image-->
                                        <div class="card-body">
                                            <h5 id="title"><?= $item['thumb_nail_title']; ?></h5>
                                            <p id="card-text"><?= $item['thumb_nail_summary']; ?></p>
                                            <!-- You can add more project details here -->
                                        </div>
                                        <!--Bottom of Card to place date-->
                                        <p style="padding:5px; font-size:12px" id="publish-date"><?= date('F j, Y', strtotime($item['published_date'])); ?></p>
                                    </div>
                                </a>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid" id="second-content">
        <div class="row gy-3">
            <div class="secondContent">

                <div class="row gy-3">
                    <div class="project-header">
                        <h5 id="project-header">PROJECTS</h5>
                        <aside class="aside-button">
                        <a href="projects.php">
                                <button id="see-all-button">
                                    See All...
                                </button>
                            </a>
                        </aside>
                    </div>
                    <?php

                    $query = "SELECT * FROM projects WHERE featured = 1 LIMIT 3";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $item) {
                    ?>
                            <div class="col-md-3">
                                <div style="margin-top: 50px !important;" id="projects-card">
                                    <a href="project-details.php?id=<?= $item['id']; ?>"><img src="assets/images/article-pic.png" class="customPic">
                                    <div class="card-body-projects">
                                        <h5 id="project-title"><?= $item['name']; ?></h5>
                                        <p id="project-text"><?= $item['description']; ?></p>

                                        <a href="project-details.php?id=<?= $item['id']; ?>"></a>
                                        <!-- You can add more project details here -->
                                    </div>
                                    </a> 
                                </div>
                            </div>
                </div>


            </div>
        </div>
    </div>
</body>
@include('layout.footer');
