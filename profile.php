<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: profile.php");
    exit;
}
require "partials/_dbconnect.php";
require 'partials/_nav.php';

if (isset($_POST['edit_student'])) {
    $sql = "UPDATE `students` SET `Father's Name`='$_POST[father_name]' , `Mother's Name`='$_POST[mother_name]', `Father's Occupation`='$_POST[father_occupation]',`Mother's Occupation`='$_POST[mother_occupation]',`DOB`='$_POST[DOB]',`Mobile_no`='$_POST[mobile_no]' WHERE `Name`='$_SESSION[Name]'";
    $result = mysqli_query($link, $sql);
}
if (isset($_POST['edit_teacher'])) {
    $sql = "UPDATE `people` SET `Contact Details` = '$_POST[contact_details]', `Date of joining` = '$_POST[date_of_joining]', `Experience` = '$_POST[experience]', `Author Identifers` = '$_POST[author_identifiers]', `Academic Background` = '$_POST[academic_background]', `Area of Interest` = '$_POST[area_of_interest]', `Significant Projects` = '$_POST[significant_projects]', `Significant Publications` = '$_POST[significant_publications]', `Achivements` = '$_POST[achievements]' WHERE `people`.`Name` = '$_SESSION[Name]'";
    $result = mysqli_query($link, $sql);
}
if (isset($_POST['edit_student_pass'])) {
    $sql = "SELECT * FROM `students` WHERE `Name` = '$_SESSION[Name]' AND `password` = '$_POST[current_pass]'";
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $sql = "UPDATE `students` SET `password`='$_POST[change_pass]' WHERE `Name` = '$_SESSION[Name]'";
        $result = mysqli_query($link, $sql);
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Password change successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Invaild credentials
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
if (isset($_POST['edit_people_pass'])) {
    $sql = "SELECT * FROM `people` WHERE `Name` Like '$_SESSION[Name]' AND `password` = '$_POST[current_pass]'";
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $sql = "UPDATE `people` SET `password`='$_POST[change_pass]' WHERE `Name` = '$_SESSION[Name]'";
        $result = mysqli_query($link, $sql);
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Password change successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Invaild credentials
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
?>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title> Profile</title>


    <style>
        .profile {
            width: 70%;
            margin: auto;
            position: absolute;
            left: 20%;
            width: 60%;
            height: 18em;


        }

        .grid-container {
            text-align: left;
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 20px;
            grid-gap: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="model_edit3" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Change password</h3>
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                </div>

                <div class="modal-body">
                    <form action="/nitk/profile.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>current password</label>
                            <input type="password" class="form-control" id="current_pass" name="current_pass">
                        </div>
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" class="form-control" id="change_pass" name="change_pass">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Save Changes" name="edit_student_pass">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="model_edit4" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Change password</h3>
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                </div>

                <div class="modal-body">
                    <form action="/nitk/profile.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>current password</label>
                            <input type="password" class="form-control" id="current_pass" name="current_pass">
                        </div>
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" class="form-control" id="change_pass" name="change_pass">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Save Changes" name="edit_people_pass">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="model_edit2" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Profile</h3>
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                </div>

                <div class="modal-body">
                    <form action="/nitk/profile.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Father's Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name">
                        </div>
                        <div class="form-group">
                            <label>Mother's Name</label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name">
                        </div>
                        <div class="form-group">
                            <label>Father's Occupation</label>
                            <input type="text" class="form-control" id="father_occupation" name="father_occupation">
                        </div>
                        <div class="form-group">
                            <label>Mother's Occupation</label>
                            <input type="text" class="form-control" id="mother_occupation" name="mother_occupation">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" id="DOB" name="DOB">
                        </div>
                        <div class="form-group">
                            <label>Mobile_no</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Save Changes" name="edit_student">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="model_edit1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Profile</h3>
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                </div>

                <div class="modal-body">
                    <form action="/nitk/profile.php" method="post">
                        <div class="form-group">
                            <label for="username">Teacher Name</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="father_name">Role</label>
                            <input type="text" class="form-control" id="roll" name="roll">
                        </div>
                        <div class="form-group">
                            <label for="contact_details">Contact Details</label>
                            <input type="text" class="form-control" id="contact_details" name="contact_details">
                        </div>
                        <div class="form-group">
                            <label for="date_of_joining">Date of Joining</label>
                            <input type="date" class="form-control" id="date_of_joining" name="date_of_joining">
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" class="form-control" id="experience" name="experience">
                        </div>
                        <div class="form-group">
                            <label for="author_identifiers">Author identifiers</label>
                            <input type="text" class="form-control" id="author_identifiers" name="author_identifiers">
                        </div>
                        <div class="form-group">
                            <label for="academic_background">Academic Background</label>
                            <input type="text" class="form-control" id="academic_background" name="academic_background">
                        </div>
                        <div class="form-group">
                            <label for="area_of_interest">Area of Interest</label>
                            <input type="text" class="form-control" id="area_of_interest" name="area_of_interest">
                        </div>
                        <div class="form-group">
                            <label for="area_of_interest">Significant Projects</label>
                            <input type="text" class="form-control" id="significant_projects" name="significant_projects">
                        </div>
                        <div class="form-group">
                            <label for="area_of_interest">Significant Publications</label>
                            <input type="text" class="form-control" id="significant_publications" name="significant_publications">
                        </div>
                        <div class="form-group">
                            <label for="area_of_interest">Achievements</label>
                            <input type="text" class="form-control" id="achievements" name="achievements">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Save Changes" name="edit_teacher">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:60px;margin-left:20%;">Profile</h1>

    <hr>
    <?php
    //$id=$_COOKIE["gfg"]; 
    //$sql    = "SELECT * FROM students WHERE ID='$ID'";
    if ($_SESSION['role'] == 'people') {
        echo '
            <div style="display:flex">
            <button class="btn btn-primary" style="margin-left:17%;" data-target="#model_edit1" data-toggle="modal" >Edit Profile</button><br>
            <button class="btn btn-primary" style="margin-left:2%; padding:10px;" data-target="#model_edit4" data-toggle="modal" >Change Password</button>
            </div><br>';
    } else {
        echo '
            <div style="display:flex">
            
            <button class="btn btn-primary" style="margin-left:17%; " data-target="#model_edit2" data-toggle="modal" >Edit Profile</button>
            <button class="btn btn-primary" style="margin-left:2%; padding:10px;" data-target="#model_edit3" data-toggle="modal" >Change Password</button>
            </div><br>';
    }
    $name = $_SESSION['Name'];
    // if ($_SESSION['role'] == 'people' || $_SESSION['role'] == 'hod') 
    if ($_SESSION['role'] == 'students') {

        $sql = "SELECT * FROM `students` WHERE `Name` LIKE '$name'";
        $result = mysqli_query($link, $sql);
        while ($row    = mysqli_fetch_array($result)) {
            $Name    = $row['Name'];
            $Roll_no = $row['Roll_no'];
            $F_name = $row["Father's Name"];
            $M_name = $row["Mother's Name"];
            $F_occ = $row["Father's Occupation"];
            $M_occ = $row["Mother's Occupation"];
            $password = $row['password'];
            $DOB = $row['DOB'];
            $Mobile_no = $row['Mobile_no'];
            $email = $row['email_address'];
            $prog = $row['Programme'];
            $Year = $row['Year'];
            //   echo '
            //  <img src="data:image/jpeg;charset=utf8;base64,'. base64_encode($row['image']). ' " width="300" height="300" ';
            //  require "image.php";
            echo '
                <div script="">             
                <div style="text-align:center;box-shadow: 1px 1px 1px 1px;padding : 4%; width:80%;margin-left:10%;">  
                <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Basic Information</h1><hr><br>
                <div class="container">
                              <div class="row">
                                <div class="col-md-6"> <br> 
                                <img alt="no image" src="data:image/jpeg;charset=utf8;base64,' . base64_encode($row['image']) . ' " width="300" height="300" 
                           " class="responsive" style="border-radius: 25px;  box-shadow: 5px 5px 5px 5px;" width="225" height="250" /><br><br>
                          <h1 style=" font-size:25px;"> Student at NITK</h1></div>
                                <div class="col-md-6" style="text-align:left;"> 
                                <div class="container">
                <div class="row">
                    <div class="col-md-4"> <h4 style="display:inline; float:left;">Name </h4> </div>
                  <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' . $Name . ' </h4></div> 
                </div></div><hr>
                                
                <div class="container">
                <div class="row">
                  <div class="col-md-4">  <h4 style="display:inline; float:left;">Roll No </h4></div>
                  <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' .   $Roll_no . ' </h4></div> 
                </div></div><hr>
                <div class="container">
                <div class="row">
                  <div class="col-md-4">   <h4 style="display:inline; float:left;">Father Name </h4> </div>
                  <div class="col-md-8">   <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' .  $F_name . ' </h4> </div> 
                </div></div><hr>
                <div class="container">
                <div class="row">
                  <div class="col-md-4">   <h4 style="display:inline; float:left;">Mother Name </h4></div>
                  <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' .  $M_name . ' </h4> </div> 
                </div></div><hr>
                <div class="container">
                <div class="row">
                  <div class="col-md-4">  <h4 style="display:inline; float:left;">Mobile no.  </h4></div>
                  <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' . $Mobile_no . ' </h4> </div> 
                </div></div><hr>                                                       
               </div>     
               </div>                        
              </div>
              </div><br>
           
                ';
        }
    } else {
        $sql    = "SELECT * FROM `people` WHERE `Name` LIKE '$name'";
        $result = mysqli_query($link, $sql);
        while ($row    = mysqli_fetch_array($result)) {
            $Name    = $row['Name'];
            $password = $row['password'];
            $role = $row['Role'];
            $Mobile_no = $row['Contact Details'];
            $DOJ = $row['Date of joining'];
            $Experience = $row['Experience'];
            $Designation = $row['Designation'];
            $AuthId = $row['Author Identifers'];
            $Acad = $row["Academic Background"];
            $Interest = $row["Area of Interest"];
            $Project = $row["Significant Projects"];
            $Publications = $row["Significant Publications"];
            $Achivements = $row['Achivements'];
            $ID = $row['ID'];


            echo '
               <div script="">             
               <div style="text-align:center;box-shadow: 1px 1px 1px 1px;padding : 4%; width:80%;margin-left:10%;">  
               <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Basic Information</h1><hr><br>
               <div class="container">
                             <div class="row">
                               <div class="col-md-6"> <br> 
                               <img src="data:image/jpeg;charset=utf8;base64,' . base64_encode($row['image']) . ' " width="300" height="300" 
                          " class="responsive" style="border-radius: 25px;  box-shadow: 5px 5px 5px 5px;" width="225" height="250" /><br><br>
                         <h1 style=" font-size:25px;">' . $role . ' at NITK</h1></div>
                               <div class="col-md-6" style="text-align:left;"> 
                               <div class="container">
               <div class="row">
                   <div class="col-md-4"> <h4 style="display:inline; float:left;">Name </h4> </div>
                 <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' . $Name . ' </h4></div> 
               </div></div><hr>
                               
               <div class="container">
               <div class="row">
                 <div class="col-md-4">  <h4 style="display:inline; float:left;">College ID </h4></div>
                 <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' .   $ID . ' </h4></div> 
               </div></div><hr>
               <div class="container">
               <div class="row">
                 <div class="col-md-4">   <h4 style="display:inline; float:left;">Mobile no. </h4> </div>
                 <div class="col-md-8">   <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' .  $Mobile_no . ' </h4> </div> 
               </div></div><hr>
               <div class="container">
               <div class="row">
                 <div class="col-md-4">   <h4 style="display:inline; float:left;">Designation </h4></div>
                 <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' .  $Designation . ' </h4> </div> 
               </div></div><hr>
               <div class="container">
               <div class="row">
                 <div class="col-md-4">  <h4 style="display:inline; float:left;">Date of joining  </h4></div>
                 <div class="col-md-8">  <h4 style="display:inline;font-weight:normal;margin-left:10px; ">' . $DOJ . ' </h4> </div> 
               </div></div><hr>
               <div class="container">
               <div class="row">
                 <div class="col-md-4"> <h4 style="display:inline; float:left;">Experience </h4> </div>
                 <div class="col-md-8"> <h4 style="display:inline;font-weight:normal;margin-left:10px;">' .  $Experience . ' </h4> </div> 
               </div></div><hr>               
                                                                
             
                                                     
              </div>     
              </div>                        
             </div>
             </div><br>
             <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">  
               <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Author Identifiers</h1><hr><br>
               ' .  $AuthId . '<hr>
             </div><br>
             <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">  
               <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Academic Background</h1><hr><br>
               ' .  $Acad . '<hr>
             </div><br>
             <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">  
               <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Area Of Interests</h1><hr><br>
               ' . $Interest . '<hr>
             </div><br>
             <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">  
               <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Projects</h1><hr><br>
               ' .  $Project . '<hr>
               
             </div><br>
             <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">  
               <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Publications</h1><hr><br>
               ' .  $Publications . '<hr>
             </div><br>
             <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">  
               <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Achivements</h1><hr><br>
               ' . $Achivements . '<hr>
             </div><br>';
        }
    }


    ?>
    <?php
    require 'partials/_footer.php';
    ?>
</body>

</html>