<html>
<head>
	<title>** Main page **</title>
		<link href="styles/style.css" rel="stylesheet" type="text/css"> 
</head>

<body>
	
</body>
</html>


<?php
	include 'db_library.php';

	$connection = new DataBase();
	$sql_line = "SELECT * FROM Flights";


	
	echo "<form action= \"LoadResult.php\" >";
		
		echo " 	 <h3>    From  </h3> ";
		$result = $connection->query($sql_line);
		$connection->create_select_form("origin", $result, 'no', 'from');


		echo "  <h3>    To  </h3> ";
		$connection->create_select_form("destination", $result, 'no', 'to');
		
		echo "<br><br>";

		echo  "<input id=\"submit_button\" type= \"submit\" value= \"get it\" >"; 

	echo "</form>";
	
?>

