<?php
include 'connect.php';


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
function md5_password($password){
  $new_password = md5($password);
  return $new_password;
}
function check_emptry($check){
  if(empty($check)){
    return true;
  } else {
    return false;
  }
}


if (isset($_POST["register"])) {
  $first_name = $_POST['first_name'];
  if(check_emptry($first_name)){
    echo "vui long nhap first name";
    exit();
  }
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $password = md5_password($_POST["password"]);
  $avatar = basename($_FILES["avatar"]["name"]);  
  if(!empty($_FILES["avatar"]["tmp_name"])){

    $check_img = getimagesize($_FILES["avatar"]["tmp_name"]);

    if ($check_img !== false) {
      //upload
      move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

    }
  }
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  


  $sql = "INSERT INTO users (first_name, last_name, username, password, avatar, birthday, gender, email, phone)  VALUES ('$first_name', '$last_name', '$username', '$password', '$avatar', '$birthday', '$gender', '$email', '$phone')";


  if($conn->query($sql) === TRUE) {
    echo "<br> database created successfully";
  } else {
    echo "<br> error creating databasw" . $conn->error;
  }
}
?>