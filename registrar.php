<?php include_once 'conexion.php';
$con=conexion();
#captura datos


$nombre = $_POST["Nombre"]; 
$apaterno = $_POST["Apaterno"];
$amaterno = $_POST["Amaterno"];
$division = $_POST["Division"];
$email = $_POST["Email"];
$pass = $_POST["Pass"];
$cpass = $_POST["Cpass"];



//Registrar
if(isset($_POST["btnregistrar"])){

	// $sqlgrabar = "INSERT INTO usuarios(Nombre,Apaterno,Amaterno,Division,Email,Pass,Cpass) values ('$nombre','$apaterno','$amaterno','$division','$email','$pass','$cpass')";


	$sql="INSERT INTO usuarios(Nombre,Apaterno,Amaterno,Division,Email,Pass,Cpass) values ('$nombre','$apaterno','$amaterno','$division','$email','$pass','$cpass')";

	
	// if(mysqli_connect($conexion,$sqlgrabar))
	// {

	// 	echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.html' </script>";
	// }else 
	// {
		
	// }

	$query=mysqli_query($con,$sql);
     if($query){
		echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.html' </script>";
     }else{
         header('refresh:0;url=index.php?error');
     }
 
}


?>