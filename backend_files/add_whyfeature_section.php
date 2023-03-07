<?php
include './backend_slicePart_inc/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Feature Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_whyfeature_section.php" method="POST">
            <div class="row">
            </div>
            <div>
                <button type="submit" class="btn btn-primary float-right" name="submit">Add Feature</button>

                <label for="" class="w-100">Enter Fontawesome Icon Tage<span class="text-danger">*</span>
                    <input type="text" class="form-control" name="white_card_icon" placeholder='ex : &lt;i class="fa-square-ring" &gt; &lt;/i&gt;'>
                </label>
                <?php
                if (isset($_SESSION['errors']['white_card_icon_er'])) {
                ?>
                    <span class="text-danger">
                        <?= $_SESSION['errors']['white_card_icon_er'] ?>
                    </span>
                <?php
                }
                ?>
                <label for="" class="w-100">Enter Feature Title<span class="text-danger">*</span>
                    <input type="text" class="form-control" name="white_card_title">
                </label>
                <?php
                if (isset($_SESSION['errors']['white_card_title_er'])) {
                ?>
                    <span class="text-danger">
                        <?= $_SESSION['errors']['white_card_title_er'] ?>
                    </span>
                <?php
                }
                ?>
                <label for="" class="w-100">Enter Feature Description<span class="text-danger">*</span>
                    <textarea name="white_card_des" class="form-control"></textarea>
                </label>
                <?php
                if (isset($_SESSION['errors']['white_card_des_er'])) {
                ?>
                    <span class="text-danger">
                        <?= $_SESSION['errors']['white_card_des_er'] ?>
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