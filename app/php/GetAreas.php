<?php

$db_connection = pg_connect("host=localhost dbname=spatial_barra_parking user=root password=root");

$result = pg_query($db_connection, "select json_build_object(
    'type', 'FeatureCollection', 'features',
    (select json_agg(p1) from (select 'Feature' as type,
        json_build_object('id', id, 'nome', nome) as properties,
		ST_AsGeoJSON(geom)::json As geometry
        from parking_areas) p1));");



if (!$result) {
    echo "An error occurred.\n";
    exit;
  }

$row = pg_fetch_row($result);

echo json_encode($row[0]);

       
?>