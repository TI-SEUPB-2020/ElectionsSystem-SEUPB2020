<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheet.css">
  <title>Vota por tu capitán</title>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">
  <div style="background-color:#e5e5e5;padding:15px;text-align:center;">
  <h1>Elecciones de Capitán 2020 - SEUPB 2020</h1>
</div>

<div style="overflow:auto">
  <div class="columns">
    <button onclick="window.location.href = '/electionsTrial/indexmenu.php';">Volver a Elegir Carrera</button>
    <h2>About</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
  </div>

  <div class="main">
    <?php
      include 'db_connection.php';

  	  $conn = OpenCon();

      $degree = $_GET['degree'];
      echo "<form method='post'>";
      echo "<h2>Candidatos de ". $degree . " - ¡A votar! </h2>";
      echo "Tu Código: <input type='number' name='code' id='code' placeholder='Ej.: 10101'>";
  		//echo "Carnet: <input type='number' name='idcard' id='idcard'><br>";


      echo "<button type='submit' name='CheckBtn'>Verificar</button><br>";

      $std = $_POST['code'];
      if(isset($_POST["CheckBtn"])){
        $code = $_POST["code"];

        $sql3 = "SELECT id FROM Students WHERE id = $code AND voted = 'false' AND degree = '$degree'";
        $result3 = $conn->query($sql3);
        //$result4 = $conn->query($sql4);

        if ($result3 == null) {
          echo "Por favor introduzca su codigo";
        } else {
          if ($result3->num_rows > 0) {
      			// output data of each row
      			while($row = $result3->fetch_assoc()) {
                $std = $row["id"];
      					echo $row["id"];
                echo "It's a match! <br>";

                echo "<form method='post' >";
                $sql2 = "SELECT fullname FROM Candidates WHERE degree = '$degree'";
                $result2 = $conn->query($sql2);

                $cont = 0;

                if ($result2->num_rows > 0) {
                  // output data of each row
                  echo "<table class='table'>";
                  while($row = $result2->fetch_assoc()) {
                    if ($cont == 0){
                      echo "<tr><th><input type='radio' name='candidate' value='" . $row["fullname"] . "'> " . $row["fullname"] . "</th>";
                      $cont = 1;
                    } else if ($cont == 1){
                      echo "<th><input type='radio' name='candidate' value='" . $row["fullname"] . "'> " . $row["fullname"] . "</th></tr>";
                      $cont = 0;
                    }

                  }

                } else {
                  echo "0 results";
                }
                echo "</table>";
                echo "<button type='submit' name='VoteBtn'>Votar</button><br>";
                echo "</form>";
      			}
      		} else {
      			echo "0 results";
      		}
        }
        echo "</form>";
      } else if (isset($_POST['VoteBtn'])){
        if(!isset($_POST['candidate'])) {
          echo "Selecciona una opción.";
          echo $std;
        } else {
          $cand = $_POST['candidate'];
          $sqlvote = "UPDATE Candidates SET votes = votes + 1 WHERE fullname = '$cand'";
          $sqlvoteCheck = "UPDATE Students SET voted = true WHERE id = $std";

          if ($conn->query($sqlvote) === TRUE) {
            echo "New record created successfully";
            echo "Votaste por " . $cand . " codigo " . $std;
          } else {
            echo "Error: " . $sqlvote . "<br>" . $conn->error;
          }
        }

      }










      CloseCon($conn);
     ?>





  </div>

  <div class="columns">
    <h2>About</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
  </div>
</div>

<div class="footer">By Secretaría de Tecnología e Innovación - ISC 2020</div>

</body>
</html>
