<?php

 require('database.php');

$message = '';

/*if (!empty($_POST['cuenta']) && !empty($_POST['codigo']) && !empty($_POST['tipo']) && !empty($_POST['recibeSaldo']) && !empty($_POST['saldoActual'])) {*/
    $stmt = $conn->prepare("INSERT INTO cuentas (cuenta, codigo, tipo, recibeSaldo, saldoActual) VALUES (:cuenta, :codigo, :tipo, :recibeSaldo, :saldoActual)");
    $stmt->bindParam(':cuenta', $_POST['cuenta']);
    $stmt->bindParam(':codigo', $_POST['codigo']);
    $stmt->bindParam(':tipo', $_POST['tipo']);
    $stmt->bindParam(':recibeSaldo', $_POST['recibeSaldo']);
    $stmt->bindParam(':saldoActual', $_POST['saldoActual']);
    $stmt->execute();
    /*echo'<script type="text/javascript">
    alert("Cuenta Guardada Correctamente");
    </script>';
*/
    /*if ($stmt->execute()) {
      $message = 'Cuenta agregada correctamente';
    } else {
      $message = 'Perdon, hubo un error al agregar la cuenta';
    }*/


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agregar Cuenta</title>
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/php-login/assets/css/style.css">
        <h1>Agregar Cuenta</h1>
    </head>

    <body>
    
<?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
<?php endif; ?>

    <div class="container">
        <form action="agregarCuenta.php" class="form-inline" role="form" method="POST">
            
            <p>
                Nombre de la Cuenta: <input name="cuenta" type="text" id="cuenta" required pattern="[a-z A-Z]{1,}" title="El nombre de la cuenta solamente debe contener letras.">
            </p>

            <p>
                Codigo: <input name="codigo" type="number" min='0' required>
            </p>

            <p>
                Tipo de Cuenta: <select name="tipo" this.options[this.selectedIndex].innerHTML required>
                    <option value='Ac'>Activo</option>
                    <option value='Pa'>Pasivo</option>
                    <option value='Pm'>Patrimonio Neto</option>
                    <option value='R+'>Resultado Positivo</option>
                    <option value='R-'>Resultado Negativo</option>
                </select>
            </p>

            <p>
                Recibe Saldo: <input name="recibeSaldo" type="number" min='0' max='1' required pattern="(0|1)">
            </p>
            
            <p>
               Saldo Actual: <input name="saldoActual" type="number" min='0' required>
            </p>

            <input type="submit" value="Agregar Cuenta">
        
        </form>

    </div>

        <form>
            <input type="buttom" value="Atras" onclick="location.href='plandecuenta.php'">
        </form>

    </body>

    <style>
        select{
            padding: 10px;
            color: black;
            border-color: #0284FF;
            background: white;
            width: 200px;
            margin: 20px auto;
            margin-top: 10px;
            cursor: pointer;
            font-variant-caps: all-petite-caps;
            font-size: 17px;
            font-weight: bold;
            text-align: center;
        }
    </style>

</html>