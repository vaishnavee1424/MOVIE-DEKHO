<?php
session_start();

// Ensure seats and total price are available
if (!isset($_SESSION['selectedSeats']) || !isset($_SESSION['totalPrice'])) {
    header("Location: index.php");
    exit();
}

$selectedSeats = $_SESSION['selectedSeats'];
$totalPrice = $_SESSION['totalPrice'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="new.css">
</head>
<body>
    <h2>Payment Page</h2>
    <p>Total Amount: $<?= $totalPrice ?></p>
    <br>
    <div class="wrapper">
    <div class="form-wrapper login">
    <form method="POST" action="status.php" >
        <label for="cardNumber">Enter Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber"  class="input-group">

        <label for="expiry">Expiry Date:</label>
        <input type="text" id="expiry" name="expiry" class="input-group">

        <button type="submit">Confirm Payment</button>
    </form>
</body>
</html>