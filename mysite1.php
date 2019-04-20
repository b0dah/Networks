<!DOCTYPE html>
<html>

	<head>
			<meta charset="utf-8">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
			<link href="styles/style.css" rel="stylesheet" type="text/css">
			<title>
				Пожелания для Деда Мороза
			</title>
			
			
	</head>
	<div style="padding-top:83.333%;position:relative;">
	
	<body>
	<img src="http://www.playcast.ru/uploads/2015/12/17/16374853.gif" 
	width="100%" height="100%" 
	style='position:absolute;top:0;left:0;' 
	frameBorder="0" 
	allowFullScreen></iframe></div><p>
	
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<h1>Поздравление для деда Мороза</h1>
					<br>
					<textarea name="message" require>
					Впиши свое имя, чтобы Дедушка Мороз знал, кто так добр к нему.
					</textarea>
					<br>
					<h2>Выбери слова, которые хочешь сказать дедушке</h2>
					<select name="good" >
					  <option value="Верни">danyusik</option>
					  <option value="vanyusik">vanyusik</option>
					  <option value="danielyusik">danielyusik</option>
					  <option value="besyusik">besyusik</option>
					</select>
					<select name="boy" >
					  <option value="Деньги">danyusik</option>
					  <option value="vanyusik">vanyusik</option>
					  <option value="danielyusik">danielyusik</option>
					  <option value="besyusik">besyusik</option>
					</select>
					<select name="dog" >
					  <option value="Дед">danyusik</option>
					  <option value="vanyusik">vanyusik</option>
					  <option value="danielyusik">danielyusik</option>
					  <option value="besyusik">besyusik</option>
					</select>
					<button><a href="2site.php"> Генерируем поздравление </a></button>
					
            <?php 
                function echo_if_not_empty($param){
	                if (empty($param)) {
                    echo "Param is empty";
                    } else {
                echo $param;
                            }
                }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    echo_if_not_empty( $_POST['good']);
                    echo "<br>";
                    echo_if_not_empty( $_POST['message']);    
                }

			?>
			</form>
			    
	</body>
</html>