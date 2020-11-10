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
        <form onsubmit="return false;">
            <label for="tipoEquipo">Filtrar por equipo:</label>
            <select id="tipoEquipo" name="tipoEquipo" class="ui-menu ui-corner-bottom ui-widget ui-widget-header">
                <option value=""></option>
            </select>
            <input id="filtrarEquipos" type="submit" value="Filtrar" class="ui-button ui-corner-all" />
        </form>
        <form onsubmit="return false;">
            <label for="tipoLinea">Filtrar por Linea:</label>
            <select id="tipoLinea" name="tipoLinea" class="ui-menu ui-corner-bottom ui-widget ui-widget-header">
                <option value="U">Uniformes</option>
                <option value="R">Ropa para niños</option>
                <option value="B">Balones</option>
                <option value="S">Souvenirs</option>
            </select>
            <input id="filtrarLineas" type="submit" value="Filtrar" class="ui-button ui-corner-all"/>
        </form>
    </section>

    <table class="articulos" id="articulos">
        <thead id="op">
            <tr>
                <td>Producto</td>
                <td>Equipo</td>
                <td>Carater&iacute;sticas</td>
                <td id="precio_col">Precio</td>
                <td id="cantidad_col">Cantidad</td>
            </tr>
        </thead>
        <tbody id="bodyTablaArt">
        </tbody>
    </table>

    <form onsubmit="return false;" id="formComprar" class="oculto"><!--action="DireccionEnvio.php"-->
        <button id="mostTotal" class="btnHacerCompra ui-button ui-corner-all" style="padding: 0.5rem; margin-bottom: 1rem;">Mostrar total a pagar</button>
        <div id="cajaPago" class="oculto">
            <p style="font-size: 1.2rem; font-weight: bold;">Total a pagar (Con precio de envio): $<span
                    id="totalPagar">100</span></p>
            <input type="submit" class="btnHacerCompra ui-button ui-corner-all" value="Realizar compra" id="btnComprar">
            <p>Minimo de compra son $1000</p>
        </div>
    </form>
    <div id="mensaje" title="Mensaje">
        <h4>Alerta</h4>
        <p id="texto_mensaje"></p>
        <br />
    </div>
</main>
<?php include_once("pie.html")?>
</div>