<?php
$conn = mysqli_connect("localhost", "root", "", "db");

if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}


$table = $_GET['table'] ?? 'pizza';


$allowed_tables = ['pizza', 'burger', 'crepe', 'sandwiches', 'macaroni', 'additions', 'comments'];
if (!in_array($table, $allowed_tables)) {
    die("❌ جدول غير مسموح به");
}


if ($table == 'pizza') {
    $sql = "SELECT name, large, medium, small FROM $table";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['large'] . "</td>";
        echo "<td>" . $row['medium'] . "</td>";
        echo "<td>" . $row['small'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }
}
if ($table == 'burger') {
    $sql = "SELECT name, large FROM $table";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['large'] . "</td>";

        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }
}
if ($table == 'crepe') {
    $sql = "SELECT name, large FROM $table";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['large'] . "</td>";

        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }
}
if ($table == 'sandwiches') {
    $sql = "SELECT name, large,medium FROM $table";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['large'] . "</td>";
        echo "<td>" . $row['medium'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }
}
if ($table == 'macaroni') {
    $sql = "SELECT name, large FROM $table";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['large'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }
}
if ($table == 'additions') {
    $sql = "SELECT name, large FROM $table";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['large'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }
}
if ($table == 'comments') {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<h4>" . $row['username'] . "</h4>";
        echo "<p>" . $row['comment'] . "</p>";
        echo "</div>";
    }
}


$conn->close();


