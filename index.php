<?php
include_once("Configuration.php");
$router = Configuration::getRouter();

$controller = isset($_GET["controller"]) ? $_GET["controller"] : "" ;
$action = isset($_GET["action"]) ? $_GET["action"] : "" ;

$router->route($controller, $action);

?>

<!--<!DOCTYPE html>-->
<?php
//session_start();
//include ("DB.php");
//$estaLogueado=isset($_SESSION["username"]);
//
//if (isset($_POST["submit"])) {
//    $username = $_POST["user"];
//    $password = $_POST["pass"];
//
//    $query = "SELECT * FROM users WHERE username = '" . $username . "'";
//    $result = mysqli_query($connection, $query);
//
//    if (mysqli_num_rows($result) > 0) {
//        $user = mysqli_fetch_assoc($result);
//
//        if ($password === $user["password"]) {
//            $_SESSION["username"] = $user["username"];
//            $estaLogueado = true;
//        } else {
//            echo "Contraseña incorrecta.";
//        }
//    } else {
//        echo "Usuario no encontrado.";
//    }
//}
//?>
<!---->
<!---->
<!--<!--ACA ESTABA EL HEADER-->-->
<!---->
<!---->
<!--<div class="mt-4 mb-4 container text-center">-->
<!--    --><?php
//    include_once 'search.php';
//    ?>
<!--</div>-->
<!---->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
