 <form action="./controller/book_table.php" method="post" style="padding: 40px;">
   <div class="row gy-4">
     <div class="col-lg-4 col-md-6">
       <input type="text" name="name" class="form-control" placeholder="Your Name">
     </div>
     <div class="col-lg-4 col-md-6">
       <input type="text" class="form-control" name="email" id="email" placeholder="Your Email">
     </div>
     <div class="col-lg-4 col-md-6">
       <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone">
     </div>
     <div class="col-lg-4 col-md-6">
       <input type="text" name="date" class="form-control" id="date" placeholder="Date">
     </div>
     <div class="col-lg-4 col-md-6">
       <input type="text" class="form-control" name="time" id="time" placeholder="Time">
     </div>
     <div class="col-lg-4 col-md-6">
       <input type="text" class="form-control" name="people" id="people" placeholder="# of people">
     </div>
   </div>
   <div class="form-group mt-3">
     <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
   </div>
   <div class="text-center mt-3">
     <button style="background: var(--color-primary);
  border: 0;
  padding: 14px 60px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;" type="submit" name='submit' value="submitted">Book a Table</button>
   </div>
 </form>