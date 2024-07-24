<?php
$vacation_id = $vacation_title = $vacation_from = $vacation_to = "";
$vacation_idErr = $vacation_titleErr = $vacation_fromErr = $vacation_toErr = "";
include 'connection.php';



if (isset($_POST['add'])) {
    $vacation_id = $_POST['id'];
    $vacation_title = $_POST['title'];
    $vacation_from = $_POST['from'];
    $vacation_to = $_POST['to'];


    if (empty($_POST['id'])) {
        $vacation_idErr = "This field is required";
    } else {
        $vacation_id = $_POST['id'];
    }
    if (empty($_POST['title'])) {
        $vacation_titleErr = "This field is required";
    } else {
        $vacation_title = $_POST['title'];
    }
    if (empty($_POST['from'])) {
        $vacation_fromErr = "This field is required";
    } else {
        $vacation_from = $_POST['from'];
    }
    if (empty($_POST['to'])) {
        $vacation_toErr = "This field is required";
    } else {
        $vacation_to = $_POST['to'];
    }


    if (empty($vacation_idErr) && empty($vacation_titleErr) && empty($vacation_fromErr) && empty($vacation_toErr)) {
        /*push the data collected to the database*/
        $collected = "insert into vacation (vacation_id, vacation_title, vacation_from,vacation_to) values ('$vacation_id', '$vacation_title','$vacation_from', '$vacation_to')";
        if (mysqli_query($conn, $collected)) {
            header("location:/sem/admin/vacation.php");
            die;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <form action="" method="post">
        <div class="container">
            <div class="main">
                <div class="row">
                    <div class="col-6">
                        <label for="">Enter Vacation ID:</label>
                        <input type="text" name="id" class="form-control <?php echo $vacation_idErr ? 'is-invalid' : null ?>">
                        <?php echo $vacation_idErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Enter Vacation Title:</label>
                        <input type="text" name="title" class="form-control <?php echo $vacation_titleErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $vacation_titleErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Enter Vacation From Date:</label>
                        <input type="date" name="from" class="form-control <?php echo $vacation_fromErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $vacation_fromErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Enter Vacation To Date:</label>
                        <input type="date" name="to" class="form-control <?php echo $vacation_toErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $vacation_toErr ?>
                    </div>
                    <div class="btn-5">
                        <button class="btn btn-primary my-3" name="add" id="btn-3">SUBMIT</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>