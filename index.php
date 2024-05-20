<?php
//include_once("Configuration.php");
//$router = Configuration::getRouter();
//
//$controller = isset($_GET["controller"]) ? $_GET["controller"] : "" ;
//$action = isset($_GET["action"]) ? $_GET["action"] : "" ;
//
//$router->route($controller, $action);
//
//?>

<!DOCTYPE html>
<?php
session_start();
include ("DB.php");
$estaLogueado=isset($_SESSION["username"]);

if (isset($_POST["submit"])) {
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $query = "SELECT * FROM users WHERE username = '" . $username . "'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($password === $user["password"]) {
            $_SESSION["username"] = $user["username"];
            $estaLogueado = true;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Pokedex</title>
</head>

<body class="mb-0 bg-white text-black" >
<header class="container-fluid bg-primary bg-gradient text-white ">
    <div class="row">
        <div class=" bg-primary bg-gradient text white col text-left">
            <h1>LA POKEDEX</h1>
            <p>Bienvenido a la pokedex online!</p>
            <a href="index.php"><img class="mb-1" src="public/images/pokedex.png" alt="pokedex" width="72" height="57"></a>
        </div>
        <div class=" bg-primary bg-gradient text white col">

        </div>
        <div class=" bg-primary bg-gradient text white col text-right">

            <?php
            if(!$estaLogueado){

            ?>
            <div class="d-flex flex-row">
                <form class="d-flex flex-row" name="sesion" method="post" action="./index.php">
                    <div class="p-2 mt-4">
                        <input type="text" name="user" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="p-2 mt-4">
                        <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="p-2 mt-4 btn btn-outline-light" name="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        Iniciar sesión</button>
                </form>
                <?php
                }else{

                    ?>
                    <p>Bienvenido, <?php echo $_SESSION["username"]; ?> </p>
                    <form method="post" action="logout.php">
                        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                    </form>
                    <?php
                }
                ?>
            </div>

        </div>
    </div>
</header>
<div class="mt-4 mb-4 container text-center">
    <?php
    include_once 'search.php';
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php
require_once("footer.php");
?>
</body>
</html>

