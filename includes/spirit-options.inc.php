<?php

include 'includes/connect.inc.php';

$sql = "SELECT `Product_ID`, `Product_Name` FROM `Product` WHERE `Product_Quantity` = 0";
$result = mysqli_query($con, $sql);
$exists = mysqli_num_rows($result);

if ($exists > 0) {
  while ($name = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $name['Product_ID'] . '">' . $name['Product_Name'] . '</option>';
  }
}
