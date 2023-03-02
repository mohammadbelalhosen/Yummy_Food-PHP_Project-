<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$select = "SELECT * FROM catagories";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);
// print_r($results);
?>


<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;top:10px;right:10px">
        <div class="toast-header">
            <strong class="me-auto">Add Catagory</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>
<?php
}
?>


<?php
if (isset($_SESSION['delete'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;top:10px;right:10px">
        <div class="toast-header">
            <strong class="me-auto">Delete Catagory</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['delete'] ?>
        </div>
    </div>
<?php
}
?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Catagory Section</span>
    </div>
    <div class="card-body">
        <input type="number" name="id" class="d-none">
        <form action="../controller/add_catagory.php" method="POST">
            <label class="w-100" for="">Enter A Catagoy<span class="text-danger">*</span>
                <input type="text" class="form-control" name="catagory">
                <?php
                if (isset($_SESSION['error_catagory']['catagory'])) {
                ?>
                    <span class="text-danger"><?= $_SESSION['error_catagory']['catagory'] ?></span>
                <?php
                }
                ?>
            </label>

            <button type="submit" class="btn btn-primary float-right w-100" name="submit">Add Catagoy</button>

        </form>
    </div>
</div>

<div class="card-header bg-primary text-light mt-5">
    <span>All Catagories</span>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Catagory Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($results as $key => $result) {
            ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $result['catagory'] ?></td>
                    <td><span class="badge <?= $result['status'] == 0 ? 'bg-danger' : 'bg-success' ?> text-light"><?= $result['status'] == 0 ? 'De-Active' : 'Active' ?></span></td>
                    <td>
                        <a class="btn btn-primary" style="font-size:smaller" href="../controller/catagory_status.php?id=<?= $result['id'] ?>"><?= $result['status'] != 0 ? "De-Active" : "Active" ?></a></a>
                        <a class="btn btn-danger deletebanner" style="font-size:smaller" href="../controller/catagory_delete.php?id=<?=$result['id']?>">Delete</a></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);
unset($_SESSION['error_catagory']);
?>