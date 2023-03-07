 <?php
  session_start();
  include('./fronend_slicePart_inc/header.php'); //include header part

  //fetch for banner
  include './include/env.php';
  $query = "SELECT * FROM add_banner_part WHERE status = '1'";
  $ex = mysqli_query($conn, $query);
  $fetch = mysqli_fetch_assoc($ex);

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


  // time formate
  $open = DateTime::createFromFormat('H:i', $contact['opening_time']);
  $open_d = ($open->format('h:i A')); // output show
  $close = DateTime::createFromFormat('H:i', $contact['closing_time']);
  $close_d = ($close->format('h:i A')); // output show

  ?>



 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero d-flex align-items-center section-bg">
   <div class="container">
     <div class="row justify-content-between gy-5">
       <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
         <h2 data-aos="fade-up"><?= $fetch['banner_title'] ?></h2>
         <p data-aos="fade-up" data-aos-delay="100"><?= $fetch['banner_des'] ?></p>
         <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
           <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>
           <a href="<?= $fetch['video_link'] ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
         </div>
       </div>
       <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
         <img src="<?= './backend_files/uploads/' . $fetch['img_banner'] ?>" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
       </div>
     </div>
   </div>
 </section><!-- End Hero Section -->

 <main id="main">

   <!-- ======= About Section ======= -->
   <section id="about" class="about">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>About Us</h2>
         <p>Learn More <span>About Us</span></p>
       </div>

       <div class="row gy-4">
         <div class="col-lg-7 position-relative about-img" style="background-image: url(./backend_files/uploads/about_section/about_bannera_img/<?= $abouts['banner_img'] ?>) ;" data-aos="fade-up" data-aos-delay="150">
           <div class="call-us position-absolute">
             <h4>Book a Table</h4>
             <p><?= '+880 ' . $abouts['number'] ?></p>
           </div>
         </div>
         <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
           <div class="content ps-0 ps-lg-5">
             <p class="fst-italic">
               <?= $abouts['about_desone'] ?>
             </p>
             <ul>
               <li><i class="bi bi-check2-all"></i> <?= $abouts['listone'] ?></li>
               <li><i class="bi bi-check2-all"></i><?= $abouts['listtwo'] ?></li>
               <li><i class="bi bi-check2-all"></i><?= $abouts['listthree'] ?></li>
             </ul>
             <p>
               <?= $abouts['about_destwo'] ?>
             </p>

             <div class="position-relative mt-4">
               <img src="./backend_files/uploads/about_section/tharmnail_img/<?= $abouts['tharmnail_img'] ?>" class="img-fluid" alt="">
               <a href="<?= $abouts['video_link'] ?>" class="glightbox play-btn"></a>
             </div>
           </div>
         </div>
       </div>

     </div>
   </section><!-- End About Section -->

   <!-- ======= Why Us Section ======= -->


   <section id="why-us" class="why-us section-bg">
     <div class="container" data-aos="fade-up">

       <div class="row gy-4">

         <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
           <div class="why-box">
             <h3><?= "Why Choose " . $other['r_name'] . " ?" ?></h3>
             <p>
               <?= $why['red_card_des'] ?>
             </p>
             <div class="text-center">
               <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
             </div>
           </div>
         </div><!-- End Why Box -->


         <div class="col-lg-8 d-flex align-items-center">
           <div class="row gy-4">

             <?php
              foreach ($features as $feature) {
              ?>


               <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                 <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                   <!-- <i class="bi bi-clipboard-data"></i> -->
                   <?= $feature['white_card_icon'] ?>
                   <h4><?= $feature['white_card_title'] ?></h4>
                   <p><?= $feature['white_card_des'] ?></p>
                 </div>
               </div><!-- End Icon Box -->
             <?php
              }
              ?>



           </div>
         </div>

       </div>

     </div>
   </section>
   <!-- End Why Us Section -->



   <!-- ======= Stats Counter Section ======= -->

   <!-- ======= Stats Counter Section ======= -->
   <section id="stats-counter" class="stats-counters">
     <div class="container" data-aos="zoom-out">

       <div class="row gy-4">

         <div class="col-lg-3 col-md-6">
           <div class="stats-item text-center w-100 h-100">
             <span data-purecounter-start="0" data-purecounter-end="<?= count($foods) ?>" data-purecounter-duration="1" class="purecounter"></span>
             <p>Present Foods</p>
           </div>
         </div>
         <!-- End Stats Item -->

         <div class="col-lg-3 col-md-6">
           <div class="stats-item text-center w-100 h-100">
             <span data-purecounter-start="0" data-purecounter-end="<?= count($chefs) ?>" data-purecounter-duration="1" class="purecounter"></span>
             <p>Present Chefs</p>
           </div>
         </div><!-- End Stats Item -->

         <div class="col-lg-3 col-md-6">
           <div class="stats-item text-center w-100 h-100">
             <span data-purecounter-start="0" data-purecounter-end="<?= count($orders)  ?>" data-purecounter-duration="1" class="purecounter"></span>
             <p>All Orders</p>
           </div>
         </div><!-- End Stats Item -->

         <?php
          foreach ($counters as $counter) {
          ?>
           <div class="col-lg-3 col-md-6">
             <div class="stats-item text-center w-100 h-100">
               <span data-purecounter-start="0" data-purecounter-end="<?= $counter['counter'] ?>" data-purecounter-duration="1" class="purecounter"></span>
               <p><?= $counter['counter_name'] ?></p>
             </div>
           </div><!-- End Stats Item -->
         <?php
          }
          ?>


       </div>

     </div>
   </section><!-- End Stats Counter Section -->

   <!-- End Stats Counter Section -->

   <!-- ======= Menu Section ======= -->
   <section id="menu" class="menu">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>Our Menu</h2>
         <p>Check Our <span>Menu $ Food</span> Price</p>
       </div>

       <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

         <?php
          foreach ($results as $key => $result) {
          ?>
           <li class="nav-item">
             <a class="nav-link <?= $key == 0 ? "active show" : '' ?>" data-bs-toggle="tab" data-bs-target="#menu-<?= str_replace(' ', '-', $result['catagory']) ?>">
               <h4><?= $result['catagory'] ?></h4>
             </a>
           </li><!-- End tab nav item -->
         <?php
          }
          ?>
       </ul>

       <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

         <?php
          foreach ($results as $no => $result) {
          ?>

           <div class="tab-pane fade <?= $no == 0 ? "active show" : '' ?>" id="menu-<?= str_replace(' ', '-', $result['catagory']) ?>">

             <div class="tab-header text-center">
               <p>Menu</p>
               <h3><?= $result['catagory'] ?></h3>
             </div>
             <div class="row gy-5">

               <?php
                foreach ($foods as $food) {
                  if ($food['catagory_id'] == $result['id']) {
                ?>

                   <div class="col-lg-4 menu-item">
                     <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="./backend_files/uploads/foods/<?= $food['food_img_name'] ?>" class="menu-img img-fluid" alt=""></a>
                     <h4><?= $food['food_name'] ?></h4>
                     <p class="ingredients">
                       <?= $food['food_des'] ?>
                     </p>

                     <?php
                      if ($food['food_discount'] > 0) {
                      ?>
                       <p class="price" style="font-size:17px">
                         <del> <?= 'BDT  -  ' . $food['food_price'] . ' TK' ?> </del>
                       </p>
                       <p class="price" style="font-size:19px">
                         <?= 'BDT  -  ' . $food['food_discount'] . ' TK' ?>
                       </p>
                     <?php
                      }
                      ?>

                     <?php
                      if ($food['food_price'] > 0 and $food['food_discount'] == 0) {
                      ?>
                       <p class="price" style="font-size:17px">
                         <?= 'BDT  -  ' . $food['food_price'] . ' TK' ?>
                       </p>

                     <?php
                      }
                      ?>

                   </div>
               <?php
                  }
                }
                ?>

             </div>

           </div>
         <?php

          }
          ?>
       </div>

     </div>
   </section><!-- End Menu Section -->

   <!-- ======= Testimonials Section ======= -->

   <!-- End Testimonials Section -->

   <!-- ======= Events Section ======= -->
   <section id="events" class="events">
     <div class="container-fluid" data-aos="fade-up">

       <div class="section-header">
         <h2>Events</h2>
         <p>Share <span>Many Moments</span> In Our Restaurant</p>
       </div>

       <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
         <div class="swiper-wrapper">

           <?php
            foreach ($events as $event) {
            ?>
             <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(./backend_files/uploads/event_section/<?= $event['event_img'] ?>)">
               <h3><?= $event['event_title'] ?></h3>
               <div class="price align-self-start"><?= 'BDT ' . $event['event_price'] . ' TK' ?></div>
               <p class="description">
                 <?= $event['event_des'] ?>
               </p>
             </div><!-- End Event item -->
           <?php
            }
            ?>


         </div>
         <div class="swiper-pagination"></div>
       </div>

     </div>
   </section><!-- End Events Section -->

   <!-- ======= Chefs Section ======= -->
   <section id="chefs" class="chefs section-bg">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>Chefs</h2>
         <p>Our <span>Proffesional</span> Chefs</p>
       </div>

       <div class="row gy-4">

         <?php
          foreach ($chefs as $chef) {
          ?>
           <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
             <div class="chef-member">
               <div class="member-img">
                 <img src="./backend_files/uploads/Chefs_section/chefs_img/<?= $chef['chefs_img'] ?>" class="img-fluid" alt="">
                 <div class="social">
                   <a href="<?= $chef['profile_link'] ?>"><i class="bi bi-facebook"></i></a>
                   <a href="<?= $chef['profile_link'] ?>"><i class="bi bi-twitter"></i></a>
                 </div>
               </div>
               <div class="member-info">
                 <h4><?= $chef['chefs_name'] ?></h4>
                 <span><?= $chef['job_title'] ?></span>
                 <p><?= $chef['chefs_des'] ?></p>
               </div>
             </div>
           </div><!-- End Chefs Member -->

         <?php
          }
          ?>





       </div>

     </div>
   </section><!-- End Chefs Section -->

   <!-- ======= Book A Table Section ======= -->
   <section id="book-a-table" class="book-a-table">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>Book A Table</h2>
         <p>Book <span>Your Table & Stay</span> With Us</p>
       </div>

       <div class="row g-0">

         <div class="col-lg-4 reservation-img" style="background-image: url(./backend_files/uploads/tableimg_section/<?= $table['table_image'] ?>);" data-aos="zoom-out" data-aos-delay="200"></div>

         <div class="col-lg-8 d-flex align-items-center reservation-form-bg">

           <!-- book a table form start -->

           <form action="./controller/book_table.php" method="post" style="padding: 40px;">

             <input class="d-none" type="text" name="subject" value="<?= $other['r_name'] . ' ' . 'Table Booked' ?>">
             <input class="d-none" type="text" name="body" value=" <?= "Your Table Has Been Booked Successfully . If you want to cancel your Table Order then click or go to  " . $other['r_name'] . " Website Contact Us section and you can Send Message or Call Us. Our Phone Number is : " . "  +880" . $contact['number'] . "  Thank You For Your Table Booking ! " ?> ">
             <div class="row gy-4">
               <div class="col-lg-4 col-md-6">
                 <label> Enter Your Name : </label>
                 <input type="text" name="name" value="<?= isset($_SESSION['old_data']['name']) ? $_SESSION['old_data']['name'] : '' ?>" placeholder="ex: Rakib Hosen">
                 <?php
                  if (isset($_SESSION['errors']['name_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['name_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <label class=""> Enter Your Email: </label>
                 <input type="email" name="email" id="email" value="<?= isset($_SESSION['old_data']['email']) ? $_SESSION['old_data']['email'] : '' ?>" placeholder="ex: example@gmail.com">
                 <?php
                  if (isset($_SESSION['errors']['email_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['email_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <label class=""> Enter Your Phone Number : </label>
                 <input type="phone" name="phone" id="phone" value="<?= isset($_SESSION['old_data']['phone']) ? $_SESSION['old_data']['phone'] : '' ?>" placeholder="ex: 016273479397">
                 <?php
                  if (isset($_SESSION['errors']['phone_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['phone_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <label class=""> <span class="text-danger">Closed Day:<?= $contact['close_day'] ?></span> Enter Date : </label>
                 <input type="date" name="date" id="date" value="<?= isset($_SESSION['old_data']['date']) ? $_SESSION['old_data']['date'] : '' ?>">
                 <?php
                  if (isset($_SESSION['errors']['date_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['date_error'] ?></span>
                 <?php
                  }
                  ?>

               </div>
               <div class="col-lg-4 col-md-6">
                 <label class=""> Enter Time : </label>


                 <input type="time" min="<?= $contact['opening_time'] ?>" max="<?= $contact['closing_time'] ?>" name="time" id="time" value="<?= isset($_SESSION['old_data']['time']) ? $_SESSION['old_data']['time'] : '' ?>">
                 <?php
                  if (isset($_SESSION['errors']['time_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['time_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <label class=""> Enter Total People : </label>

                 <input type="number" name="total_people" value="<?= isset($_SESSION['old_data']['total_people']) ? $_SESSION['old_data']['total_people'] : '' ?>" placeholder="# of people">
                 <?php
                  if (isset($_SESSION['errors']['total_people_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['total_people_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
             </div>

             <!-- <div class="form-group mt-3">
               <textarea class="form-control" name="message" rows="5" placeholder="Message"><?= isset($_SESSION['old_data']['message']) ? $_SESSION['old_data']['message'] : '' ?></textarea>
               <?php
                if (isset($_SESSION['errors']['message_error'])) {
                ?>
                 <span class="text-danger"><?= "*" . $_SESSION['errors']['message_error'] ?></span>
               <?php
                }
                ?>
             </div> -->

             <div class="text-center mt-3">
               <button style="background: var(--color-primary);
  border: 0;
  padding: 14px 60px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;margin-bottom: 30px;" type="submit" name='submit' value="submitted">Book a Table</button>
             </div>
             <div style="background: #ebdb18;
    border: 0;
    padding: 14px 60px;
    text-align: center;
    color: #000;
    font-weight: 500;
    transition: 0.4s;;"> If you want to cancel your Table Order then click or go to Contact Us section and you can Send Message or Call Us Within 2 Hour. Thank You ! <a href="#contact"> Click Hare</a> </div>

             <!-- <?php
                  if (isset($_SESSION['success'])) {
                  ?>
               <div style="text-align: center;background: var(--color-primary);padding: 20px;color:white; margin-top:10px"><?= $_SESSION['success'] ?></div>
             <?php
                  }
              ?> -->
           </form>
           <!-- book a table form end -->
         </div>
         <!-- End Reservation Form -->

       </div>

     </div>
   </section>

   <!-- End Book A Table Section -->

   <!-- ======= Gallery Section ======= -->
   <section id="gallery" class="gallery section-bg">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>gallery</h2>
         <p>Check Our <span>Rastaurant Gallery</span></p>
       </div>

       <div class="gallery-slider swiper">
         <div class="swiper-wrapper align-items-center">
           <?php
            foreach ($galleries as $gallery) {
            ?>
             <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="./backend_files/uploads/gallery_section/<?= $gallery['gallery_img'] ?>"><img src="./backend_files/uploads/gallery_section/<?= $gallery['gallery_img'] ?>" class="img-fluid" alt=""></a></div>
           <?php
            }
            ?>
         </div>
         <div class="swiper-pagination"></div>


       </div>

     </div>
   </section><!-- End Gallery Section -->

   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>Contact</h2>
         <p>Need Help? <span>Contact Us</span></p>
       </div>

       <div class="mb-3">
         <iframe style="border:0; width: 100%; height: 350px;" src="<?= $contact['location_link'] ?>" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div><!-- End Google Maps -->

       <div class="row gy-4">

         <div class="col-md-6">
           <div class="info-item  d-flex align-items-center">
             <i class="icon bi bi-map flex-shrink-0"></i>
             <div>
               <h3>Our Address</h3>
               <p><?= $contact['address'] ?></p>
             </div>
           </div>
         </div><!-- End Info Item -->

         <div class="col-md-6">
           <div class="info-item d-flex align-items-center">
             <i class="icon bi bi-envelope flex-shrink-0"></i>
             <div>
               <h3>Email Us</h3>
               <p><?= $contact['email'] ?></p>
             </div>
           </div>
         </div><!-- End Info Item -->

         <div class="col-md-6">
           <div class="info-item  d-flex align-items-center">
             <i class="icon bi bi-telephone flex-shrink-0"></i>
             <div>
               <h3>Call Us</h3>
               <p><?= '+880 ' . $contact['number'] ?></p>
             </div>
           </div>
         </div><!-- End Info Item -->

         <div class="col-md-6">
           <div class="info-item  d-flex align-items-center">
             <i class="icon bi bi-share flex-shrink-0"></i>
             <div>
               <h3>Opening Hours</h3>
               <div><strong><?= $contact['open_day'] . ':' ?></strong> <?= $open_d . '-' . $close_d . ';' ?>
                 <strong><?= $contact['close_day'] . ':' ?></strong> Closed
               </div>
             </div>
           </div>
         </div><!-- End Info Item -->

       </div>

       <form action="./controller/send_message.php" method="post" id="send-message" style="padding: 40px;
    margin-top: 50px;
    background: white;
    box-shadow: 0 0 30px rgb(0 0 0 / 8%);
">
         <div class="row">
           <div class="col-xl-6 form-group">
             <input type="text" name="message_name" id="name" value="<?= isset($_SESSION['old_data']['message_name']) ? $_SESSION['old_data']['message_name'] : '' ?>" placeholder="Your Name">
             <?php
              if (isset($_SESSION['errors']['message_name_error'])) {
              ?>
               <span class="text-danger"><?= "*" . $_SESSION['errors']['message_name_error'] ?></span>
             <?php
              }
              ?>
           </div>
           <div class="col-xl-6 form-group">
             <input type="email" name="message_email" id="email" value="<?= isset($_SESSION['old_data']['message_email']) ? $_SESSION['old_data']['message_email'] : '' ?>" placeholder="Your Email">
             <?php
              if (isset($_SESSION['errors']['message_email_error'])) {
              ?>
               <span class="text-danger"><?= "*" . $_SESSION['errors']['message_email_error'] ?></span>
             <?php
              }
              ?>
           </div>
         </div>
         <div class="form-group" style="margin:20px 0px">
           <input style="border-radius: 0;" type="text" name="subject" id="subject" value="<?= isset($_SESSION['old_data']['subject']) ? $_SESSION['old_data']['subject'] : '' ?>" placeholder="Subject">
           <?php
            if (isset($_SESSION['errors']['subject_error'])) {
            ?>
             <span class="text-danger"><?= "*" . $_SESSION['errors']['subject_error'] ?></span>
           <?php
            }
            ?>
         </div>
         <div class="form-group" style="margin-bottom: 20px;">
           <textarea id="message" name="message" rows="5" placeholder="Message"><?= isset($_SESSION['old_data']['message']) ? $_SESSION['old_data']['message'] : '' ?></textarea>
           <?php
            if (isset($_SESSION['errors']['message_error'])) {
            ?>
             <span class="text-danger"><?= "*" . $_SESSION['errors']['message_error'] ?></span>
           <?php
            }
            ?>
         </div>

         <div class="text-center"><button style="background: var(--color-primary);
  border: 0;
  padding: 14px 60px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;margin-bottom: 30px;" type="submit" name="submit">Send Message</button></div>

         <!-- <?php
              if (isset($_SESSION['message_success'])) {
              ?>
           <div style="text-align: center;background: var(--color-primary);padding: 20px;color:white; margin-top:10px"><?= $_SESSION['message_success'] ?></div>
         <?php
              }
          ?> -->
       </form>


       <!--End Contact Form -->

     </div>
   </section><!-- End Contact Section -->

 </main>
 <!-- End #main -->



 <!-- include footer part -->
 <?php
  include('./fronend_slicePart_inc/footer.php');
  unset($_SESSION['errors']);
  unset($_SESSION['old_data']);
  unset($_SESSION['success']);
  unset($_SESSION['message_success']);
  ?>