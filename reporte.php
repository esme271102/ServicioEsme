<?php
ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reporte</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    



<?php
include("conexion.php");
$conexion=conexion();

$sql="SELECT * FROM imprimir";
$query1=mysqli_query($conexion, $sql);
$row1=mysqli_fetch_array($query1);

?>  


<table class="table">
          <thead class="table-success table-striped">
            <h2>REGISTRADOS</h2>
            <tr>
              <th>Nombre</th>
              <th>A.paterno</th>
              <th>A.materno</th>
              <th>Curso</th>
              <th>Fecha.I</th>
              <th>Fecha.F</th>
              <th>Division</th>
            
              <th></th>

            </tr>

          </thead>

          <tbody>
            <?php
            while ($row1=mysqli_fetch_array($query1)) {
            ?>
              <tr>
                  
                <th><?php echo $row1['nombre'] ?></th>
                <th><?php echo $row1['Apaterno'] ?></th>
                <th><?php echo $row1['Amaterno'] ?></th>
                <th><?php echo $row1['curso'] ?></th>
                <th><?php echo $row1['fechaI'] ?></th>
                <th><?php echo $row1['fechaF'] ?></th>
                <th><?php echo $row1['division'] ?></th>
              

                
              </tr>
            <?php
            }
            ?>


          </tbody>





        </table>


        </body>
</html>

<?php
$html=ob_get_clean();


require_once '..//Servicio_Sara/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("archivo_.pdf",array("Attachment" => false));
?>