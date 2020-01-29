<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
	<title>Menú Principal - Carreras</title>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">
	<?php
	include 'db_connection.php';

	$conn = OpenCon();

	//echo "Connected Successfully to Elections";

	?>
	<body style="font-family:Verdana;color:#aaaaaa;">
	  <div style="background-color:#e5e5e5;padding:15px;text-align:center;">
	  <h1>Elecciones de Capitán 2020 - SEUPB 2020</h1>
	</div>

	<div style="overflow:auto">
		<div class="columns">
	    <h2>About</h2>
	    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	  </div>

	  <div class="main">
	    <h2>Selecciona tu carrera</h2>

			<form method="get" action="/ElectionsTrial/vote.php">
				<table style="width:100%;" class="table">
					<?php
					$sql = "SELECT school FROM Candidates GROUP BY school";

					$result = $conn->query($sql);

					$cont = 0;

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							if ($cont == 0){
								echo "<tr><th> <button type='submit' name='school' value='". $row["school"]."'>". $row["school"]."</button></th>";
								$cont = 1;
							} else if ($cont == 1){
								echo "<th> <button type='submit' name='school' value='". $row["school"]."'>". $row["school"]."</button></th></tr>";
								$cont = 0;
							}
						}
					} else {
						echo "0 results";
					}

				CloseCon($conn);
				?>
				</table>
			</form>

	  </div>

	  <div class="columns">
	    <h2>About</h2>
	    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>

	  </div>
	</div>

	<div class="footer">By Secretaría de Tecnología e Innovación - ISC 2020</div>

</body>
</html>
