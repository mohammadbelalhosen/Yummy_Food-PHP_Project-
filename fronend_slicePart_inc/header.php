<!DOCTYPE html>
<?php
include './include/env.php';
//fetch for counter image section

//fetch for table image section

$select_table = "SELECT * FROM tableimg_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_table);
$table = mysqli_fetch_assoc($datas);

//fetch for Other  section

$select_other = "SELECT * FROM other_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_other);
$other = mysqli_fetch_assoc($datas);

?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $other['r_name'] ?> | Index </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/food.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- fontawosome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- custom css file  -->
  <style>
    input[type=text],
    input[type=email],
    input[type=number],
    input[type=date],
    input[type=time],
    input[type=phone] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 3px solid #ccc;
      -webkit-transition: 0.5s;
      transition: 0.5s;
      outline: none;
    }

    #message {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 3px solid #ccc;
      -webkit-transition: 0.5s;
      transition: 0.5s;
      outline: none;
    }

    input[type=text]:focus {
      border: 3px solid red;
    }

    input[type=email]:focus {
      border: 3px solid red;
    }

    input[type=number]:focus {
      border: 3px solid red;
    }

    input[type=date]:focus {
      border: 3px solid red;
    }

    input[type=time]:focus {
      border: 3px solid red;
    }

    input[type=phone]:focus {
      border: 3px solid red;
    }

    #message:focus {
      border: 3px solid red;
    }

    #stats-counter {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url("./backend_files/uploads/tableimg_section/<?= $table['table_image'] ?>") center center;
      background-size: cover;
      padding: 100px 0;
    }

    @media (min-width: 1365px) {
      #stats-counter {
        background-attachment: fixed;
      }
    }

    #stats-counter .stats-item {
      padding: 30px;
      width: 100%;
    }

    #stats-counter .stats-item span {
      font-size: 48px;
      display: block;
      color: #fff;
      font-weight: 700;
    }

    #stats-counter .stats-item p {
      padding: 0;
      margin: 0;
      font-family: var(--font-secondary);
      font-size: 16px;
      font-weight: 700;
      color: rgba(255, 255, 255, 0.6);
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1><?= $other['r_name'] ?><span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#book-a-table">Table</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Contact Us</a></li>
          </a></li>
          <!-- <li><a href="./backend_files/login.php">Login</a></li> -->
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="#book-a-table">Book a Table</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
  <!-- End Header -->