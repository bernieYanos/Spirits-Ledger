<?php
if ($exists > 0) {
  $sql = "SELECT P.ProductID, P.ProductName, P.ProductQuantity, P.ProductImagePath, P.ProductDescription, P.ProductVintage, P.ProductVarietal FROM Product_t P WHERE P.ProductSubType = 'White'";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    if ((int)$row['ProductQuantity'] != 0) {
      echo '<tr>
    <th class="text-white align-middle text-center" id="table-qty" scope="row">' . $row["ProductQuantity"] . '</th>
    <td class="w-100">
      <div class="accordion" id="accordionExample' . $row["ProductID"] . '">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading' . $row["ProductID"] . '">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $row["ProductID"] . '" aria-expanded="false" aria-controls="collapse' . $row["ProductID"] . '">' . $row["ProductName"] . '</button>
          </h2>
          <div id="collapse' . $row["ProductID"] . '" class="accordion-collapse collapse" aria-labelledby="heading' . $row["ProductID"] . '" data-bs-parent="#accordionExample' . $row["ProductID"] . '">
            <div class="accordion-body">
              <div class="container">
                <div class="row">
                  <div class="col"><img src="img/' . $row["ProductImagePath"] . '" class="img-fluid"></div>
                    <div class="col-8">
                      <p class="mb-2">' . nl2br($row["ProductDescription"]) . '</p>
                      <table class="table">
                        <tbody>
                          <tr>
                            <th>Vintage</th>
                            <td>' . $row["ProductVintage"] . '</td>
                          </tr>
                          <tr>
                            <th>Varietal Composition</th>
                            <td>' . $row["ProductVarietal"] . '</td>
                          </tr>
                        </tbody>
                      </table>
                      <form class="row justify-content-center mt-5 wineupdate clearForms" method="post" action="update.php">
                        <div class="col-5">
                          <p><strong>Add/Remove?</strong></p>
                        </div>
                        <div class="col-4 w-25">
                          <input type="hidden" name="id" value="' . $row["ProductID"] . '">
                          <input type="number" class="form-control qty" name="qty" value="0">
                        </div>
                        <div class="col-4 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>';
    }
  }
}
