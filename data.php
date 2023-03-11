<?php
$servername="localhost";
$username="root";
$password="";


$conn = new mysqli($servername, $username , $password);
if($conn->connect_error){
    die("Connect again");
}
else{
    echo("Connection successfull.") . "<br>";
}
$text=$_POST['name'];
$email=$_POST['email'];
$number=$_POST['number'];

$sql="INSERT INTO `practice`.`form2` (`Name`, `Email`, `Contact`)
VALUES ('$text', '$email', '$number')";
if ($conn->query($sql) === TRUE) {
    echo "Added to database";
  } 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>
<script>
    window.onload = function() {
        setTimeout(function () {
            window.location.href = "User_list.php";
            window.clearTimeout(tID);	
        }, 1);
    }    
</script>


