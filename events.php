<?php
$action = null;
if(isset($_POST['action']))
  $action = $_POST['action'];
else
  $action = 'read';

if (@!$link = mysql_connect('localhost', 'root', 'root')) {
    echo 'Could not connect to mysql';
    exit;
}

if (@!mysql_select_db('db_event_calendar', $link)) {
    echo 'Could not select database';
    exit;
}

if($action == 'save'){
	$title = addslashes($_POST['title']);
	$body = addslashes($_POST['body']);
	$start_time = (int)$_POST['start'];
	$start_time = $start_time - 21600;
	$end_time = (int)$_POST['end'];
	$end_time = $end_time - 21600;
	$start = date('c',$start_time);
	$end = date('c',$end_time);
	$sql = "INSERT INTO tbl_event_calendar(id,title,body,start_time,end_time) VALUES (0,'$title','$body','$start','$end')";
  echo $sql;
	$result = mysql_query($sql, $link);
}else{
	$sql= "SELECT id, title, body,
			DATE_FORMAT(start_time, '%Y-%m-%dT%H:%i' ) AS startTime, DATE_FORMAT(end_time, '%Y-%m-%dT%H:%i' ) AS endTime
		   FROM tbl_event_calendar
		   ORDER BY start_time DESC";

	$result = mysql_query($sql, $link);

	if (!$result) {
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}

	$events = array();

	while ($row = mysql_fetch_assoc($result)) {
	   $eventArray['id'] = $row['id'];
	   $eventArray['title'] =  stripslashes($row['title']);
	   $eventArray['body'] =  stripslashes($row['body']);
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
