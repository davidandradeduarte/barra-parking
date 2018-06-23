<?php 
    $vertices_x = array(-8.75035, -8.73506, -8.73415, -8.73932, -8.75108, -8.75035);    // x-coordinates of the vertices of the polygon
    $vertices_y = array(40.64450 , 40.64443, 40.64284, 40.63060, 40.62990, 40.64450); // y-coordinates of the vertices of the polygon
    $points_polygon = count($vertices_x) - 1;  // number vertices - zero-based array
    $longitude_x = $_POST["x"];  // x-coordinate of the point to test
    $latitude_y = $_POST["y"];    // y-coordinate of the point to test

    if (is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)){
    echo "Is in polygon!";
    }
    else echo "Is not in polygon";


    function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)
    {
    $i = $j = $c = 0;
    for ($i = 0, $j = $points_polygon ; $i < $points_polygon; $j = $i++) {
        if ( (($vertices_y[$i]  >  $latitude_y != ($vertices_y[$j] > $latitude_y)) &&
        ($longitude_x < ($vertices_x[$j] - $vertices_x[$i]) * ($latitude_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]) ) )
        $c = !$c;
    }
    return $c;
    }
?>