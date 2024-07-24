<?php
include 'connection.php';

$s = 'SELECT * FROM try';
$info = mysqli_query($conn, $s);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($info as $item) : ?>
                <tr>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['age'] ?></td>
                    <td>
                        <a type="button" href="/sem/admin/del.php?id=<?php echo $item['id'] ?>">DELETE</a>
                        <a type="button" href="">Edit</a>
                    </td>
                </tr>
        </tbody>

    <?php endforeach ?>
    </table>
</body>

</html>