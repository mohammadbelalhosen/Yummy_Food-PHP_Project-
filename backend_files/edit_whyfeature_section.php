<?php
include './backend_slicePart_inc/header.php';
$id = $_GET['id'];
include '../include/env.php';
$query = "SELECT * FROM feature_section WHERE id = $id";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_assoc($exu);
?>



<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Feature Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_whyfeature_section.php" method="POST">
            <input class="d-none" type="number" name="id" value="<?= $results['id'] ?>">
            <div class="row">

            </div>
            <div>
                <button type="submit" class="btn btn-primary float-right" name="submit">Update Feature</button>

                <label for="" class="w-100">Enter Fontawesome Icon Tage<span class="text-danger">*</span>
                    <input type="text" class="form-control" name="white_card_icon" value="<?= htmlentities($results['white_card_icon']) ?>" placeholder='ex : &lt;i class="fa-square-ring" &gt; &lt;/i&gt;'>
                </label>

                <label for="" class="w-100">Enter Feature Title<span class="text-danger">*</span>
                    <input type="text" class="form-control" name="white_card_title" value="<?= $results['white_card_title'] ?>">
                </label>

                <label for="" class="w-100">Enter Feature Description<span class="text-danger">*</span>
                    <textarea name="white_card_des" class="form-control"><?= $results['white_card_des'] ?></textarea>
                </label>

            </div>

    </div>

    </form>
</div>

<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);

?>