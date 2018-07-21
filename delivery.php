<?php
/*
script redirects to 1 of 3 pages:
  page to schedule delivery for first time (scheduledelivery.php),
  page to reschedule delivery if user has already submitted a choice (rescheduledeliver.php),
  or an error page (actually an error pop-up on the home page)
  if the incoming URL has a missing or invalid delivery ID.
*/

  if (isset($_GET["did"])) {
    $deliveryid = intval($_GET["did"]);

    //connect to AWS database and look up entry that matches delivery ID
    $link = mysqli_connect('RDS_HOSTNAME', 'RDS_USERNAME', 'RDS_PASSWORD', 'ebdb', 3306);
    $query = mysqli_query($link, "SELECT * FROM `deliveries` WHERE `deliveryid`= ".$deliveryid."");
    $name = mysqli_fetch_array($query);


    //$name[0] = delivery ID, $name[2] = boolean for scheduled/unscheduled
    if ($name[0]==$deliveryid AND $name[2]==0) {
      header( 'Location: scheduledelivery.php?did='.$deliveryid );
      exit;
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
