
<?php ob_start();
include("conexion.php");
$conexion=conexion();

    $id=$_GET['id'];


    $sql = "SELECT nombre, Apaterno, Amaterno, curso, fechaI, fechaF, division FROM imprimir WHERE id='$id'";
    $result = $conexion->query($sql);

?>




<html>
<body>

<img src="img/enc.png" width="1000" alt="">


<h2 style="text-align:center">LA DIVISIÓN ACADÉMICA DE TELEMÁTICA</h2>

<h2 style="text-align:center">OTORGA EL PRESENTE</h2>


<h1 style="text-align:center">RECONOCMIENTO</h1>


<?php
            while ($row=$result->fetch_assoc()){
            ?>
            
              <h2>        &nbsp;        A:  &nbsp; &nbsp;   <?php echo $row['nombre'] ?>  <?php echo $row['Apaterno'] ?>
                <?php echo $row['Amaterno'] ?>. </h2>
              
              <br>

              <p style="text-align:center">Por su participacion en el curso: <b>"<?php echo $row['curso'] ?>"</b>
               del dia <b><?php echo $row['fechaI'] ?></b>  
              al dia  <b><?php echo $row['fechaF'] ?></b>  en la 
              
              <BR>
              En el Estado de Mexico,Municipio Nicolas Romero, Universidad Tecnologica Fidel Velazquez.
            </p>
            
       <h4 style="text-align:center">Con el Maestro:</h4>
       <h3 style="text-align:center"> "Oliver Raul Velazquez Torres" </h3>
                  
              
              
            <?php
            }
            ?>
            
<br>
<img src="img/pie.png" width="1020" alt="">
          




    
</body>



</html>


<?php
$html=ob_get_clean();



require_once ('..//Servicio_Sara/dompdf/autoload.inc.php');

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
//$dompdf->setPaper('letter');
$dompdf->setPaper('A4','landscape');

$dompdf->render();
$dompdf->stream("diploma_.pdf",array("Attachment" => false));
?>