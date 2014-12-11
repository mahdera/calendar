<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

  <link rel='stylesheet' type='text/css' href='libs/css/smoothness/jquery-ui-1.8rc3.custom.css' />


	<link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='css/calendar.css' />
	<link rel='stylesheet' type='text/css' href='css/reset.css' />
	<link rel='stylesheet' type='text/css' href='css/engine.css' />

  <script type='text/javascript' src="libs/jquery-1.4.2.min.js"></script>
  <script type='text/javascript' src='libs/jquery-ui-1.8rc3.custom.min.js'></script>
	<script type='text/javascript' src='jquery.weekcalendar.js'></script>
	<script type='text/javascript' src='engine.js'></script>

</head>
<body>
	<h2>Login</h2>
  <div>
    <form action="validateuser.php" id="frmlogin" method="post">
        <table border="0">
          <tr>
            <td>User Id:</td>
            <td>
                <input type="text" name="txtuserid" id="txtuserid"/>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="right">
                <input type="submit" value="Login" id="btnlogin"/>
            </td>
          </tr>
        </table>
    </form>
  </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
  $('#frmlogin').submit(function(e){
    var userId = $('#txtuserid').val();
    if(userId != ""){
      //form has value and let the normal event process flow...
    }else{
      alert('Enter userid!');
      $('#txtuserid').focus();
      e.preventDefault();
    }
  });
});//end document.ready function
</script>
</html>
