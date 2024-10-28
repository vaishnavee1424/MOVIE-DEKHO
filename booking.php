
<?php
// Define seating availability
$seats = [
    [0, 0, 1, 0, 0, 0],  // 0 = available, 1 = occupied
    [0, 1, 0, 0, 0, 1],
    [1, 0, 0, 1, 0, 0],
];

// Process form when submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seats'])) {
    $selectedSeats = isset($_POST['seats']) ? $_POST['seats'] : [];
    $ticketPrice = $_POST['ticketPrice'];

    // Calculate total cost
    $totalSeats = count($selectedSeats);
    $totalPrice = $totalSeats * $ticketPrice;

    // Store the booking information in the session for the admin page
    session_start();
    $_SESSION['selectedSeats'] = $selectedSeats;
    $_SESSION['totalPrice'] = $totalPrice;
    
    // Redirect to payment page
    header("Location: payment.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Seat Selection</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="new.css">
</head>
<body>
<div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Book Your Show</h2>
      </div>
    <div class="movie-container">
        
        <label>Pick a movie: </label>
        <select id="movie" name="movie" form="seatForm">
            <option value="10">Sita Raman ($10)</option>
            <option value="12">Stree 2 ($12)</option>
            <option value="8">Raaz ($8)</option>
        </select>
    </div>
    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>Available</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat sold"></div>
        <small>Sold</small>
      </li>
    </ul>
<div class="container">
    <div class="screen"></div>

    <form id="seatForm" method="POST">
        <input type="hidden" name="ticketPrice" id="ticketPrice" value="10">
        
        <div class="container">
            <?php foreach ($seats as $rowIndex => $row): ?>
                <div class="row">
                    <?php foreach ($row as $seatIndex => $seat): ?>
                        <?php if ($seat == 1): ?>
                            <div class="seat sold"></div>
                            <div class="seat sold"></div>
                            <div class="seat sold"></div>
                            <div class="seat sold"></div>
                            <div class="seat sold"></div>
                            <div class="seat sold"></div>
                        <?php else: ?>
                            <input type="checkbox" class="seat" name="seats[]" value="<?= $rowIndex . '-' . $seatIndex ?>">
                            <input type="checkbox" class="seat" name="seats[]" value="<?= $rowIndex . '-' . $seatIndex ?>">
                            <input type="checkbox" class="seat" name="seats[]" value="<?= $rowIndex . '-' . $seatIndex ?>">
                            <input type="checkbox" class="seat" name="seats[]" value="<?= $rowIndex . '-' . $seatIndex ?>">
                            <input type="checkbox" class="seat" name="seats[]" value="<?= $rowIndex . '-' . $seatIndex ?>">
                            <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit">Proceed to Payment</button>
    </form>

    <script>
        const movieSelect = document.getElementById('movie');
        const ticketPriceInput = document.getElementById('ticketPrice');

        movieSelect.addEventListener('change', (e) => {
            ticketPriceInput.value = e.target.value;
        });
    </script>
</body>
</html>
