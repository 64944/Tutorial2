<?php
include 'php/connect.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>View Product</title>
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
        <a class="nav-item nav-link" href="addnew.html">Add New Product</a>
        <a class="nav-item nav-link" href="index.html">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-3 justify-content-start">
      <div class="col-3" style="font-size: 30px;">View Product</div>
      <div class="col-6"><a href="datatable.php">Back</a>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <?php
          $view_id = $_GET['view'];
          $sql = "SELECT * FROM product WHERE no = $view_id";
          
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "No: ". $row["No"]. "<br>" ."Product Name: ". $row["Name"]. "<br>" . "Price: RM". $row["Price"]. "<br>" . "Details: ". $row["Details"]. "<br>" . "Publish: ". $row["Publish"];
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
      </div>
    </div>
  </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src = "https://code.jquery.com/jquery.js"></script>
      
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src = "js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/44a4c75562.js" crossorigin="anonymous"></script>


</body>
</html>