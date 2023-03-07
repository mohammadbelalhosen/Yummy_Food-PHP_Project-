<?php
include './backend_slicePart_inc/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Other Item Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_other_section.php" method="POST">
            <div class="row">

                <div>
                    <button type="submit" class="btn btn-primary float-right" name="submit">Add Item</button>

                    <label for="" class="w-100">Enter Google Apps Script Url :<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="url">
                    </label>

                    <label for="" class="w-100">Enter Restaurent Name : <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="r_name">
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