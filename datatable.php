<?php
include 'php/connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Table</title>
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
      <div class="col-2" style="font-size: 30px;">Data Table</div>
      <div class="col-6"><input class="form-control" id="searchInput" type="search" placeholder="Search No/Name" aria-label="Search" onkeyup="search()"></div>
    </div>
    <div class="row mt-3">
      <table class="table table-striped text-center" id="productTable">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Price(RM)</th>
            <th scope="col">Details</th>
            <th scope="col">Publish</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>
        <?php
          $sql = "SELECT * FROM product";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td scope='row'>" . $row['No'] . "</th>";
              echo "<td>" . $row['Name'] . "</td>";
              echo "<td>" . $row['Price'] . "</td>";
              echo "<td>" . $row['Details'] . "</td>";
              echo "<td>" . $row['Publish'] . "</td>";
              echo "<td>" .
                "<a href='view.php?view=".$row['No']."'><i class='fas fa-eye' style='color: #29a329'></i></a>
                <a href='editForm.php?edit=".$row['No']."'><i class='fas fa-wrench'></i></i></a>
                <a href='php/delete.php?delete=".$row['No']."'><i class='fas fa-times-circle' style='color: red'></i></i></i></a>"
                . "</td>";
              echo "</tr>";
            }
          }

          else {
            echo "0 results";
          }
          $conn->close();
        ?>
        </tbody>
      </table>
    </div>
  </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src = "https://code.jquery.com/jquery.js"></script>
      
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src = "js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/44a4c75562.js" crossorigin="anonymous"></script>

<script>
function search() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    td1 = tr[i].getElementsByTagName("td")[1];
    if ( (td) || (td1) ){
      txtValue = td.textContent;
      txtValue1 = td1.textContent;
      if ((txtValue.toUpperCase().indexOf(filter) > -1) || (txtValue1.toUpperCase().indexOf(filter) > -1)) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>
