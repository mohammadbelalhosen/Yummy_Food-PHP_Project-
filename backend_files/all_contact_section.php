<?php
include 'backend_slicePart_inc/header.php';
include '../include/env.php';
$query = "SELECT * FROM contact_section";
$exu = mysqli_query($conn, $query);
$results = mysqli_fetch_all($exu, 1);

// print_r($results);
?>

<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;bottom:70px;right:20px">
        <div class="toast-header">
            <strong class="me-auto">Delete Contact</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>
<?php
}
?>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Location Link</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Opening Day</th>
            <th scope="col">Opening Time</th>
            <th scope="col">Closed Day</th>
            <th scope="col">Social Link</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $key => $result) {
        ?>
            <tr>
                <th scope="row"><?= ++$key ?></th>
                <td><?= substr($result['location_link'],0,10) . '...' ?></td>
                <td><?= substr($result['address'],0,10) . '...' ?></td>
                <td><?= substr($result['email'],0,10) . '...' ?></td>
                <td><?='+880 ' . substr( $result['number'],0,5) ?></td>
                <td><?= $result['open_day'] ?></td>
                <td><?= $result['open_time'] ?></td>
                <td><?= $result['close_day'] ?></td>
                <td><?= substr($result['social_link'],0,10) . '...' ?></td>
                <td>
                    <a class="btn btn-info" style="font-size:smaller" href="./edit_contact.php?id=<?= $result['id'] ?>">Edit</a></a>
                    <a class="btn btn-danger deletebanner" style="font-size:smaller" href="../controller/delete_contact.php?id=<?= $result['id'] ?>">Delete</a></a>
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
    ?>