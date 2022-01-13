<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "partials/_dbconnect.php";
    $username = $_POST["username"];
    $password = ($_POST["password"]);
    $role = ($_POST['role']);
    if ($role == 'students') {
        $sql = "SELECT * FROM `students` WHERE `Name` = '$username' AND `password` = '$password'";
        $result = mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
    }




    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['role'] = 'students';
        $_SESSION['loggedin'] = true;
        $_SESSION['Name'] = $username;

        header("location: homePage.php");
    } else if ($role == 'faculty') {
        $sql = "SELECT * FROM `people` WHERE `Name` = '$username' AND `password` = '$password'";
        $result = mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['role'] = 'admin';
            $_SESSION['loggedin'] = true;
            $_SESSION['Name'] = $username;

            header("location: homePage.php");
        }
        // } else {
        // $sql = "SELECT * FROM `people` WHERE `Name` = '$username' AND `password` = '$password'";
        // $result = mysqli_query($link, $sql);
        // $num = mysqli_num_rows($result);
        // if ($num == 1) {
        //     $login = true;
        //     session_start();
        //     if ($username == "admin")
        //         $_SESSION['role'] = 'admin';
        //     else if ($username == "Alwyn Roshan Pais")
        //         $_SESSION['role'] = 'hod';
        //     else
        //         $_SESSION['role'] = 'people';
        //     $_SESSION['loggedin'] = true;
        //     $_SESSION['Name'] = $username;
        //     header("location: homePage.php");
        // }
        else {
            $showError = "Invalid Credentials";
        }
    }
}
// }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <title>login</title>
</head>

<body>
    <?php require 'partials/_nav.php'; ?>
    <?php
    if ($login) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your are logged in.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
    if ($showError) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> " . $showError . "
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
    ?>
    <div class="container col-md-6" id="login">

        <p class="text-center" style=" font-size: 25px; font-weight: bold; font-family: 'Raleway', 'Lato', Arial, sans-serif; color: rgba(99,64,86,0.7)"> Login to NITK
        <p>
        <form action="/nitk/login.php" method="post" id="form-4">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option value="students">Student</option>
                    <option value="faculty">Faculty</option>
                </select>
            </div>
            <button id="login-btn" type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>