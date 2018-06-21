<?php
   $type = $_POST["type"];
 
    $url_ = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=40.6386443,-8.752488&radius=1200&type=$type&key=AIzaSyAc5MYHz-Zj8kBZ43xaVG9DJOlgnKlzF68";
    
    $res=file_get_contents($url_);

    echo json_encode($res);


    

  ?>