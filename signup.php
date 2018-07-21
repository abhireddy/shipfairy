<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/shipfairy-icon.ico">

    <title>Shipfairy | Evening Package Delivery</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

<!-- Sign Up GreetingModal -->
<div class="modal fade" id="SignUpGreetingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">We deliver!</h4>
      </div> 
      <div class="modal-body">
        We deliver to your zip code! Sign up and get a free delivery.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <body>

<div class = "main-tagline-section">
  <img src="images/Detail Logo.svg" alt="Shipfairy Logo" class="nav-logo">

<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container"> -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      <li><a class="custom-nav-link" href="index.php">HOME</a></li>
      <li><a class="custom-nav-link" href="about.php">FAQs</a></li>
      <li><a class="custom-nav-link active-nav-link" id="signup-nav-link" href="signup.php">SIGN UP</a></li>
    </div>
</div>

<div class="content">

  <div id="formarea">
          
  <form id="signup-form">
  <h4 class="formsubtitle">Account Information</h4>
  <!-- Account information -->
    <div class="form-group">
      <label for="email" class="sr-only">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
      <label for="password" class="sr-only">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>

    <!-- <div class="form-group">
      <label for="reenterpassword" class="sr-only">Re-Enter Password</label>
      <input type="password" class="form-control" id="repeatpassword" placeholder="Confirm Password" required>
    </div> -->

  <h4 class="formsubtitle">Delivery Information</h4>
  <!-- Delivery Information -->
    <div class="form-group">
      <label for="Name" class="sr-only">Full Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
    </div>

    <div class="form-group">
      <label for="phone" class="sr-only">Mobile Number</label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" required>
    </div>

    <div class="form-group">
      <label for="address1" class="sr-only">Street Address</label>
      <input type="text" class="form-control" id="address1" name="address1" placeholder="Street Address" required>
    </div>

    <div class="form-group">
      <label for="address2" class="sr-only">Apartment or Suite</label>
      <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or Suite">
    </div>

    <div class="form-group">
      <label for="zip" class="sr-only">ZIP Code</label>
      <input type="text" class="form-control" value="Chicago, IL 60647" readonly>
    </div>

    <div class="form-group">
      <label for="special-instructions" class="sr-only">Special Delivery Instructions</label>
      <textarea class="form-control" rows=2 id="special-instructions" name="special-instructions" placeholder="(Optional) Special Delivery Instructions"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  </div>
</div>

 <!-- red bar that sticks to bottom of window -->
 <div class="footer-bar"></div>

<!-- Password Mismatch Modal -->
<div class="modal fade" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Error</h4>
      </div> 
      <div class="modal-body">
        Your passwords do not match.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!-- deactivate sign up nav link -->
    <script>
      $( "#signup-nav-link" ).click(function(event) {
        event.preventDefault();
      });
    </script>

    <script>
    $( "#signup-form" ).submit(function( event ) {
      //prevent form data from submitting normally


      var values = $(this).serialize();
        
      $.ajax({
        url: "process-signup.php",
        type: "post",
        data: values,
        success: function(result) {
          window.location.href = "http://shipfairy.com/#signupsuccess";
        }
      });

      event.preventDefault();
      });
    </script>

    <script>
      $( document ).ready(function() {
          $('#SignUpGreetingModal').modal('show');         
      });
    </script>

  </body>
</html>
