<?php
include 'includes/connect.inc.php';
if (isset($_POST['qty'], $_POST['id'])) {
  $qty = (int)$_POST['qty'];
  $id = $_POST['id'];

  $getAmount = "SELECT ProductQuantity FROM Product_t WHERE ProductID = $id";
  $result = mysqli_query($con, $getAmount);
  $row = mysqli_fetch_assoc($result);
  $amount = (int)$row['ProductQuantity'];

  $total = $qty + $amount;
  if ($total < 0) {
    $total = 0;
  }

  $setTotal = "UPDATE Product_t SET ProductQuantity = $total WHERE ProductID = $id";
  mysqli_query($con, $setTotal);
}
