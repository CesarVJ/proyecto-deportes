<?php

$inicio = "#";
$registro = "RegistroUsuarios.php";
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

    <table class="articulos">
        <thead>
            <tr>
                <td>Producto</td>
                <td>Linea</td>
                <td>Equipo</td>
                <td>Carcateristicas</td>
                <td>Precio</td>
                <td>Cantidad</td>
            </tr>
        </thead>
        <tbody>
            <tr class="articulo">
                <td>
                    <p>Producto 1</p>
                    <img src="./media/Balones/Adidas.jpg" alt="" class="imagen-articulo">
                </td>
                <td>
                    <p>Balones</p>
                </td>
                <td>
                    <p>Juventus</p>
                </td>
                <td>
                    <ul>
                        <li>Color blanco</li>
                        <li>Otra caracterstica</li>
                    </ul>
                </td>
                <td>
                    <p>$320</p>
                </td>
                <td>
                    <input type="number" class="cantidadArt">
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
                    <p>$200</p>
                </td>
                <td>
                    <input type="number" class="cantidadArt">
                </td>
            </tr>
        </tbody>
    </table>

    <form action="" id="formComprar">
        <input type="submit" class="btnHacerCompra" value="Realizar compra">
    </form>
</main>
<?php include_once("pie.html")?>
</div>