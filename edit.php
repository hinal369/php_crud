<?php
    include 'connection.php';
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM students WHERE id=".$id;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 

    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
      <h4>Student Registration </h4>
      <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="<?php echo $row["name"]; ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo $row["email"]; ?>">
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">Gender</label><br>
          <input type="radio" class="form-check-input" name="gender" value="1" <?php if($row["gender"] == 1) echo 'checked'; ?>> Male
          <input type="radio" class="form-check-input" name="gender" value="2" <?php if($row["gender"] == 2) echo 'checked'; ?>> Female
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Mobile Number</label>
          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row["phone"]; ?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["password"]; ?>">
        </div>
        <div class="mb-3">
          <label for="profile" class="form-label">Profile</label>
          <input type="file" class="form-control" id="profile">
        </div>
        <?php  }}} ?>
        <button class="btn btn-primary" id="submit" name="submit">Submit</button>
      </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
  </body>
</html>

