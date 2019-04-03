<html>
<head>
	<title></title>
</head>


<body>

	<h2>Result</h2>

	<h1>
		Hola,
		<?php echo htmlspecialchars($_POST['name']); ?>
		 i know ur 

		<?php echo (int)$_POST['age']; ?> y.o.
	</h1>

</body>
</html>