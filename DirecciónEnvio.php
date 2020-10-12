<script>
    function verifClaves (){
        var clave1 = document.RegUsr.contra.value;
        var clave2 = document.RegUsr.confcon.value;

        if (clave1==clave2) {
            document.RegUsr.submit();
            window.location.href="";
        }
        else
            alert("Las contraseñas no son iguales");
    }
</script>

<?php
include_once("cabecera.html");
?>

<main>
<h1 id="TituloP">Direcci&oacute;n de env&iacute;o</h1>
<br><br>

<form name="DirrecEnvio" method="POST">
    <table id="formularios">
        <tr>
            <td>Calle</td>
            <td><input type="text" class="inpForm" name="call"></td>
        </tr>
        <tr>
            <td>Colonia</td>
            <td><input type="text" class="inpForm" name="colonia"></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td><input type="text" class="inpForm" name="ciudad"> </td>
        </tr>
        <tr>
            <td>C&oacute;digo postal</td>
            <td><input type="text" class="inpForm" name="codpost"></td>
        </tr>
        <tr>
            <td>N&uacute;mero exterior</td>
            <td><input type="text" name="numext" class="inpForm"></td>
        </tr>
        <tr>
            <td>N&uacute;mero interior</td>
            <td><input type="text" name="numint" class="inpForm"></td>
        </tr>
        <tr>
            <td>Estado</td>
            <td><input type="text" class="inpForm" name="estado"> </td>
        </tr>
    </table>
    
    <br>
    <input id="boton" type="submit" name="enviar" value="Confirmar" onclick="verifClaves()">

</form>
</main>


<?php
include_once("pie.html");
?>