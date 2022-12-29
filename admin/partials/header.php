<?php

	include('../config/constant.php');
    include('login-check.php'); 

  ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation</title>
    

    <!-- favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap CDN link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Swiper CDN Link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />


    <!-- Custom File CSS link  -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/responsive-style.css">
    <!-- <script src="js/admin.js"></script> -->

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">


    <!-- Navbar section Starts  -->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="../images/logo.png" class="img-fluid" alt="Logo"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fas fa-stream navbar-toggler-icon"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav menu-navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-admin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-category.php">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-room.php">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-staff.php">Staffs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-partner.php">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-banner.php">Banner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-booking.php">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>