<?php include('../connect.php');
if(!isset($_SESSION['uid'])){
    echo "<script> window.location.href='../login.php';</script>";
}
?>
<?php include('header.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title aos-init" data-aos="fade-up">
        <h2>Admin</h2>
        <p><span>Access</span> <span class="description-title">Details</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <a href="admin.php" class="stretched-link">
                <h3> View Booked Tickets</h3>
              </a>
              <p>Users Booked Tickets</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
             
              <a href="movies.php" class="stretched-link">
                <h3> Add Movies</h3>
              </a>
              <p>Add-on Movies</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              
              <a href="theater.php" class="stretched-link">
                <h3> Theater</h3>
              </a>
              <p>Update Theater along with movies , venue , days , time ,etc</p>
            </div>
          </div><!-- End Service Item -->
</section>

</body>
</html>
<?php include('footer.php')?>
