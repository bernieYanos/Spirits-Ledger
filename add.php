<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Spirit | Spirits Ledger</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
</head>

<header>
  <?php include 'includes/header.inc.php' ?>
</header>

<body class="bg">
  <div class="bg_bottom_left">
    <img src="img/addspirits_bg.jpg" alt="">
  </div>
  <div class="container addspirits">
    <div class="row justify-content-end">
      <div class="col-lg-4">
        <form method="POST" action="addspirit.php" enctype="multipart/form-data" class="clearForms" id="addSpiritForm">
          <div class="form-group">
            <label class="form-label" for="productID">Name:</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="productID" id="productID" required>
              <option value="notAnOption" selected>Select a spirit or add a new one</option>
              <?php include 'includes/spirit-options.inc.php' ?>
              <option value="Add new">Add new</option>
            </select>
          </div>
          <div class="form-group" id="newOption"></div>
          <div class="form-group" id="quantityContainer"></div>
          <div class="form-group" id="categoryContainer"></div>
          <div class="form-group" id="subCategoryContainer"></div>
          <div class="form-group" id="descriptionContainer"></div>
          <div class="form-group" id="producerContainer"></div>
          <!-- <div class="form-group">
            <label class="form-label" for="vintage">Vintage:</label>
            <input type="text" class="form-control" id="vintage" name="vintage" placeholder="Enter year">
          </div> -->
          <!-- <div class="form-group">
            <label class="form-label" for="varietal">Varietal:</label>
            <input type="text" class="form-control" id="varietal" name="varietal" placeholder="Enter varietal information">
          </div> -->
          <!-- <div class="form-group">
            <label for="file" class="form-label">Picture:</label>
            <input class="form-control" type="file" id="file" name="file">
          </div> -->
          <!-- <div class="form-group formbtns">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Clear</button>
          </div> -->
        </form>
      </div>
    </div>
  </div>

  <?php include 'includes/js.inc.php' ?>
  <script src="js/addSpirit.js"></script>
</body>

</html>