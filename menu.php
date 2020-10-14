<nav class="menu">
    <a href="<?php echo $inicio;?>" class="menu menu_opcion" id="mnuCatalogo">Catalogo</a>
   <!-- <div>
    <a href="#">Lineas</a>
    <ul class="lineas">
        <a href="<?php echo $inicio;?>" class="submenu">Uniformes</a>
        <a href="<?php echo $inicio;?>" class="submenu">Ropa para Niños</a>
        <a href="<?php echo $inicio;?>" class="submenu">Balones</a>
        <a href="<?php echo $inicio;?>" class="submenu">Souvenirs</a>
    </ul>
    </div>-->
    <a href="<?php echo $registro;?>" class="menu <?php echo $claseRegistro;?>" id="mnuRegistro">Registrarse</a>
    <a href="<?php echo $login;?>" class="menu <?php echo $claseLogin;?>" id="mnuLogin">Iniciar Sesi&oacute;n</a>
    <a href="PanelAdministrador.php" class="menu <?php echo $clasePanelAdmin;?>" id="mnuPanelAdmin">Panel Administraci&oacute;n</a>
    <a href="ctrlPhp/ctrlLogout.php" class="menu <?php echo $claseSalir;?>" id="mnuSalir">Cerrar Sesi&oacute;n</a>
</nav>