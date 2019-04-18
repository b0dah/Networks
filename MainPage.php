<html>
<head>
	<title></title>
</head>

<body>
	<br> <br>

	<form action="LoadResult.php">
		<select name=destination size = 1 >
			<option value="Paris"> Paris </option>
			<option value="Vein" selected> Vein </option>
			<option value="Milan"> Milan </option>
			
		</select>
		<input type="submit" value="get it">
	</form>

	<?php
		include 'db_library.php';

		$connection = new DataBase();
		$sql_line = "SELECT * FROM Flights";

		//$connection->print_select();

		echo " <br>	     From <br>";
		$result = $connection->query($sql_line);
		$connection->create_select_form("Origin", $result, 'no', 'from');

		echo " <br>	     To <br>";
		$connection->create_select_form("Destination", $result, 'no', 'to');


	?>

</body>
</html>