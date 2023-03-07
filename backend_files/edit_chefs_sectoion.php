<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM chefs_section WHERE id = $id";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_assoc($exu);
$path = './uploads/Chefs_section/chefs_img/' . $results['chefs_img'];

?>
<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Chefs Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_chefs_section.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="chefs_img">
                        <input type="number" class="d-none" name="id" value="<?= $id ?>">
                        <input type="text" class="d-none" name="image_name" value="<?= $results['chefs_img'] ?>">
                        <img class="img" src="<?= $path ?>" style="width: 100%;">
                        <input type="file" class="d-none imageInput" name="chefs_img" id="chefs_img" value="$path">
                    </label>

                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Update Chefs</button>
                    <label class="w-100" for="">Enter Chefs Name<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="chefs_name" value="<?= $results['chefs_name'] ?>">
                    </label>

                    <label for="" class="w-100">Enter Chefs Job Title<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="job_title" value="<?= $results['job_title'] ?>">
                    </label>

                    <label for="" class="w-100">Enter Chefs Description<span class="text-danger">*</span>
                        <textarea name="chefs_des" class="form-control"><?= $results['chefs_des'] ?></textarea>
                    </label>

                    <label for="" class="w-100">Enter Facebook Profile link<span class="text-danger">*</span>
                        <input type="text" name="profile_link" class="form-control" value="<?= $results['profile_link'] ?>">
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


<script>
    let image_input = document.querySelector('.imageInput')
    let imgSelect = document.querySelector('.img')
    image_input.addEventListener('change', function(event) {
        let url = window.URL.createObjectURL(event.target.files[0])
        // console.log(url)
        imgSelect.src = url
    })
</script>