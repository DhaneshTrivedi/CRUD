<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="practice";


$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connect again");
} else {
    echo ("Connection successfull.") . "<br>";
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "No ID specified.";
}

    $text = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $sql = "UPDATE `form2` SET `Name` = '$text', `Email` = '$email', `Contact` = '$number' WHERE `id` = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Your data has been updated successfully"."<br>";
    } else {
        echo "Error updating user: " . $conn->error;
    }
?>
<script>
    window.onload = function() {
        setTimeout(function () {
            window.location.href = "User_list.php";
            window.clearTimeout(tID);	
        }, 1);
    }    
</script>
<a href="User_list.php">Redirect me</a>