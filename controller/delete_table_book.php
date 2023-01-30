<?php
include'../include/env.php';
$id = $_GET['id'];
$delete = "DELETE FROM table_book_orders WHERE id=$id";
$exe = mysqli_query($conn,$delete);
header("Location: ../backend_files/table_book_order.php");


