<?php
include 'backend_slicePart_inc/header.php';
include '../include/env.php';
$query = "SELECT * FROM feature_section";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_all($exu, 1);

// print_r($results);
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Icon Tag</th>
            <th scope="col"> Icon</th>
            <th scope="col">Feature Title</th>
            <th scope="col">Feature Description</th>
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
                <td><?= htmlentities($result['white_card_icon']) ?></td>
                <td><?= $result['white_card_icon'] ?></td>
                <td><?= $result['white_card_title'] ?></td>
                <td><?= $result['white_card_des'] ?></td>
                <td>
                    <span style="font-size:10px" class="<?= $result['status'] == 0 ? "bg-danger" : "bg-success" ?> badge text-light"><?= $result['status'] == 0 ? "De-Active" : "Active" ?></span>
                </td>
                <td>
                    <a class="btn btn-primary" style="font-size:smaller" href="../controller/whyfeature_section_status.php?id=<?= $result['id'] ?>"><?= $result['status'] != 0 ? "De-Active" : "Active" ?></a></a>
                    <a class="btn btn-info " style="font-size:smaller;margin:5px 5px" href="./edit_whyfeature_section.php?id=<?= $result['id'] ?>">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a></a>
                    <a class="btn btn-danger deletebanner" style="font-size:smaller" href="../controller/delete_whyfeature_section.php?id=<?= $result['id'] ?>">Delete</a></a>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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