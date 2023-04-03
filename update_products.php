<?php

include 'connect.php';

$id = $_GET['updateid'];

$sql = "Select * from `product_table` where id=$id ";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$type = $row['type'];
$price = $row['price'];


if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $type = $_POST['type'];
  $price = $_POST['price'];

  $sql = "update `product_table` set id=$id,name='$name',type='$type',price='$price' where id=$id";

  $result = mysqli_query($con, $sql);

  if ($result) {
    header('location:index.php');
  } else {

    die(mysqli_error($con));
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="container my-5">
    <button class="btn btn-primary my-5">
      <a href="index.php" class="text-light">Return to Table</a>
    </button>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" class="form-control" placeholder="Enter the product's name." name="name" autocomplete="off" value=<?php echo $name; ?>>
      </div>

      <div class="mb-3">
        <label class="form-label">Product Type</label>
        <input type="text" class="form-control" placeholder="Enter the product type." name="type" autocomplete="off" value=<?php echo $type; ?>>
      </div>

      <div class="mb-3">
        <label class="form-label">Product Price</label>
        <input type="text" class="form-control" placeholder="Enter the product's price." name="price" autocomplete="off" value=<?php echo $price; ?>>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
</body>

</html>