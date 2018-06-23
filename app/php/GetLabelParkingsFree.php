<?php
  $arrayJSON = array();
  
  $db_connection = pg_connect("host=localhost dbname=spatial_barra_parking user=root password=root");

  $result1 = pg_query($db_connection,"select gvt.id from 
  (select * from parking_places where ST_SRID(geom) = 4326 and estado = 0) AS gvt
      where 
      ST_Within(gvt.geom, 
    ST_GeomFromText('POLYGON((-8.74499200821189 40.6427429489156,-8.74407329779392 40.6427600348019,-8.74406429082904 40.6421381057233,-8.74451238733192 40.6421329799101,-8.74452364603802 40.6425088718331,-8.74498750472945 40.6425037460484, -8.74499200821189 40.6427429489156))', 4326)) ");       

  if (!$result1) {
      echo "An error occurred.\n";
      exit;
  }

    $num_rows1 = pg_num_rows($result1);

    $array1['id'] = 1;
    $array1['name'] = "Parque Fernão de Magalhães";
    $array1['img'] = "images/area1.png";
    $array1['space'] = 33;
    $array1['free_places'] = $num_rows1;

    array_push($arrayJSON,$array1);

  //-------------------------------------------------

  $result2 = pg_query($db_connection,"select gvt.id from 
    (select * from parking_places where ST_SRID(geom) = 4326 and estado = 0) AS gvt
      where 
      ST_Within(gvt.geom, 
    ST_GeomFromText('POLYGON((-8.74625073155416 40.6408720179076,-8.74623722110683 40.6401834337506,-8.74661101014944 40.6401800164418,-8.7466177653731 40.6406413515494,-8.74655021313649 40.6406413515494,-8.74655922010137 40.6408720179076,-8.74625073155416 40.6408720179076))', 4326)) ");       

  if (!$result2) {
    echo "An error occurred.\n";
    exit;
  }

  $num_rows2 = pg_num_rows($result2);

  $array2['id'] = 2;
  $array2['name'] = "Parque Fernandes Lavrador";
  $array2['img'] = "images/area2.png";
  $array2['space'] = 27;
  $array2['free_places'] = $num_rows2;
  
  array_push($arrayJSON,$array2);

  //-------------------------------------------------

  $result3 = pg_query($db_connection,"select gvt.id from 
    (select * from parking_places where ST_SRID(geom) = 4326 and estado = 0) AS gvt
      where 
      ST_Within(gvt.geom, 
    ST_GeomFromText('POLYGON((-8.7468687965685 40.6364449725097,-8.74617278082718 40.6364534842603,-8.74616451600922 40.6363289438005,-8.74622177939082 40.6362554737799,-8.74686407381537 40.6362388982153,-8.7468687965685 40.6364449725097))', 4326)) ");       

  if (!$result3) {
    echo "An error occurred.\n";
    exit;
  }

  $num_rows3 = pg_num_rows($result3);

  $array3['id'] = 3;
  $array3['name'] = "Parque Ria Mar";
  $array3['img'] = "images/area3.png";
  $array3['space'] = 25;
  $array3['free_places'] = $num_rows3;
  
  array_push($arrayJSON,$array3);
  
    //-------------------------------------------------

  $result4 = pg_query($db_connection,"select gvt.id from 
    (select * from parking_places where ST_SRID(geom) = 4326 and estado = 0) AS gvt
      where 
      ST_Within(gvt.geom, 
    ST_GeomFromText('POLYGON((-8.74515505494618 40.6437419172853,-8.73680154827848 40.6438599607389,-8.73680154827848 40.6438035052002,-8.74515505494618 40.6436905939795,-8.74515505494618 40.6437419172853))', 4326)) ");       

  if (!$result4) {
    echo "An error occurred.\n";
    exit;
  }

  $num_rows4 = pg_num_rows($result4);

  $array4['id'] = 4;
  $array4['name'] = "Parque Infante Dom Henrique";
  $array4['img'] = "images/area3.png"; /* FAZER IMAGEM 4 */
  $array4['space'] = 30;
  $array4['free_places'] = $num_rows4;
  
  array_push($arrayJSON,$array4);

  echo json_encode($arrayJSON);
?>