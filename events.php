<?php

$action = $_REQUEST['action'];

if (!$link = mysql_connect('localhost', 'root', '')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('portal', $link)) {
    echo 'Could not select database';
    exit;
}

if($action == 'save')
{
	$title = $_REQUEST['title'];
	$body = $_REQUEST['body'];
	$start_time = (int)$_REQUEST['start'];
	$start_time = $start_time - 60*60;
	$end_time = (int)$_REQUEST['end'];
	$end_time = $end_time - 60*60;
	$start = date('c',$start_time);
	$end = date('c',$end_time);
	$sql = "INSERT INTO meeting_rooms_calendar(title,body,start,end) VALUES ('$title','$body','$start','$end')";
	$result = mysql_query($sql, $link);
}
else
{
	$sql= "SELECT id, title, body, 
			DATE_FORMAT(start, '%Y-%m-%dT%H:%i' ) AS startTime, DATE_FORMAT(end, '%Y-%m-%dT%H:%i' ) AS endTime
		   FROM meeting_rooms_calendar
		   ORDER BY start DESC";
		   
	$result = mysql_query($sql, $link);

	if (!$result) {
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}

	$events = array();

	while ($row = mysql_fetch_assoc($result)) {
	   $eventArray['id'] = $row['id'];
	   $eventArray['title'] =  $row['title'];
	   $eventArray['body'] =  $row['body'];
	   $eventArray['start'] = $row['startTime'];
	   $eventArray['end'] = $row['endTime'];
	   $events[] = $eventArray;
	}

	echo json_encode($events);
}

/*
   echo json_encode(array( 

      array( 
         'id' => 1, 
         'start' => "2012-07-08T08:30", 
		 'end' => "2012-07-08T09:30",
		 'title' => "event1",
		 'body' => "kaka"
      ), 

      array( 
         'id' => 2, 
         'start' => "2012-07-09T08:30", 
         'end' => "2012-07-09T09:30",
		 'title' => "event2"
      ) 

   ));
*/

?>
