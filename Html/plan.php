<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link type="text/css" rel="stylesheet" href="css/style.css">
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='css/moment.min.js'></script>
<script src='css/jquery.min.js'></script>
<script src='css/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2018-11-25',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
 
      <?php
	  session_start();
	  require('php/connect.php');
	  $USERID = $_SESSION['login_tourist'];
	  
	  $sql1="SELECT AName, ADate, ATime
			FROM RecommandAttraction as RA, Arrange as AR, Attraction as A
			WHERE AR.arrangeId = RA.arrangeId AND A.AID = RA.AID AND AR.touristsId = $USERID;";
	  $sql2 = "SELECT RName, RDate, RTime
			FROM RecommandRes as RR, Arrange as AR, Restaurant as R
			WHERE AR.arrangeId = RR.arrangeId AND R.RID = RR.RID AND AR.touristsId = $USERID;";
	  $sql3 = "SELECT HName, HDate
			FROM RecommandHotel as RH, Arrange as AR, Hotel as H
			WHERE AR.arrangeId = RH.arrangeId AND H.HID = RH.HID AND AR.touristsId = $USERID;";
	  /* Display Selected Attraction */
	  if ($stmt = mysqli_prepare($link, $sql1)) {
        /* execute statement */
        mysqli_stmt_execute($stmt);
        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $AName, $ADate, $ATime);
        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
			$start = $ADate;
			$end = $ADate;
			if ($ATime == 'MORN') {
				$start .=  "T09:00:00";
				$end .= "T12:00:00";
			} else {
				$start .= "T14:00:00";
				$end .= "T18:00:00";
			}
            echo "{
			  title: '$AName',
			  start: '$start',
			  end: '$end',
			},";
		}
        /* close statement */
        mysqli_stmt_close($stmt);
    } 
	
	/* Display Selected Restaurant */
	if ($stmt = mysqli_prepare($link, $sql2)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $RName, $RDate, $RTime);
        while (mysqli_stmt_fetch($stmt)) {
			$start = $RDate;
			$end = $RDate;
			if ($RTime == 'MORN') {
				$start .=  "T012:00:00";
				$end .= "T14:00:00";
			} else {
				$start .= "T18:00:00";
				$end .= "T20:00:00";
			}
            echo "{
			  title: '$RName',
			  start: '$start',
			  end: '$end',
			},";
		}
        mysqli_stmt_close($stmt);
    }
	
	
	/* Display Selected Hotel */
	if ($stmt = mysqli_prepare($link, $sql3)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $AName, $ADate, $ATime);
        while (mysqli_stmt_fetch($stmt)) {
			$start = $HDate . "T22:00:00";
			$end = $HDate .  "T23:59:59";
            echo "{
			  title: '$HName',
			  start: '$start',
			  end: '$end',
			},";
		}
        mysqli_stmt_close($stmt);
    }
	
    mysqli_close($link);
	?>
	
      ]
    });

  });

</script>
<style>
	h1 {
		text-align: center;
	}
	
	hr {
		margin-bottom: 30px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
  }
</style>
</head>

<body>
<div class="wrapper" >
	<?php
	require('topnav.php');
	?>
</div>
<div class="wrapper" id="top">
	<!-- main body -->
	<main class="hoc container clear">
		<h1>Plan Schedule</h1><hr>
		<div id='calendar'></div>
	</main> 
	<!-- end main body -->
</div>

</body>
</html>

