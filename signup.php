<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: profile.php");
    exit;
}
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "partials/_dbconnect.php";
    if (isset($_POST['DOB'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $roll_no = "202CS002";
        $father_name = $_POST["father_name"];
        $mother_name = $_POST["mother_name"];
        $father_occupation = $_POST["father_occupation"];
        $mother_occupation = $_POST["mother_occupation"];
        $Programme = $_POST["Programme"];
        $DOB = $_POST["DOB"];
        $mobile_no = $_POST["mobile_no"];
        $email = "xyz@nitk.edu.in";
        $year = $_POST["year"];

        $sql = "SELECT * FROM `students` WHERE `Name` LIKE '$username'";
        $result = mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $showError = "Username already Exist";
        } else if (($password == $cpassword)) {
            $sql = "INSERT INTO `students` ( `Roll_no`, `Name`, `Father's Name`, `Mother's Name`, `Father's Occupation`, `Mother's Occupation`, `password`, `DOB`, `Mobile_no`, `email_address`, `Programme`, `Year`) VALUES ( '$roll_no', '$username', '$father_name', '$mother_name', '$father_occupation', '$mother_occupation', '$password', '$DOB', '$mobile_no', '$email', '$Programme', '$year')";
            $result = mysqli_query($link, $sql);
            if ($result) {
                $sql2 = "SELECT * FROM `students` WHERE `Name` LIKE '$username'";

                //$sql    = "SELECT * FROM students WHERE ID='4'";
                $result2 = mysqli_query($link, $sql2);
                while ($row    = mysqli_fetch_array($result2)) {
                    //  $Name    = $row['Name'];
                    // $Roll_no = $row['Roll_no'];
                    if ($row['Programme'] == "B.Tech") {
                        $id = $row['ID'];
                        $roll = '201CS0' . $id;
                        $email = $username . $roll . '@nitk.edu.in';
                        $sql3 = "UPDATE `students` SET `Roll_no` = '$roll' WHERE `students`.`ID` = '$id'";
                        $result3 = mysqli_query($link, $sql3);
                        $sql4 = "UPDATE `students` SET `email_address` = '$email' WHERE `students`.`ID` = '$id'";
                        $result4 = mysqli_query($link, $sql4);
                    } else if ($row['Programme'] == "M.Tech") {
                        $id = $row['ID'];
                        $roll = "202CS0" . $id;
                        $email = $username . $roll . '@nitk.edu.in';
                        $sql3 = "UPDATE `students` SET `Roll_no` = '$roll' WHERE `students`.`ID` = '$id'";
                        $result3 = mysqli_query($link, $sql3);
                        $sql4 = "UPDATE `students` SET `email_address` = '$email' WHERE `students`.`ID` = '$id'";
                        $result4 = mysqli_query($link, $sql4);
                    }
                }
                $showAlert = true;
            }
        } else {
            $showError = "Password not match";
        }
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $role = "Faculty";
        $contact_details = $_POST["contact_details"];
        $date_of_joining = $_POST["date_of_joining"];
        $experience = $_POST["experience"];
        $designation = $_POST["designation"];
        $author_identifiers = $_POST["author_identifiers"];
        $academic_background = $_POST["academic_background"];
        $area_of_interest = $_POST["area_of_interest"];
        $significant_projects = $_POST["significant_projects"];
        $significant_publications = $_POST["significant_publications"];
        $achievements = $_POST["achievements"];


        $sql = "SELECT * FROM `people` WHERE `Name` LIKE '$username'";
        $result = mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $showError = "Username already Exist";
        } else if (($password == $cpassword)) {
            $sql = "INSERT INTO `people` ( `Name`, `password`, `Role`, `Contact Details`, `Date of joining`, `Experience`, `Designation`, `Author Identifers`, `Academic Background`, `Area of Interest`, `Significant Projects`, `Significant Publications`, `Achivements`) VALUES 
                                ( '$username', '$password', '$role', '$contact_details', '$date_of_joining', '$experience', '$designation', '$author_identifiers', '$academic_background', '$area_of_interest', '$significant_projects', '$significant_publications', '$achievements')";
            $result = mysqli_query($link, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Password not match";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <title>sign up!</title>
</head>

<body>
    <?php require 'partials/_nav.php'; ?>
    <?php
    if ($showAlert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your account is successfully created and you can login.
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
    } ?>
    <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Register for Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="signup.php" method="post">
                    <div class="form-group">
                        <label for="username">Student Name</label>
                        <input type="text" maxlength="20" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father Name</label>
                        <input type="text" maxlength="20" class="form-control" id="father_name" name="father_name">
                    </div>
                    <div class="form-group">
                        <label for="mother_name">Mother Name</label>
                        <input type="text" maxlength="20" class="form-control" id="mother_name" name="mother_name">
                    </div>
                    <div class="form-group">
                        <label for="father_occupation">Father Occupation</label>
                        <input type="text" maxlength="20" class="form-control" id="father_occupation" name="father_occupation">
                    </div>
                    <div class="form-group">
                        <label for="mother_occupation">Mother Occupation</label>
                        <input type="text" maxlength="20" class="form-control" id="mother_occupation" name="mother_occupation">
                    </div>
                    <div class="form-group">
                        <label for="Programme">Programme</label>
                        <select name="Programme" id="Programme">
                            <option value="B.Tech">B.Tech</option>
                            <option value="M.Tech">M.Tech</option>
                            <option value="Phd">Phd</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="DOB">DOB</label>
                        <input type="date" maxlength="10" class="form-control" id="DOB" name="DOB">
                    </div>
                    <div class="form-group">
                        <label for="mobile_no">Mobile no</label>
                        <input type="text" maxlength="10" class="form-control" id="mobile_no" name="mobile_no">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" maxlength="10" class="form-control" id="year" name="year">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" maxlength="30" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" maxlength="30" class="form-control" id="cpassword" name="cpassword">
                        <small id="confrimpass" class="form-text text-muted">make sure to type same password</small>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" value="students" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Register for Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="signup.php" method="post">
                    <div class="form-group">
                        <label for="username">Teacher Name</label>
                        <input type="text" maxlength="20" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="contact_details">Contact Details</label>
                        <input type="text" maxlength="20" class="form-control" id="contact_details" name="contact_details">
                    </div>
                    <div class="form-group">
                        <label for="date_of_joining">Date of Joining</label>
                        <input type="text" maxlength="20" class="form-control" id="date_of_joining" name="date_of_joining">
                    </div>
                    <div class="form-group">
                        <label for="experience">Experience</label>
                        <input type="text" maxlength="100" class="form-control" id="experience" name="experience">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" maxlength="20" class="form-control" id="designation" name="designation">
                    </div>
                    <div class="form-group">
                        <label for="author_identifiers">Author identifiers</label>
                        <input type="text" maxlength="100" class="form-control" id="author_identifiers" name="author_identifiers">
                    </div>
                    <div class="form-group">
                        <label for="academic_background">Academic Background</label>
                        <input type="text" maxlength="100" class="form-control" id="academic_background" name="academic_background">
                    </div>
                    <div class="form-group">
                        <label for="area_of_interest">Area of Interest</label>
                        <input type="text" maxlength="100" class="form-control" id="area_of_interest" name="area_of_interest">
                    </div>
                    <div class="form-group">
                        <label for="significant_projects">Significant Projects</label>
                        <input type="text" maxlength="100" class="form-control" id="significant_projects" name="significant_projects">
                    </div>
                    <div class="form-group">
                        <label for="significant_publications">Significant Publications</label>
                        <input type="text" maxlength="100" class="form-control" id="significant_publications" name="significant_publications">
                    </div>
                    <div class="form-group">
                        <label for="achievements">Achievements</label>
                        <input type="text" maxlength="100" class="form-control" id="achievements" name="achievements">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" maxlength="30" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" maxlength="30" class="form-control" id="cpassword" name="cpassword">
                        <small id="confrimpass" class="form-text text-muted">make sure to type same password</small>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container col-md-6">
        <h1 class="text-center"> Add a member </h1>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="text-center">Create an Account</h2>
                    <hr>
                    <p>
                    <ul>
                        <li>
                            Should start with a lowercase letter from (a-z)
                        </li>
                        <li>
                            Must be between 4 to 14 characters long
                        </li>
                        <li>
                            Must end with a letter (a-z) or number (0-9)
                        </li>
                        <li>
                            Must not contain a sequence of two or more underscores (_)
                        </li>
                        <li>
                            Can contain lowercase letters from (a-z), digits or underscores
                        </li>
                        <li>
                            Note: Choose wisely your username, for you will not be able to change it later.
                        </li>
                    </ul>
                    </p>

                </div>
                <div class="col-sm-6">
                    <h2 class="text-center">Add new</h2>
                    <hr>
                    <div class="dropdown" style="margin-left:20%;">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Choose Role <span class="caret"></span></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="text-align:center">
                            <li><a href="#" data-toggle="modal" data-target="#editModal1">Student</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#editModal2" class="center">Teacher</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        </ul>
    </div>
    </div>

    <?php
    require 'partials/_footer.php';
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>