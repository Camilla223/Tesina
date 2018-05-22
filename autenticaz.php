<html>
<head><title>Login</title></head>
	<link rel="stylesheet" href="style.css">
	<body>
	<div class="content">
	<?php
		try{
			$db= new PDO('sqlite:/var/www/html/mydb.db');
			$username = $_POST['username'];
			$password = $_POST['password'];
			$result = $db->query("SELECT username FROM login WHERE username = '$username' and password = '$password';");
			if($result != false){
				echo "<h1>Salve,&nbsp $username</h1>";
				echo "<h2>Login effettuato correttamente.</h2>";
				echo "Numero accessi effettuati: ";
				$query = "SELECT accessi FROM login WHERE username = '$username'";
				//$result = mysqli_query($db,$query);
				while($row = $result->fetch_assoc()) {
					echo ($row["accessi"]+1);
					$accessi = $row['accessi']+1;
				}
				$query = "UPDATE login SET accessi = accessi+1 WHERE username = '$username';";
				$result = mysqli_query($db,$query);
				setcookie("username",$username, time()+3600);
				setcookie("accessi",$accessi, time()+3600);
				echo "<br><br><a href = 'home.php'>VAI ALLA MIA PAGINA</a>";
			}
			else{
				echo "<h2>Login errato.</h2>";
				echo "<br><a href = 'index.html'>RIPROVA</a>";
			}
		} catch(Exception $e){
			echo $e->getMessage();
		}
	?>
	</div>
</body>
</html>
