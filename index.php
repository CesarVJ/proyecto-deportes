<?php

$inicio = "#";
$registro = "registro.php";
$login = "login.php";
include_once("cabecera.html");
include_once("menu.php");

?>
<main>
    <section class="filtro">
        <form onsubmit="buscarProductos(); return false;">
        <label for="tipoEquipo">Filtrar por equipo:</label>
            <select id="tipoEquipo" name="tipoEquipo">
            <option value=""></option>
            </select>            
            <input type="submit" value="Filtrar" />
        </form>
    </section>
    <div class="articulos">
        <div class="articulo">
            <img src="./media/Balones/Adidas.jpg" alt="" class="imagen-articulo">
            <h5 class="nombre-articulo"> Producto1</h5>
            <button id="ver-articulo">Ver informaci&oacute;n</button>
        </div>
        <div class="articulo">

        </div>
        <div class="articulo">

        </div>
        <div class="articulo">

        </div>
        <div class="articulo">

        </div>
</main>
<?php include_once("pie.html")?>
</div>