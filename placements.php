<!DOCTYPE html>
<html>
<?php
session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) 
// {
//     header("location: placements.php");
//     exit;
// }

require "partials/_dbconnect.php";
require 'partials/_nav.php';
$yr = array();
$placed = array();
$higher = array();
$sql    = "SELECT * FROM placements";
$result = mysqli_query($link, $sql);
while ($row    = mysqli_fetch_array($result)) {
    $placed[] = $row['placed'];
    $yr[] = $row['year_and_course'];
    $higher[] = $row['higher_studies'];
}
?>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="jquery-3.0.0.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/color/jquery.color-2.1.2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.js"></script>

    <script type="text/javascript">
        var numbers1 = <?php echo json_encode($placed); ?>;
        var l = <?php echo json_encode($yr); ?>;
        var numbers2 = <?php echo json_encode($higher); ?>;
    </script>
    <script type="text/javascript" src="placements.js"></script>



    <style>
        /* body {
            background-color: white;
        } */

        .button {
            position: relative;
            cursor: pointer;
            background-color: black;
            border: none;
            padding: 15px;
            color: white;
            width: 200px;
            text-align: center;
            font-size: 16px;
            -webkit-transition-duration: 0.2s;
            transition-duration: 0.2s;
            text-decoration: none;
        }

        .button:after {
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 1;
            transition: all 0.8s
        }
    </style>
    <title>Placement Statistics</title>
</head>

<body>
    <div class="container" style="margin-top: 50px; margin-bottom: 80px;">
        <h2 style="text-align: center; font-weight: bold;">Placement Statistics</h2>
        <hr>
        <p style="text-align: justify; font-size: 14px;"> Students of the department are sought after by the top companies in the world owing to their academic standing. The department consistently performs exceptionally in terms of placement statistics. Every year top companies like Microsoft, Adobe and Oracle come for placement and recruit students from the department. The placement percentage for the B.Tech courses is consistenly above 90%. The M.Tech courses are sought after by IT companies and educational insitutions. IT companies also recruit M.Tech graduates from our department for a research profile in their companies. </p>
        <br />
        <button class='button' id='placed'>Placed in companies</button>
        <button class='button' id='higher'>Higher Studies</button>
        <em>
            <p> *Press the buttons to see the stastics</p>
        </em>
        <br />
        <div style="background: #fff; padding: 30px;">
            <canvas height="60%" width='200' id='barChart'></canvas>
        </div>
    </div>

    <?php
    require 'partials/_footer.php';
    ?>
</body>

</html>