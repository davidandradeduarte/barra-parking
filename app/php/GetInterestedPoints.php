<?php
   $type = $_POST["type"];
 
    $url_ = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=40.6386443,-8.752488&radius=1200&type=restaurant&key=AIzaSyCqhId3qv1xvUEEpqhLgBcd9L_eo6uHtIo";
    
    $res=file_get_contents($url_);

    echo json_encode($res);


    

  ?>