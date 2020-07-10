<?php 
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
  }
 ?>

<?php
  include "conexion.php";

  $consulta=ConsultarProyecto($_GET['no']);

  function ConsultarProyecto($no_prod)
  {

       include "conexion.php";

        $conexion=mysqli_connect('localhost','root','','cesunday');

              $sentencia = "SELECT * FROM tareaglobal WHERE id_proyecto='".$no_prod."' ";
              $resultado = mysqli_query($conexion, $sentencia);



    // $sentencia="SELECT * FROM productos WHERE no='".$no_prod."' ";
    // $resultado=mysql_query($sentencia) or die (mysql_error());
    $filas=mysqli_fetch_assoc($resultado);
    return [
      $filas['nombre_proyecto'],
      $filas['descripcion'],
      $filas['area_proyecto'],
      $filas['activo']
    ];

  }


?>


<!DOCTYPE html>
<html>
<title> CESUNDAY</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4 {font-family:"Roboto", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
</style>
<body>

<!-- Links (sit on top) -->
<span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-top" style="background-color: #51B112">
  <div class="w3-bar w3-card" style="background-color: #51B112">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <br><br>
    <div class="w3-dropdown-hover w3-hide-small" style="background-color: #51B112">
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px" style="background-color: #51B112">
<!-- Footer -->

<footer class="w3-container w3-padding-40 w3-light-grey w3-center">
        <div class="w3-container w3-center" style="background-color: #51B112">
    <h2> ACTUALIZAR INFORMACION</h2>
  </div>
  <br><br>
  <form class="w3-container" action="mod2.php" method="POST">
<div class="w3-row-padding">
  <input type="hidden" name="no" value="<?php echo $_GET['no']?> ">
  <div class="w3-half">
   <label class="w3-text-black">Nombre Proyecto: </label>
      <input  class="w3-input w3-border" type="text" name="nombre_proyecto"; value="<?php echo $consulta[0] ?>">
  </div>
  <div class="w3-half">
  <label class="w3-text-black">Descripcion: </label>

      <textarea name="descripcion" id="descripcion" rows="6" cols="71" class="round" required><?php echo $consulta[1] ?></textarea>
  </div>
   <div class="w3-half">
  <label class="w3-text-black">Area Donde Se Impartio: </label>
      <input  class="w3-input w3-border" type="text" name="area_proyecto"; value="<?php echo $consulta[2] ?>" >
  </div>
   <div class="w3-half">
  <label class="w3-text-black">Activo: </label>
      <input  class="w3-input w3-border" type="text" name="activo"; value="<?php echo $consulta[3] ?>" >
 
  </div>
  </div>
   <div class="w3-container w3-padding-5 w3-light-grey">
        <p>
            <button class="w3-button  w3-green w3-section w3-padding w3-round-large" type="submit" style="width: 350px;">Guardar</button>
        </p>
      </div>
      </form>
          <div class="w3-container w3-padding-5 w3-light-grey">
        
            <button class="w3-button  w3-amber w3-section w3-padding w3-round-large" onclick="location='../addtareaglobal.php'" style="width: 450px;">Regresar</button>
        
      </div>

    </div>
  </div>
</div>
</footer>


<script>
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

</body>
</html>