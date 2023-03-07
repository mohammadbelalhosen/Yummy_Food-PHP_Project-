<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$select = "SELECT * FROM table_book_orders";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);

//fetch for Other  section

$select_other = "SELECT * FROM other_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_other);
$other = mysqli_fetch_assoc($datas);

// fetch for contact 
$select_contact = "SELECT * FROM contact_section";
$datas = mysqli_query($conn, $select_contact);
$contact = mysqli_fetch_assoc($datas);

?>
<div style="padding:20px" class="bg-primary text-light h3 ">All Table Book Order</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Time</th>
            <th>People</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $key => $result) {
        ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $result['name'] ?></td>
                <td><?= $result['email'] ?></td>
                <td><?= '0 ' . $result['phone'] ?></td>
                <td><?= $result['date'] ?></td>
                <td><?= $result['time'] ?></td>
                <td><?= $result['total_people'] ?></td>
                <td>
                    <form action="../controller/delete_table_book.php?id=<?= $result['id'] ?>" method="POST">
                        <input class="d-none" type="text" name="subject" value="<?= $other['r_name'] . ' ' . ' Table Canceled' ?>">
                        <input class="d-none" type="text" name="body" value=" <?= "Your Table Has Been Canceled Successfully . If you want to Book your Table then click or go to  " . $other['r_name'] . " Website Book a Table section Then Book Your Table. Our Phone Number is : " . "  +880" . $contact['number'] . "  Thank You !" ?> ">
                        <input class="d-none" type="email" name="email" id="email" value="<?= isset($_SESSION['email_e']) ? $_SESSION['email_e'] : 'mdbelalhosen6234@gmail.com' ?>">

                        <button class="btn btn-info" type="submit" name="submit">Cancel</button>
                        <a class="btn btn-danger" href="../controller/deletetwo_table_book.php?id=<?= $result['id'] ?>">Delete</a></a>
                    </form>

            </tr>
        <?php
        }
        ?>
        <?php
        if (mysqli_num_rows($data) == 0) {
        ?>
            <tr>
                <td colspan="8">No Records Found!!</td>
            </tr>

        <?php
        }
        ?>

    </tbody>
</table>

<?php
include './backend_slicePart_inc/footer.php';
?>