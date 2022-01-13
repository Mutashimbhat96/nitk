<?php
session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) 
// {
//     header("location: people_profile_display.php");
//     exit;
// }
require "partials/_dbconnect.php";
require 'partials/_nav.php';   ?>
<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> Profile Display</title>


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

  <?php
  $id = $_COOKIE["gfg"];


  //$sql    = "SELECT * FROM students WHERE ID='$ID'";
  $sql    = "SELECT * FROM people WHERE ID=$id";
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
    $image = $row['image']; ?>
    <!-- <h3 style=" font-family: Arial, Helvetica, sans-serif;font-size:60px;margin-left:20%;">Welcome <?php echo  $Name; ?> </h3> -->
    <hr>
    <div script="">
      <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Basic Information</h1>
        <hr><br>
        <div class="container">
          <div class="row">
            <div class="col-md-6"> <br> <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($row['image']);
                                                                                      ?>" class="responsive" style="border-radius: 25px;  box-shadow: 5px 5px 5px 5px;" width="225" height="250" /><br><br>
              <h1 style=" font-size:25px;"> <?php echo  $role; ?> at NITK</h1>
            </div>
            <div class="col-md-6" style="text-align:left;">
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h4 style="display:inline; float:left;">Name </h4>
                  </div>
                  <div class="col-md-8">
                    <h4 style="display:inline;font-weight:normal;margin-left:10px; "><?php echo  $Name; ?> </h4>
                  </div>
                </div>
              </div>
              <hr>

              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h4 style="display:inline; float:left;">College ID </h4>
                  </div>
                  <div class="col-md-8">
                    <h4 style="display:inline;font-weight:normal;margin-left:10px; "><?php echo   $row['ID']; ?> </h4>
                  </div>
                </div>
              </div>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h4 style="display:inline; float:left;">Mobile no. </h4>
                  </div>
                  <div class="col-md-8">
                    <h4 style="display:inline;font-weight:normal;margin-left:10px; "><?php echo  $Mobile_no; ?> </h4>
                  </div>
                </div>
              </div>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h4 style="display:inline; float:left;">Designation </h4>
                  </div>
                  <div class="col-md-8">
                    <h4 style="display:inline;font-weight:normal;margin-left:10px; "><?php echo  $Designation; ?> </h4>
                  </div>
                </div>
              </div>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h4 style="display:inline; float:left;">Date of joining </h4>
                  </div>
                  <div class="col-md-8">
                    <h4 style="display:inline;font-weight:normal;margin-left:10px; "><?php echo  $DOJ; ?> </h4>
                  </div>
                </div>
              </div>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <h4 style="display:inline; float:left;">Experience </h4>
                  </div>
                  <div class="col-md-8">
                    <h4 style="display:inline;font-weight:normal;margin-left:10px;"><?php echo  $Experience; ?> </h4>
                  </div>
                </div>
              </div>
              <hr>



            </div>
          </div>
        </div>
      </div><br>
      <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Author Identifiers</h1>
        <hr><br>
        <?php echo  $AuthId; ?>
        <hr>
      </div><br>
      <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Academic Background</h1>
        <hr><br>
        <?php echo  $Acad; ?>
        <hr>
      </div><br>
      <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Area Of Interests</h1>
        <hr><br>
        <?php echo $Interest; ?>
        <hr>
      </div><br>
      <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Projects</h1>
        <hr><br>
        <?php echo  $Project; ?>
        <hr>

      </div><br>
      <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Publications</h1>
        <hr><br>
        <?php echo  $Publications; ?>
        <hr>
      </div><br>
      <div style="text-align:center;box-shadow: 2px 2px 2px 2px;padding : 4%; width:80%;margin-left:10%;">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;font-size:40px;margin-left:10px;">Achivements</h1>
        <hr><br>
        <?php echo $Achivements; ?>
        <hr>
      </div><br>





    <?php } ?>

    <?php
    require 'partials/_footer.php';
    ?>
</body>

</html>