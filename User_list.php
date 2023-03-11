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
$sql = "SELECT `id`, `Name`, `Email`, `Contact` FROM `form2` WHERE 1";
$result = $conn->query($sql);

$row = [];
if ($result->num_rows > 0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <a href="addUser.php">Create Your Id here</a> <br><br>
    <div class="container table-responsive">
        <table class="table table-hover  table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <form action="edit.php" method="post">
                    <?php

                    foreach ($row as $rows) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $rows['id']; ?>
                            </td>
                            <td>
                                <?php echo $rows['Name']; ?>
                            </td>
                            <td>
                                <?php echo $rows['Email']; ?>
                            </td>
                            <td>
                                <?php echo $rows['Contact']; ?>
                            </td>
                            <td><a href="edit.php?id=<?php echo $rows['id']; ?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $rows['id']; ?>">Delete</a></td>

                        </tr>
                    <?php } ?>
                </form>
            </tbody>
        </table>
    </div>

</body>

</html>