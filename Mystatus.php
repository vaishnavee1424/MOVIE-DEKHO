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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('header.php')?>
<section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title aos-init" data-aos="fade-up">
        <h2>Booking Details</h2>
        </div>
        <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <a class="stretched-link">
        <p>Total Amount Paid: $<?= $totalPrice ?></p>
        <p> Seats Booked:</p>
    <ul>
        <?php foreach ($selectedSeats as $seat): ?>
            <li>Seat: <?= $seat ?></li>
        <?php endforeach; ?>
    </ul>

    <p3>Payment was successful , Thanks for Visiting ....</p>
   
    </div><!-- End Stats Item -->

  </div>

</div>

</section>
   
</body>
</html>
<?php include('footer.php')?>