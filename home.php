<?php
include("db.php");

if(!isset($_SESSION['id'])){
   header("Location:index.html");
}
$sid=$_SESSION['id'];
$sql="SELECT `note` FROM `diary` WHERE id=$sid ";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $diary=$row['note'];
    }
  }else{
    $diary=" ";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Diary</title>
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
</head>
<body>
    <nav>
            <p id="p1">Secret Dairy</p>
            <a id="p2" href="logout.php">Logout </a>
            
    </nav>
    <textarea name=""><?php echo $diary; ?></textarea>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
  $("textarea").keyup(function(){
    $.post("update.php",{diary:$("textarea").val()});
  });
</script>
</body>
</html>