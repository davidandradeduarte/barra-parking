<?php

$x1 = '-8.74376';
$y1 = '40.63198';
$x2 = '-8.74663';
$y2 = '40.64044';
 //$geojson.='["-8.740374", "40.630780"],  [-8.74703452, 40.63910304]';

$db_connection = pg_connect("host=localhost dbname=spatial_barra_parking user=root password=root");



$result = pg_query($db_connection, "SELECT vert.x2, vert.y2
FROM pgr_dijkstra('
SELECT id,
 source,
 target,
 cost,
reverse_cost
FROM road_network_arches',FindVertex('$x1', '$y1'), array[FindVertex('$x2', '$y2')],true)
inner join road_network_arches as vert on vert.id= edge");



if (!$result) {
    echo "An error occurred.\n";
    exit;
  }

$rows = pg_num_rows($result);

$geojson = '{
    "type": "LineString",
    "crs": {
        "type": "name",
        "properties": {
            "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
        }
    },
    "coordinates":
        [';
        $i =1;
        while ($row = pg_fetch_row($result)) {
            if ($i == $rows) {
                $geojson.= "[".$row[0].",".$row[1]."]";
            }
            else{
                
                $geojson.= "[".$row[0].",".$row[1]."],";
            }

            $i++;
        }
        //$geojson.='["-8.740374", "40.630780"],  [-8.74703452, 40.63910304]';

        $geojson .= '], "properties": {
            "distance": "21.452372",
            "description": "To enable simple instructions add: as parameter to the URL",
            "traveltime": "1228"
        }
}';
    



/* 

    $geojson = '{
        "type": "LineString",
        "crs": {
            "type": "name",
            "properties": {
                "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
            }
        },
        "coordinates":
            [
                [-8.74703452, 40.63910304]
                ,[-8.442988600000035, 40.5743103]

            ], "properties": {
                "distance": "21.452372",
                "description": "To enable simple instructions add: as parameter to the URL",
                "traveltime": "1228"
            }
    }'; */
        
        echo json_encode($geojson);
?>