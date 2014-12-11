<?php
session_start();
if(!isset($_SESSION['LOGGED_USER_ID'])){
  header("Location: index.php");
}
  ?>
  <a href="#.php" id="logoutLink">Logout</a>
  <div id='calendar'></div>
  <div id="event_edit_container">
    <form>
      <input type="hidden" />
      <ul>
        <li>
          <span>Date: </span><span class="date_holder"></span>
        </li>
        <li>
          <label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
        </li>
        <li>
          <label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
        </li>
        <li>
          <label for="title">Title: </label><input type="text" name="title" />
        </li>
        <li>
          <label for="body">Body: </label><textarea name="body"></textarea>
        </li>
      </ul>
    </form>
  </div>
  <?php
    require_once 'headerfileimports.php';
  ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#logoutLink').click(function(){
        if(window.confirm('Are you sure you want to logout?')){
          $.ajax({
            url: 'logout.php',
            data: null,
            type:'POST',
            success:function(response){
              window.location = 'index.php';
            },
            error:function(error){
              alert(error);
            }
          });
        }
      });
    });//end document.ready function
  </script>
