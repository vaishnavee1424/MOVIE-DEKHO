<?php include('connect.php') ?>
<?php include('header.php') ?>

<main class="main">
    <!-- Featured Services Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Our Theater</h2>
      </div><!-- End Section Title -->

      <?php
      // Corrected SQL query
      $sql =  "SELECT theater.*, movies.*, categories.catname
      FROM theater
      INNER JOIN movies ON movies.movieid = theater.movieid
      INNER JOIN categories ON categories.catid = movies.catid
      ORDER BY theater.theaterid DESC";;
      
      // Execute query and check for errors
      $res = mysqli_query($con, $sql);
      if (!$res) {
          die("Query failed: " . mysqli_error($con));
      }

      if (mysqli_num_rows($res) > 0) {
          while ($data = mysqli_fetch_array($res)) {
      ?>
              <div class="container">
                  <div class="row gy-4">
                      <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                          <div class="team-member">
                              <div class="member-img">
                                  <img src="admin/uploads/<?= $data['image'] ?>" style="height:350px !important;width:300px !important;">
                                  <div class="social">
                                      <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank" class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                                  </div>
                              </div>
                              <div class="member-info">
                              
                                  <h6><?= $data['theater_name'] ?></h6>
                                  <h7><?= $data['title'] ?></span></h7>
                                  <span><br>Timing : <?= $data['timing'] ?></span></span>
                                  <span>Date : <?= $data['date'] ?></span></span>
                                  <span>Location :<?= $data['location'] ?></span></span>
                                  <h11>Per Ticket : Rs.<?= $data['price'] ?></h11><br>
                                  <a href="booking.php?theaterid=<?=$data['theaterid']?>" class="btn btn-primary">Book Now</a>
                                  
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      <?php
          }
      }
      ?>
    </section><!-- /About Section -->
</main>