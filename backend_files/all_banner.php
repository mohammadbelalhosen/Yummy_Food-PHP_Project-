<?php
include 'backend_slicePart_inc/header.php';
include '../include/env.php';
$query = "SELECT * FROM add_banner_part";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_all($exu, 1);

// print_r($results);
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Banner Title</th>
            <th scope="col">Banner Description</th>
            <th scope="col">Video Link</th>
            <th scope="col">Banner Image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $key => $result) {
        ?>
            <tr>
                <th scope="row"><?= ++$key ?></th>
                <td><?= substr($result['banner_title'], 0, 10) . '...' ?></td>
                <td><?= substr($result['banner_des'], 0, 15) . '...' ?></td>
                <td><?= $result['video_link'] ?></td>
                <td><img style="width:150px;" src="<?= './uploads/' . $result['img_banner'] ?>" alt=""></td>
                <td>
                    <span style="font-size:10px" class="<?= $result['status'] == 0 ? "bg-danger" : "bg-success" ?> badge text-light"><?= $result['status'] == 0 ? "De-Active" : "Active" ?></span>
                </td>
                <td>
                    <a class="btn btn-primary" style="font-size:smaller" href="../controller/banner_status.php?id=<?= $result['id'] ?>"><?= $result['status'] != 0 ? "De-Active" : "Active" ?></a></a>
                    <a class="btn btn-info" style="font-size:smaller" href="./edit_banner.php?id=<?= $result['id'] ?>">Edit</a></a>
                    <a class="btn btn-danger deletebanner" style="font-size:smaller" href="../controller/banner_delete.php?id=<?= $result['id'] ?>">Delete</a></a>
                </td>
            </tr>

        <?php
        }

        // print_r(mysqli_num_rows($exu));
        if (mysqli_num_rows($exu) == 0) {
        ?>
            <tr>
                <td colspan="7">
                    <center>No Record Found !! </center>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<!-- sweet alert delete using javascript -->



<script>
    let bannerD = document.querySelectorAll('.deletebanner')
    for (let i = 0; i < bannerD.length; i++) {
        bannerD[i].addEventListener('click', function(e) {
            e.preventDefault();
            let url = e.target.href

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = url
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        })
    }
</script>

<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['success']);
unset($_SESSION['delete']);
?>