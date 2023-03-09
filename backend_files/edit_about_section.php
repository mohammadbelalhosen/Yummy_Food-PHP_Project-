<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM about_section WHERE id = $id";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_assoc($exu);
$path = './uploads/about_section/about_bannera_img/' . $results['banner_img'];
$pathtwo = './uploads/about_section/tharmnail_img/';
// print_r($results);
// exit;
?>
<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit About Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_about_section.php" method="POST" enctype="multipart/form-data">
            <input type="number" class="d-none" name="id" value="<?= $id ?>">
            <input type="text" class="d-none" name="image_nameone" value="<?= $results['banner_img'] ?>">
            <input type="text" class="d-none" name="image_nametwo" value="<?= $results['tharmnail_img'] ?>">
            <div>

                <button type="submit" class="btn btn-primary float-right" name="submit">Update About</button>
            </div>

            <div for="img_banner">
                Select Image For About Banner :
                <input type="file" name="banner_img" id="banner_img" value="$path">
            </div>

            <div class="mt-3" for="img_banner">
                Select Image For Youtube Video Tharmnail :
                <input type="file" name="tharmnail_img" id="tharmnail_img" value="$pathtwo<?= $results['tharmnail_img'] ?>">
            </div>


            <label class="w-100" for="">Enter Table Book Number<span class="text-danger">*</span>
                <input type="number" class="form-control" value="<?= $results['number'] ?>" name="number">
            </label>

            <label for="" class="w-100">Enter About Details Text-1<span class="text-danger">*</span>
                <textarea name="about_desone" class="form-control"><?= $results['about_desone'] ?></textarea>
            </label>

            <label for="" class="w-100">Enter About Details Text-2<span class="text-danger">*</span>
                <textarea name="about_destwo" class="form-control"><?= $results['about_destwo'] ?></textarea>
            </label>

            <label for="" class="w-100">Enter About Details list Text-1<span class="text-danger">*</span>
                <textarea name="listone" class="form-control"><?= $results['listone'] ?></textarea>
            </label>

            <label for="" class="w-100">Enter About Details list Text-2<span class="text-danger">*</span>
                <textarea name="listtwo" class="form-control"><?= $results['listtwo'] ?></textarea>
            </label>

            <label for="" class="w-100">Enter About Details list Text-3<span class="text-danger">*</span>
                <textarea name="listthree" class="form-control"><?= $results['listthree'] ?></textarea>
            </label>

            <label for="" class="w-100">Enter Video Link<span class="text-danger">*</span>
                <input type="text" class="form-control" name="video_link" value="<?= $results['video_link'] ?>">
            </label>


    </div>

    </form>
</div>

<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);
unset($_SESSION['old_data']);

?>