<?php include_once 'conexion.php';
$con=conexion();
#captura datos
$nombre=$_POST['nombre'];
$Apaterno=$_POST['Apaterno'];
$Amaterno=$_POST['Amaterno'];
$curso=$_POST['curso'];
$fechaI=$_POST['fechaI'];
$fechaF=$_POST['fechaF'];
$division=$_POST['division'];


if($division1!=''){
     $sql="INSERT INTO division(nombre) VALUES('$division1')";
     $query=mysqli_query($con,$sql);

     #capturamos el id del division
     $sql="SELECT * FROM division WHERE nombre='$division1'";
     
     $query=mysqli_query($con,$sql);
     $row=mysqli_fetch_array($query);
     $iddivision=$row['id'];

     #consulta INSERTA EN LA TABLA IMPRIMIR
     $sql="INSERT INTO imprimir(nombre,Apaterno,Amaterno,curso,fechaI,fechaF,division) VALUES ('$nombre','$Apaterno','$Amaterno','$curso','$fechaI','$fechaF',$iddivision)";
     
     $query=mysqli_query($con,$sql);
     if($query){
         header('Location: imprimir.php');
     }else{
         header('refresh:0;url=index.php?error');
     }
 }else{
     #isertar los datos
     
     #consulta
     $sql="INSERT INTO imprimir(nombre,Apaterno,Amaterno,curso,fechaI,fechaF,division) VALUES ('$nombre','$Apaterno','$Amaterno','$curso','$fechaI','$fechaF',$division)";
     $query=mysqli_query($con,$sql);
     
     if($query){
         header('Location: imprimir.php');
     }else{
         header('refresh:0;url=index.php?error');
     }
 }


?>


