<?php

    $db_connection = pg_connect("host=localhost  dbname=spatial_barra_parking user=root password=root");

    $result = pg_query($db_connection, "SELECT * FROM parking_areas;");

    while($area = pg_fetch_array($result))
    {
?>
    <script> 
        $("#appendAreasModalImages").append('<li class="tab grey lighten-5"><a class="active grey lighten-5" href="#area<?php echo $area['id']; ?>" style="height: 100px;"><img class="z-depth-3" src="images/area<?php echo $area['id']; ?>.png" style="border-radius: 5px;"></a></li>');
        $("#appendAreasModalChips").append('<div id="area<?php echo $area['id']; ?>" class="cardContentAreas"><div id="chipNomeArea" class="chip z-depth-2"><b><?php echo $area['nome']; ?></b></div></div>');
    </script>
<?php
    }      
?>