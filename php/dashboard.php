<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />
  <link rel="icon" href="../imgs/logo.png" />
</head>


<body>

  <div class="menu" id="menu">
    <div class="container">
      <h2>Select Menu To Edit Or Add A New Item...</h2>

      <ul>
        <li><a href="">Pizza</a></li>
        <li><a href="">Burger</a></li>
        <li><a href="">Crepe</a></li>
        <li><a href="">Sandwiches</a></li>
        <li><a href="">Macaroni</a></li>
        <li><a href="">Additions</a></li>
      </ul>

      <div class="pizza">
        <h3 class="title"><span>Pizza</span> <span>بيتزا</span></h3>
        <table class="table table-light table-striped pizza text-center">
          <thead>
            <td>L</td>
            <td>M</td>
            <td>S</td>
            <td>Pizza</td>
          </thead>
          <?php
          $_GET['table'] = 'pizza';
          include "menu.php";
          ?>
        </table>
        <hr>
      </div>
      <!-- 
           -->
      <div class="burger">
        <h3 class="title"><span>Burger</span> <span>برجر</span></h3>
        <table class="table table-light table-striped text-center" id="Burger">
          <thead>
            <td>الثمن</td>
            <td>برجر</td>
          </thead>
          <?php
          $_GET['table'] = 'burger';
          include "menu.php";
          ?>
        </table>
        <hr>
      </div>
      <!-- 
           -->
      <div class="crepe">
        <h3 class="title"><span>Crepe</span> <span>كريب</span></h3>
        <table class="table table-light table-striped text-center" id="Crepe">
          <thead>
            <td>الثمن</td>
            <td>كريب</td>
          </thead>
          <?php
          $_GET['table'] = 'crepe';
          include "menu.php";
          ?>
        </table>
        <hr>
      </div>
      <!-- 
           -->
      <div class="sandwiches">
        <h3 class="title"><span>Sandwiches</span> <span>ساندوتش</span></h3>
        <table class="table table-light table-striped text-center" id="Sandwiches">
          <thead>
            <td>فرنساوي</td>
            <td>سورى</td>
            <td>ساندوتش</td>
          </thead>
          <?php
          $_GET['table'] = 'sandwiches';
          include "menu.php";
          ?>
        </table>
        <hr>
      </div>
      <!-- 
           -->
      <div class="macaroni">
        <h3 class="title"><span>macaroni</span> <span>مكرونات</span></h3>
        <table class="table table-light table-striped text-center" id="Macaroni">
          <thead>
            <td>الثمن</td>
            <td>مكرونات</td>
          </thead>
          <?php
          $_GET['table'] = 'macaroni';
          include "menu.php";
          ?>
        </table>
        <hr>
      </div>
      <div class="additions">
        <h3 class="title"><span>Additions</span> <span>إضافات</span></h3>
        <table class="table table-light table-striped text-center" id="Additions">
          <thead>
            <td>الثمن</td>
            <td>إضافات</td>
          </thead>
          <?php
          $_GET['table'] = 'additions';
          include "menu.php";
          ?>
        </table>
      </div>
    </div>

    <hr>
    <div class="holder">
      <div class="input">
        <form action="dashboard.php" method="post">
          <h3>Select Table To Add Or Edit On It ...</h3>
          <select name="table" id="" style="  width: 167px;">
            <option value="pizza">Pizza</option>
            <option value="burger">Burger</option>
            <option value="crepe">Crepe</option>
            <option value="sandwiches">Sandwiches</option>
            <option value="macaroni">Macaroni</option>
            <option value="additions">Additions</option>
          </select>
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
          <label for="large">Large</label>
          <input type="number" id="large" name="large" required value="0">
          <label for="medium">Medium</label>
          <input type="number" id="medium" name="medium" required value="0">
          <label for="small">Small</label>
          <input type="number" id="small" name="small" required value="0">
          <div class="edit">
            <input type="submit" value="Add" name="save">
            <input type="submit" value="Delete" name="delete">
            <input type="submit" value="Edit" name="edit">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="../js/dashboard.js">
  </script>
</body>

</html>

<?php

ob_start();
$conn = mysqli_connect("localhost", "root", "", "db");

if (!$conn) {
  die("فشل الاتصال: " . mysqli_connect_error());
}
/*
Hostname:
192.168.0.100
Database:
milanor1_db
Username:
milanor1_db
Password:
fXyCBP52DqFxAXUykHse

*/

if (isset($_POST['save'])) {
  $table = $_POST['table'];
  $name = $_POST['name'];
  $large_price = $_POST['large'];
  $medium_france = $_POST['medium'] ?? null;
  $small = $_POST['small'] ?? null;


  $columns = "`name`, `large`";
  $values = "'$name', '$large_price'";


  if (!empty($medium_france)) {
    $columns .= ", `medium`";
    $values .= ", '$medium_france'";
  }
  if (!empty($small)) {
    $columns .= ", `small`";
    $values .= ", '$small'";
  }

  $query = "INSERT INTO `$table` ($columns) VALUES ($values)";

  $result = mysqli_query($conn, $query);


  header("Location:dashboard.php");
  mysqli_close($conn);
  ob_end_flush();
  exit();
}
########
if (isset($_POST['delete'])) {
  $table = $_POST['table'];
  $name = $_POST['name'];



  $query = "DELETE FROM `$table` WHERE `name` = '$name'";

  $result = mysqli_query($conn, $query);


  header("Location:dashboard.php");
  mysqli_close($conn);
  ob_end_flush();
  exit();
}
####################

if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $name = $_POST['name'];
  $large_price = $_POST['large'];
  $medium_france = $_POST['medium'] ?? null;
  $small = $_POST['small'] ?? null;



  $query = "UPDATE `$table` 
            SET `large`='$large_price', 
                `medium`='$medium_france', 
                `small`='$small' 
            WHERE `name`='$name'";

  $result = mysqli_query($conn, $query);


  header("Location:dashboard.php");
  mysqli_close($conn);
  ob_end_flush();
  exit();
}
?>