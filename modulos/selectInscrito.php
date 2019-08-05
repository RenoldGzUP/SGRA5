<div >
    <!--LLAMA A LA CLASE TABLAINSCRTIOPS-->
    <form  id="rangeTableInscrito" class="form-inline"  action="../pagesAdm/inscritos.php" method="post" >
         <span>Mostrar: </span> &nbsp
        <select id="select_range" name="range" onchange="setRegister()">
            <?php
$ranges_list = array(20, 50, 100, 500);
//SI LA VARAIBLE range esta seteada
if (isset($_REQUEST['range'])) {
    for ($i = 0; $i <= 3; $i++) {
        if ($ranges_list[$i] == $_REQUEST['range']) {
            echo "<option value=" . $ranges_list[$i] . " selected>" . $_REQUEST['range'] . "</option>";
        } else {
            echo "<option value=" . $ranges_list[$i] . ">" . $ranges_list[$i] . "</option>";
        }
    }
} else {
    echo "
            <option value='20'>20</option>
            <option value='50'>50</option>
            <option value='100'>100</option>
            <option value='500'>500</option>
            ";
}
?>
        </select>
        registros
      <!--
        <input type="submit" value="Aplicar" name="operar">
 -->    </form>
    <div class="pull-right">
        <form class="form-inline" action="../pagesAdm/inscritos.php"  style="margin-top: -20px">
            Buscar : <input id="idSearch" type="text" name="idSearch" size="17" >
            <!-- <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> </a>-->
            <input type="submit" value="OK"  name="buscar">
        </form>
    </div>
</div>