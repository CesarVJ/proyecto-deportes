<?php
include_once("cabecera.html");
?>
<main>
    <section class="filtro">
        <button id="ir" onclick="location.href='index.php'">Cerrar sesi&oacute;n</button>
<div class="articulos">
   <div class="articulo">
   <img src="./media/logoAgregar.png" alt="" class="imagen-articulo">
    <br>
     <button id="ir" onclick="location.href='AgregarProducto.php'">Añadir Productos</button>
   </div>
   <div class="articulo">
       <img src="./media/logoModificar.png" alt="" class="imagen-articulo">
       <br>
       <button id="ir" onclick="location.href='ModificarProducto.php'">Modificar Productos</button>
   </div>
   <div class="articulo">
       <img src="./media/logoEliminar.png" alt="" class="imagen-articulo">
       <br>
       <button id="ir" onclick="location.href='EliminarProducto.php'">Eliminar Productos</button>
   </div>
</main>
<?php
include_once("pie.html")
?>
