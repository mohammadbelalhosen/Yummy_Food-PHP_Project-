<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$select = "SELECT * FROM table_book_orders";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);
// print_r(array_column($results,'phone'))

?>

<div class="bg-primary text-light h3 ">All Table Book Order</div>
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
            <th>Message</th>
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
                <td><?= $result['phone'] ?></td>
                <td><?= $result['date'] ?></td>
                <td><?= $result['time'] ?></td>
                <td><?= $result['total_people'] ?></td>
                <td><?= substr($result['message'], 0, 10) . '..' ?></td>
                <td>
                    <a class="btn btn-info" href="../controller/delete_table_book.php?id=<?= $result['id'] ?>">Cancel</a></a>
                    <a class="btn btn-danger" href="../controller/delete_table_book.php?id=<?= $result['id'] ?>">Delete</a></a>
                </td>
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