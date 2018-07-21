<?php
//redirect to correct delivery page (or error page) in case user got here by accident
  if (isset($_GET["did"])) {
    $deliveryid = intval($_GET["did"]);

    //connect to AWS database and look up entry that matches delivery ID
    $link = mysqli_connect('RDS_HOSTNAME', 'RDS_USERNAME', 'RDS_PASSWORD', 'ebdb', 3306);
    $query = mysqli_query($link, "SELECT * FROM `deliveries` WHERE `deliveryid`= ".$deliveryid."");
    $name = mysqli_fetch_array($query);
 
    //$name[0] = delivery ID, $name[1] = boolean for scheduled/unscheduled
    if ($name[0]==$deliveryid AND $name[2]==0) {
      //header( 'Location: scheduledelivery.php?did='.$deliveryid );
      //exit;
    }
    elseif ($name[2]==1) {
      header( 'Location: rescheduledelivery.php?did='.$deliveryid );
      exit;
    }
    else {
      header( 'Location: http://shipfairy.com/#deliveryerror' );
      exit;
    }
  }
  
  else {
    header( 'Location: http://shipfairy.com/#deliveryerror' );
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/shipfairy-icon.ico">

    <title>ShipFairy | Evening Package Delivery</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- CSS for date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker3.min.css">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


<div class = "main-tagline-section">
  <a href="index.php"><img src="images/Detail Logo.svg" alt="Shipfairy Logo" class="nav-logo"></a>
</div>


<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Need help?</strong> Let us know at <a href="mailto:help@shipfairy.com">help@shipfairy.com</a>.
</div>

<div class="deliveryarea">
  <h4 class="formsubtitle">Delivery Address</h4>

<?php
$deliveryid = intval($_GET["did"]);

$link = mysqli_connect('RDS_HOSTNAME', 'RDS_USERNAME', 'RDS_PASSWORD', 'ebdb', 3306);
$stmt = mysqli_prepare($link, "SELECT name, address1, address2, price FROM `deliveries` WHERE `deliveryid`= ?");
mysqli_stmt_bind_param($stmt, 'i', $deliveryid);

//execute statement
mysqli_stmt_execute($stmt);

//bind result variables
mysqli_stmt_bind_result($stmt, $name, $address1, $address2, $unstyledprice);

//fetch value
mysqli_stmt_fetch($stmt);

if ($address2 != "") {
  echo $name."<br>".$address1."<br>".$address2."<br>Chicago, IL 60647";
} else {
  echo $name."<br>".$address1."<br>Chicago, IL 60647";
}

$price = "$".$unstyledprice;

//close statement and connection
mysqli_stmt_close($stmt);

//close connection
mysqli_close($link);
?>

  <form id="schedule-form">
    <h4 class="formsubtitle">Delivery Window</h4>
    <!-- <p class="delivery-instructions">Pick a day and a one hour delivery window, and you're all set. If you have any questions, please feel free to get in touch with us at <a href="mailto:help@shipfairy.com">help@shipfairy.com</a> with any questions.</p> -->

    <div id="formarea">

      <div class="form-group">
        <div id="sandbox-container">
          <div class="input-group date">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span><input readonly placeholder="Date" type="text" class="form-control" name="date" id="calendar" required>
          </div> <!-- .input-group date -->
        </div> <!-- .sandbox-container -->
      </div> <!-- .form-group -->

    <div class="form-group" >
      <select name="timeslot" class="form-control">
        <option value="6" id="6-7">6:00 - 7:00 PM (<?php echo $price ?>)</option>
        <option value="7" id="7-8">7:00 - 8:00 PM (<?php echo $price ?>)</option>
        <option value="8" id="8-9">8:00 - 9:00 PM (<?php echo $price ?>)</option>
        <option value="9" id="9-10">9:00 - 10:00 PM (<?php echo $price ?>)</option>
        <option value="10" id="10-11">10:00 - 11:00 PM (<?php echo $price ?>)</option>
      </select>
    </div>

    <!-- Pass DeliveryID to process-delivery.php through a hidden input field -->
    <input type="hidden" name="deliveryid" value="<?php echo $deliveryid ?>">

    <button type="submit" class="btn btn-default">Confirm</button>
  </form>

</div><!--.deliveryarea -->

<!--
<footer class="footer">
  <p><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> 2015 Shipfairy LLC</p>
</footer>
-->

<!-- Error Modal -->
<div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Error</h4>
      </div> 
      <div class="modal-body">
        Please select a date.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <!-- red bar that sticks to bottom of window -->
 <div class="footer-bar"></div>
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Moment.js is needed for date picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Script for date picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

<!-- Javascript required for date picker -->

<!-- First, some PHP to figure out the dates for our delivery window. -->
<?php 

date_default_timezone_set('America/Chicago');

//if it's before 5 PM in Chicago, the user can select today as a delivery date.
//Otherwise, the earliest date they can pick is tomorrow.
//The latest date they can pick is 30 days from today.
if (intval(date('H')) < 17) {
  $startdate = date('m/d/Y');
} else {
  $startdate = date('m/d/Y', strtotime('tomorrow'));
}

$enddate = date('m/d/Y', strtotime('+21 days'));

/*
By the way, there's actually a pretty big bug here. Since we're making our end date
30 days from today's date (i.e. the date the page was loaded), someone could open up this
page 30 days after receiving their delivery email and schedule a delivery 30 days from then.
We'll fix this for version 2...
*/
?>

<script>
$('#sandbox-container .input-group.date').datepicker({
    startDate: "<?php echo $startdate; ?>",
    endDate: "<?php echo $enddate; ?>",
    daysOfWeekDisabled: "0,6",
    autoclose: true,
    todayHighlight: true
});
</script>

<script>
  $( "#schedule-form" ).submit(function( event ) {
  //prevent form data from submitting normally
  event.preventDefault();

  //add ajax to pass variables to process-delivery.php, which will store data and email us notification
  var values = $(this).serialize();

  if ( $( "#calendar" ).val() == "" ) {
    $('#ErrorModal').modal('show');
  } else {
    $.ajax({
      url: "process-delivery.php",
      type: "post",
      data: values,
      success: function(result) {
        window.location.href = "http://shipfairy.com/#deliverysuccess";
      }
    });
  }
        
      //}
      });
    </script>

  </body>
</html>
