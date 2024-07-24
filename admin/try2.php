<?php
include 'connection.php';
if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $push = "insert into try(name,age) values ('$name','$age')";
    mysqli_query($conn, $push);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" id="">
        <input type="number" name="age" id="">
        <button name="sub">Submit</button>
    </form>
</body>

</html>