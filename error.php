<!DOCTYPE html>
<html lang="en">
  <head>

    <?php
      if (isset($_GET["did"])) {
        $deliveryid = intval($_GET["did"]);
        header( 'Location: scheduledelivery.php?did='.$deliveryid );
        exit;
      }
    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>ShipFairy | Evening Package Delivery</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- CSS for date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker3.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="images/navbarlogo.png" alt="ShipFairy"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="divider-vertical"></li>
            <li><a href="#contact">Sign In</a></li>  
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">

<div class="deliveryarea">
<form>
<h4 class="formsubtitle">Schedule Delivery</h4>
<p>Pick a day and a one hour delivery window, and you're all set. You can change your selection up until 5:00 PM on the day of your scheduled delivery. Get in touch at <a href="mailto:delivery@shipfairy.com">delivery@shipfairy.com</a> with any questions.</p>
<div class="form-group">
<div id="sandbox-container">
<div class="input-group date">
  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span><input readonly placeholder="Date" type="text" class="form-control" id="calendar">
</div> <!-- .input-group date -->
</div> <!-- .sandbox-container -->
</div> <!-- .form-group -->

<div class="form-group">
<input type="date" class="form-control" min="2015-03-05">
</div>

<div class="form-group">
<select name="timeslot" class="form-control">
   <option value="6-7" id="6-7">6:00 - 7:00 PM</option>
   <option value="7-8" id="7-8">7:00 - 8:00 PM</option>
   <option value="8-9" id="8-9">8:00 - 9:00 PM</option>
   <option value="9-10" id="9-10">9:00 - 10:00 PM</option>
</select>
</div>

<h4 class="formsubtitle">Delivery Address</h4>
   Abhinay Reddy<br>
   2600 N Kimball Ave<br>
   Apt 314<br>
   Chicago, IL 60647<br>

  <button type="submit" class="btn btn-default">Confirm</button>
</form>

</div><!--.deliveryarea -->

<footer class="footer">
  <p><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> 2015 Shipfairy LLC</p>
</footer>


      </div><!--/.starter-template -->

    </div><!-- /.container -->


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
<script>
$('#sandbox-container .input-group.date').datepicker({
    startDate: "03/01/2015",
    endDate: "03/31/2015",
    daysOfWeekDisabled: "0,6",
    autoclose: true,
    todayHighlight: true
});
</script>

  </body>
</html>
