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

$sql = "SELECT `id`, `Name`, `Email`, `Contact` FROM `form2` WHERE `id` = $id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "User not found";
    exit();
}
$row = [];
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Edit User</h1>
        <form method="post" action="edit2.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['Name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>">
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="number"
                    value="<?php echo $row['Contact']; ?>">
            </div>
           <button type="submit">Submit</button>
        </form>
    </div>
    
</body>

</html>