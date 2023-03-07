<?php
include './backend_slicePart_inc/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Why Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_why_section.php" method="POST">
            <div>
                <button type="submit" class="btn btn-primary float-right" name="submit">Add Why Card</button>
                <label for="" class="w-100">Enter Why Card Description<span class="text-danger">*</span>
                    <textarea name="red_card_des" class="form-control"></textarea>
                </label>
                <?php
                if (isset($_SESSION['errors']['red_card_des_er'])) {
                ?>
                    <span class="text-danger">
                        <?= $_SESSION['errors']['red_card_des_er'] ?>
                    </span>
                <?php
                }
                ?>

            </div>

    </div>

    </form>
</div>

<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);

?>