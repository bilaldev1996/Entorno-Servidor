<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="container-xl mt-3">
    
    <fieldset class="border m-3 p-3">
        <legend>Formulario Ingreso Profesor</legend>
            <form action="#" method="post" class="form-row">
            <div class="mb-3 form-floating col-md-6">
                <input type="text" name="nombre" id="nombre" class=" form-control" placeholder="bilal">
                <label for="nombre">Nombre</label>
            </div>
            
            <div class=" mb-3 form-floating col-md-6">
                <input type="text" name="apellidos" id="apellidos" class=" form-control" placeholder="al messaoui">
                <label for="apellidos">Apellidos</label>
            </div>
            <div class="mb-3 form-floating col-md-2">
                <input type="tel" name="telefono" id="telefono" class=" form-control" placeholder="645789123">
                <label for="telefono">Telefono</label>
            </div>
            <div class="mb-3 form-floating col-md-6">
                <input type="email" name="email" id="email" class=" form-control" placeholder="204@cifpceuta.es">
                <label for="email">Email</label>
            </div>
            <!-- Crear select con todos los grupos disponibles -->
            <div class="mb-3 form-floating col-md-4">
                <select name="grupo" id="grupo" class="form-select">
                    <option value="0">Selecciona un grupo</option>
                    
                    <?php 
                        include("connect.php");
                        $sql = "SELECT * FROM Grupo";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='".$row['idGrupo']."'>".$row['nombre']."</option>";
                        }
                    ?>
                </select>
                <label for="grupo">Grupo</label>
                
            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary mt-2 mb-2 col-md-4">
        </form>
    </fieldset>

    <?php
        if(isset($_POST['enviar'])){
            /* include("conexion.php");
            include("conectar.php"); */
            include("connect.php");
            /* recoger datos */
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $grupo = $_POST['grupo'];
            /* insertar datos profesor */
            $sql = "INSERT INTO Profesor (nombre, apellidos,telefono,email) VALUES ('$nombre', '$apellidos','$telefono','$email')";

            /* ejecutamos la consulta para poder obtener el ultimo ID insertado */
            if(mysqli_query($conn, $sql)){
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Profesor insertado sin ningún grupo',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>";

            }

            /* si se selecciona algun grupo */
            if($grupo != 0){
                /* obtener el ultimo id insertado */
                $lastId = mysqli_insert_id($conn);
                /* insertar datos en la tabla intermedia */
                $sql2 = "INSERT INTO Tutoria (Grupo_idGrupo,Profesor_idProfesor) VALUES ('$grupo','$lastId')";
                if(mysqli_query($conn, $sql2)){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Profesor insertado con grupo',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    </script>";
                }
            }

            mysqli_close($conn);

        }

    ?>
</body>
</html>
