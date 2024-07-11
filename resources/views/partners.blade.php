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

    .horizontal-line {
        background-color: #283971;
        width: 50%;
        margin: auto;
        border-top: 4px solid #283971 !important;
        border-radius: 14px;
        margin-top: 36px;
        margin-bottom: 57px;
    }

    #background-image {
        background-image: url('assets/images/BG.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 50vw;
        object-fit: contain;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
    }


    .sub-headers-background {
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

    #sub-headers {
        padding: 20px;
        margin-left: 100px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;

        color: #FFFFFF;
    }

    .customPic {
        max-width: 100%;
        height: 100px;
    }

    .card-box {
        margin-top: 20px;
        transition: transform 0.2s;
    }

    .card-box:hover {
        transform: scale(1.05);
        /* Slight zoom on hover */
    }

    .card {
        border: 1px solid #ddd;
        /* Light border */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Soft shadow */
        border-radius: 8px;
        /* Rounded corners */
    }

    .card-body {
        text-align: left;
        width: 100%;
    }

    .card-title {
        margin-top: 15px;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        color: #555;
        text-align: left;
        margin-right: 10px;
    }

    .card-content {
        display: flex;
        align-items: center;
    }

    footer {
        margin-top: 10em;
    }

    /* Style for the category tabs */
    .nav-tabs .nav-item .categories {
        color: #333;
        /* Default text color */
        font-weight: bold;
        padding: 5px 10px;
        border: 2px solid transparent;
        /* Transparent border by default */
        border-radius: 5px;
    }

    /* Style for the active category tab */
    .nav-tabs .nav-item .categories:hover {
        background-color: #007bff;
        /* Background color when active */
        color: #fff;
        /* Text color when active */
        border-color: #007bff;
        /* Border color when active */
    }


    /* Style for the hovered category tab */
    .nav-tabs .nav-item .categories.active {
        background-color: #f0f0f0;
        /* Background color on hover */
        color: #007bff;
        /* Text color on hover */
        border-color: #007bff;
        /* Border color on hover */
    }
</style>

<h4 class="header">PARTNERS</h4>
<hr class="horizontal-line">

<body>
    <div class="container">
        <!-- Category Tabs -->
        <ul class="nav nav-tabs" id="categoryTabs" role="tablist">
            <li class="nav-item">
                <a class="categories active" id="category1-tab" data-toggle="tab" href="#category1" role="tab"
                    aria-controls="category1" aria-selected="false">Local Government Units</a>
            </li>
            <li class="nav-item">
                <a class="categories" id="category2-tab" data-toggle="tab" href="#category2" role="tab"
                    aria-controls="category2" aria-selected="true">Civil Society Organizations</a>
            </li>
            <li class="nav-item">
                <a class="categories" id="category3-tab" data-toggle="tab" href="#category3" role="tab"
                    aria-controls="category3" aria-selected="true">Industry</a>
            </li>
            <li class="nav-item">
                <a class="categories" id="category4-tab" data-toggle="tab" href="#category4" role="tab"
                    aria-controls="category4" aria-selected="true">Non-Government</a>
            </li>
            <li class="nav-item">
                <a class="categories" id="category5-tab" data-toggle="tab" href="#category5" role="tab"
                    aria-controls="category5" aria-selected="true">Private Sector</a>
            </li>
            <li class="nav-item">
                <a class="categories" id="category6-tab" data-toggle="tab" href="#category6" role="tab"
                    aria-controls="category6" aria-selected="true">Xavier University</a>
            </li>
            <li class="nav-item">
                <a class="categories" id="category7-tab" data-toggle="tab" href="#category7" role="tab"
                    aria-controls="category7" aria-selected="true">Government Agencies</a>
            </li>
            <li class="nav-item">
                <a class="categories" id="category8-tab" data-toggle="tab" href="#category8" role="tab"
                    aria-controls="category8" aria-selected="true">Schools</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="categoryTabsContent">
            <div class="tab-pane fade show active" id="category1" role="tabpanel" aria-labelledby="category1-tab">

                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 1) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}" class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>  <!-- Partners for Local Government Units -->
              

            </div>

            <!-- Civil Society Organizations -->
            <div class="tab-pane fade" id="category2" role="tabpanel" aria-labelledby="category2-tab">

                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 2) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}"
                                            class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Industry -->
            <div class="tab-pane fade" id="category3" role="tabpanel" aria-labelledby="category3-tab">
                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 3) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}"
                                            class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Non-Government -->
            <div class="tab-pane fade" id="category4" role="tabpanel" aria-labelledby="category4-tab">
                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 4) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}"
                                            class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Private Sector -->
            <div class="tab-pane fade" id="category5" role="tabpanel" aria-labelledby="category5-tab">
                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 5) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}"
                                            class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Xavier University -->
            <div class="tab-pane fade" id="category6" role="tabpanel" aria-labelledby="category6-tab">
                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 6) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}"
                                            class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Government Agencies -->
            <div class="tab-pane fade" id="category7" role="tabpanel" aria-labelledby="category7-tab">
                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 7) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}"
                                            class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Schools -->
            <div class="tab-pane fade" id="category8" role="tabpanel" aria-labelledby="category8-tab">
                <div class="row">
                    @foreach ($partners_list->where('featured', 1)->where('type_id', 8) as $item)
                        <div class='col-md-4'>
                            <div class="card card-box">
                                <a href="{{ url('partner-view', $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card-content">
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $item->logo_image) }}"
                                            class="customPic">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the category tabs
        var categoryTabs = document.querySelectorAll('.categories');

        // Loop through each tab and add click event listener
        categoryTabs.forEach(function(tab) {
            tab.addEventListener('click', function(event) {
                // Prevent the default behavior of the link
                event.preventDefault();

                // Remove the 'active' class from all tabs
                categoryTabs.forEach(function(tab) {
                    tab.classList.remove('active');
                });

                // Add the 'active' class to the clicked tab
                tab.classList.add('active');

                // Get the category ID from the href attribute
                var categoryID = tab.getAttribute('href');

                // Show the corresponding tab content
                showTabContent(categoryID);
            });
        });

        // Function to show the corresponding tab content
        function showTabContent(categoryID) {
            // Hide all tab content
            var tabContents = document.querySelectorAll('.tab-pane');
            tabContents.forEach(function(content) {
                content.classList.remove('show', 'active');
            });

            // Show the selected tab content
            var selectedContent = document.querySelector(categoryID);
            selectedContent.classList.add('show', 'active');

            // If the selected tab has not been loaded yet, load its content
            if (!selectedContent.dataset.loaded) {
                // Set a flag to indicate that the content has been loaded
                selectedContent.dataset.loaded = true;

                // Make an AJAX request to fetch and display the content
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            // Insert the response HTML into the tab content
                            selectedContent.innerHTML = xhr.responseText;
                        } else {
                            // Handle error
                            console.error('Error fetching content: ' + xhr.status);
                        }
                    }
                };
                xhr.open('GET', 'fetch_content.php?category=' + categoryID.substring(1), true);
                xhr.send();
            }
        }
    });
</script>
<footer>
    <!-- Footer -->
    @include('layout.footer')
</footer>

@include ('layout.scripts')