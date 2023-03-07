<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM event_section WHERE id = $id";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_assoc($exu);
?>
<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Event Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_event_section.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <input type="number" class="d-none" name="id" value="<?= $results['id'] ?>">
                    <input type="text" class="d-none" name="image_name" value="<?= $results['event_img'] ?>">
                    <!-- //*if click the image then choose img file  -->
                    <label for="img_banner">
                        <img class="img" src="./uploads/event_section/<?= $results['event_img'] ?>" style="width: 100%;">
                        <input type="file" class="d-none imageInput" name="event_img" id="img_banner" value="<?= $results['event_img'] ?>">
                    </label>
                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Update Event</button>
                    <label class="w-100" for="">Enter Event Title<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="event_title" value="<?= $results['event_title'] ?>">
                    </label>

                    <label for="" class="w-100">Enter Event Description<span class="text-danger">*</span>
                        <textarea name="event_des" class="form-control"><?= $results['event_des'] ?></textarea>
                    </label>

                    <label for="" class="w-100">Enter Event Price<span class="text-danger">*</span>
                        <input type="number" class="form-control" name="event_price" value="<?= $results['event_price'] ?>">
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