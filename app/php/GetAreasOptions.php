<?php

    $db_connection = pg_connect("host=localhost dbname=spatial_barra_parking user=root password=root");

    $result = pg_query($db_connection, "SELECT * FROM parking_areas;");

    while($area = pg_fetch_array($result))
    {
?>
<script> 

    $("#appendAreasSideNav").append('<div class="col s4"><input class="imgArea" type="image" src="images/area1.png" style="width: 100%; height: 5%;" lat="<?php echo $area['lat']; ?>" long="<?php echo $area['long']; ?>"/><b id="nomeArea" style="color: #757575; font-size: 11px;">Área <?php echo $area['id']; ?></b><div class="progress" style="margin-bottom: -10px; margin-top: -5px;"><div id="img_<?php echo $area['id']; ?>" class="determinate" style="width: 100%"></div></div><b id="text_<?php echo $area['id']; ?>" style="color: #757575; font-size: 11px;">Livres:</b></div>');

    $("#appendAreasModalImages").append('<li class="tab grey lighten-5"><a class="active grey lighten-5" href="#area<?php echo $area['id']; ?>" style="height: 100px;"><img class="z-depth-3" src="images/area1.png" style="border-radius: 5px;"></a></li>');
    
    $("#appendAreasModalChips").append('<div id="area<?php echo $area['id']; ?>" class="cardContentAreas"><div id="chipNomeArea" class="chip z-depth-2"><b><?php echo $area['nome']; ?></b></div></div>');
    
    alteraLugares('img_<?php echo $area['id']; ?>', 34, 'text_<?php echo $area['id']; ?>', 12);
</script>
<?php
    }      
?>