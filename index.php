<?php include('connect.php')?>
<?php include('header.php')?>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center aos-init aos-animate" data-aos="zoom-out">
            <h1>Welcome to <span>Movie Dekho</span></h1>
            <p>Presenting Movie Dekho , now you can book ticket with ease</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Let's Explore</a>
          </div>
        </div>
      </div>

    </div></section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Latest Movies</h2>
        <p><span>New Collection </span> <span class="description-title">2024</span></p>
      </div><!-- End Section Title -->
      <?php
$sql = "SELECT movies.*,categories.catname
from movies 
inner join categories on categories.catid = movies.catid";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    while($data = mysqli_fetch_array($res)){
        ?>
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="admin/uploads/<?= $data['image']?>" style="height:350px !important;width:300px !important;">
                
                <div class="social">
                  <a href="admin/uploads/<?= $data['trailer']?>"target="_blank"class="btn btn-primary"style="width:150px;">Watch Trailer</i></a>
                  
                </div>
              </div>
              
              
              <div class="member-info">
                <h4><?= $data['title']?></h4>
                <span><?= $data['catname']?></span>
              </div>
              
              <?php
    }
  }
  ?>
            </div>
          </div>
          <!-- End Team Member -->
           
    </section><!-- /About Section -->
  

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title aos-init" data-aos="fade-up">
        <h2>Services</h2>
        <p><span>Check Our</span> <span class="description-title">Services</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3> 24/7 Customer Support</h3>
              </a>
              <p>Got a question or issue? Our dedicated customer support team is available 24/7 to assist you with any inquiries or 
                concerns related to your bookings, payments, or app usage.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Instant Movie Ticket Booking</h3>
              </a>
              <p>Book movie tickets within seconds! Our app provides a fast and user-friendly experience, making it easier than ever to secure your seat for the latest blockbusters. Choose your favorite movie, 
                select the showtime, and confirm your booking—all in a few taps!</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Seamless Seat Selection</h3>
              </a>
              <p>View detailed seating charts and pick your preferred seats effortlessly. Whether you're looking for the perfect spot in the middle or cozy recliner seats,
                 our app ensures you get exactly what you want for an ideal movie-watching experience.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Real-Time Showtimes &amp; Availability</h3>
              </a>
              <p>Get up-to-date showtimes for all cinemas in your area. Our app provides real-time updates on seat availability, 
                making sure you always know the best options for your movie plans.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Upcoming Releases &amp; Watchlist</h3>
              </a>
              <p>Stay updated with upcoming movie releases! Add films to your watchlist and receive notifications 
                when bookings open. Never miss out on the next big hit!</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->
    <!-- Team Section -->
   
    <!-- Contact Section -->
<?php include('footer.php')?>