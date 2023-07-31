<!DOCTYPE html>
<html lang="en">

<head>
  <title>Wine Cellar | White Wine | Spirits Ledger</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
</head>

<header>
  <?php
  include 'includes/header.inc.php';
  include 'includes/connect.inc.php';
  $subCategory = 1;
  $sqlTest = mysqli_query(
    $con,
    "SELECT * FROM Product WHERE Sub_Category_ID = $subCategory"
  );
  $exists = mysqli_num_rows($sqlTest);
  ?>
</header>

<body class="bg">
  <div class="bg_bottom_right">
    <img src="img/wine_bg_resized.jpg" alt="">
  </div>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-left align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card rounded-3 text-white">
            <div class="card-body p-4">
              <h1 class="text-center my-3 pb-3">White Wine</h1>
              <?php
              include 'includes/wine-insert.inc.php';
              ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'includes/js.inc.php' ?>
  <script src="js/updateQuantity.js"></script>
</body>

</html>