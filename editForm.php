<?php
include 'php/connect.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
      
    <!-- Bootstrap -->
     <link href = "css/bootstrap.min.css" rel = "stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="https://kit.fontawesome.com/44a4c75562.js" crossorigin="anonymous"></script>
</head>
   
<body>
  <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #C9DBBA;">
    <a class="navbar-brand" href="index.html">Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="datatable.php">Data Table</a>
        <a class="nav-item nav-link" href="addnew.php">Add New Product</a>
        <a class="nav-item nav-link" href="index.html">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-3 justify-content-start">
      <div class="col" style="font-size: 30px;">Edit Product</div>

<?php
    $edit_id = $_GET['edit'];
    $sql = "SELECT * FROM product WHERE no = $edit_id";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
  ?>




    <div class="row mt-3">
      <form name="edit" action="php/edit.php" method="POST">
        <div class="form-group">
          <label for="Name">Product No:</label>
          <input type="text" class="form-control" name="No" value="<?php echo $row['No'] ?>" readonly>
        </div>

        <div class="form-group">
          <label for="Name">Product Name:</label>
          <input type="text" class="form-control" name="Name" value="<?php echo $row['Name'] ?>" required/>
        </div>

        <div class="form-group">
          <label for="Price">Price(RM):</label>
          <input type="text" class="form-control" name="Price" value="<?php echo $row['Price'] ?>" required/>
        </div>

        <div class="form-group">
          <label for="Details">Product Details:</label>
          <span style="font-size: 10px">(Maximum 100 characters)</span>
          <input type="text" class="form-control" name="Details" value="<?php echo $row['Details'] ?>" required/>
        </div>

        <div class="form-group">
          <label for="Publish">Publish:</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="Publish" id="Yes" value="Yes" <?php if($row['Publish'] == "Yes") echo "checked";?> >
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="Publish" id="No" value="No" <?php if($row['Publish'] == "No") echo "checked";?> >
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
        </div>

        <button id ="create" type="submit" class="btn btn-primary">Submit</button>
        <a href="datatable.php">Cancel</a>
      </form>
    </div>
    <?php
    }
    } else {
      echo "0 results";
    }

    $conn->close();
  ?>
  </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src = "https://code.jquery.com/jquery.js"></script>
      
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src = "js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/44a4c75562.js" crossorigin="anonymous"></script>

</body>
</html>