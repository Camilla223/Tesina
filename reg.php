<html>	
<head><title>Registrazione</title></head>
<link rel="stylesheet" href="style.css">
	<body>
	<div class="content">
	<?php
		echo "<h1>RIEPILOGO</h1>";
		$db= new SQLite3();
		//$db= sqlite_ope('/home/pi/Documents/Databases/Tesina/mydb.db',0666, $error);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "INSERT INTO login VALUES('$username', '$password', 0)";
		$result = $db->$query;
		if($result){
			echo "<h3>Inserimento eseguito</h3>";
			echo "Username: $username<br>Password: $password<br><br>";
		} else{
			echo("<h3>Inserimento NON eseguito</h3>");
		}
		echo "<a href = 'index.html'>TORNA INDIETRO</a>";
	?>
	</div>
	</body>
</html>