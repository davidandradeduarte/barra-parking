<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$x1 = '-8.74376';
$y1 = '40.63198';
$x2 = '-8.74663';
$y2 = '40.64044';
 //$geojson.='["-8.740374", "40.630780"],  [-8.74703452, 40.63910304]';

$db_connection = pg_connect("host=localhost dbname=spatial_barra_parking user=root password=root");



$result = pg_query($db_connection, "SELECT  array_to_json(array_agg(feat)) As features
FROM (SELECT 'Feature' As type,
  ST_AsGeoJSON(b.geom_way)::json As geometry FROM pgr_dijkstra('
  SELECT id, source::integer, target::integer, cost::double precision, reverse_cost
  FROM road_network_arches', findVertex('-8.74376', '40.63198'),array[findVertex('-8.746174', '40.640612')], true) a
  LEFT JOIN road_network_arches b ON (a.edge = b.id)) As feat");



if (!$result) {
    echo "An error occurred.\n";
    exit;
  }

$row = pg_fetch_row($result);


$array = json_decode($row[0], true);





$countI = count($array) - 1;



$coordenadasLinha ='{"coordinates":[';

for($i=0;$i<$countI;$i++){
    $countJ = count($array[$i]['geometry']['coordinates'][0]);
    for ($j=0;$j<$countJ;$j++){
        for($k=0;$k<2;$k++){
            if($k == 1){
                if($i == ($countI-1) && $j == ($countJ-1) && $k == 1){
                    $coordenadasLinha.= $array[$i]['geometry']['coordinates'][0][$j][$k]."]"; 
                }else{
                    $coordenadasLinha.= $array[$i]['geometry']['coordinates'][0][$j][$k]."],"; 
                }
            }else{
                $coordenadasLinha.= "[".$array[$i]['geometry']['coordinates'][0][$j][$k].","; 
            }
        }
    }
}
$coordenadasLinha.= "]}";

echo json_encode($coordenadasLinha);

       
?>