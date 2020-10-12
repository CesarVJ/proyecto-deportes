<script  type="text/javascript" src="Compruebaprecio.js"></script>
<script>
    
</script>
<?php
include_once("cabecera.html");
?>
<main>
<h1 id="tituloP">Modificar producto</h1>
<br><br>
<form name="busq" method="POST">
    <table id="formularios">
        <tr>
            <td>Busqueda:&nbsp;</td>
            <td><input class="inpForm" name="busqueda" type="text" required></td>
        </tr>
    </table>  
    <br>
    <input id="boton" type="submit" name="enviar" value="Confirmar" onclick="Comprueba()">
</form>
</main>
<?php
include_once("pie.html")
?>
