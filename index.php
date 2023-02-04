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
  // var_dump($foods);
  // exit();
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
         <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
           <div class="call-us position-absolute">
             <h4>Book a Table</h4>
             <p>+880 1989 554885</p>
           </div>
         </div>
         <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
           <div class="content ps-0 ps-lg-5">
             <p class="fst-italic">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
               magna aliqua.
             </p>
             <ul>
               <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
               <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
               <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
             </ul>
             <p>
               Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
               velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
             </p>

             <div class="position-relative mt-4">
               <img src="assets/img/about-2.jpg" class="img-fluid" alt="">
               <a href="https://www.youtube.com/watch?v=SzH9w4bpIqM" class="glightbox play-btn"></a>
             </div>
           </div>
         </div>
       </div>

     </div>
   </section><!-- End About Section -->

   <!-- ======= Why Us Section ======= -->

   <!-- End Why Us Section -->

   <!-- ======= Stats Counter Section ======= -->

   <!-- End Stats Counter Section -->

   <!-- ======= Menu Section ======= -->
   <section id="menu" class="menu">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>Our Menu</h2>
         <p>Check Our <span>Yummy Menu</span></p>
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
                     <p class="price">
                       <?= 'BDT  -  ' . $food['food_price'] . ' TK' ?>
                     </p>
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
         <p>Share <span>Your Moments</span> In Our Restaurant</p>
       </div>

       <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
         <div class="swiper-wrapper">

           <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-1.jpg)">
             <h3>Custom Parties</h3>
             <div class="price align-self-start">BDT 9000 TK</div>
             <p class="description">
               Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere. Enim facilis veritatis id est rem repudiandae nulla expedita quas.
             </p>
           </div><!-- End Event item -->

           <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/event10.jpg)">
             <h3>Private Parties</h3>
             <div class="price align-self-start">BDT 10000 TK</div>
             <p class="description">
               In delectus sint qui et enim. Et ab repudiandae inventore quaerat doloribus. Facere nemo vero est ut dolores ea assumenda et. Delectus saepe accusamus aspernatur.
             </p>
           </div><!-- End Event item -->

           <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-3.jpg)">
             <h3>Birthday Parties</h3>
             <div class="price align-self-start">BDT 12000 TK</div>
             <p class="description">
               Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.
             </p>
           </div><!-- End Event item -->

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

         <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
           <div class="chef-member">
             <div class="member-img">
               <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
               <div class="social">
                 <a href=""><i class="bi bi-twitter"></i></a>
                 <a href=""><i class="bi bi-facebook"></i></a>
                 <a href=""><i class="bi bi-instagram"></i></a>
                 <a href=""><i class="bi bi-linkedin"></i></a>
               </div>
             </div>
             <div class="member-info">
               <h4>Walter White</h4>
               <span>Master Chef</span>
               <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
             </div>
           </div>
         </div><!-- End Chefs Member -->

         <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
           <div class="chef-member">
             <div class="member-img">
               <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
               <div class="social">
                 <a href=""><i class="bi bi-twitter"></i></a>
                 <a href=""><i class="bi bi-facebook"></i></a>
                 <a href=""><i class="bi bi-instagram"></i></a>
                 <a href=""><i class="bi bi-linkedin"></i></a>
               </div>
             </div>
             <div class="member-info">
               <h4>Watson Maxwell</h4>
               <span>Patissier</span>
               <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
             </div>
           </div>
         </div><!-- End Chefs Member -->

         <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
           <div class="chef-member">
             <div class="member-img">
               <img src="assets/img/chefs/chefs14.jpg" class="img-fluid" alt="">
               <div class="social">
                 <a href=""><i class="bi bi-twitter"></i></a>
                 <a href=""><i class="bi bi-facebook"></i></a>
                 <a href=""><i class="bi bi-instagram"></i></a>
                 <a href=""><i class="bi bi-linkedin"></i></a>
               </div>
             </div>
             <div class="member-info">
               <h4>Robert Devilla</h4>
               <span>Cook</span>
               <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
             </div>
           </div>
         </div><!-- End Chefs Member -->

       </div>

     </div>
   </section><!-- End Chefs Section -->

   <!-- ======= Book A Table Section ======= -->
   <section id="book-a-table" class="book-a-table">
     <div class="container" data-aos="fade-up">

       <div class="section-header">
         <h2>Book A Table</h2>
         <p>Book <span>Your Stay</span> With Us</p>
       </div>

       <div class="row g-0">

         <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

         <div class="col-lg-8 d-flex align-items-center reservation-form-bg">

           <!-- book a table form start -->

           <form action="./controller/book_table.php" method="post" style="padding: 40px;">
             <div class="row gy-4">
               <div class="col-lg-4 col-md-6">
                 <input type="text" name="name" class="form-control" value="<?= isset($_SESSION['old_data']['name']) ? $_SESSION['old_data']['name'] : '' ?>" placeholder="Your Name">
                 <?php
                  if (isset($_SESSION['errors']['name_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['name_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <input type="email" class="form-control" name="email" id="email" value="<?= isset($_SESSION['old_data']['email']) ? $_SESSION['old_data']['email'] : '' ?>" placeholder="Your Email">
                 <?php
                  if (isset($_SESSION['errors']['email_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['email_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <input type="phone" class="form-control" name="phone" id="phone" value="<?= isset($_SESSION['old_data']['phone']) ? $_SESSION['old_data']['phone'] : '' ?>" placeholder="Your Phone">
                 <?php
                  if (isset($_SESSION['errors']['phone_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['phone_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <input type="text" name="date" class="form-control" id="date" value="<?= isset($_SESSION['old_data']['date']) ? $_SESSION['old_data']['date'] : '' ?>" placeholder="Date">
                 <?php
                  if (isset($_SESSION['errors']['date_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['date_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <input type="text" class="form-control" name="time" id="time" value="<?= isset($_SESSION['old_data']['time']) ? $_SESSION['old_data']['time'] : '' ?>" placeholder="Time">
                 <?php
                  if (isset($_SESSION['errors']['time_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['time_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
               <div class="col-lg-4 col-md-6">
                 <input type="number" class="form-control" name="total_people" value="<?= isset($_SESSION['old_data']['total_people']) ? $_SESSION['old_data']['total_people'] : '' ?>" placeholder="# of people">
                 <?php
                  if (isset($_SESSION['errors']['total_people_error'])) {
                  ?>
                   <span class="text-danger"><?= "*" . $_SESSION['errors']['total_people_error'] ?></span>
                 <?php
                  }
                  ?>
               </div>
             </div>
             <div class="form-group mt-3">
               <textarea class="form-control" name="message" rows="5" placeholder="Message"><?= isset($_SESSION['old_data']['message']) ? $_SESSION['old_data']['message'] : '' ?></textarea>
               <?php
                if (isset($_SESSION['errors']['message_error'])) {
                ?>
                 <span class="text-danger"><?= "*" . $_SESSION['errors']['message_error'] ?></span>
               <?php
                }
                ?>
             </div>
             <div class="text-center mt-3">
               <button style="background: var(--color-primary);
  border: 0;
  padding: 14px 60px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;margin-bottom: 30px;" type="submit" name='submit' value="submitted">Book a Table</button>
             </div>
             <?php
              if (isset($_SESSION['success'])) {
              ?>
               <div style="text-align: center;background: #ce1212;padding: 20px;color:white;"><?= $_SESSION['success'] ?></div>
             <?php
              }
              ?>
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
         <p>Check <span>Our Gallery</span></p>
       </div>

       <div class="gallery-slider swiper">
         <div class="swiper-wrapper align-items-center">
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery12.jpg"><img src="assets/img/gallery/gallery12.jpg" class="img-fluid" alt=""></a></div>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery13.jpg"><img src="assets/img/gallery/gallery13.jpg" class="img-fluid" alt=""></a></div>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery14.jpg"><img src="assets/img/gallery/gallery14.jpg" class="img-fluid" alt=""></a></div>
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
         <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.0562945018696!2d91.8196032148395!3d22.351503146682834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd9b474f4ac77%3A0xefd8c0a0cf2fb412!2z4KaV4KeB4Kaf4KeB4Kau4Kas4Ka-4Kec4Ka_IOCmsOCnh-CmuOCnjeCmpOCni-CmsOCmvuCmgSAo4KaT4Kef4Ka-4Ka44Ka-IOCmtuCmvuCmluCmvik!5e0!3m2!1sbn!2sbd!4v1675132862055!5m2!1sbn!2sbd" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div><!-- End Google Maps -->

       <div class="row gy-4">

         <div class="col-md-6">
           <div class="info-item  d-flex align-items-center">
             <i class="icon bi bi-map flex-shrink-0"></i>
             <div>
               <h3>Our Address</h3>
               <p>4100, 146, CDA Ave, Wasa Moor, চট্টগ্রাম 4100</p>
             </div>
           </div>
         </div><!-- End Info Item -->

         <div class="col-md-6">
           <div class="info-item d-flex align-items-center">
             <i class="icon bi bi-envelope flex-shrink-0"></i>
             <div>
               <h3>Email Us</h3>
               <p>unknown66775@gmail.com.com</p>
             </div>
           </div>
         </div><!-- End Info Item -->

         <div class="col-md-6">
           <div class="info-item  d-flex align-items-center">
             <i class="icon bi bi-telephone flex-shrink-0"></i>
             <div>
               <h3>Call Us</h3>
               <p>+880 1558955488</p>
             </div>
           </div>
         </div><!-- End Info Item -->

         <div class="col-md-6">
           <div class="info-item  d-flex align-items-center">
             <i class="icon bi bi-share flex-shrink-0"></i>
             <div>
               <h3>Opening Hours</h3>
               <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                 <strong>Sunday:</strong> Closed
               </div>
             </div>
           </div>
         </div><!-- End Info Item -->

       </div>

       <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
         <div class="row">
           <div class="col-xl-6 form-group">
             <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
           </div>
           <div class="col-xl-6 form-group">
             <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
           </div>
         </div>
         <div class="form-group">
           <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
         </div>
         <div class="form-group">
           <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
         </div>
         <div class="my-3">
           <div class="loading">Loading</div>
           <div class="error-message"></div>
           <div class="sent-message">Your message has been sent. Thank you!</div>
         </div>
         <div class="text-center"><button type="submit">Send Message</button></div>
       </form> -->


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
  ?>