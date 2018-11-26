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

	  $conn = new mysqli("mysql.comp.polyu.edu.hk", "16098537d", "iqdobdiy", "16098537d");
	  $key = $_SESSION['login_tourist'];
	  
	  $sql="SELECT AName, Date, Time
			FROM RecommandAttraction as RA, Arrange as AR, Attraction as A
			WHERE AR.arrangeId = RA.arrangeId AND A.AID = RA.AID AND AR.touristsId = $key;";
	  
	  if ($stmt = mysqli_prepare($conn, $sql)) {

        /* execute statement */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $AName, $Date, $Time);

        /* fetch values */
        $n = 0;
        while (mysqli_stmt_fetch($stmt)) {
			
            $n++;
			$start = $Date;
			$end = $Date;
			
			if ($Time == 'MORN') {
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
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
	
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

