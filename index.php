<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title>Welcome - <?php echo (isset($_SESSION['Name'])) ? $_SESSION['Name'] : ''; ?></title>
</head>

<body>
  <?php
  require 'partials/_nav.php';
  ?>
  <div class="">
    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert"> -->

    <!-- <h4 class="alert-heading">Welcome - <?php echo $_SESSION['Name']; ?>!</h4> -->

    <button type="button" class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>

  </div>
  </div>

  <!--slider   -->

  <div id="demo" class="carousel slide slidespc" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>

    </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active ">
        <img style="width: 100%; height: 500px; opacity: 0.9;
	filter: alpha(opacity=80);" src="dept.jpg" alt="CSE deptartment">
        <div class="carousel-caption">
          <h3 class="top-left" style="color: #fff; font-size: 50px; font-weight: 700;">Computer Science Department </h3>

          <!-- <button class="btn-primary">Adm</button> -->
        </div>
      </div>
      <div class="carousel-item ">
        <img style="width: 100%; height: 500px;" src="dept1.jpeg" alt="Chicago">


        <!-- <button class="btn-primary">Adm</button> -->
      </div>
    </div>

  </div>
  <!-- Left and right controls -->
  <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    </a>
</div> -->
  <br />
  <!-- About -->
  <div style="padding: 50px 50px;">
    <p style="font-size: 13.008px; text-align: center;"><span style="font-size:25px; text-align: center; font-weight: bold;"><span style="color: #d84b6b;"><span><strong>About the Department</strong></span></span></span></p>
    <hr />
    <p style="font-size: 13.008px;">   </p>
    <p style="font-size: 13.008px; text-align: justify; padding: 10px 50px;"><span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;">The Department of Computer Science &amp; Engineering was established in the year 1986. Since  then, the department has held a position of pride in NITK. It has consistently fulfilled its role of producing Computer Engineers ready to meet the demands of the IT world. The department has always attracted the best of engineering aspirants from all over the country. It has a well qualified and experienced team of faculty. The Department offers B.Tech., M.Tech., M.Tech.(By Research) and Ph.D. courses in Computer Science and Engineering. The department has adequate facilities to support these teaching activities. Students of the department have access to sufficient high end computing facilities. The Department is also actively involved in various research activities. The facilities are adequate to cater to the needs of Research activities. The department has signed MoU with IBM, Intel, Leeds Metropolitan University and others, for academic collaborative projects.</span></span></p>
    <p style="font-size: 13.008px;">   </p>

    <p style="font-size: 13.008px;">   </p>
  </div>

  <!-- two column -->

  <div class="row" style="padding:  90px 50px 50px 50px; background-color: #fff;">
    <!-- vision -->
    <div class="vision col-8" style="padding: 30px 50px 0px 20px; background-color: #e5ffcc; ">
      <br />
      <p style="text-align: center;"><span><span><span style="color:#d84b6b; font-weight: bold;"><strong style="font-size: 16.008px;">Vision</strong></span></span></span></p>
      <hr />
      <div style="margin-left: 20px;">
        <p style="text-align: justify;"><span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><em><span style="line-height: 1.538em;">To facilitate transformation of students into good human beings, responsible citizens and competent professionals, focusing on assimilation, generation and dissemination of knowledge in the area of Computer Science &amp; Engineering.  </span></em></span></span></p>
      </div>
      <p style="text-align: center;"><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><span style="color: #d84b6b; font-weight: bold;"><strong>Mission</strong></span></span></span></p>
      <hr />
      <div style="margin-left: 30px;">
        <ul>
          <li style="text-align: justify;"><span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><em>Impart quality education to meet the needs of profession and society, and achieve excellence in teaching-learning and research in the area of Computer Science &amp; Engineering.  </em></span></span></li>
          <li style="text-align: justify;"><span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><em>Attract and develop talented and committed human resource, and provide an environment conducive to innovation, creativity, team-spirit and entrepreneurial leadership in Computer Science &amp; Engineering field.  </em></span></span></li>
          <li style="text-align: justify;"><span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><em>Facilitate effective interactions among faculty and students of the <span data-scayt_word="CSE" data-scaytid="1">CSE</span> Department, and foster networking with alumni, industries, institutions and other stake-holders.</em></span></span></li>
          <li style="text-align: justify;"><span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><em>Practice and promote high standards of professional ethics, transparency and accountability.</em></span></span></li>
        </ul>
      </div>
    </div>
    <!--news-->
    <div class="news-scroll col-4" style="background-color: #e5ffcc; padding: 50px -20px 0px 0px;">
      <br />
      <br />
      <p><span style="color:#000000;"><strong style="font-size: 13.008px;"><span style="font-family: arial, helvetica, sans-serif; font-size: 16px; color: #d84b6b; text-align: center; font-weight: bold;">News and Upcoming Events</span></strong></span></p>
      <div id="nt-example1-container">
        <!-- <i class="fa fa-arrow-up" id="nt-example1-prev"></i> -->
        <ul id="nt-example1">
          <?php
          require 'partials/_dbconnect.php';

          if ($_SERVER['REQUEST_METHOD'] == "GET") {

            $query = "SELECT * FROM news";
            $result = mysqli_query($link, $query);

            while ($row = mysqli_fetch_array($result)) { ?>
              <li>
                <div class="row src">
                  <div class="col-4">
                    <div class="date-blk" id="news-div"><span id="n-span1">
                        <?php echo "" . $row["day"] . "";  ?> </span><span id="n-span2"> <?php echo "" . $row["Date"] . ""; ?></div>
                  </div>
                  <div class="col-8" id="n-content" style="font-family:arial,helvetica,sans-serif;"><?php echo "" . $row["Content"] . ""; ?></div></em>
                </div>
              </li>
          <?php }
          }
          ?>


        </ul>

      </div>
      <br />
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
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="jquery.newsTicker.js"></script>
  <script>
    var nt_example1 = $('#nt-example1').newsTicker({
      row_height: 80,
      max_rows: 5,
      duration: 4000,
      prevButton: $('#nt-example1-prev'),
      nextButton: $('#nt-example1-next')
    });
  </script>
</body>

</html>