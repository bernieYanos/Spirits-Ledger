<?php
if ($exists > 0) {
  $sql = "SELECT P.Product_ID, P.Product_Name, P.Product_Quantity, P.Product_Image_Path, P.Product_Description, P.Vintage, VT.Varietal_ID, VT.Varietal_Percentage, V.Varietal_Name
  FROM Product P
  LEFT JOIN Varietal_Tags VT ON P.Product_ID = VT.Product_ID
  LEFT JOIN Varietal V ON vt.Varietal_ID = V.Varietal_ID
  WHERE P.Sub_Category_ID = $subCategory";
  $result = mysqli_query($con, $sql);

  $productData = array();

  echo '<div class="accordion" id="wineAccordion">';
  echo '<div class="row py-2 border-bottom spirit-container">';
  echo '<h2 class="text-white col-1">Qty.</h2>';
  echo '<h2 class="text-white col-11">Name</h2>';
  echo '</div>';

  while ($row = mysqli_fetch_assoc($result)) {
    $productID = $row['Product_ID'];

    if (!isset($productData[$productID])) {
      $productData[$productID] = array(
        'Product_ID' => $row['Product_ID'],
        'Product_Name' => $row['Product_Name'],
        'Product_Quantity' => $row['Product_Quantity'],
        'Product_Image_Path' => $row['Product_Image_Path'],
        'Product_Description' => $row['Product_Description'],
        'Vintage' => $row['Vintage'],
        'Varietals' => array()
      );
    }

    if ($row['Varietal_ID']) {
      $varietalData = array(
        'Varietal_ID' => $row['Varietal_ID'],
        'Varietal_Percentage' => $row['Varietal_Percentage'],
        'Varietal_Name' => $row['Varietal_Name']
      );

      $productData[$productID]['Varietals'][] = $varietalData;
    }
  }

  // print_r($productData);

  foreach ($productData as $row) {
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
      echo '<p class="mb-4">' . nl2br($row["Product_Description"]) . '</p>';
      echo '<div class="row border-top border-bottom m-0">';
      echo '<div class="col-6 d-flex justify-content-left align-items-center">';
      echo '<h4 class="accordion-interior-header my-2">Vintage</h4>';
      echo '</div>';
      echo '<div class="col-6 d-flex justify-content-end align-items-center">';
      if ($row['Vintage'] != null) {
        echo '<p class="my-2 accordion-table-data">' . $row["Vintage"] . '</p>';
      } else {
        echo '<p class="my-2 accordion-table-data">None</p>';
      }
      echo '</div>';
      echo '</div>';
      echo '<div class="row border-bottom m-0">';
      echo '<div class="col-6 d-flex justify-content-left align-items-center">';
      echo '<h4 class="accordion-interior-header my-2">Varietal</h4>';
      echo '</div>';
      echo '<div class="col-6 d-flex justify-content-end align-items-center">';
      echo '<div class="row">';
      foreach ($row['Varietals'] as $varietal) {
        echo '<div class="col-12">';
        if ($varietal['Varietal_Percentage'] != null) {
          echo '<p class="my-2 accordion-table-data d-flex justify-content-end">' . $varietal['Varietal_Percentage'] . '% ' . $varietal['Varietal_Name'] . '</p>';
        } else {
          echo '<p class="my-2 accordion-table-data  d-flex justify-content-end">' . $varietal['Varietal_Name'] . '</p>';
        }
        echo '</div>';
      }
      echo '</div>';
      echo '</div>';
      echo '</div>';
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
