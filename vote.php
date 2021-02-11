<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Vota por tu capitán</title>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">
    <div class="header">
        <h1> Elecciones de Capitanes - SEUPB 2021</h1>
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

                // Crear el form para poder ingresar codigo y votar
                // TODO verificar que el codigo no tenga menos o mas de 5 caracteres
            ?>
                <form method='POST'>
            <?php 
                // Comenzar el proceso de votacion llenando el formulario para introducir el codigo
                // (Mas abajo, en el else mas grande)
                $formCodigo = <<<EOT
                        <label for="code">Tu Código:</label> 
                        <input type='number' name='code' id='code' value='' placeholder='Ej.: 10101'>
                        <button type='submit' name='CheckBtn' class='buttonVote buttonVote1'>Verificar</button><br>
                    </form>
                EOT;


                // Verificacion (de los datos) del form anterior ^^^
                if(isset($_POST["CheckBtn"])) {
                    $code = $_POST["code"];
                    // Primero verificar si el codigo que se dio de la anterior pagina existe en la BD
                    $result = $conn->query("SELECT id FROM students WHERE id = $code");
                    if ($result->num_rows > 0) {
                        // Segundo verificar si el estudiante ya voto
                        $result2 = $conn->query("SELECT id FROM students WHERE id = $code AND voted = 0");
                        if ($result2->num_rows > 0) {
                            // Consigue codigo y nombre completo del estudiante y verifica si no ha votado
                            while($row = $result2->fetch_assoc()) {
                                echo "Habilitado para Votar <br>";
                                echo "Código: " . $row["id"] . "<br>";
                            }

                            $sql3 = "SELECT fullname FROM students WHERE id = $code AND voted = 0";
                            $result3 = $conn->query($sql3);

                            if ($result3->num_rows > 0){
                                while($row = $result3->fetch_assoc()) {
                                    echo "Nombre: " . $row["fullname"];
                                    echo "<br><br><br>";
                                    echo "<h2>CANDIDATOS:<h2> <br>";
                                }
                            }

                            // TODO Imagenes para cada capi
                            $sql4 = "SELECT fullname FROM candidates WHERE degree = '$school'";
                            $result4 = $conn->query($sql4);

                            // Se imprimen los candidatos
                            if ($result4->num_rows > 0) {
                                echo "<table class='table'>";
                                while($row = $result4->fetch_assoc()) {
                                    echo "<tr><th><input type='radio' class='radio' name='candidate' value='" . $row["fullname"] . "'> " . $row["fullname"] . "</th></tr>";
                                }
                                echo "</table><br><br>";
                                echo "<input type='hidden' name='code' value='$code'>";
                                echo "<button type='submit' name='VoteBtn' class='buttonVote buttonVote1'>Votar</button><br>";

                            } else {
                                echo "No se encontraron resultados";
                            }
                        } else {
                			echo "El estudiante con este código ya votó.";
                		}
                    } else {
                        echo "No existe ningún estudiante con este código.";
                    }

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

                        if ($conn->query($sqlvote)) {
                            echo "Gracias por votar!<br>";

                            if($conn->query($sqlvoteCheck)) {
                                echo "Votaste por " . $cand . " codigo " . $std;
                            }

                        } else {
                            echo "Error: " . $sqlvote . "<br>" . $conn->error;
                        }
                    }
                } else {
                    // Primera fase del formulario, donde se introduce el codigo (CheckBtn no esta setteado, ni VoteBtn)
                    echo $formCodigo;
                }

                CloseCon($conn);
            ?>
        </div>

        <div class="col2 col2Vote">
            <h2>Rumbo al UPB Match 2021</h2>
            <p>El primer paso para apoyar a la camiseta y darlo todo por tu carrera</p>
        </div>
    </div>

    <div class="footer">
        Secretaría de Tecnología e Innovación - ISC 2021<br>
		SEUPB 2021
    </div>

</body>
</html>
