<?php
session_start();
include '../include/env.php';
$id = $_GET['id'];

$delete = "DELETE FROM table_book_orders WHERE id=$id";
$exe = mysqli_query($conn, $delete);

header("Location: ../backend_files/table_book_order.php?id=$id");

$_SESSION['success'] = "Table Order Deleted Successfully !";
