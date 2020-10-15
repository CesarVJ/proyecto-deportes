<?php
session_start();
include_once("modelo/ErroresAplic.php");
$inicio = "#";
$registro = "RegistroUsuarios.php";
$login = "login.php";
$claseCatalogo ="menu_opcion";
$claseSalir = "menu_inhab";
$claseLogin = "menu_opcion";
$claseRegistro = "menu_opcion";
$clasePanelAdmin = "menu_inhab";

if (isset($_SESSION["sTipoFirmado"])){
    $login="bienvenido.php";
    $claseSalir = "menu_opcion";
    $claseLogin = "menu_inhab";
    $claseRegistro = "menu_inhab";
    if ($_SESSION["sTipoFirmado"]=="Administrador"){
        $clasePanelAdmin = "menu_opcion";
    }
} 
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
                <td id ="precio_col">Precio</td>
                <td id ="cantidad_col">Cantidad</td>
            </tr>
        </thead>
        <tbody id="bodyTablaArt">            
        </tbody>
    </table>

    <form action="" id="formComprar" style="display:none;">
        <button id ="mostTotal" class="btnHacerCompra" style="padding: 0.5rem; margin-bottom: 1rem;" onclick="mostrarTotal(); return false;">Mostrar total a pagar</button>
        <div id="cajaPago" style="display:none">
        <p style="font-size: 1.2rem; font-weight: bold;">Total a pagar (Con precio de envio): $<span id="totalPagar">100</span></p>
        <input type="submit" class="btnHacerCompra" value="Realizar compra">
        </div>

    </form>
</main>
<?php include_once("pie.html")?>
</div>