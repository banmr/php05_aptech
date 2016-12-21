<?php
include 'connect.php';

if (isset($_POST["register"])) {
  $first_name = $_POST['first_name'];
  //var_dump($first_name);

  $sql = "INSERT INTO users (first_name) VALUES ('$first_name')";

  if($conn->query($sql) === TRUE) {
    echo "<br> database created successfully";
  } else {
    echo "<br> error creating databasw" . $conn->error;
  }
}
?>