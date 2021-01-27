<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Vota por tu capitán</title>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">
    <div class="header">
        <h1>Elecciones de Capitán 2020 - SEUPB 2020</h1>
    </div>

    <div style="overflow:auto">
        <div class="col1" style="padding-top: 25px;">
            <button onclick="window.location.href = '/index.php';" class="buttonVote buttonVote1">Volver a Elegir Carrera</button>
        </div>

        <div class="main">
            <?php
                include 'db_connection.php';

                $conn = OpenCon();

                // Get ? Post maybe?
                $school = $_GET['school'];

                // Conseguir la escuela por el resultado del GET del index.php
                switch ($school) {
                    case "DTI":
                      $validDegrees = array();
                      break;
                    case "MEE":
                      $validDegrees = array();
                      break;
                    case "EIE":
                      $validDegrees = array();
                      break;
                    case "ADMI":
                      $validDegrees = array();
                      break;
                    case "ICO":
                      $validDegrees = array();
                      break;
                    case "COMU":
                      $validDegrees = array();
                      break;
                    case "CSJ":
                      $validDegrees = array();
                      break;
                    case "DISEÑO":
                      $validDegrees = array();
                      break;
                    case "FINAN":
                      $validDegrees = array();
                      break;
                    case "MKT":
                      $validDegrees = array();
                      break;
                    default:
                      echo "Your school is not valid!";
                }

                // Crear el form para poder ingresar codigo y votar
                // TODO remover flechas y verificar que se valide solo numeros
                // TODO verificar que el codigo no tenga menos o mas de 5 caracteres
                echo "<form method='post'>";
                echo "<h2>Candidatos de ". $school . " - ¡A votar! </h2>";
                echo "Tu Código: <input type='number' name='code' id='code' value='";
                print $_POST["code"];
                echo "' placeholder='Ej.: 10101'>";

                echo " <button type='submit' name='CheckBtn' class='buttonVote buttonVote1'>Verificar</button><br>";

                // Verificacion del form anterior ^^^

                if(isset($_POST["CheckBtn"])) {
                    // Consigue codigo y nombre completo del estudiante y verifica si no ha votado
                    $code = $_POST["code"];

                    // Bool en vez de tinyint en voted?

                    $sql3 = "SELECT id FROM students WHERE id = $code AND voted = '0'";
                    $result3 = $conn->query($sql3);

                    $sql4 = "SELECT fullname FROM students WHERE id = $code AND voted = '0'";
                    $result4 = $conn->query($sql4);

                    if ($result3 == null) {
                        echo "Por favor introduzca su codigo";
                    } else {
                        // 
                        if ($result3->num_rows > 0) {
                			// output data of each row
                			while($row = $result3->fetch_assoc()) {
                                echo "Habilitado para Votar <br>";
                                echo "Código: " . $row["id"] . "<br>";
                                
                                if ($result4->num_rows > 0){
                                    while($row = $result4->fetch_assoc()) {
                                        echo "Nombre: " . $row["fullname"];
                                        echo "<br><br><br>";
                                        echo "<h2>CANDIDATOS:<h2> <br>";
                                    }
                                }

                                // TODO Imagenes para cada capi
                                $sql2 = "SELECT fullname FROM candidates WHERE degree = '$school'";
                                $result2 = $conn->query($sql2);

                                // TODO Cont? -> bool mejor?
                                $cont = 0;

                                if ($result2->num_rows > 0) {
                                    // output data of each row
                                    echo "<table class='table'>";
                                    while($row = $result2->fetch_assoc()) {
                                        if ($cont == 0){
                                            echo "<tr><th><input type='radio' class='radio' name='candidate' value='" . $row["fullname"] . "'> " . $row["fullname"] . "</th>";
                                            $cont = 1;
                                        } else if ($cont == 1) {
                                            echo "<th><input type='radio' class='radio' name='candidate' value='" . $row["fullname"] . "'> " . $row["fullname"] . "</th></tr>";
                                            $cont = 0;
                                        }
                                    }
                                } else {
                                    echo "No se encontraron resultados";
                                }

                                echo "</table><br><br>";
                                echo "<button type='submit' name='VoteBtn' class='buttonVote buttonVote1'>Votar</button><br>";
                	       }
                        } else {
                    			echo "Vayase porfavor";
                		}
                    }

                    // TODO cambiar el if-else-if para que sea un solo formulario Y se actualicen los datos.
                } else if (isset($_POST['VoteBtn'])) {
                    $std0 = $_POST["code"];
                    $std = (int)$std0;

                    if(!isset($_POST['candidate'])) {
                        echo "Selecciona una opción.";
                        echo $std;
                    } else {
                        $cand = $_POST['candidate'];
                        $sqlvote = "UPDATE candidates SET votes = votes + 1 WHERE fullname = '$cand'";
                        $sqlvoteCheck = "UPDATE students SET voted = 1 WHERE id = $std";

                        if ($conn->query($sqlvote) === TRUE) {
                            echo "Gracias por votar!";

                            if($conn->query($sqlvoteCheck) === TRUE) {
                                echo "Votaste por " . $cand . " codigo " . $std;
                            }

                        } else {
                            echo "Error: " . $sqlvote . "<br>" . $conn->error;
                        }
                    }
                }
                
                echo "</form>";

                CloseCon($conn);
            ?>
        </div>

        <div class="col2 col2Vote">
            <h2>Rumbo al UPB Match 2020</h2>
            <p>El primer paso para apoyar a la camiseta y darlo todo por tu carrera</p>
        </div>
    </div>

    <div class="footer">
        Secretaría de Tecnología e Innovación - ISC 2020<br>
		SEUPB 2021
    </div>

</body>
</html>
