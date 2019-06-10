<?php  

/**
 * class for working w/ database  
 */
class DataBase
{
	private $connection;

	function __construct()
	{
		$server = "127.0.0.1";//"localhost";
		$username = "root";
		$password = "q]/z.q]/z.";
		$dbname = "Airline";

		// Create Connection
		$this->$connection = new mysqli($server, $username, $password, $dbname);

		//mysql_query("SET NAMES UTF8");
		$this->$connection->set_charset("utf8");

		// Check connection
		if (!$this->$connection)
		{
			echo "connection error !" . PHP_EOL;
			echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		//echo "Connected succesfully";
	}

	function query($sql_line) {
		return $this->$connection->query($sql_line);
	}

	function print_select(){
		$query = "SELECT * from Flights";
		$result = $this->$connection->query($query);

		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				echo "<br>" .$row['to']  ;
			}
		} 
		else {
			echo " <br> Query result is empty";
		}
	}

	function create_select_form($name, $query_result, $number, $attribute){
	
		echo "<select name =  \"" . $name . "\" >";

		if ($query_result->num_rows > 0) {
		   	// output data of each row
		
		   	while($row = $query_result->fetch_assoc()) {
		   		echo "<option value=\"" . $row[$attribute] . "\">". $row[$attribute] . "</option>";
		   	}
		}

		echo "</select>";
		$query_result->data_seek(0); // cursor to the begin of the result
	}

}


?>









