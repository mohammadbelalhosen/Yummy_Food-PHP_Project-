<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
// $select = "SELECT * FROM foods ";
$select = "SELECT f.id,f.food_name,f.food_des,f.food_price,f.food_img_name,f.catagory_id,f.food_discount,c.catagory FROM foods f INNER JOIN catagories c ON f.catagory_id=c.id";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);


?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Food Name</th>
            <th scope="col">Food Details</th>
            <th scope="col">Food Price</th>
            <th scope="col">Food Discount</th>
            <th scope="col">Food Image</th>
            <th scope="col">Catarory Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $key => $result) {
        ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $result['food_name'] ?></td>
                <td><?= substr($result['food_des'], 1, 25) . "..." ?></td>
                <td><?= $result['food_price'] ?></td>
                <td><?= isset($result['food_discount']) ? $result['food_discount'] : '' ?></td>
                <td><img style="width:150px;" src="<?= './uploads/foods/' . $result['food_img_name'] ?>" alt=""></td>
                <td class="text-success font-weight-bold"><?= $result['catagory'] ?></td>
                <td>
                    <a class="btn btn-info" style="font-size:smaller" href="./food_edit.php?id=<?= $result['id'] ?>">Edit</a></a>
                    <a class="btn btn-danger deletebanner" style="font-size:smaller" href="../controller/food_delete.php?id=<?= $result['id'] ?>">Delete</a></a>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>


<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['success']);
unset($_SESSION['delete']);

?>