<?php
  // include('../configuration.php');
  include('../controller/AdeleyeMySql.php');
  $adeleye1 = new AdeleyeMySql();
  
  if($adeleye1->connections("localhost","root","","LicenceGenerate")){
    // echo "connection established!!";
  }
  // $connect = $adeleye->connect();
  // session_name("Admin-start");
  // session_start();
// if (!isset($_SESSION['pass1'])) {
//     header("Location: ../login.html");
//   }

    // $username = $_GET['q'];
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Meta-Information -->
    <title>Web Licencing App</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap 4 Stylesheets  -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="css/icons.min.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Color Scheme -->
    <link rel="stylesheet" href="css/color-schemes/color.css" type="text/css" title="color3">
    <link rel="alternate stylesheet" href="css/color-schemes/color1.css" title="color1">
    <link rel="alternate stylesheet" href="css/color-schemes/color2.css" title="color2">
    <link rel="alternate stylesheet" href="css/color-schemes/color4.css" title="color4">
    <link rel="alternate stylesheet" href="css/color-schemes/color5.css" title="color5">
</head>

<body class="">
<?php //include('headerspage.php'); ?>
<!-- Topbar -->
<div class="container">
  <div class="pos-f-t">
      <!-- <div class="collapse" id="navbarToggleExternalContent"> -->
        <div class="bg-dark p-4">
          <a class="btn btn-primary" href="../model/Logout.php" role="button">Logout</a>
          <!-- <a class="btn btn-primary" href="reportpage.php" role="button">View Log</a> -->
        </div>
        
      <!-- </div> -->
  </div>
    <div class="widget pad50-65">
      <div class="pg-tp">
          <i class="ion-cube"></i>
          <div class="pr-tp-inr">
              <h4>View Records</h4>
              <span>See generated plate numbers </span>
          </div>
          <div class="pr-tp-inr">
              <h5>arrange by date</h5>
              <form class="form-inline" action="../model/Datesorter.php" method="post">
              <div class="form-group mx-sm-2 mb-1">
                <!-- <label for="" class="sr-only">Number of plate num</label> -->
                <input type="date" class="form-control" id="input" placeholder="select start date" name="date1" required="required">
            </div>
              <div class="form-group mx-sm-2 mb-1">
                <!-- <label for="" class="sr-only">Number of plate num</label> -->
                <input type="date" class="form-control" id="input" placeholder="select number of query" name="date2" required="required">
            </div>
            <button type="submit" style="width: 60px;" class="btn btn-primary">Enter</button>
            </form>
          </div>

      </div>
        <table class="table">
            <thead>
                  <tr>
                    <th>S/N</th>
                    <!-- <th>Local Government</th> -->
                    <th>Plate number</th>
                    <th>Date generated</th>
                  </tr>
            </thead>
            <tbody>
                <?php 
                  $i =  1;
                  $count=0;
                  if(isset($_GET['q'])){
                    $qt = $_GET['q'];
                    // echo $qt;
                    $qt = explode(" ", $qt);
                      $query1 = "SELECT * FROM logtable WHERE dates BETWEEN '$qt[0]' AND '$qt[1]'";
                      $counter = $adeleye1 -> get_num_rows($query1);
                      // echo $query1;
                  }
                  else{
                    $query1 = "SELECT * FROM logtable";
                    $counter = $adeleye1 -> get_num_rows($query1);
                  }
                   // echo $counter;
                  do{
                  $query2 = "SELECT * FROM logtable WHERE id=".$i;
                  $row = $adeleye1 -> connectDB($query2);

                  // $qt = $adeleye -> qconcate(trim($row['firstname']),trim($row['midname']),trim($row['lastname']))."&".$row["promotion_level"]."&".$row['phonenum']."&".$row['other_details'];
                  // $qt = str_replace(' ','+',$adeleye -> qconcate(trim($row['firstname']),trim($row['midname']),trim($row['lastname'])));
                      // echo trim($row['department']);
                     $count++;?>
                       <tr>
                          <th scope="row"><?php echo $count;?></th>
                          <td><?php echo $row['platenum'];?></td>
                          <td><?php echo $row["dates"];?></td>
                      </tr>
                  <?php
                $i++;
              }while($i<=$counter);
              ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Panel Content -->
<footer>
    <p>Copyright<a href="#" title="">LicenceApp</a> &amp; 2019</p>
</footer>

<!-- Vendor: Javascripts -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<!-- Vendor: Followed by our custom Javascripts -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/select2.min.js" type="text/javascript"></script>
<script src="js/slick.min.js" type="text/javascript"></script>

<!-- Our Website Javascripts -->
<script src="js/isotope.min.js" type="text/javascript"></script>
<script src="js/isotope-int.js" type="text/javascript"></script>
<script src="js/jquery.counterup.js" type="text/javascript"></script>
<script src="js/waypoints.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script src="js/highcharts-more.js" type="text/javascript"></script>
<script src="js/moment.min.js" type="text/javascript"></script>
<script src="js/jquery.circliful.min.js" type="text/javascript"></script>
<script src="js/fullcalendar.min.js" type="text/javascript"></script>
<script src="js/jquery.downCount.js" type="text/javascript"></script>
<script src="js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="js/jquery.formtowizard.js" type="text/javascript"></script>
<script src="js/form-validator.min.js" type="text/javascript"></script>
<script src="js/form-validator-lang-en.min.js" type="text/javascript"></script>
<script src="js/cropbox-min.js" type="text/javascript"></script>
<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="js/jquery.poptrox.min.js" type="text/javascript"></script>
<script src="js/styleswitcher.js" type="text/javascript"></script>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>

</html>