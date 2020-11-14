<?php
require_once 'db.php';

if(isset($_POST['LSubmit'])) {
  $user = $_POST['Name'];
  $password = $_POST['Password'];
  try {
    $sql = "SELECT `id`, `user`, `password` FROM `diary` WHERE user ='$user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $username = $row["user"];
        $hashed_password1 = $row["password"];
        if(password_verify($password, $hashed_password1)) {
          $_SESSION['id'] = $id;
          header('location: home.php');
        }else {
          echo "Error: Invalid username or password";
        }
      }
    }else {
      echo "0 results";
      header('location: index.html');
    }
    mysqli_close($conn);
  }catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

if(isset($_POST['SSubmit'])) {
  echo "hgh";
  $user = $_POST['Name'];
  $password = $_POST['Password'];
  echo $user;
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);
  try {
    $sql = "INSERT INTO `diary`(`user`, `password`) VALUES ('$user','$hashed_password')";
    if (mysqli_query($conn, $sql)) {
      header('location: home.php');
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
  }catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
}
?>