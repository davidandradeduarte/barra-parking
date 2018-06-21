<html>

<head>
    <!-- Define page charset -->
    <meta charset="UTF-8">
    <title>BarraParking</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
    <!-- Compiled and minified CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <!-- Desktop CSS -->
    <link href="css/map.css" rel="stylesheet" />
    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js "></script>
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js"></script>
</head>

<body>

    <!-- SideNav Structure -->
    <!-- ******************************************************************************************************************** -->
    <ul id="slide-out" class="sidenav z-depth-5">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="images/barra3.jpg">
                </div>
                <a href="index.html">
                    <img style="max-width: 25%; max-height: 25%;" src="images/logo.png">
                </a>
                <a>
                    <span class="white-text name">Barra Parking</span>
                </a>
                <a>
                    <span class="white-text email"></span>
                </a>
            </div>
        </li>
        <li>
            <div class="card" style="margin-top: -10px;">
                <div id="resetLatLong" class="card-tabs">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab grey lighten-4">
                            <a class="active grey lighten-4" href="#areaAreas">
                                Áreas
                            </a>
                        </li>
                        <li class="tab grey lighten-4">
                            <a class="grey lighten-4" href="#areaLocais">
                                Pontos Turísticos
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-content grey lighten-4">
                    <div id="areaAreas" class="center-align" style="overflow-y:hidden;">
                        <!-- ***************** Appends here areas options ****************************** -->
                        <div id="appendAreasSideNav" class="row" style="margin-top: 25px; margin-bottom: -5px;"></div>
                        
                        <a id="obterRotaAreas" class="btn blue darken-3" style="border-radius: 25px; margin-bottom: 10px; margin-top: 25px; width: 70%;">
                            <i class="material-icons white-text left">directions_car</i>
                            <b style="font-size: 11px; text-align: center; margin-left: -20px;">Obter Rota</b>
                        </a>
                        <a id="googleMapsAreas" class="btn grey lighten-4" style="height: 40px; border-radius: 25px; margin-bottom: 15px; width: 80%;">
                            <img style="vertical-align:middle; margin-right: 5px; width: 24px;" src="images/google.png">
                            <i class="material-icons grey-text right" style="vertical-align:middle; margin-top: 2px;">keyboard_arrow_right</i>
                            <b style="vertical-align:middle; color: #757575; font-size: 10px; margin-left: 10px;">Google Maps</b>
                        </a>
                    </div>
                    <div id="areaLocais" class="center-align" style="overflow-y:hidden;">
                        <div class="row">
                            <div class="input-field col s12">
                                <!-- ***************** Maybe appends here interest points ****************************** -->
                                <select id="ponto_interesse">
                                    <option value="" disabled selected>Ponto de interesse</option>
                                    <option value="cafe">Café</option>
                                    <option value="pharmacy">Farmácia</option>
                                    <option value="store">Loja</option>
                                    <option value="atm">Multibanco</option>
                                    <option value="restaurant">Restaurantes</option>
                                </select>
                            </div>
                        </div>
                        <div id="selectPontosInteresse" class="row" style="height: 100%;"></div>
                    
                        <a id="obterRotaLocais" class="btn blue darken-3" style="border-radius: 25px; margin-bottom: 10px; margin-top: 25px; width: 70%;">
                            <i class="material-icons white-text left">directions_car</i>
                            <b style="font-size: 11px; text-align: center; margin-left: -20px;">Obter Rota</b>
                        </a>
                        <a id="googleMapsLocais" class="btn grey lighten-4" style="height: 40px; border-radius: 25px; margin-bottom: 15px; width: 80%;">
                            <img style="vertical-align:middle; margin-right: 5px; width: 24px;" src="images/google.png">
                            <i class="material-icons grey-text right" style="vertical-align:middle">keyboard_arrow_right</i>
                            <b style="vertical-align:middle; color: #757575; font-size: 10px; margin-left: 10px;">Google Maps</b>
                        </a>
                    </div>
                </div>
            </div>
        </li>
     
    </ul>
    <!-- ******************************************************************************************************************** -->

    <!-- Modal Structure -->
    <!-- ******************************************************************************************************************** -->
    <div id="modalArea" class="modal">
        <div class="modal-content">
            <h5>Escolha a área</h5>
            <div class="divider dividerArea"></div>
            <p>
                <div class="card z-depth-0">
                    <div class="card-tabs tabCards">
                        <!-- ***************** Appends here areas images ****************************** -->
                        <ul id="appendAreasModalImages" class="tabs tabs-fixed-width" style="height: 100px;">

                        </ul>
                    </div>
                    <!-- ******************* Appends here areas chips *************************** -->
                    <div id="appendAreasModalChips" class="card-content grey lighten-5 center-align"></div>
                </div>
            </p>
        </div>
        <div id="modalOptions" class="modal-footer">
            <a id="modalButton" class="btn blue darken-3 modal-action">
                <i class="material-icons white-text" style="margin-right: 10px;">directions_car</i>
                <b style="font-size: 12px;">Obter Rota</b>
            </a>
        </div>
    </div>
    <!-- ******************************************************************************************************************** -->

    <div id="map" class="map"></div>

   
   <div id="optionsMenu" class="fixed-action-btn">
        <a href="#" data-target="slide-out" class="btn-floating btn-large blue darken-4 sidenav-trigger z-depth-4">
            <i class="material-icons">menu</i>
        </a>
        <ul class="hide-on-small-only">
            <li><a class="btn-floating light-blue darken-3 tooltipped" id="pontoseguinte" data-position="left" data-tooltip="Avançar Ponto"><i class="material-icons">arrow_forward</i></a></li>
            <li><a class="btn-floating light-blue darken-3 tooltipped" data-position="left" data-tooltip="Escolher Ponto"><i class="material-icons">location_on</i></a></li>
            <li><a class="btn-floating green darken-1 tooltipped" id="randomPosition" data-position="left" data-tooltip="Nova Rota"><i class="material-icons">autorenew</i></a></li>
            <li><a class="btn-floating red darken-1 tooltipped" id="limparRota" data-position="left" data-tooltip="Apagar Rota"><i class="material-icons">delete_forever</i></a></li>
        </ul>
    </div>

    <script>
        var x1,y1,latFinal,longFinal;
        
        function getActualLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(definePosition);
            } else { 
                alert("Geolocation is not supported by this browser!!");
            }
        }
        function definePosition(position) {
            x1 = position.coords.longitude;
            y1 = position.coords.latitude;
        }
        getActualLocation();

        // Função para alterar parametros de informação dos lugares livres
        function alteraLugares(idImageArea, percent, idTextArea, lugares) {
            if (percent <= 35) {
                document.getElementById(idImageArea).style.backgroundColor = "#1b5e20";
            } else if (percent > 35 && percent <= 70) {
                document.getElementById(idImageArea).style.backgroundColor = "#006064";
            } else if (percent > 70 && percent <= 90) {
                document.getElementById(idImageArea).style.backgroundColor = "#e65100";
            } else if (percent > 90) {
                document.getElementById(idImageArea).style.backgroundColor = "#b71c1c";
            }
            document.getElementById(idImageArea).style.width = percent;
            document.getElementById(idTextArea).innerHTML = "Livres: " + lugares;
        }
        
        var Parking = {
            map: '',
            UserLocationInit: ["-8.7430099", "40.6317209"],
            Projection: 'EPSG:4326',
            LayerParkingsFree: '',
            routeCoords:'',
            routeLength:'',
            StartEnd:'',
            UserLocation:'',
            LayerRoute:'',
            pos:0,
            toasts: function(texto){
                alert(texto);
            },
            GetRoute: function (x1, y1) {
                var vectorLayer,
                coordenadas = {
                    x1: x1,
                    y1: y1,
                    x2: "-8.746174",
                    y2: "40.640612"
                };

                $.ajax({
                    url: 'php/GetRoute.php',
                    type: 'POST',
                    data: coordenadas,
                    async: false,
                    dataType: "json",
                    success: function (response) {

                        geojsonObject = jQuery.parseJSON(response);

                        var routeGeom = new ol.geom.LineString(geojsonObject.coordinates),
                            routeFeature = new ol.Feature({
                                geometry: routeGeom
                            });

                        Parking.routeCoords = routeGeom.getCoordinates();
                        Parking.routeLength = Parking.routeCoords.length;

                        var vectorSource = new ol.source.Vector({
                            features: [routeFeature]
                        });

                        vectorLayer = new ol.layer.Vector({
                            source: vectorSource,
                            style: Parking.StylesGeneric()
                        });

                        Parking.map.removeLayer(Parking.LayerRoute);
                        Parking.LayerRoute=vectorLayer;
                        Parking.map.addLayer(Parking.LayerRoute);

                        Parking.StartAndEndRoute();

                        Parking.pos=0;
                        Parking.ChangeUserPosition(Parking.routeCoords[0]);

                    },
                    error: function (response) {
                        Parking.toasts('Error');
                    }
                });
            
            },
            StartAndEndRoute: function(){

                var startMarker = new ol.Feature({
                    type: 'icon',
                    geometry: new ol.geom.Point(Parking.routeCoords[0])
                });
                var endMarker = new ol.Feature({
                    type: 'icon',
                    geometry: new ol.geom.Point(Parking.routeCoords[Parking.routeLength - 1])
                });

                Parking.StartEnd = new ol.layer.Vector({
                    source: new ol.source.Vector({
                    features: [startMarker, endMarker]
                    }),
                    style: new ol.style.Style({
                            image: new ol.style.Icon(({
                            scale: .7, opacity: 1,
                            rotateWithView: false, anchor: [0.5, 1],
                            anchorXUnits: 'fraction', anchorYUnits: 'fraction',
                            src: 'http://raw.githubusercontent.com/jonataswalker/map-utils/master/images/marker.png'
                        })),
                        zIndex: 5
                    })
                });

                  Parking.map.addLayer(Parking.StartEnd);

            },
            ChangeUserPosition: function(location){
                Parking.map.removeLayer(Parking.UserLocation);

                var geoMarker = new ol.Feature({
                    type: 'geoMarker',
                    geometry: new ol.geom.Point(location)
                });

                Parking.UserLocation = new ol.layer.Vector({
                    source: new ol.source.Vector({
                    features: [geoMarker]
                    }),
                    style: new ol.style.Style({
                    image: new ol.style.Circle({
                            radius: 7,
                            snapToPixel: false,
                            fill: new ol.style.Fill({color: 'black'}),
                            stroke: new ol.style.Stroke({
                            color: 'white', width: 2
                            })
                        })
                        })
                });
                
                Parking.map.addLayer(Parking.UserLocation);
            },
            GetAreas: function () {
                var vectorLayer;
                $.ajax({
                    url: 'php/GetAreas.php',
                    async: false,
                    dataType: "json",
                    success: function (response) {

                        geojsonObject = jQuery.parseJSON(response);
                        var vectorSource = new ol.source.Vector({
                            features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
                        });

                        vectorSource.addFeature(new ol.Feature(new ol.geom.Circle([5e6, 7e6], 1e6)));

                        vectorLayer = new ol.layer.Vector({
                            source: vectorSource,
                            style: Parking.StylesGeneric()
                        });

                    },
                    error: function () {
                        return 'Error';
                    }
                });

                return vectorLayer;
            },

            GetParkings: function () {
                var vectorLayer;
                $.ajax({
                    url: 'php/GetParkings.php',
                    async: false,
                    dataType: "json",
                    success: function (response) {

                        geojsonObject = jQuery.parseJSON(response);
                        var vectorSource = new ol.source.Vector({
                            features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
                        });

                        vectorSource.addFeature(new ol.Feature(new ol.geom.Circle([5e6, 7e6], 1e6)));

                        vectorLayer = new ol.layer.Vector({
                            source: vectorSource,
                            style: Parking.StylesGeneric()
                        });

                    },
                    error: function () {
                        return 'Error';
                    }
                });
                return vectorLayer;
            },

            GetParkingsFree: function () {
                var vectorLayer;
                $.ajax({
                    url: 'php/GetParkingsFree.php',
                    async: false,
                    dataType: "json",
                    success: function (response) {

                        geojsonObject = jQuery.parseJSON(response);
                        var vectorSource = new ol.source.Vector({
                            features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
                        });

                        vectorSource.addFeature(new ol.Feature(new ol.geom.Circle([5e6, 7e6], 1e6)));

                        vectorLayer = new ol.layer.Vector({
                            source: vectorSource,
                            style: new ol.style.Style({
                                image: new ol.style.Circle({
                                    radius: 3,
                                    fill: new ol.style.Fill({ color: '#388e3c' })
                                })
                            })
                        });
                    },
                    error: function () {
                        return 'Error';
                    }
                });
                return vectorLayer;
            },

            GetCurrentLocation: function () {
                var geolocation = new ol.Geolocation({
                    projection: Parking.Projection
                });

                function el(id) {
                    return document.getElementById(id);
                }

                geolocation.setTracking(this);

                // handle geolocation error.
                geolocation.on('error', function (error) {
                    var info = document.getElementById('info');
                    info.innerHTML = error.message;
                    info.style.display = '';
                });

                var accuracyFeature = new ol.Feature();
                geolocation.on('change:accuracyGeometry', function () {
                    accuracyFeature.setGeometry(geolocation.getAccuracyGeometry());
                });

                var positionFeature = new ol.Feature();
                positionFeature.setStyle(new ol.style.Style({
                    image: new ol.style.Icon(/** @type {olx.style.IconOptions} */({
                        anchor: [0.5, 46],
                        anchorXUnits: 'fraction',
                        anchorYUnits: 'pixels',
                        src: 'images/cursor.png'
                    }))
                }));

                geolocation.on('change:position', function () {
                    var coordinates = geolocation.getPosition();
                    positionFeature.setGeometry(coordinates ?
                        new ol.geom.Point(coordinates) : null);
                });

                var vectorSource = new ol.source.Vector({
                    features: [accuracyFeature, positionFeature]
                });

                var vectorLayer = new ol.layer.Vector({
                    source: vectorSource,
                    style: Parking.StylesGeneric()
                });

                return vectorLayer;
            },

            MAP: function (LayerAreas, Layer_CurrentLocation, LayerParkings, LayerParkingsFree) {

                var viewGeneric = new ol.View({
                    projection: Parking.Projection,
                    center: [-8.74703452, 40.63910304],
                    zoom: 16
                })

                Parking.map = new ol.Map({
                    layers: [
                        new ol.layer.Tile({
                            source: new ol.source.OSM()
                        }),
                        LayerAreas,
                        Layer_CurrentLocation,
                        LayerParkings,
                        LayerParkingsFree
                    ],
                    target: 'map',
                    controls: ol.control.defaults({
                        attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
                            collapsible: false
                        }),
                        zoom: false
                    }),
                    view: viewGeneric
                });

                 // select interaction working on "click"
                 var selectClick = new ol.interaction.Select({
                condition: ol.events.condition.click
                });

                var select = selectClick;  // ref to currently selected interaction

                // select interaction working on "pointermove"
                var selectPointerMove = new ol.interaction.Select({
                condition: ol.events.condition.pointerMove
                });

                var selectElement = 'click';

                var changeInteraction = function() {
                    if (select !== null) {
                        Parking.map.removeInteraction(select); 
                    }

                    if (select !== null) {
                        Parking.map.addInteraction(select);

                        select.on('select', function(e) {
                            if(e.selected.length){
                                
                                //Verificar se e uma area e apresentar lugares livres (substituir pelo e.selected.length)
                                M.toast({html: 'Lugares livres: ' + e.selected.length, classes: 'rounded', displayLength: 4000});   
                            } 
                        }); 
                    }
                };

                /**
                * onchange callback on the select element.
                */
                selectElement.onchange = changeInteraction;
                changeInteraction();
            },

           StylesGeneric: function () {

            var image = new ol.style.Circle({
                radius: 1,
                fill: null,
                stroke: new ol.style.Stroke({ color: '#d32f2f', width: 1 })
            }),
                styles = {
                    'Point': new ol.style.Style({
                        image: image
                    }),
                    'LineString': new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: '#0277bd',
                            width: 4
                        })
                    }),
                    'MultiLineString': new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: '#0277bd',
                            width: 1
                        })
                    }),
                    'MultiPoint': new ol.style.Style({
                        image: image
                    }),
                    'MultiPolygon': new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: '#607d8b',
                            width: 1
                        }),
                        fill: new ol.style.Fill({
                            color: 'rgba(187, 222, 251, 0.7)'
                        })
                    }),
                    'Polygon': new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: 'blue',
                            lineDash: [4],
                            width: 3
                        }),
                        fill: new ol.style.Fill({
                            color: 'rgba(0, 0, 255, 0.1)'
                        })
                    }),
                    'GeometryCollection': new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: 'magenta',
                            width: 2
                        }),
                        fill: new ol.style.Fill({
                            color: 'magenta'
                        }),
                        image: new ol.style.Circle({
                            radius: 10,
                            fill: null,
                            stroke: new ol.style.Stroke({
                                color: 'magenta'
                            })
                        })
                    }),
                    'Circle': new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: '#1976d2',
                            width: 2
                        }),
                        fill: new ol.style.Fill({
                            color: '#1976d2'
                        })
                    })
                };

                var styleFunction = function (feature) {
                    return styles[feature.getGeometry().getType()];
                };
                return styleFunction;
            },
            ReloadParkingsFree: function () {
                Parking.map.removeLayer(Parking.LayerParkingsFree);
                Parking.LayerParkingsFree = Parking.GetParkingsFree();
                Parking.map.addLayer(Parking.LayerParkingsFree);
            },
            getRandomInitPoint: function () {
                var arrayRandomPoints = [ ["-8.747053","40.636229"], ["-8.746198","40.640129"], ["-8.748012","40.643621"]],
                    randomPoint = arrayRandomPoints[Math.floor(Math.random() * arrayRandomPoints.length)];
                return randomPoint;
            },
            limparRota: function(){
                Parking.map.removeLayer(Parking.LayerRoute);
                Parking.map.removeLayer(Parking.StartEnd);
                Parking.map.removeLayer(Parking.UserLocation);
            },
            getInterestedPoints: function(){
                var data = {
                        type: $("#ponto_interesse").val()
                    };

                $.ajax({
                    url: "php/GetInterestedPoints.php",
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (response) {
                        var parse = JSON.parse(response);
                        
                        $('#selectPontosInteresse').html('');
                        $.each(parse.results, function (i, item) {

                            var apend = ''; 
                            try {
                                apend = '<div class="col s4">\
                                    <input class="imgLocais" type="image" src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+item.photos[0].photo_reference+'&key=AIzaSyAc5MYHz-Zj8kBZ43xaVG9DJOlgnKlzF68" style="width: 100%; height: 5%;"  long="'+item.geometry.location.lng+'" lat="'+item.geometry.location.lat+'"/>\
                                        <b id="sideNavNomeArea" style="color: #757575; font-size: 8px;">'+item.name+'</b>\
                                    </div>';
                            }
                            catch(error) {
                                apend = '<div class="col s4">\
                                    <input class="imgLocais" type="image" src="images/nophoto.jpg" style="width: 100%; height: 5%;" long="'+item.geometry.location.lng+'" lat="'+item.geometry.location.lat+'"/>\
                                        <b id="sideNavNomeArea" style="color: #757575; font-size: 8px;">'+item.name+'</b>\
                                    </div>';
                            }
                            $('#selectPontosInteresse').append(apend);
                        });

                    },
                    error: function (response) {
                        alert("Erro");
                    }
                });
            },
            init: function () {
                var LayerAreas = Parking.GetAreas(),
                    LayerCurrentLocation = Parking.GetCurrentLocation(),
                    LayerParkings = Parking.GetParkings();
                Parking.LayerParkingsFree = Parking.GetParkingsFree();

                if (LayerAreas != 'Error' && LayerCurrentLocation != 'Error' && LayerParkings != 'Error') {
                    Parking.MAP(LayerAreas, LayerCurrentLocation, LayerParkings, Parking.LayerParkingsFree);
                    Parking.ChangeUserPosition(Parking.UserLocationInit);
                } else {
                    $("#map").html("Error");
                }

            }
        };

        $(document).ready(function () {
            Parking.init();

            window.setInterval(function () {
                Parking.ReloadParkingsFree();
            }, 1000);

            $('.fixed-action-btn').floatingActionButton();
            $('.sidenav').sidenav();
            $('.tooltipped').tooltip();
            $('select').formSelect();
            $('.modal').modal();
            $('.modal').modal('open');
            
            $('#googleMapsAreas').click(function () {
                window.location.href = 'googlemaps.html?from=' + x1 + ',' + y1 + '&to=' + Parking.coordenadas.x2 + ',' + Parking.coordenadas.y2;
            });

            $('#googleMapsLocais').click(function () {
                window.location.href = 'googlemaps.html?from=' + x1 + ',' + y1 + '&to=' + Parking.coordenadas.x2 + ',' + Parking.coordenadas.y2;
            });

            $("#ponto_interesse").change(function () {
                Parking.getInterestedPoints();
            });

            $('#modalButton').click(function () {
                Parking.GetRoute("-8.74376", "40.63198");
            });

            //SIMULAÇÃO BUTTONS
            $('#pontoseguinte').click(function () {
                Parking.ChangeUserPosition(Parking.routeCoords[Parking.pos]);
                Parking.pos++;
            });

            $('#randomPosition').click(function () {
                Parking.limparRota();
                var array= Parking.getRandomInitPoint();
                Parking.GetRoute(array[0], array[1]);
            });

            $('#limparRota').click(function () {
                Parking.limparRota();
            });

            // AQUI INICIA PERCURSO DE AREAS
            $("#obterRotaAreas").click(function() {
                alert(latFinal + "," + longFinal);
            });

            // AQUI INICIA PERCURSO DE LOCAIS
            $("#obterRotaLocais").click(function() {
                alert(latFinal + "," + longFinal);
            });

            // Reset Lat and Long
            $("#resetLatLong").click(function() {
                latFinal = null;
                longFinal = null;
            });

            // Reset Lat and Long
            $("#optionsMenu").click(function() {
                latFinal = null;
                longFinal = null;
            });

            // Get lat and long from areas
            $(document).on("click",".imgArea", function() {
                latFinal = $(this).attr('lat');
                longFinal = $(this).attr('long');
            });

            // Get lat and long from places
            $(document).on("click",".imgLocais", function() {
                latFinal = $(this).attr('lat');
                longFinal = $(this).attr('long');
            });
        });

        $(document).click(function () {
            $(".tooltip ").trigger("mouseenter.tooltip ");
            setTimeout(function () { $(".tooltip ").trigger("mouseleave.tooltip "); }, 2000);
        });

        // Função para alterar parametros de informação dos lugares livres
        function alteraLugares(idImageArea, percent, idTextArea, lugares) {
            if (percent <= 35) {
                document.getElementById(idImageArea).style.backgroundColor = "#1b5e20";
            } else if (percent > 35 && percent <= 70) {
                document.getElementById(idImageArea).style.backgroundColor = "#006064";
            } else if (percent > 70 && percent <= 90) {
                document.getElementById(idImageArea).style.backgroundColor = "#e65100";
            } else if (percent > 90) {
                document.getElementById(idImageArea).style.backgroundColor = "#b71c1c";
            }
            document.getElementById(idImageArea).style.width = percent;
            document.getElementById(idTextArea).innerHTML = "Livres: " + lugares;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(elems, {
            direction: 'top'
            });
        });

    </script>
    <?php require_once("php/GetAreasOptions.php"); ?>
</body>

</html>