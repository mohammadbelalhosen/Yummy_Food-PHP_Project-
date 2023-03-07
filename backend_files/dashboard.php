<?php
include('backend_slicePart_inc/header.php'); //include dashboard heading part

//fetch for banner

$query = "SELECT * FROM add_banner_part WHERE status = '1'";
$query = "SELECT * FROM add_banner_part";
$ex = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($ex);
$fetchs = mysqli_fetch_all($ex, 1);

//fetch for catagory meny
$select = "SELECT * FROM catagories WHERE status = '1'";
// $select = "SELECT catagories.id,catagories.catagory,catagories.status FROM catagories INNER JOIN foods ON catagories.id = foods.catagory_id WHERE catagories.status='0' GROUP BY catagories.id"; //inner join query for use shortcut but we use status button for use this feature
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);

//fetch for foods

$select_foods = "SELECT * FROM foods";
$datas = mysqli_query($conn, $select_foods);
$foods = mysqli_fetch_all($datas, 1);



//fetch for about section

$select_about = "SELECT * FROM about_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_about);
$abouts = mysqli_fetch_assoc($datas);


//fetch for chefs section

$select_chefs = "SELECT * FROM chefs_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_chefs);
$chefs = mysqli_fetch_all($datas, 1);


//fetch for contact section

$select_contact = "SELECT * FROM contact_section";
$datas = mysqli_query($conn, $select_contact);
$contact = mysqli_fetch_assoc($datas);


//fetch for event section

$select_event = "SELECT * FROM event_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_event);
$events = mysqli_fetch_all($datas, 1);


//fetch for gallery section

$select_gallery = "SELECT * FROM gallery_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_gallery);
$galleries = mysqli_fetch_all($datas, 1);


//fetch for table image section

$select_table = "SELECT * FROM tableimg_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_table);
$table = mysqli_fetch_assoc($datas);

//fetch for table order section

$select_order = "SELECT * FROM table_book_orders";
$datas = mysqli_query($conn, $select_order);
$orders = mysqli_fetch_all($datas, 1);


//fetch for counter section

$select_counter = "SELECT counter,counter_name FROM counter_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_counter);
$counters = mysqli_fetch_all($datas, 1);

//fetch for Why section

$select_why = "SELECT * FROM why_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_why);
$why = mysqli_fetch_assoc($datas);

//fetch for Why Feature section

$select_feature = "SELECT * FROM feature_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_feature);
$features = mysqli_fetch_all($datas, 1);

//fetch for Other  section

$select_other = "SELECT * FROM other_section WHERE status = '1'";
$datas = mysqli_query($conn, $select_other);
$other = mysqli_fetch_assoc($datas);

?>

<!-- <div style="text-align:center"><img style="width:1200px;height:450px;border:1px solid black" src="../assets\img\gallery\gg.png" alt=""></div> -->
<!-- <h1 class="h3 mb-4 text-gray-800">Welcome To Dashboard <?= ucwords($_SESSION['auth']['fName']) . ' ' . ucwords($_SESSION['auth']['lName']) ?></h1> -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <div class="h3 text-primary "> <strong>Total Number Of Data For All Section
                </strong>&nbsp;<i class="fa-sharp fa-solid fa-right-long"></i>
        </h1>
    </div>

    <div class="row">

        <!-- For Banner-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                Total Banners</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($fetchs) + 1 ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- For food menu-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                Total Catagories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($results) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- For food -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                Total Foods</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($foods) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- For event -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                Total Events </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($events) + 1 ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- For gallery -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                Total Galleries </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($galleries) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- For chefs -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                Total Chefs </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($chefs) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- For order -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                Total Orders </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($orders) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<?php
include('backend_slicePart_inc/footer.php'); //include dashboard footer part
?>