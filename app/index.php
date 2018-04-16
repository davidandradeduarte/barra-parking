<!DOCTYPE html>
<html>
  <head>
    <title>GeoJSON</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js"></script>
  </head>
  <body>
    <div id="map" class="map"></div>
    <script>
      var image = new ol.style.Circle({
        radius: 5,
        fill: null,
        stroke: new ol.style.Stroke({color: 'red', width: 1})
      });

      var styles = {
        'Point': new ol.style.Style({
          image: image
        }),
        'LineString': new ol.style.Style({
          stroke: new ol.style.Stroke({
            color: 'green',
            width: 1
          })
        }),
        'MultiLineString': new ol.style.Style({
          stroke: new ol.style.Stroke({
            color: 'green',
            width: 1
          })
        }),
        'MultiPoint': new ol.style.Style({
          image: image
        }),
        'MultiPolygon': new ol.style.Style({
          stroke: new ol.style.Stroke({
            color: 'yellow',
            width: 1
          }),
          fill: new ol.style.Fill({
            color: 'rgba(255, 255, 0, 0.1)'
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
            color: 'red',
            width: 2
          }),
          fill: new ol.style.Fill({
            color: 'rgba(255,0,0,0.2)'
          })
        })
      };

      var styleFunction = function(feature) {
        return styles[feature.getGeometry().getType()];
      };

      var geojsonObject = {
    "type": "FeatureCollection",
    "name": "pontos",
    "crs": {
        "type": "name",
        "properties": {
            "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
        }
    },
    "features": [
        {
            "type": "Feature",
            "properties": {
                "id": 1,
                "estado": 1,
                "x": 1,
                "y": 1
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746918386103916,
                    40.642538697826382
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 2,
                "estado": 0,
                "x": 2,
                "y": 2
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746448342863323,
                    40.642568419748173
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 3,
                "estado": 1,
                "x": 0,
                "y": 0
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746937971238939,
                    40.642390088018921
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 4,
                "estado": 0,
                "x": 4,
                "y": 4
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746448342863323,
                    40.642078006346267
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 5,
                "estado": 0,
                "x": 5,
                "y": 5
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746467927998347,
                    40.641884812198633
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 6,
                "estado": 0,
                "x": 6,
                "y": 6
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746448342863323,
                    40.641691617491844
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 7,
                "estado": 1,
                "x": 7,
                "y": 7
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.745762863137458,
                    40.641260642669394
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 8,
                "estado": 1,
                "x": 8,
                "y": 8
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.744881532061346,
                    40.641245781418988
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 9,
                "estado": 0,
                "x": 9,
                "y": 9
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.744646510441051,
                    40.641290365160273
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 10,
                "estado": 0,
                "x": 10,
                "y": 10
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.744215637470505,
                    40.641245781418988
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 11,
                "estado": 0,
                "x": 11,
                "y": 11
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.745704107732383,
                    40.64042840755139
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 12,
                "estado": 1,
                "x": 12,
                "y": 12
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.743177625314196,
                    40.640383823234387
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 13,
                "estado": 0,
                "x": 13,
                "y": 13
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746781290158742,
                    40.639819085974999
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 14,
                "estado": 0,
                "x": 14,
                "y": 14
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746409172593273,
                    40.639819085974999
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 15,
                "estado": 0,
                "x": 15,
                "y": 15
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746800875293768,
                    40.639581300436454
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 16,
                "estado": 0,
                "x": 16,
                "y": 16
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746800875293768,
                    40.639313790693137
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 17,
                "estado": 0,
                "x": 17,
                "y": 17
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746800875293768,
                    40.639061141617901
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 18,
                "estado": 1,
                "x": 18,
                "y": 18
            },
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -8.746761705023719,
                    40.638377498149538
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 1
            },
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        [
                            -8.746041951311556,
                            40.641476130428451
                        ],
                        [
                            -8.742722270924869,
                            40.641476130428451
                        ],
                        [
                            -8.742692893222332,
                            40.640205485668638
                        ],
                        [
                            -8.745983195906483,
                            40.640175762694696
                        ],
                        [
                            -8.746041951311556,
                            40.641476130428451
                        ]
                    ]
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 2
            },
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        [
                            -8.74712403002167,
                            40.642728174851051
                        ],
                        [
                            -8.746311246918145,
                            40.642802479419778
                        ],
                        [
                            -8.746281869215608,
                            40.642735605311643
                        ],
                        [
                            -8.746252491513072,
                            40.641531859908092
                        ],
                        [
                            -8.74703589691406,
                            40.641524429313499
                        ],
                        [
                            -8.74712403002167,
                            40.642728174851051
                        ]
                    ]
                ]
            }
        },
        {
            "type": "Feature",
            "properties": {
                "id": 3
            },
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        [
                            -8.747026104346547,
                            40.640082878315809
                        ],
                        [
                            -8.746223113810533,
                            40.640082878315809
                        ],
                        [
                            -8.746144773270435,
                            40.638091406141925
                        ],
                        [
                            -8.746977141508985,
                            40.63807654418595
                        ],
                        [
                            -8.747026104346547,
                            40.640082878315809
                        ]
                    ]
                ]
            }
        }
    ]
}

      var vectorSource = new ol.source.Vector({
        features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
      });

      vectorSource.addFeature(new ol.Feature(new ol.geom.Circle([5e6, 7e6], 1e6)));

      var vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        style: styleFunction
      });

      var map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          }),
          vectorLayer
        ],
        target: 'map',
        controls: ol.control.defaults({
          attributionOptions: {
            collapsible: false
          }
        }),
        view: new ol.View({
          projection: 'EPSG:4326',
          center: [0, 0], 
          zoom: 2
        })
      });
    </script>
  </body>
</html>