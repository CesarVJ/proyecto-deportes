<?php

$inicio = "#";
$registro = "RegistroUsuarios.php";
$login = "login.php";
include_once("cabecera.html");
include_once("menu.php");

?>
<main>
<script src="./js/controlJS.js?=<?php echo time();?>"> </script>
    <section class="filtro" style="display:flex; justify-content: space-between;">
        <form onsubmit="buscarProductos(); return false;">
            <label for="tipoEquipo">Filtrar por equipo:</label>
            <select id="tipoEquipo" name="tipoEquipo">
                <option value=""></option>
            </select>
            <input type="submit" value="Filtrar" />
        </form>
        <form onsubmit="consultarLinea(); return false;">
            <label for="tipoLinea">Filtrar por Linea:</label>
            <select id="tipoLinea" name="tipoLinea">
                <option value="U">Uniformes</option>
                <option value="R">Ropa para niños</option>
                <option value="B">Balones</option>
                <option value="S">Souvenirs</option>
            </select>
            <input type="submit" value="Filtrar" />
        </form>
    </section>

    <table class="articulos" id="articulos">
        <thead>
            <tr>
                <td>Producto</td>
                <!--<td>Linea</td>-->
                <td>Equipo</td>
                <td>Carcateristicas</td>
                <td>Precio</td>
                <td>Cantidad</td>
            </tr>
        </thead>
        <tbody id="bodyTablaArt">            
        </tbody>
    </table>

    <form action="" id="formComprar">
        <input type="submit" class="btnHacerCompra" value="Realizar compra">
    </form>
</main>
<?php include_once("pie.html")?>
</div>