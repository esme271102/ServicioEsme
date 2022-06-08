<?php include_once 'conexion.php';
$con=conexion();


$email = $_POST["Email"];
$pass = $_POST["Pass"];


//Login
if(isset($_POST["btningresar"])){



	 $sql = mysqli_query($con,"SELECT * FROM usuarios WHERE Email = '$email' AND Pass='$pass'");

	 $nr = mysqli_num_rows($sql);
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $email'); window.location='imprimir.php' </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
	}
}



?>