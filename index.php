<?
date_default_timezone_set("Europe/London");
$servername = "sql206.infinityfree.com";
$username = "if0_36068287";
$password = "EBwTGScohh";
$dbname = "if0_36068287_timerdatabase";
$currentdate = date("d-m-Y h:i:sa");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT * FROM `dates`;";
$date = mysqli_query($conn, $sql1);

$sql2 = "UPDATE `dates` SET `lastDate`= '$currentdate' WHERE ID = 1;";

?>
<!DOCTYPE html>
<html>
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <meta charset='utf-8'>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
   <title>Yoeyy Racism Tracker</title>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
   <script src='main.js'></script>
</head>
<body>
   <div class="container"> 
   <h1 id="timer" class="timer"></h1>
   <form action="reset.php" method="POST">
      <input type="password" name="pwd" placeholder="Password">
      <button type="submit" name="submit">Reset</button>
   </form>
   </div>
   <?
   $resultCheck = mysqli_num_rows($date);
   if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($date)) {
         $lastdate = $row['lastDate'];
         $password = $row['password'];
      }
   }
   ?>
   <script>
      var displayeddate = <?php echo json_encode($lastdate); ?>;
      $(document).ready(function() {
         $("#timer").html("The timestamp of Yoeyy's last racist incident is: " + displayeddate);
      });
   </script>
</body>
</html>
