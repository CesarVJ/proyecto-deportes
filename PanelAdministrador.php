<?php

$inicio = "index.php";

include_once("cabecera.html");
include_once("menu.php");


?>
<main>
<div class="opciones">
   <div class="opcion">
   <img src="./media/logoAgregar.png" alt="" class="imagen-opcion">
    <br>
     <button id="ir" onclick="location.href='AgregarProducto.php'">Añadir Productos</button>
   </div>
   <div class="opcion">
       <img src="./media/logoModificar.png" alt="" class="imagen-opcion">
       <br>
       <button id="ir" onclick="location.href='ModificarProducto.php'">Modificar Productos</button>
   </div>
   <div class="opcion">
       <img src="./media/logoEliminar.png" alt="" class="imagen-opcion">
       <br>
       <button id="ir" onclick="location.href='EliminarProducto.php'">Eliminar Productos</button>
   </div>
</main>
<?php
include_once("pie.html")
?>
