<?php
$training_id = $training_title = $training_description = "";
$training_idErr = $training_titleErr = $training_descriptionErr = "";
include 'connection.php';



if (isset($_POST['add'])) {
    $training_id = $_POST['id'];
    $training_name = $_POST['title'];
    $training_pass = $_POST['des'];


    if (empty($_POST['id'])) {
        $training_idErr = "This field is required";
    } else {
        $training_id = $_POST['id'];
    }
    if (empty($_POST['title'])) {
        $training_titleErr = "This field is required";
    } else {
        $training_title = $_POST['title'];
    }
    if (empty($_POST['des'])) {
        $training_descriptionErr = "This field is required";
    } else {
        $training_description = $_POST['des'];
    }


    if (empty($training_idErr) && empty($training_titleErr) && empty($training_descriptionErr)) {
        /*push the data collected to the database*/
        $collected = "insert into traning (traning_id, Training_title, Training_description) values ('$training_id', '$training_title','$training_description')";
        if (mysqli_query($conn, $collected)) {
            header("location:/sem/admin/training.php");
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
                        <label for="">Enter Training ID:</label>
                        <input type="text" name="id" class="form-control <?php echo $training_idErr ? 'is-invalid' : null ?>">
                        <?php echo $training_idErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Enter Training Title:</label>
                        <input type="text" name="title" class="form-control <?php echo $training_titleErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $training_titleErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Enter Training Description:</label>
                        <input type="text" name="des" class="form-control <?php echo $training_descriptionErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $training_descriptionErr ?>
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