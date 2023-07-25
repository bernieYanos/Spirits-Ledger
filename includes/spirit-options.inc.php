<!-- <option value="Option 2">Option 2</option>

Array ( [ProductName] => Blue Crab Blanc ) -->

<?php

include 'includes/connect.inc.php';

$sql = "SELECT P.ProductName FROM Product_t P WHERE P.ProductQuantity = 0";
$result = mysqli_query($con, $sql);
$exists = mysqli_num_rows($result);

if ($exists > 0) {
  $row = mysqli_fetch_assoc($result);
  foreach ($row as $productName => $name) {
    echo '<option value="' . $name . 'Option 2">' . $name . '</option>';
  }
}
