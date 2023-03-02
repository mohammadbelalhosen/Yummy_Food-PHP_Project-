<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$select = "SELECT * FROM table_book_orders";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);
// print_r(array_column($results,'phone'))

?>

<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;top:10px;right:10px">
        <div class="toast-header">
            <strong class="me-auto">Cancel Table Order</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>
<?php
}
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
                    <a class="btn btn-info" href="../controller/delete_table_book.php?id=<?= $result['id'] ?>">Cancel</a></a>

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