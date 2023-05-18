<?php
  session_start();
  include 'connection.php';
  $sql = "SELECT * FROM students";
  $result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">C.K. Pithawala</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="register.php">Registration</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <h4>Register Student List</h4>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>RollNo.</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0) {
            $id = 1;
            while ($row = $result->fetch_assoc()) { 
              echo "<tr>";
              echo "<td>" . $id++ . "</td>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              if ($row["gender"] == 1) {
                echo "<td>Male</td>";
              } else {
                echo "<td>Female</td>";
              }
              echo "<td>" . $row["phone"] . "</td>";
              echo "<td>
              <a href='edit.php?id=".$row["id"]."'><button class='btn btn-info' id='update' name='update'>Update</button></a>
              <a href='delete.php?id=".$row["id"]."'><button class='btn btn-danger' id='delete' name='delete'>Delete</button></a>
              </td>";
              echo "</tr>";
            } 
          } else {
            echo "<tr>
              <td colspan=7 class='text-center'>No Records Founds</td>
                </tr>";
          }?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      <?php  
        if (isset($_SESSION["error"])) 
        { 
      ?>
        const error = '<?php echo $_SESSION["error"]; ?>'
        if(error) {
          toastr.error(error);
        } 
      <?php 
         
        } else if (isset($_SESSION["success"])) { 
      ?> 
        const success = '<?php echo $_SESSION["success"]; ?>'
        if (success) {
          toastr.success(success);
        }

      <?php } session_unset(); ?>
    </script>
  </body>
</html>

