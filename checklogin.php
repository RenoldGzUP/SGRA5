<?php
session_start();
?>

<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "sgra";
$tbl_name = "usuarios";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$username'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
 }

 $row = $result->fetch_array(MYSQLI_ASSOC);

 if (password_verify($password, $row['password'])) { 
 	 //Si la consulta de usuario y clave es correcta
 	session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 120);
       //echo "Acceso";
       header("Location:./pages/dashboard.php"); //Si la consulta de usuario y clave es correcta

 } else { 
   echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
   echo "<script>location.href='index.html'</script>";
 }
 mysqli_close($conexion);
 ?>
