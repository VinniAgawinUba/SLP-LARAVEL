<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap5.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js"></script>
    <link rel="stylesheet" href="../assets/css/google.css" />

    <style>
        #headers {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 16px;
            line-height: 19px;
            color: #283971;
        }

        #contact-details {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 13px;
            line-height: 16px;
            color: #283971;
            width: auto;
        }

        #footer-line {
            margin-top: 50px;
            width: auto;
            margin-top: 100px;
        }

        #request-button {
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

        #request-button:hover {
            background-color: #A19158;
            transition: color 5s;
        }

        #request-button:active {
            background-color: #8D7F4D;
        }

        #footer-container {
            margin-top: 100px;
        }

        .mail-icon {
            margin-right: 10px;
        }

        .phone-icon {
            margin-right: 10px;
        }

        a {
            text-decoration: none;
        }

        .cards-body {
            margin-top: 10px;
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <!-- Page Content-->
    <section class="pt-4 bg-light bg-gradient" style="position: relative;">
        <div class="container px-lg-5" id=footer-container>
            <!-- Page Features-->
            <div class="row gx-lg-5">
                <div class="col-lg-4 col-xxl-4 ">
                    <div class="cards bg-light border-0">
                        <div class="cards-body ">
                            <h2 class="fs-4 fw-bold" id="headers">CONTACT US</h2>
                            <a href="">
                                <p class="mb-0" id="contact-details">
                                    <span class="mail-icon">
                                        <img src="../slp/assets/images/mail-icon.svg" alt="mail-icon">
                                    </span>
                                    rso@xu.edu.ph
                                </p>
                            </a>
                            <p class="mb-0" id="contact-details">
                                <span class="phone-icon">
                                    <img src="..\slp\assets\images\phone.svg" alt="phone-icon">
                                </span>
                                (088) 853-9800 | Local 9173
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xxl-4">
                    <div class="cards bg-light border-0">
                    </div>
                </div>
                <div class="col-lg-4 col-xxl-4">
                    <div class="cards bg-light border-0 ">
                        <div class="cards-body">

                            <h2 class="fs-4 fw-bold" id="headers">REQUEST ACCESS</h2>
                            <p class="mb-2" id="contact-details">Want more access to information?</p>
                            <button type="button" class="btn btn-primary" id="request-button">Request Access</button>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row gx-lg-5">
                <div class="col-lg-7 col-xxl-4">
                    <div class="cards bg-light border-0 h-100">
                        <div class="cards-body">

                            <h2 class="fs-4 fw-bold" id="headers">FIND US HERE</h2>
                            <p class="mb-0" id="contact-details">Ground Floor, Agriculture Building, Room 103, Xavier </p>
                            <p class="mb-0" id="contact-details">University - Ateneo de Cagayan, Corrales Avenue,</p>
                            <p class="mb-0" id="contact-details">Cagayan de Oro City, 9000, Philippines</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xxl-4 h-50">
                    <div class="cards bg-light border-0">
                    </div>
                </div>
                <div class="col-lg-5 col-xxl-4 h-50">
                    <div class="cards bg-light border-0">
                    </div>
                </div>
            </div>
            <hr id="footer-line">
            <div class="row gy-3">
                <div class="col" id="contact-details" style="text-align:right;">
                    <p>© 2023 Xavier University - Ateneo De Cagayan Corrales Avenue, Cagayan de Oro, Philippines</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing body and html tags -->
</body>

</html>