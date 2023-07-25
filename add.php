<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Spirit | The Lounge</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
  <script src="js/addSpirit.js"></script>
</head>

<header>
  <?php include 'includes/header.inc.php' ?>
</header>

<body class="bg" onload="clearForms()">
  <div class="bg_bottom_left">
    <img src="img/addspirits_bg.jpg" alt="">
  </div>
  <div class="container addspirits">
    <div class="row justify-content-end">
      <div class="col-lg-4">
        <form method="POST" action="addspirit.php" enctype="multipart/form-data" class="clearForms" id="addSpiritForm">
          <div class="form-group">
            <label class="form-label" for="spiritName">Name:</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="spiritName" id="spiritName" onchange="addNewOption()">
              <option value="notAnOption">Select the spirit or add a new one</option>
              <?php include 'includes/spirit-options.inc.php' ?>
              <option value="Add new">Add new</option>
            </select>
          </div>
          <div class="form-group" id="newOption"></div>
          <div class="form-group">
            <label class="form-label" for="quantity">Quantity:</label>
            <input class="form-control" type="number" name="quantity" id="quantity" value="1">
          </div>
          <div class="form-group">
            <label class="form-label" for="type">Type:</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="type" id="type">
              <option selected>Choose type</option>
              <option value="Wine">Wine</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="subtype">Sub Type:</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="subtype" id="subtype">
              <option selected>Choose type</option>
              <option value="White">White</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label class="form-label" for="acquirelocation">Acquire Location:</label>
            <input type="text" class="form-control" id="acquirelocation" name="acquirelocation" placeholder="Enter location name">
          </div>
          <div class="form-group">
            <label class="form-label" for="date">Acquire Date:</label>
            <input class="form-control" type="date" name="date" id="date">
          </div>
          <div class="form-group">
            <label class="form-label" for="vintage">Vintage:</label>
            <input type="text" class="form-control" id="vintage" name="vintage" placeholder="Enter year">
          </div>
          <div class="form-group">
            <label class="form-label" for="varietal">Varietal:</label>
            <input type="text" class="form-control" id="varietal" name="varietal" placeholder="Enter varietal information">
          </div>
          <div class="form-group">
            <label for="file" class="form-label">Picture:</label>
            <input class="form-control" type="file" id="file" name="file">
          </div>
          <div class="form-group formbtns">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Clear</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>