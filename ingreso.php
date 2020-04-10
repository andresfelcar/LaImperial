<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="stylesheet" href="resource/css/ingreso.css">
</head>
<body>
    <div class="contenedor">
        <h3>Bienvenido</h3>
        <img src="img/logo.jpg" alt="">
        <form class="form_reg" action="model/registro_model.php" method="POST">
            <input id="usu" name="user" type="text" placeholder="&#128100;Ingrese su Usuario">
            <input id="pas" name="contra" type="password" placeholder="&#128274;Ingrese su Contrase">
            <button class="submit" type="submit" > Ingresar </button>
        </form>
    </div>
    
</body>
</html>