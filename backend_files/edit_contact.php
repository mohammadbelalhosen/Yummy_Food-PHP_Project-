<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM contact_section WHERE id=$id";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_assoc($exu);
?>
<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Contact</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_contact.php" method="POST" enctype="multipart/form-data">
            <input type="number" class="d-none" name="id" value="<?= $results['id'] ?>">
            <button type="submit" class="btn btn-primary float-right" name="submit">Update Contact</button>
            <label class="w-100" for="">Enter Location Link<span class="text-danger">*</span>
                <input type="text" class="form-control" name="location_link" value="<?= $results['location_link'] ?>">
            </label>

            <label for="" class="w-100">Enter Address<span class="text-danger">*</span>
                <textarea name="address" class="form-control"><?= $results['address'] ?></textarea>
            </label>

            <label for="" class="w-100">Enter Email<span class="text-danger">*</span>
                <input type="email" class="form-control" name="email" value="<?= $results['email'] ?>">
            </label>

            <label for="" class="w-100">Enter Phone Number<span class="text-danger">*</span>
                <input type="number" class="form-control" name="number" value="<?= $results['number'] ?>">
            </label>

            <label for="" class="w-100">Enter Opening Day<span class="text-danger">*</span>
                <input type="text" class="form-control" name="open_day" value="<?= $results['open_day'] ?>">
            </label>

            <label class="w-100 " for="">Enter Restaurent Opening Time <span class="text-danger">*</span>
                <input type="time" class="form-control" name="opening_time" value="<?= $results['opening_time'] ?>">
            </label>

            <label for="" class="w-100">Enter Restaurent Closing Time <span class="text-danger">*</span>
                <input type="time" class="form-control" name="closing_time" value="<?= $results['closing_time'] ?>">
            </label>


            <label for="" class="w-100">Enter Closed Day<span class="text-danger">*</span>
                <input type="text" class="form-control" name="close_day" value="<?= $results['close_day'] ?>">
            </label>

            <label for="" class="w-100">Enter Facebook Link<span class="text-danger">*</span>
                <input type="text" class="form-control" name="social_link" value="<?= $results['social_link'] ?>">
            </label>


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