<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="container">
    <div class="row gy-3">
      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-geo-alt icon"></i>
        <div>
          <h4>Address</h4>
          <p>
            <?= $contact['address'] ?>
          </p>
        </div>

      </div>

      <div class="col-lg-4 col-md-7 footer-links d-flex">
        <i class="bi bi-telephone icon"></i>
        <div>
          <h4>Reservations</h4>
          <p>
            <strong>Phone : </strong><?= '+880 ' . $contact['number'] ?><br>
            <strong>Email : </strong> <?= $contact['email'] ?><br>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 footer-links d-flex">
        <i class="bi bi-clock icon"></i>
        <div>
          <h4>Opening Hours</h4>
          <p>
            <strong><?= $contact['open_day'] . ': ' ?></strong><?= $open_d . '-' . $close_d . ';' ?><br>
            <?= $contact['close_day'] . ' : Clossed' ?>
          </p>
        </div>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Follow Us</h4>
        <div class="social-links d-flex">
          <a href="<?= $contact['social_link'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="<?= $contact['social_link'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
          <!-- <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
        </div>
      </div>

    </div>
  </div>

  <div class="container">
    <div class="copyright">
      <span>This Website Created By Students Of Empac College Of Technology </span>
    </div>


</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- sweetalert cdn  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
if (isset($_SESSION['success'])) {
?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 7000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: "success",
      title: "<?= $_SESSION['success'] ?>",

    })
  </script>
<?php
}
?>

</body>

</html>