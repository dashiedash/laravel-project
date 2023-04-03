<?php

include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <title>Products</title>
</head>

<body>

  <div class="container">
    <button class="btn btn-primary my-5">
      <a href="add_products.php" class="text-light">Add Products</a>
    </button>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Type</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $sql = "Select * from `product_table` ";

        $result = mysqli_query($con, $sql);

        if ($result) {

          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $type = $row['type'];
            $price = $row['price'];

            echo '
              <tr>
                <th scope="row">' . $id . '</th>
                <td>' . $name . '</td>
                <td>' . $type . '</td>
                <td>' . $price . '</td>
                <td>
                  <button class="btn btn-primary"><a href="update_products.php?updateid=' . $id . '" class="text-light">Update</a></button>
                  <button class="btn btn-danger"><a href="delete_products.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                </td>
              </tr>
            ';
          }
        }

        ?>
      </tbody>
    </table>
  </div>

</body>

</html>