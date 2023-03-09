<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM why_section WHERE id = $id";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_assoc($exu);
?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Why Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_why_section.php" method="POST">
            <input class="d-none" type="number" name="id" value="<?= $results['id'] ?>">
            <div class="row">

            </div>
            <div>
                <button type="submit" class="btn btn-primary float-right" name="submit">Update Why Card</button>
                <label for="" class="w-100">Enter Why Card Description<span class="text-danger">*</span>
                    <textarea name="red_card_des" class="form-control"><?= $results['red_card_des'] ?></textarea>
                </label>
            </div>

    </div>

    </form>
</div>
<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);

?>