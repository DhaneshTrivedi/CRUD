<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "practice";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    echo "Error occured while connecting the database";
} else {
    echo "Connection successfull" . "<br>";
}


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

} else {
    echo "No ID specified.";
}
$sql="DELETE FROM `form2` WHERE `id` = $id";
 if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
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