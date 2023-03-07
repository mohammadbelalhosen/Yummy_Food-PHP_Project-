
<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT * FROM why_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);


$qu = "DELETE FROM why_section WHERE id=$id";
$e = mysqli_query($conn, $qu);
$_SESSION['success'] = "Why Section Deleted Successfully !";

header("Location: ../backend_files/all_why_section.php");
