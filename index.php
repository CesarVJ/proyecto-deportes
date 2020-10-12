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

    <table class="articulos" >
        <thead>
            <tr>
                <td>Producto</td>
                <td>Linea</td>
                <td>Equipo</td>
                <td>Carcateristicas</td>
                <td>Precio</td>
            </tr>
        </thead>
        <tbody>
            <tr class="articulo">
                <td>
                    <p>Producto 1</p>
                    <img src="./media/Balones/Adidas.jpg" alt="" class="imagen-articulo">
                </td>
                <td>
                    <p>Linea 1</p>
                </td>
                <td>
                    <p>Equipo 1</p>
                </td>
                <td>
                    <p>Caracteristicas</p>
                </td>
                <td>
                    <p>Precio</p>
                </td>
            </tr>
            <tr class="articulo">
                <td>
                    <p>Producto 2</p>
                    <img src="./media/Uniformes/AmericaLocal.png" alt="" class="imagen-articulo">
                </td>
                <td>
                    <p>Linea 1</p>
                </td>
                <td>
                    <p>Equipo 1</p>
                </td>
                <td>
                    <p>Caracteristicas</p>
                </td>
                <td>
                    <p>Precio</p>
                </td>
            </tr>
        </tbody>
    </table>
</main>
<?php include_once("pie.html")?>
</div>