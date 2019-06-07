<html>
<head>
	<title>** Main page **</title>
		<link href="styles/prettyStyle.css" rel="stylesheet" type="text/css"> 
</head>
<body>

</body>
</html>
<!--
	<p> <?php   echo $_GET['origin'] ?> </p>

	<p> <?php  echo $_GET['destination'] ?> </p>
-->

<?php 
	echo "<h4>" . $_GET['origin'] . " -> " . $_GET['destination'] . "</h4>";


?>

<h6> <pre>

   | no  |  date stamp    |  time stamp  | duration |  cost  | <br><br>
  127      2019-06-04    21:00:00      2.5 hours     1000
</h6> </pre>


 <button name="buttonName" class="buyButton" onclick="window.location.href = 'mainpage.php';"> Buy </button>

<<?php 
if (isset($_POST["buttonName"])) {
require "record.php"; //echo "hitted";
}
 ?>
