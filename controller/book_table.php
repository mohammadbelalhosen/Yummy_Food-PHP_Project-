<?php
session_start();
include '../include/env.php';
$selects = "SELECT close_day FROM contact_section";
$datas = mysqli_query($conn, $selects);
$result = mysqli_fetch_assoc($datas);

// fetch other sec 

$select_other = "SELECT * FROM other_section";
$datass = mysqli_query($conn, $select_other);
$other = mysqli_fetch_assoc($datass);



if (isset($_POST['submit'])) {
    //*assingning requst
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $total_people = $_POST['total_people'];

    $errors = [];

    //*error
    $day = date('l', strtotime($date));

    if ($day == $result['close_day']) {
        $errors['date_error'] = "The restaurant will be closed on the date you selected. Please select another date. Thank you!";
    }
    if (empty($name)) {
        $errors['name_error'] = "Please Enter Your Name";
    }
    if (empty($email)) {
        $errors['email_error'] = "Please Enter Your Email";
    }
    if (empty($phone)) {
        $errors['phone_error'] = "Please Enter Your Phone";
    }
    if (empty($date)) {
        $errors['date_error'] = "Please Enter Date";
    }
    if (empty($time)) {
        $errors['time_error'] = "Please Enter Time";
    }
    if (empty($total_people)) {
        $errors['total_people_error'] = "Please Enter Total People";
    }

    if (count($errors) > 0) {

        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        header("Location: ../index.php#book-a-table");
    } else {
        // print_r($_POST);
        $select = "SELECT * FROM table_book_orders";
        $data = mysqli_query($conn, $select);
        $results = mysqli_fetch_all($data, 1);
        // print_r(in_array(39,array_column($results,'total_people')));
        if (in_array($date, array_column($results, 'date')) and in_array($time, array_column($results, 'time'))) {
            $errors['date_error'] = "Please select another date or time.Thank You !";
            $errors['time_error'] = "This time the table has been booked. Please select another time.Thank You !";
            $_SESSION['errors'] = $errors;
            $_SESSION['old_data'] = $_POST;
            header("Location: ../index.php#book-a-table");
        } else {

            $insert = "INSERT INTO table_book_orders (name, email, phone, date, time, total_people) VALUES ('$name','$email','$phone','$date','$time','$total_people')";
            $data = mysqli_query($conn, $insert);
            $_SESSION['success'] = "Your Table is Booked Successfully . Please Cheak Your Email . Thank You !";
            if ($data) {
                header("Location: ../index.php#book-a-table");
            }
        }
    }

    // another part send email 

    $url = $other['url'];
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POSTFIELDS => http_build_query([
            "recipient" => $_POST['email'],
            "subject"   => $_POST['subject'],
            "body"      => $_POST['body']
        ])
    ]);
    $result = curl_exec($ch);
} else {
    //*error
    echo 'Enter All Details and Submit Please';
}
