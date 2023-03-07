<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM other_section WHERE id = $id";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_assoc($exu);

?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Other Item Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_other_section.php" method="POST">
            <input class="d-none" type="number" name="id" value="<?= $results['id'] ?>">
            <div class="row">

                <div>
                    <button type="submit" class="btn btn-primary float-right" name="submit">Update Item</button>
                    <label for="" class="w-100">Enter Google Apps Script Url :<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="url" value="<?= $results['url'] ?>">
                    </label>

                    <label for="" class="w-100">Enter Restaurent Name : <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="r_name" value="<?= $results['r_name'] ?>">
                    </label>


                </div>

            </div>

        </form>
    </div>
</div>




<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);

?>