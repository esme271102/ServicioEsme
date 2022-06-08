<?php ob_start();

include("conexion.php");
$conexion=conexion();

    $id=$_GET['id'];


    $sql = "SELECT nombre, Apaterno, Amaterno, curso, fechaI, fechaF, division FROM imprimir WHERE id='$id'";
    $result = $conexion->query($sql);


?>  




<html lang="en">
<head>
   
    <title>reporte2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    




<h1>REGISTROS</h1>
<table class="table">
          <thead class="table-success tab">
          
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
            while ($row=$result->fetch_assoc()){
            ?>
              <tr>
                  
                <th><?php echo $row['nombre'] ?></th>
                <th><?php echo $row['Apaterno'] ?></th>
                <th><?php echo $row['Amaterno'] ?></th>
                <th><?php echo $row['curso'] ?></th>
                <th><?php echo $row['fechaI'] ?></th>
                <th><?php echo $row['fechaF'] ?></th>
                <th><?php echo $row['division'] ?></th>
              

                
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