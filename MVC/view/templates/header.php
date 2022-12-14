<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center w-100 bg-light  p-5 fw-bold">
            <?php
                switch($dataToView->getVista()){
                    case 'list_note':
                        echo 'Listar notas';
                        break;
                    case 'insert_note':
                        echo 'Insertar nota';
                        break;
                    case 'edit_note':
                        echo 'Editar nota';
                        break;
                    case 'delete_note':
                        echo 'Eliminar nota';
                        break;
                    case 'confirm_delete_note':
                        echo 'Confirmar Eliminación nota';
                        break;
                    default:
                        echo 'Listar notas';
                        break;
                }
            ?>
        </h1>