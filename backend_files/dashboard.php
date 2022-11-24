<?php
include('backend_slicePart_inc/header.php'); //include dashboard heading part
?>

<h1 class="h3 mb-4 text-gray-800">Welcome To Dashboard <?=ucwords($_SESSION['auth']['fName']) . ' ' . ucwords($_SESSION['auth']['lName'])?></h1>



<?php
include('backend_slicePart_inc/footer.php'); //include dashboard footer part
?>