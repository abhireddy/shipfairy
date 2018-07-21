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
      <li><a class="custom-nav-link active-nav-link" href="about.php">FAQs</a></li>
      <li><a class="custom-nav-link" id="signup-nav-link" href="signup.php">SIGN UP</a></li>
    </div>
</div>

<div class="content">

  <style>
    .col-md-2 {
      padding-top: 0;
      padding-bottom: 20px;
    }

  </style>

<div class="about-content">
  <div class="row">
    <div class="col-md-2">
      <img src="images/package-128.svg" height="80" width="80" alt="package icon">
    </div>
    <div class="col-md-10">
      <p class="faq-leader">When you sign up, you get a unique shipping address at our facility to use when you’re shopping online or getting stuff mailed to you from friends and family. 
        When we receive a package for you, we'll email you a link to use to schedule a delivery.</p>
    </div>
  </div>

  <p class="faq-title">Frequently Asked Questions</p>

  <p class="faq-question">Where does Shipfairy operate?</p>
  <p class="faq-answer">Right now, we’re expanding in the Chicago area. 
    If you live in Chicago and we don’t already serve your zip code, join our waiting list - we’ll probably be there soon.</p>

    <style>
    .home-zipform {
      padding: 10px 0 20px 0;
      font-family: ADBrown;
    }
    </style>

    <div class="home-zipform">
      <!-- ZIP Code Lookup Form -->
      <form class="form-inline" id="zipform">
        <div class="form-group" id="zipform-group">
          <label for="zipcode" class="sr-only">Zip Code</label>
          <input type="text" class="form-control" id="zipcode" maxlength=5 placeholder="Enter Zip Code" required>
        </div>
        <button type="submit" class="btn btn-default"><span class="btn-text"> Check Availability</span></button>
      </form>
    </div>

  <p class="faq-question">When does Shipfairy deliver?</p>
  <p class="faq-answer">We deliver from 6 PM to 11 PM, Monday through Friday.</p>

  <p class="faq-question">How much does Shipfairy cost?</p>
  <p class="faq-answer">$5 per delivery, and your first delivery is free. We don't charge any extra fees.
    Signing up and maintaining an account are absolutely free.</p>

  <p class="faq-question">How do I pay for delivery?</p>
  <p class="faq-answer">You can pay in person with a credit card or cash when we deliver your items.</p>

  <p class="faq-question">Should I tip?</p>
  <p class="faq-answer">Our delivery team doesn’t accept tips.</p>

  <p class="faq-question">How do I schedule a delivery?</p>
  <p class="faq-answer">When we receive a package for you, we'll send you an email with a link 
    to pick a date and time slot that work for you.</p>

  <p class="faq-question">Can I reschedule a delivery?</p>
  <p class="faq-answer">You can reschedule at any time at no additional cost. 
    When you book a time slot, your confirmation email will include a link you can use to make changes to your delivery window.</p>

  <p class="faq-question">How long do I have to schedule a delivery?</p>
  <p class="faq-answer">We ask that you schedule a delivery within 2 weeks of notice that we're holding your package.</p>

  <p class="faq-question">How can I contact Shipfairy?</p>
  <p class="faq-answer">Shoot us an email at <a href="mailto:help@shipfairy.com">help@shipfairy.com</a>. We'd love to hear from you.</p>
</div>
</div> <!-- end of content -->

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

    <script>

      //calls a specific modal (Boostrap popup) based on zip code entered.
      $( "#zipform" ).submit(function( event ) {
        if ( $( "#zipcode" ).val() == '60647' ) {
          window.location.href = "signup.php";
          event.preventDefault();
        }
        else if ( $.isNumeric( $( "#zipcode" ).val() ) && $( "#zipcode" ).val().length == 5 ) {
          $('#WaitListModal').modal('show');
          $('#waitlist-zip').val( $( "#zipcode" ).val() );
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
        
        //prevent form data from submitting normally
        event.preventDefault();
      });
    </script>

    <script>
      $( "#signup-nav-link" ).click(function(event) {
        $('#SignUpNavModal').modal('show');
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