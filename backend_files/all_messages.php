<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$select = "SELECT * FROM message";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);
// print_r(array_column($results,'phone'))

?>

<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;top:10px;right:10px">
        <div class="toast-header">
            <strong class="me-auto">Delete Message</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>
<?php
}
?>
<div style="padding:20px" class="bg-primary text-light h3 ">All Messages</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
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
                <td><?= $result['subject'] ?></td>
                <td><?= $result['message'] ?></td>
                <td>
                    <a class="btn btn-danger" href="../controller/delete_message.php?id=<?= $result['id'] ?>">Delete</a></a>

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