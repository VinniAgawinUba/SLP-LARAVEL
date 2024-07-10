<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap5.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        #custom-search {
            width: 585.91px;
            height: 43.82px;
            border-radius: 22px;
            letter-spacing: 3px;
            font-family: 'Inter';
            padding: 8px 12px;
            border: 3px solid #ccc;
            background: url("https://static.thenounproject.com/png/101791-200.png") no-repeat 10px;
            background-size: 20px;
            padding-left: 40px;
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

        .font-style {
            font-family: 'Inter';
            color: #283971;
            font-weight: 700;
            font-size: 15px;
            text-align: center;
            width: 177.72px;
            height: 19.48px;
            font-style: normal;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 3px;
        }


        hr {
            width: 798px;
            height: 4px;
            left: calc(50% - 798px/2 - 8px);

            background: #283971;
            border-radius: 14px;
        }

        #nav-item:hover {
            color: #A19158;
            transition: color 0.3s
        }

        #nav-item:active {
            color: #8D7F4D;
        }

        #search-button {
            border: none;
            background: #283971;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 13px;
            line-height: 16px;
            text-align: center;
            color: #FFFFFF;
            background: #283971;
            border-radius: 10px;
            width: 100px;
            margin-left: 10px;
        }

        #search-button:hover {
            background-color: #A19158;
        }

        #search-button:active {
            background-color: #8D7F4D;
        }

        #header-links {
            background-color: whitesmoke;
            border-bottom: 1px solid #283971;
            margin-bottom: 10px;
        }

        #nav-bar {
            margin-top: -20px;
        }
    </style>
</head>

<?php
if (isset($_GET['query'])) {
    $placeholder = $_GET['query'];
} else {
    $placeholder = 'Search';
}
?>

<body>
    <header>
        <div class="container">
            <div class="container-fluid px-2" id="nav-bar">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand d-block d-sm-none d-md-none" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <a href="index.php" style="width:400px;">
                            <img src="assets/images/XULOGO.png" alt="Logo" style="width: 80%;">
                        </a>
                        <form class="d-flex justify-content-center ms-auto" action="search.php" method="GET">
                            <input class="" id="custom-search" type="search" placeholder="<?= $placeholder ?>" name="query">
                            <button class="btn btn-outline-primary" id="search-button" type="submit">Search</button>
                        </form>

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item text-center customfont">
                                <a class="nav-link customfont" href="about-us.php">About Us</a>
                            </li>
                            <?php if (isset($_SESSION['auth_user'])) : ?>
                                <li class="nav-item text-center dropdown customfont">
                                    <a class="nav-link text-center dropdown-toggle customfont" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $_SESSION['auth_user']['user_name']; ?>
                                    </a>
                                    <ul class="dropdown-menu text-center customfont" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item customfont font-style" href="#">My Profile</a></li>

                                        <li>
                                            <!-- If logged in and admin show shortcut to admin panel -->
                                            <?php if ($_SESSION['auth_role'] == '1') {
                                            ?>
                                                <a class="dropdown-item" href="admin/index.php">Admin Panel</a>
                                            <?php
                                            } ?>
                                        </li>

                                        <li>
                                            <form action="allcode.php" method="post">
                                                <button type="submit" name="logout_btn" class="dropdown-item font-style" href="#">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link customfont" href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link customfont" href="register.php">Register</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
                <div class="container">
                    <!-- Your container content goes here -->
                </div>
                <div></div>
            </div>
            <div id="header-links">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active customfont font-style" id="nav-item" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link customfont font-style" id="nav-item" href="partners.php">PARTNERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link customfont font-style" id="nav-item" href="projects.php">PROJECTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link customfont font-style" id="nav-item" href="articles.php">ARTICLES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link customfont font-style" id="nav-item" href="gallery.php">GALLERY</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</body>

</html>
</body>