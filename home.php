<html>
	<head>
		<title>Riepilogo</title>
		<link rel="stylesheet" href="style2.css">
	</head>
	<body>
		<h1>ORTO IDROPONICO</h1>
		<h1>Riepilogo dati.</h1>
		<?php
			$db = mysqli_connect("localhost","root","","toso");
			$query = "SELECT data,temperatura, ph, cond_elettr FROM giornata, parametri	WHERE giornata.cod_parametri=parametri.cod_parametri GROUP BY data";
			
			if(isset($_COOKIE['username']) && isset($_COOKIE['accessi'])){
				echo "<h2>Ciao, $_COOKIE[username]!</h2>";
				//echo "Hai fatto ad oggi $_COOKIE[accessi] accessi.<br>";
		
				$result = mysqli_query($db,$query);
				echo"<br>";
				echo "<center><table>";
				echo "<tr><th>DATA</th><th>TEMPERATURA</th><th>PH</th><th>CONDUTT.&nbspELETTRICA</th></tr>";
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					echo"<br><tr>";
					//print_r($row);
					echo "<td>$row[data]</td></b>";
					
					if($row['temperatura']==null)
						echo "<td>OK</td>";
					else
						echo "<td bgcolor='LightCoral'>$row[temperatura]</td>";
						
					if($row['ph']==null)
						echo "<td>OK</td>";
					else
						echo "<td bgcolor='LightCoral'>$row[ph]</td>";
						
					if($row['cond_elettr']==null)
						echo "<td>OK</td>";
					else
						echo "<td bgcolor='LightCoral'>$row[cond_elettr]</td>";						
						
					echo"</tr>";
				}
				echo "</table></center>";
				echo "<hr>";
				echo "<div style='text-align: right'>";
				echo "<br><a href = 'logout.php'>LOGOUT</a>";
				echo "</div>";
			}
			else{
				echo "SESSIONE SCADUTA.";
				echo "<br>Effettuare nuovamente il login.";
			}
		?>
	</body>
</html>	