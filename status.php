<?php
session_start();

// Ensure seats and total price are available
if (!isset($_SESSION['selectedSeats']) || !isset($_SESSION['totalPrice'])) {
    header("Location: index.php");
    exit();
}

$selectedSeats = $_SESSION['selectedSeats'];
$totalPrice = $_SESSION['totalPrice'];

// Clear session data after showing booking details
session_destroy();
?>

<?php include('header.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
</head>
<body>

<section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title aos-init" data-aos="fade-up">
      <h2>Booking Details</h2>
        <p><span>Access</span> <span class="description-title">Details</span></p>
      </div><!-- End Section Title -->
      
      <div class="container">

        <div class="row gy-4">
        <center>
          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
            <p>Total Amount Paid: $<?= $totalPrice ?>
            <br>Seats Booked:-</p>
            
            <ul>
        <?php foreach ($selectedSeats as $seat): ?>
          <center>
            Seat->  <?= $seat ?>
        <?php endforeach; ?>
    </ul>


    <p3> Payment was successful , Thanks for Visiting ....</p>
            </div>
          </div>
    <!-- End Service Item -->
</section>

</body>
</html>
<?php include('footer.php')?>
