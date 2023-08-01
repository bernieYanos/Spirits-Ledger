<?php
if ($exists > 0) {
  $sql = "SELECT Product_ID, Product_Name, Product_Quantity, Product_Image_Path, Product_Description, Vintage FROM Product WHERE Sub_Category_ID = $subCategory";
  $result = mysqli_query($con, $sql);

  echo '<div class="accordion" id="wineAccordion">';
  echo '<div class="row py-2 border-bottom spirit-container">';
  echo '<h2 class="text-white col-1">Qty.</h2>';
  echo '<h2 class="text-white col-11">Name</h2>';
  echo '</div>';

  while ($row = mysqli_fetch_assoc($result)) {
    if ((int)$row['Product_Quantity'] != 0) {
      echo '<div class="row py-2 border-bottom">';
      echo '<div class="col-1 p-0 text-white d-flex align-items-center justify-content-center">';
      echo '<h3 id="outerProductQty' . $row["Product_ID"] . '">' . $row["Product_Quantity"] . '</h3>';
      echo '</div>';
      echo '<div class="col-11 accordion-item p-0">';
      echo '<h3 class="accordion-header">';
      echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $row["Product_ID"] . '" aria-expanded="false" aria-controls="collapse' . $row["Product_ID"] . '">' . $row["Product_Name"] . '</button>';
      echo '</h3>';
      echo '<div id="collapse' . $row["Product_ID"] . '" class="accordion-collapse collapse" data-bs-parent="#wineAccordion">';
      echo '<div class="accordion-body">';
      echo '<div class="container">';
      echo '<div class="row">';
      echo '<div class="col"><img src="uploads/' . $row["Product_Image_Path"] . '" class="img-fluid"></div>';
      echo '<div class="col-8">';
      echo '<p class="mb-2">' . nl2br($row["Product_Description"]) . '</p>';
      echo '<table class="table">';
      echo '<tbody>';
      echo '<tr>';
      echo '<th>Vintage</th>';
      echo '<td>' . $row["Vintage"] . '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<th>Varietal Composition</th>';
      echo '<td>' . $row["Vintage"] . '</td>';
      echo '</tr>';
      echo '</tbody>';
      echo '</table>';
      echo '<div class="row mt-5">';
      echo '<div class="col-4 d-flex justify-content-center">';
      echo '<form class="justify-content-center update-spirit" method="POST" action="update-quantity.php">';
      echo '<input type="hidden" class="id" name="id" value="' . $row["Product_ID"] . '">';
      echo '<input type="hidden" class="action" name="action" value="add">';
      echo '<button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>';
      echo '</form>';
      echo '</div>';
      echo '<div class="col-4 d-flex justify-content-center align-items-center">';
      echo '<h4 class="m-0" id="innerProductQty' . $row["Product_ID"] . '">' . $row["Product_Quantity"] . '</h4>';
      echo '</div>';
      echo '<div class="col-4 d-flex justify-content-center">';
      echo '<form class="justify-content-center update-spirit" method="POST" action="update-quantity.php">';
      echo '<input type="hidden" class="id" name="id" value="' . $row["Product_ID"] . '">';
      echo '<input type="hidden" class="action" name="action" value="remove">';
      echo '<button type="submit" class="btn btn-primary"><i class="fa-solid fa-minus"></i></button>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  }
  echo '</div>';
}
