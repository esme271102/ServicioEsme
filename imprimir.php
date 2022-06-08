<?php
include("conexion.php");
$conexion=conexion();

$sql="SELECT * FROM imprimir";
$query1=mysqli_query($conexion, $sql);
$row1=mysqli_fetch_array($query1);

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imprimir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <style>
        body{
            background:#e4e12f;
            background:linear-gradient(to right,#48a077, #4f944f ) ;
        }
        /* .bg{ 
            background-image: url(img/uni2.jpg);
            background-position: center center;
        } */
    </style>
</head>



<body>

<!-- <div class="container w-75  mt-3 ml-1 px-2 rounded shadow"> -->
<!-- <div class="container container-fluid p-3 w-80 style="" height: 300px  rounded shadow"> -->

<div class="bg-white">
            <h1 class="fw-bold text-center py-1">REGISTRO DE CURSO</h1>
        </div>

<div class="container container-fluid"> 


        <div class=" row aling-items-stretch">



    
            <div class="col bg-white p-5 reounded-end">

                <div class="text-center">
                    <img src="img/logo1.png" width="90" alt="" class= "img-fluid">
                </div>

                <h2 class="fw-bold text-center py-5">REGISTRATE</h2>

                <form action="insertar.php" method="POST">

                
                   <label for="text" class="form-label">Nombre</label>

                   <input type="text" class="form-control" name="nombre">
                

              
                   <label for="text" class="form-label">Apellido Paterno</label>

                    <input type="text" class="form-control" name="Apaterno">
                

              
                    <label for="text" class="form-label">Apellido Materno</label>

                    <input type="text" class="form-control" name="Amaterno">

            

                
                    <label for="text" class="form-label">Curso</label>

                    <input type="text" class="form-control" name="curso">

            

                    <label for="text" class="form-label">Fecha de Inicio</label>

                    <input type="text" class="form-control" name="fechaI">
           

                
                    <label for="password" class="form-label">Fecha Final</label>

                    <input type="text" class="form-control" name="fechaF">
                

                <label for="text" class="form-label">Divisiones</label></br>
        <select class="form-select" aria-label="Default select example" name="division">
            <?php 
                $con=conexion();
              
                $sql='SELECT * FROM division';
                $query=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($query)){
                    $iddivision=$row['id'];
                    $nombredivision=$row['nombre'];
                ?>
                    <option value="<?php echo $iddivision ?>"><?php echo $nombredivision ?></option>
                <?php
                }
            
            ?>
            
        </select>
      
                
<br>
               <div class= "d-grid gap-2">
          <button type="submit" class="btn btn-success">GUARDAR</button>

          </div>

        </form>

      </div>







      <div class="col bg-primary p-2 reounded-end">
<br>
      <div class=" text-center">

          <form action="reporte.php">

      <button class="btn btn-success text-decoration-underline" type="submit">IMPRIMIR TODOS LOS REGISTROS</button>
      </form>

</div>


<div class="mt-4">


      <table class="table table-success table-striped">
        <br>
          <thead class="table-dark table-striped">

<div class="bg-warning">  <h2> TABLA DE REGISTRADOS</h2>
</div>
           
            <tr>
              <th>Nombre</th>
              <th>A.paterno</th>
              <th>A.materno</th>
              <th>Curso</th>
              <th>Fecha.I</th>
              <th>Fecha.F</th>
              <th>Division</th>
            
              <th></th>
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
              

                <th><a href="reporte2.php?id=<?php echo $row1['id'] ?>" class="btn btn-dark">Imprimir</a></th>

                <th><a href="reporte3.php?id=<?php echo $row1['id'] ?>" class="btn btn-dark">Diploma</a></th>


              </tr>
            <?php
            }
            ?>



          </tbody>





        </table>



      </div>


    


       
      </div>
    </div>

    

      </div>


    

</body>

</html>