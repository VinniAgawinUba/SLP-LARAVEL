<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap5.min.css') }}">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.all.css') }}">


    </head>

    <body class="sb-nav-fixed">
        @include ('layout.admin-navbartop')
        
        <div id="layoutSidenav">
            @include ('layout.admin-sidebar')
        <div id="layoutSidenav_content">
            <main>
        
            