<?php
  require_once 'DBConnection.php';

  class Event{
      private $id;
      private $title;
      private $body;
      private $startTime;
      private $endTime;

      public function __construct(){
      }

      public function setId($id){
          $this->id = $id;
      }

      public function getId(){
          return $this->id;
      }

      public function setTitle($title){
          $this->title = $title;
      }

      public function getTitle(){
          return $this->title;
      }

      public function setBody($body){
          $this->body = $body;
      }

      public function getBody(){
          return $this->body;
      }

      public function setStartTime($startTime){
          $this->startTime = $startTime;
      }

      public function getStartTime(){
          return $this->startTime;
      }

      public function setEndTime($endTime){
          $this->endTime = $endTime;
      }

      public function getEndTime(){
          return $this->endTime;
      }

      public function save($event){
        try{
          $query = "INSERT INTO tbl_event_calendar VALUES(0, '$event->title', '$event->body', '$event->startTime', '$event->endTime')";
          DBConnection::save($query);
        }catch(Exception $ex){
          $ex->getMessage();
        }
      }

      public static function update($event){
        try{
          $query = "UPDATE tbl_event_calendar SET title = '$event->title', body = '$event->body', start_time='$event->startTime', end_time='$event->endTime' WHERE id = $event->id";
          DBConnection::save($query);
        }catch(Exception $ex){
          $ex->getMessage();
        }
      }

      public static function delete($id){
        try{
          $query = "DELETE FROM tbl_event_calendar WHERE id = $id";
          DBConnection::save($query);
        }catch(Exception $ex){
          $ex->getMessage();
        }
      }

      public static function getEvent($id){
        try{
          $query = "SELECT * FROM tbl_event_calendar WHERE id = $id";
          $result = DBConnection::read($query);
          $resultRow = mysql_fetch_object($result);
          return $resultRow;
        }catch(Exception $ex){
          $ex->getMessage();
        }
      }

      public static function getAllEvents(){
        try{
          $query = "SELECT id, title, body, DATE_FORMAT(start_time, '%Y-%m-%dT%H:%i' ) AS startTime, DATE_FORMAT(end_time, '%Y-%m-%dT%H:%i' ) AS endTime FROM tbl_event_calendar ORDER BY start_time DESC";
          $result = DBConnection::read($query);
          return $result;
        }catch(Exception $ex){
          $ex->getMessage();
        }
      }
  }//end class
?>
