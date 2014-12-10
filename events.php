<?php
    require_once 'classes/Event.php';

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
      //now create the Event object...
      $eventObj = new Event();
      $eventObj->setTitle($title);
      $eventObj->setBody($body);
      $eventObj->setStartTime($start);
      $eventObj->setEndTime($end);
      $event = new Event();
      $event->save($eventObj);
    }else{
      $result = Event::getAllEvents();
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
