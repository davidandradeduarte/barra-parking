<?php

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
    }';
        
        echo json_encode($geojson);
?>