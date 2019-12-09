 <?php
/**
 * Задача 10. Реализовать вход администратора с использованием
 * HTTP-авторизации для просмотра и удаления результатов.
 **/
// Пример HTTP-аутентификации.
// PHP хранит логин и пароль в суперглобальном массиве $_SERVER.
// Подробнее см. стр. 26 и 99 в учебном пособии Веб-программирование и веб-сервисы.
if (empty($_SERVER['PHP_AUTH_USER']) ||
    empty($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] != 'admin' ||
    $_SERVER['PHP_AUTH_PW'] != 'admin') {
  header('HTTP/1.1 401 Unanthorized');
  header('WWW-Authenticate: Basic realm="My site"');
  print('<h1>401 Требуется авторизация</h1>');
  exit();
}
//print('<p> Вы успешно авторизовались и видите защищенные паролем данные. </p>');
?>

<html>
<head>
	<title> ********* Admin Prompt ********* </title>
	<style>
		table {
			width: 50%;
			border-collapse: collapse;
			margin: 40px auto;
		}
		
		th, td {
			padding: 8px 20px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		
		input[type="submit"] {
			background-color: #ffcc99;
			color: #fff;
			border-radius: 8px;
			padding: 5px 10px;
			font-size: 16px;
			border: none;
		}
		
		tr: hover {
			background-color: #f5f5f5;
		}
		
		body {
/*			background-image: url("back.jpg");*/
/*			background-size: cover;*/
			font-family: Arial;
		}
		
		.header {
			padding: 10px;
			text-align: center;
			background: #1abc9c;
			color: white;
			font-size: 20px;
		}
	
	</style>
	
</head>
<body>

<div class="header">
	<h1>Airline</h1>
	<p>Вы успешно авторизовались и видите защищенные данные</p>
</div>

<?php
	error_reporting( error_reporting() & ~E_NOTICE );
	include 'db_config.php';
	
	if (isset($_REQUEST["submit_button"])) {
			$checked = $_REQUEST["chk"];
			$numbers_to_delete=implode(", ", $checked);
			
			$delete_query = mysqli_query($connection, "DELETE FROM Flights where no in ($numbers_to_delete)");
		}

	$query = mysqli_query($connection, "SELECT * FROM Flights");
	$row_count=mysqli_num_rows($query);
	
	
	
	?>

<form action="adminPrompt.php" method="post" >

<table>
	<tr>
		<th> No # </th>
		<th> From </th>
		<th> To </th>
		<th> Date </th>
		<th> Time </th>
		<th> Duration </th>
		<th> Cost </th>	
		<td><input name="submit_button" type="submit" value="submit"></td>
	</tr>
	
	<?php  
		for ($i=1; $i<$row_count; $i++) {
			$row = mysqli_fetch_array($query);
	?>
	
	<tr>
	<td> <?php	echo $row["no"]?> </td>
	<td> <?php	echo $row["from"]?> </td>
	<td> <?php	echo $row["to"]?> </td>
	<td> <?php	echo $row["date"]?> </td>
	<td> <?php	echo $row["time"]?> </td>
	<td> <?php	echo $row["duration"]?> </td>
	<td> <?php	echo $row["cost"]?> </td>
	<td> <input align="center" type="checkbox" name="chk[]" value="<?php echo $row["no"]?>"></td>
	</tr>
	
	<?php 
		}
	?>
</table>
</form>

</body>
</html>
