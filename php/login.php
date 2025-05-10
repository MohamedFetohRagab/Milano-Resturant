<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Page</title>
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
  <div class="container" style="max-height: 100dvh;
    overflow: hidden;">
    <h3 class="text-center pt-3">Log-In</h3>
    <div class="form">
      <form action="login.php" method="post">
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" />
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        <input type="submit" value="Submit" name="submit" />
      </form>
    </div>
  </div>
</body>

</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "db");

if (!$conn) {
  die("فشل الاتصال: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "select * from login where username='$username' and password='$password' ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    echo "<h2 dir='rtl'> تم تسجيل الدخول بنجاح</h2>";
    header("Location: dashboard.php");
  } else {
    echo "<h2 dir='rtl'>اسم المستخدم أو كلمة المرور غير صحيحة.</h2>";
  }
}