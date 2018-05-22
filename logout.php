<html>
<head><title>Logout</title></head>
<link rel="stylesheet" href="style.css">
	<body>
	<div class="content">
	<?php
		setcookie("username","",time()-3600);
		setcookie("accessi","",time()-3600);
		echo "<h2>Logout effettuato!</h2>";
		echo "<a href = 'index.html'>LOGIN</a>";
	?>
	</div>
</body>
</html>