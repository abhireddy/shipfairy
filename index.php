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

    <!-- CSS below only applies to this page. Don't want it in main CSS file. -->
    <style>
      .form-inline .form-control { 
        max-width: 196px;
        margin-left: auto;
        margin-right: auto; 
        height: 40px;
      }
    </style>

  </head>

<!-- Modals (pop-ups) below -->

<!-- Error Modal -->
<div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Error</h4>
      </div> 
      <div class="modal-body">
        Please enter a valid zip code.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Sign Up Modal -->
<div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">We deliver!</h4>
      </div> 
      <div class="modal-body">
        We operate in your neighborhood. Sign up and try us out for free.
      </div>
      <div class="modal-footer">
        <form action="signup.php">
          <button type="submit" class="btn btn-primary">Get a Free Delivery</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Wait List Modal -->
<div class="modal fade" id="WaitListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Coming Soon</h4>
      </div> 
      <div class="modal-body">
        We don't deliver to your neighborhood yet, but we'd love to get in touch when we do.<br><br>
        <!-- <div id="formarea"> -->
          <form id="waitlist-form">
            <div class="form-group">
              <label for="email" class="sr-only">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
            </div>
            <input type="hidden" id="waitlist-zip" name="zipcode">
        <!--</div>-->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Notify Me</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- Sign Up Nav Modal -->
<div class="modal fade" id="SignUpNavModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
      </div> 
      <div class="modal-body">
          <div class="modal-zipform">
            <!-- ZIP Code Lookup Form -->
            <form class="form-inline" id="modal-zipform">
              <div class="form-group" id="modal-zipform-group">
                <label for="modal-zipcode" class="sr-only">Zip Code</label>
                <input type="text" class="form-control" id="modal-zipcode" maxlength=5 placeholder="Enter Zip Code" required>
              </div>
              <button type="submit" class="btn btn-default"><span class="btn-text">Check Availability</span></button>
            </form>
          </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Check Availability</button>
      </div> -->
        </form>
    </div>
  </div>
</div>
</div>


<!-- Sign Up Success Modal (redirected from signup.php) -->
<div class="modal fade" id="SignUpSuccessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">You're all set!</h4>
      </div> 
      <div class="modal-body">
        Thanks for signing up. You should receive a confirmation email shortly. Your account will be fully set up within 24 hours.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delivery Error Modal -->
<div class="modal fade" id="DeliveryErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Error</h4>
      </div> 
      <div class="modal-body">
        Sorry, something went wrong! Please contact <a href="mailto:help@shipfairy.com">help@shipfairy.com</a> so we can schedule your delivery.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delivery Success Modal -->
<div class="modal fade" id="DeliverySuccessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Success!</h4>
      </div> 
      <div class="modal-body">
        Your delivery's been scheduled. You should receive a confirmation email shortly.
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
      <li><a class="custom-nav-link active-nav-link" href="index.php">HOME</a></li>
      <li><a class="custom-nav-link" href="about.php">FAQs</a></li>
      <li><a class="custom-nav-link" id="signup-nav-link" href="signup.php">SIGN UP</a></li>
    </div>
</div>

<div class="content">
  <div class = "pitch">
    <h1 class="main-tagline">Get your packages, not missed delivery slips.</h1>
    <h2>Shipfairy receives your packages and delivers them to you when you're actually home. 
      Choose any 1 hour slot from 6 to 11 PM for just $5.
    </h2>
  </div>

  <div class="three-steps-outer">
    <div class ="three-steps-section">
      <div class="three-steps-title">How It Works</div>
      <div class="three-steps-bar"></div>
      <div class="row">
        <div class="col-md-2">
          <p class="grid-textfield">Buy stuff online and ship it to a unique mailing address.</p>
        </div>
        <div class="col-md-2">
          <img src="images/Box-Hand-128.svg" alt="Package In Hand">
        </div>
        <div class="col-md-2">
          <p class="grid-textfield">Pick a date and time when you'll be home.</p>
        </div>
        <div class="col-md-2">
          <img src="images/Calendar-Time-128.svg" alt="Calendar and Clock">
        </div>
        <div class="col-md-2">
          <p class="grid-textfield">We'll deliver your package within a 1 hour window.</p>
        </div>
        <div class="col-md-2">
          <img src="images/Delivery-128.svg" alt="Truck and Clock">
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer-area">
    <h1 class="footer-tagline">Interested? Try us out for free.
      <br>Get your first package delivered on us when you sign up.</h1>
    <div class="home-zipform">
      <!-- ZIP Code Lookup Form -->
      <form class="form-inline" id="home-zipform">
        <div class="form-group" id="home-zipform-group">
          <label for="home-zipcode" class="sr-only">Zip Code</label>
          <input type="text" class="form-control" id="home-zipcode" maxlength=5 placeholder="Enter Zip Code" required>
        </div>
        <button type="submit" class="btn btn-default"><span class="btn-text">Check Availability</span></button>
      </form>
    </div>
  </div>
</div>


 <!-- red bar that sticks to bottom of window -->
 <div class="footer-bar"></div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!-- pop up a modal to verify zip code when user clicks SIGN UP nav link -->
    <script>
      $( "#signup-nav-link" ).click(function(event) {
        $('#SignUpNavModal').modal('show');
        event.preventDefault();
      });
    </script>


    <script>

      //calls a specific modal (Boostrap popup) based on zip code entered.
      $( "#home-zipform" ).submit(function( event ) {
        if ( $( "#home-zipcode" ).val() == '60647' ) {
          window.location.href = "signup.php";
          event.preventDefault();
        }
        else if ( $.isNumeric( $( "#home-zipcode" ).val() ) && $( "#home-zipcode" ).val().length == 5 ) {
          $('#WaitListModal').modal('show');
          $('#waitlist-zip').val( $( "#home-zipcode" ).val() );
          event.preventDefault();
        }
        else {
          $('#ErrorModal').modal('show');
          event.preventDefault();
        }
      });

      //same as script above, but for zipcode form within the signup nav modal
      $( "#modal-zipform" ).submit(function( event ) {
        if ( $( "#modal-zipcode" ).val() == '60647' ) {
          window.location.href = "signup.php";
          event.preventDefault();
        }
        else if ( $.isNumeric( $( "#modal-zipcode" ).val() ) && $( "#modal-zipcode" ).val().length == 5 ) {
          $('#WaitListModal').modal('show');
          $('#waitlist-zip').val( $( "#modal-zipcode" ).val() );
          event.preventDefault();
        }
        else {
          $('#ErrorModal').modal('show');
          event.preventDefault();
        }
        $('#SignUpNavModal').modal('hide');  
      });


      //submits user's email and zip code to a background PHP file that adds info to a database
      $( "#waitlist-form" ).submit(function( event ) {
        //add ajax to pass variables to waitlist.php, which will store email & zip in AWS database
        var values = $(this).serialize();
        
        $.ajax({
          url: "waitlist.php",
          type: "post",
          data: values,
          success: function(result) {
            $('#WaitListModal').modal('hide');
          }
        });
        
        //prevent form data from submitting notrmally
        event.preventDefault();
      });
    </script>

    <script>
      $( document ).ready(function() {

        var redirect = document.URL.split('#')[1];
        
        if (redirect == "signupsuccess") {
          $('#SignUpSuccessModal').modal('show');
        } 
        else if (redirect == "deliveryerror") {
          $('#DeliveryErrorModal').modal('show');
        } 
        else if (redirect == "deliverysuccess") {
          $('#DeliverySuccessModal').modal('show');
        }
          
      });
    </script>
  </body>
</html>