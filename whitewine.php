<!DOCTYPE html>
<html lang="en">

<head>
  <title>Wine Cellar | White Wine | The Lounge</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
  <script src="js/script.js"></script>
</head>

<header>
  <?php
  include 'includes/header.inc.php';
  include 'includes/connect.inc.php';
  $sqlTest = mysqli_query(
    $con,
    "SELECT * FROM Product_t WHERE ProductSubType = 'White'"
  );
  $exists = mysqli_num_rows($sqlTest);
  ?>
</header>

<body class="bg" onload="clearForms()">
  <div class="bg_bottom_right">
    <img src="img/wine_bg_resized.jpg" alt="">
  </div>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-left align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card rounded-3 text-white">
            <div class="card-body p-4">
              <h4 class="text-center my-3 pb-3">White Wine</h4>
              <table class="table mb-4">
                <thead>
                  <tr>
                    <th class="text-white" scope="col">Qty.</th>
                    <th class="text-white" scope="col">Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'includes/wine-insert.inc.php';
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>