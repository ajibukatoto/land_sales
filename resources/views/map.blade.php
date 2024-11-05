<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plot Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
      body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f4f4f4; /* Light background color */
      }
      header {
          background-color: #4CAF50; /* Tausi-like green */
          color: white;
          padding: 15px;
          text-align: center;
      }
      nav {
          display: flex;
          justify-content: center;
          background-color: #333; /* Darker nav background */
      }
      nav a {
          color: white;
          padding: 14px 20px;
          text-decoration: none;
          text-align: center;
      }
      nav a:hover {
          background-color: #575757; /* Hover effect */
      }
      .container {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
          padding: 20px;
      }
      .card {
          background-color: white;
          border-radius: 5px;
          box-shadow: 0 2px 5px rgba(0,0,0,0.1);
          margin: 15px;
          padding: 20px;
          flex: 1 1 200px; /* Flexible card size */
          text-align: center;
      }
      .card h2 {
          color: #4CAF50; /* Card title color */
      }
      footer {
          text-align: center;
          padding: 10px;
          background-color: #333; /* Darker footer background */
          color: white;
          position: relative;
          bottom: 0;
          width: 100%;
      }
  </style>

    <style>
        #map {
            height: 600px;
            width: 100%;
        }
        .leaflet-popup-content {
            width: 300px;
        }
        .plot-info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .plot-info-table th, .plot-info-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .plot-info-table th {
            background-color: #f2f2f2;
        }
        .plot-info-table td {
            background-color: #fff;
        }
        /* Legend styling */
        .legend {
            background: white;
            padding: 10px;
            line-height: 1.5em;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            font-size: 14px;
            color: #333;
            position: absolute;
            bottom: 30px;
            left: 10px;
            z-index: 1000;
        }
        .legend i {
            width: 20px;
            height: 20px;
            float: left;
            margin-right: 8px;
            opacity: 0.8;
        }
        .legend .sold {
            background-color: #FF0000; /* Red for sold plots */
        }
        .legend .available {
            background-color: #008000; /* Green for available plots */
        }
    </style>
</head>
<body>
    <h1>Plot Map</h1>
    <div id="map"></div>

    <!-- Legend for plot status -->
    <div class="legend">
        <i class="available"></i> Available<br>
        <i class="sold"></i> Sold
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.7.5/proj4.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([-6.792354, 39.208328], 15); // Center over Mwavi Pwani

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Define UTM zone 37 for EPSG:21037
        var utm21037 = "+proj=utm +zone=37 +south +ellps=WGS84 +datum=WGS84 +units=m +no_defs";

        // Your GeoJSON data with updated properties
        var geojsonData = {
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 7,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1218,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457965.5937723413,
                9290642.827129724
              ],
              [
                458006.285579591,
                9290659.379589353
              ],
              [
                458020.3234662966,
                9290632.595742665
              ],
              [
                457979.2469626202,
                9290621.693247236
              ],
              [
                457972.5677832174,
                9290625.1515779
              ],
              [
                457965.5937723413,
                9290642.827129724
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 64,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 7383,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": 120077,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458144.3389611902,
                9290665.392396918
              ],
              [
                458157.180576908,
                9290770.271455698
              ],
              [
                458176.980358264,
                9290742.387178775
              ],
              [
                458216.6421604706,
                9290731.12858699
              ],
              [
                458254.3628261626,
                9290755.399055155
              ],
              [
                458260.0359541699,
                9290753.257543258
              ],
              [
                458266.7610529338,
                9290730.652695457
              ],
              [
                458271.60763249,
                9290704.052863479
              ],
              [
                458267.7003125378,
                9290697.791132784
              ],
              [
                458144.3389611902,
                9290665.392396918
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 11,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 708,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457954.8456938688,
                9290591.466249779
              ],
              [
                457968.2114739848,
                9290595.021057485
              ],
              [
                457981.1765033364,
                9290561.899748957
              ],
              [
                457978.1411873635,
                9290556.007228464
              ],
              [
                457961.3616044417,
                9290551.829030681
              ],
              [
                457954.8456938688,
                9290591.466249779
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 25,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458116.3315386696,
                9290585.526265869
              ],
              [
                458108.5187692837,
                9290614.553946594
              ],
              [
                458127.9050742015,
                9290619.67054354
              ],
              [
                458135.6288163703,
                9290590.63506301
              ],
              [
                458116.3315386696,
                9290585.526265869
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 37,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458134.1940089378,
                9290517.809792714
              ],
              [
                458126.3354803342,
                9290546.843765397
              ],
              [
                458145.735234837,
                9290551.894678803
              ],
              [
                458153.4195528013,
                9290522.898907268
              ],
              [
                458134.1940089378,
                9290517.809792714
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 225,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 2037,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457988.6692439238,
                9290465.867064152
              ],
              [
                457964.7160368004,
                9290542.276876487
              ],
              [
                457982.1486950346,
                9290546.718530789
              ],
              [
                457988.8612703317,
                9290543.445732882
              ],
              [
                458014.5928089705,
                9290477.639117846
              ],
              [
                458011.5871782404,
                9290471.627856387
              ],
              [
                457988.6692439238,
                9290465.867064152
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 53,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458162.3574847859,
                9290468.362247711
              ],
              [
                458156.8499483426,
                9290490.233753113
              ],
              [
                458175.9508869317,
                9290495.279880991
              ],
              [
                458181.7309244837,
                9290473.464630723
              ],
              [
                458162.3574847859,
                9290468.362247711
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 39,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 437,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458301.5909250931,
                9290505.196089718
              ],
              [
                458295.7327083988,
                9290526.824997704
              ],
              [
                458314.788960375,
                9290531.914517183
              ],
              [
                458319.6289632789,
                9290515.207751067
              ],
              [
                458316.1791245573,
                9290509.191455504
              ],
              [
                458301.5909250931,
                9290505.196089718
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 96,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 437,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458292.7831511685,
                9290559.676319573
              ],
              [
                458284.9576423249,
                9290588.718045833
              ],
              [
                458297.5117573133,
                9290592.134411553
              ],
              [
                458304.4942420849,
                9290567.904053003
              ],
              [
                458301.0377667426,
                9290561.855221154
              ],
              [
                458292.7831511685,
                9290559.676319573
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 80,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 342,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458274.7609463473,
                9290627.489954177
              ],
              [
                458267.0741394678,
                9290656.36352251
              ],
              [
                458279.3285668536,
                9290659.680669231
              ],
              [
                458281.3801068546,
                9290647.569965355
              ],
              [
                458284.8950250169,
                9290635.255228331
              ],
              [
                458281.4385496745,
                9290629.260664813
              ],
              [
                458274.7609463473,
                9290627.489954177
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 114,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458176.3521706629,
                9290415.438176505
              ],
              [
                458170.6434228649,
                9290437.149051331
              ],
              [
                458189.915038661,
                9290442.284720201
              ],
              [
                458195.7266467797,
                9290420.53710954
              ],
              [
                458176.3521706629,
                9290415.438176505
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 128,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 429,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458315.6640767217,
                9290451.964840624
              ],
              [
                458309.7975944408,
                9290473.773524566
              ],
              [
                458330.1784027117,
                9290479.012340752
              ],
              [
                458332.2006523444,
                9290469.53350564
              ],
              [
                458331.7777888576,
                9290461.242416771
              ],
              [
                458326.6216282886,
                9290454.942509132
              ],
              [
                458315.6640767217,
                9290451.964840624
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 144,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 923,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458312.5613915816,
                9290358.081493752
              ],
              [
                458301.5981574662,
                9290399.870106235
              ],
              [
                458320.7845920583,
                9290405.161098745
              ],
              [
                458329.0294896338,
                9290407.491987083
              ],
              [
                458327.0261242033,
                9290366.878634162
              ],
              [
                458321.8374179859,
                9290360.6484672
              ],
              [
                458312.5613915816,
                9290358.081493752
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 172,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1052,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458305.9943136911,
                9290258.725702811
              ],
              [
                458295.0657631929,
                9290300.08209852
              ],
              [
                458314.7131613356,
                9290303.920938864
              ],
              [
                458325.4373291299,
                9290306.000310736
              ],
              [
                458324.2998949545,
                9290265.692487137
              ],
              [
                458319.2525308002,
                9290259.934226623
              ],
              [
                458305.9943136911,
                9290258.725702811
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 189,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 745,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458293.9979376204,
                9290161.783135874
              ],
              [
                458288.561061501,
                9290204.057772728
              ],
              [
                458308.8082784469,
                9290204.977494894
              ],
              [
                458322.6707574636,
                9290205.503262004
              ],
              [
                458321.4859301973,
                9290165.148045316
              ],
              [
                458316.3200833165,
                9290160.313950071
              ],
              [
                458293.9979376204,
                9290161.783135874
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 194,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 973,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458221.1678925186,
                9290100.172637489
              ],
              [
                458173.3899825134,
                9290108.445512053
              ],
              [
                458176.8215346174,
                9290128.105983507
              ],
              [
                458224.5938792101,
                9290119.930907885
              ],
              [
                458221.1678925186,
                9290100.172637489
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 207,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1035,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458311.5828500801,
                9290086.695297437
              ],
              [
                458271.1892174776,
                9290093.900117334
              ],
              [
                458275.0722895951,
                9290118.566010652
              ],
              [
                458315.7112029317,
                9290111.533549404
              ],
              [
                458311.5828500801,
                9290086.695297437
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 224,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/92",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1278,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458085.1196376442,
                9290117.526715307
              ],
              [
                458114.6366021481,
                9290112.202865645
              ],
              [
                458107.7578728133,
                9290072.744569808
              ],
              [
                458102.0775855821,
                9290069.28057962
              ],
              [
                458078.1087435082,
                9290077.209997924
              ],
              [
                458085.1196376442,
                9290117.526715307
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 7,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1479,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458006.285579591,
                9290659.379589353
              ],
              [
                458046.2806400752,
                9290675.911627147
              ],
              [
                458063.6742640783,
                9290648.94677298
              ],
              [
                458061.3489201371,
                9290643.484688485
              ],
              [
                458020.3234662966,
                9290632.595742665
              ],
              [
                458006.285579591,
                9290659.379589353
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 5,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1266,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457954.5481966156,
                9290670.822016686
              ],
              [
                457992.134068237,
                9290686.204843616
              ],
              [
                458006.285579591,
                9290659.379589353
              ],
              [
                457965.5937723413,
                9290642.827129724
              ],
              [
                457954.5481966156,
                9290670.822016686
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 6,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1258,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457992.134068237,
                9290686.204843616
              ],
              [
                458029.7494188185,
                9290701.539522193
              ],
              [
                458046.2806400752,
                9290675.911627147
              ],
              [
                458006.285579591,
                9290659.379589353
              ],
              [
                457992.134068237,
                9290686.204843616
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 3,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1167,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457943.5636194269,
                9290698.662303546
              ],
              [
                457978.0409997028,
                9290712.888165325
              ],
              [
                457992.134068237,
                9290686.204843616
              ],
              [
                457954.5481966156,
                9290670.822016686
              ],
              [
                457943.5636194269,
                9290698.662303546
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 4,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1177,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457978.0409997028,
                9290712.888165325
              ],
              [
                458013.2381606667,
                9290727.136468992
              ],
              [
                458029.7494188185,
                9290701.539522193
              ],
              [
                457992.134068237,
                9290686.204843616
              ],
              [
                457978.0409997028,
                9290712.888165325
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 1,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 753,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                457978.0409997028,
                9290712.888165325
              ],
              [
                457943.5636194269,
                9290698.662303546
              ],
              [
                457936.7401701096,
                9290715.9562588
              ],
              [
                457939.8472254193,
                9290721.794356357
              ],
              [
                457964.9807301545,
                9290728.265739068
              ],
              [
                457968.3252673987,
                9290731.610276313
              ],
              [
                457978.0409997028,
                9290712.888165325
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 2,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1022,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458013.2381606667,
                9290727.136468992
              ],
              [
                457978.0409997028,
                9290712.888165325
              ],
              [
                457968.3252673987,
                9290731.610276313
              ],
              [
                457990.2329758569,
                9290753.814837186
              ],
              [
                457996.456981555,
                9290753.151866786
              ],
              [
                458013.2381606667,
                9290727.136468992
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 9,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 7309,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": 120077,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458109.7721462788,
                9290790.140777554
              ],
              [
                458052.9980905204,
                9290683.833734933
              ],
              [
                458003.7298658015,
                9290760.385170715
              ],
              [
                458004.6006328947,
                9290768.02417294
              ],
              [
                458040.4334335673,
                9290802.451017816
              ],
              [
                458055.248053242,
                9290821.303684738
              ],
              [
                458062.0206861891,
                9290821.86660488
              ],
              [
                458080.825737151,
                9290804.75031434
              ],
              [
                458099.7539268936,
                9290792.049428657
              ],
              [
                458109.7721462788,
                9290790.140777554
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 10,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 9635,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": 120077,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458157.180576908,
                9290770.271455698
              ],
              [
                458144.3389611902,
                9290665.392396918
              ],
              [
                458081.4678179367,
                9290648.715887735
              ],
              [
                458073.8859872869,
                9290651.671218473
              ],
              [
                458052.9980905204,
                9290683.833734933
              ],
              [
                458109.7721462788,
                9290790.140777554
              ],
              [
                458147.9803508526,
                9290783.148253925
              ],
              [
                458157.180576908,
                9290770.271455698
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 24,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458108.5187692837,
                9290614.553946594
              ],
              [
                458100.9495040301,
                9290643.599565322
              ],
              [
                458120.1850693289,
                9290648.691974638
              ],
              [
                458127.9050742015,
                9290619.67054354
              ],
              [
                458108.5187692837,
                9290614.553946594
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 37,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458096.9443146716,
                9290580.393656174
              ],
              [
                458089.2326387658,
                9290609.436025377
              ],
              [
                458108.5187692837,
                9290614.553946594
              ],
              [
                458116.3315386696,
                9290585.526265869
              ],
              [
                458096.9443146716,
                9290580.393656174
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 22,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458089.2326387658,
                9290609.436025377
              ],
              [
                458081.6338372623,
                9290638.485950002
              ],
              [
                458100.9495040301,
                9290643.599565322
              ],
              [
                458108.5187692837,
                9290614.553946594
              ],
              [
                458089.2326387658,
                9290609.436025377
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 21,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458077.7003645561,
                9290575.298977075
              ],
              [
                458069.8630185056,
                9290604.268010313
              ],
              [
                458089.2326387658,
                9290609.436025377
              ],
              [
                458096.9443146716,
                9290580.393656174
              ],
              [
                458077.7003645561,
                9290575.298977075
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 20,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458069.8630185056,
                9290604.268010313
              ],
              [
                458062.2154688053,
                9290633.345145514
              ],
              [
                458081.6338372623,
                9290638.485950002
              ],
              [
                458089.2326387658,
                9290609.436025377
              ],
              [
                458069.8630185056,
                9290604.268010313
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 19,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458058.1951131658,
                9290570.13512059
              ],
              [
                458050.4850492711,
                9290599.183484996
              ],
              [
                458069.8630185056,
                9290604.268010313
              ],
              [
                458077.7003645561,
                9290575.298977075
              ],
              [
                458058.1951131658,
                9290570.13512059
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 18,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458050.4850492711,
                9290599.183484996
              ],
              [
                458042.7916801154,
                9290628.20290608
              ],
              [
                458062.2154688053,
                9290633.345145514
              ],
              [
                458069.8630185056,
                9290604.268010313
              ],
              [
                458050.4850492711,
                9290599.183484996
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 17,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458038.803474479,
                9290565.001342146
              ],
              [
                458031.0319392682,
                9290593.948678141
              ],
              [
                458050.4850492711,
                9290599.183484996
              ],
              [
                458058.1951131658,
                9290570.13512059
              ],
              [
                458038.803474479,
                9290565.001342146
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 16,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458031.0319392682,
                9290593.948678141
              ],
              [
                458023.4620916596,
                9290623.08560514
              ],
              [
                458042.7916801154,
                9290628.20290608
              ],
              [
                458050.4850492711,
                9290599.183484996
              ],
              [
                458031.0319392682,
                9290593.948678141
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 15,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458019.4975590925,
                9290559.890258245
              ],
              [
                458011.9378351583,
                9290588.9058977
              ],
              [
                458031.0319392682,
                9290593.948678141
              ],
              [
                458038.803474479,
                9290565.001342146
              ],
              [
                458019.4975590925,
                9290559.890258245
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 14,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458011.9378351583,
                9290588.9058977
              ],
              [
                458004.3175901294,
                9290618.01730398
              ],
              [
                458023.4620916596,
                9290623.08560514
              ],
              [
                458031.0319392682,
                9290593.948678141
              ],
              [
                458011.9378351583,
                9290588.9058977
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 13,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 640,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458011.9378351583,
                9290588.9058977
              ],
              [
                458019.4975590925,
                9290559.890258245
              ],
              [
                458005.1807319792,
                9290556.099994844
              ],
              [
                457998.2677812975,
                9290559.58986608
              ],
              [
                457989.1276581534,
                9290582.861612532
              ],
              [
                458011.9378351583,
                9290588.9058977
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 12,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/86",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 746,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458004.3175901294,
                9290618.01730398
              ],
              [
                458011.9378351583,
                9290588.9058977
              ],
              [
                457989.1276581534,
                9290582.861612532
              ],
              [
                457979.9594084232,
                9290606.20497233
              ],
              [
                457982.8537194978,
                9290612.334974758
              ],
              [
                458004.3175901294,
                9290618.01730398
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 79,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 404,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458267.0741394678,
                9290656.36352251
              ],
              [
                458259.3677756195,
                9290685.3364866
              ],
              [
                458269.2406982852,
                9290687.953953834
              ],
              [
                458275.1684700076,
                9290684.23866029
              ],
              [
                458279.3285668536,
                9290659.680669231
              ],
              [
                458267.0741394678,
                9290656.36352251
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 78,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458255.3668108,
                9290622.34718058
              ],
              [
                458247.5876335524,
                9290651.27899718
              ],
              [
                458267.0741394678,
                9290656.36352251
              ],
              [
                458274.7609463473,
                9290627.489954177
              ],
              [
                458255.3668108,
                9290622.34718058
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 77,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458247.5876335524,
                9290651.27899718
              ],
              [
                458240.0782304231,
                9290680.222524486
              ],
              [
                458259.3677756195,
                9290685.3364866
              ],
              [
                458267.0741394678,
                9290656.36352251
              ],
              [
                458247.5876335524,
                9290651.27899718
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 76,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458236.222950409,
                9290617.270772843
              ],
              [
                458228.5770191698,
                9290646.219518783
              ],
              [
                458247.5876335524,
                9290651.27899718
              ],
              [
                458255.3668108,
                9290622.34718058
              ],
              [
                458236.222950409,
                9290617.270772843
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 75,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458228.5770191698,
                9290646.219518783
              ],
              [
                458220.9382654299,
                9290675.14821844
              ],
              [
                458240.0782304231,
                9290680.222524486
              ],
              [
                458247.5876335524,
                9290651.27899718
              ],
              [
                458228.5770191698,
                9290646.219518783
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 74,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458216.9261294381,
                9290612.153804308
              ],
              [
                458209.1155601774,
                9290641.07237615
              ],
              [
                458228.5770191698,
                9290646.219518783
              ],
              [
                458236.222950409,
                9290617.270772843
              ],
              [
                458216.9261294381,
                9290612.153804308
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 73,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458209.1155601774,
                9290641.07237615
              ],
              [
                458201.5089468754,
                9290669.997200208
              ],
              [
                458220.9382654299,
                9290675.14821844
              ],
              [
                458228.5770191698,
                9290646.219518783
              ],
              [
                458209.1155601774,
                9290641.07237615
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 72,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458197.5778293922,
                9290607.023184981
              ],
              [
                458189.854476567,
                9290636.062991595
              ],
              [
                458209.1155601774,
                9290641.07237615
              ],
              [
                458216.9261294381,
                9290612.153804308
              ],
              [
                458197.5778293922,
                9290607.023184981
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 71,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458189.854476567,
                9290636.062991595
              ],
              [
                458182.0885043907,
                9290664.848535161
              ],
              [
                458201.5089468754,
                9290669.997200208
              ],
              [
                458209.1155601774,
                9290641.07237615
              ],
              [
                458189.854476567,
                9290636.062991595
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 70,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458178.2553952973,
                9290601.899424572
              ],
              [
                458170.5683460339,
                9290630.81566128
              ],
              [
                458189.854476567,
                9290636.062991595
              ],
              [
                458197.5778293922,
                9290607.023184981
              ],
              [
                458178.2553952973,
                9290601.899424572
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 69,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458170.5683460339,
                9290630.81566128
              ],
              [
                458162.8851309232,
                9290659.757418528
              ],
              [
                458182.0885043907,
                9290664.848535161
              ],
              [
                458189.854476567,
                9290636.062991595
              ],
              [
                458170.5683460339,
                9290630.81566128
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 67,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458151.2070747324,
                9290625.806276722
              ],
              [
                458143.5961914397,
                9290654.643616999
              ],
              [
                458162.8851309232,
                9290659.757418528
              ],
              [
                458170.5683460339,
                9290630.81566128
              ],
              [
                458151.2070747324,
                9290625.806276722
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 68,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458158.9812068325,
                9290596.788457531
              ],
              [
                458151.2070747324,
                9290625.806276722
              ],
              [
                458170.5683460339,
                9290630.81566128
              ],
              [
                458178.2553952973,
                9290601.899424572
              ],
              [
                458158.9812068325,
                9290596.788457531
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 65,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458143.5961914397,
                9290654.643616999
              ],
              [
                458151.2070747324,
                9290625.806276722
              ],
              [
                458131.9314067559,
                9290620.55819409
              ],
              [
                458124.2524113422,
                9290649.515276358
              ],
              [
                458143.5961914397,
                9290654.643616999
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 66,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458151.2070747324,
                9290625.806276722
              ],
              [
                458158.9812068325,
                9290596.788457531
              ],
              [
                458139.5978260267,
                9290591.648535786
              ],
              [
                458131.9314067559,
                9290620.55819409
              ],
              [
                458151.2070747324,
                9290625.806276722
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 38,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458126.3354803342,
                9290546.843765397
              ],
              [
                458118.6935904812,
                9290575.782590471
              ],
              [
                458138.0574401811,
                9290580.865835488
              ],
              [
                458145.735234837,
                9290551.894678803
              ],
              [
                458126.3354803342,
                9290546.843765397
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 23,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458114.8857497374,
                9290512.698782928
              ],
              [
                458107.0660477648,
                9290541.725844178
              ],
              [
                458126.3354803342,
                9290546.843765397
              ],
              [
                458134.1940089378,
                9290517.809792714
              ],
              [
                458114.8857497374,
                9290512.698782928
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 36,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458107.0660477648,
                9290541.725844178
              ],
              [
                458099.4389325328,
                9290570.728009617
              ],
              [
                458118.6935904812,
                9290575.782590471
              ],
              [
                458126.3354803342,
                9290546.843765397
              ],
              [
                458107.0660477648,
                9290541.725844178
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 35,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458095.4321712256,
                9290507.549306262
              ],
              [
                458087.8049641697,
                9290536.666365786
              ],
              [
                458107.0660477648,
                9290541.725844178
              ],
              [
                458114.8857497374,
                9290512.698782928
              ],
              [
                458095.4321712256,
                9290507.549306262
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 34,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458087.8049641697,
                9290536.666365786
              ],
              [
                458080.0649275231,
                9290565.642098712
              ],
              [
                458099.4389325328,
                9290570.728009617
              ],
              [
                458107.0660477648,
                9290541.725844178
              ],
              [
                458087.8049641697,
                9290536.666365786
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 33,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458076.2728257507,
                9290502.477714812
              ],
              [
                458068.5021357036,
                9290531.540095601
              ],
              [
                458087.8049641697,
                9290536.666365786
              ],
              [
                458095.4321712256,
                9290507.549306262
              ],
              [
                458076.2728257507,
                9290502.477714812
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 32,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458068.5021357036,
                9290531.540095601
              ],
              [
                458060.8656503869,
                9290560.60205599
              ],
              [
                458080.0649275231,
                9290565.642098712
              ],
              [
                458087.8049641697,
                9290536.666365786
              ],
              [
                458068.5021357036,
                9290531.540095601
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 31,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458056.9430088726,
                9290497.36099858
              ],
              [
                458049.1158174948,
                9290526.463919261
              ],
              [
                458068.5021357036,
                9290531.540095601
              ],
              [
                458076.2728257507,
                9290502.477714812
              ],
              [
                458056.9430088726,
                9290497.36099858
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 30,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458049.1158174948,
                9290526.463919261
              ],
              [
                458041.5152858432,
                9290555.522350991
              ],
              [
                458060.8656503869,
                9290560.60205599
              ],
              [
                458068.5021357036,
                9290531.540095601
              ],
              [
                458049.1158174948,
                9290526.463919261
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 29,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458037.6852405527,
                9290492.263354024
              ],
              [
                458029.8129890285,
                9290521.371044967
              ],
              [
                458049.1158174948,
                9290526.463919261
              ],
              [
                458056.9430088726,
                9290497.36099858
              ],
              [
                458037.6852405527,
                9290492.263354024
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 28,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458029.8129890285,
                9290521.371044967
              ],
              [
                458022.2195969484,
                9290550.220925475
              ],
              [
                458041.5152858432,
                9290555.522350991
              ],
              [
                458049.1158174948,
                9290526.463919261
              ],
              [
                458029.8129890285,
                9290521.371044967
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 26,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458022.2195969484,
                9290550.220925475
              ],
              [
                458029.8129890285,
                9290521.371044967
              ],
              [
                458014.9932090363,
                9290517.576134417
              ],
              [
                458005.8013390848,
                9290540.949389594
              ],
              [
                458008.7735739179,
                9290546.927255157
              ],
              [
                458022.2195969484,
                9290550.220925475
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 27,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458029.8129890285,
                9290521.371044967
              ],
              [
                458037.6852405527,
                9290492.263354024
              ],
              [
                458031.0736841401,
                9290490.51323615
              ],
              [
                458024.227525255,
                9290494.094946096
              ],
              [
                458014.9932090363,
                9290517.576134417
              ],
              [
                458029.8129890285,
                9290521.371044967
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 95,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 363,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458284.9576423249,
                9290588.718045833
              ],
              [
                458277.2377054721,
                9290617.60894916
              ],
              [
                458284.2938988707,
                9290619.47566699
              ],
              [
                458290.643293793,
                9290615.969097802
              ],
              [
                458297.5117573133,
                9290592.134411553
              ],
              [
                458284.9576423249,
                9290588.718045833
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 94,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458273.4190992485,
                9290554.564953336
              ],
              [
                458265.6088944849,
                9290583.63352051
              ],
              [
                458284.9576423249,
                9290588.718045833
              ],
              [
                458292.7831511685,
                9290559.676319573
              ],
              [
                458273.4190992485,
                9290554.564953336
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 91,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458246.2851935675,
                9290578.47385442
              ],
              [
                458238.5957995622,
                9290607.38622273
              ],
              [
                458257.9750100131,
                9290612.512997981
              ],
              [
                458265.6088944849,
                9290583.63352051
              ],
              [
                458246.2851935675,
                9290578.47385442
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 92,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458253.9871624059,
                9290549.435668092
              ],
              [
                458246.2851935675,
                9290578.47385442
              ],
              [
                458265.6088944849,
                9290583.63352051
              ],
              [
                458273.4190992485,
                9290554.564953336
              ],
              [
                458253.9871624059,
                9290549.435668092
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 93,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458265.6088944849,
                9290583.63352051
              ],
              [
                458257.9750100131,
                9290612.512997981
              ],
              [
                458277.2377054721,
                9290617.60894916
              ],
              [
                458284.9576423249,
                9290588.718045833
              ],
              [
                458265.6088944849,
                9290583.63352051
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 89,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458227.0366334184,
                9290573.4519464
              ],
              [
                458219.5320114528,
                9290602.342892542
              ],
              [
                458238.5957995622,
                9290607.38622273
              ],
              [
                458246.2851935675,
                9290578.47385442
              ],
              [
                458227.0366334184,
                9290573.4519464
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 90,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458234.6904437754,
                9290544.342075258
              ],
              [
                458227.0366334184,
                9290573.4519464
              ],
              [
                458246.2851935675,
                9290578.47385442
              ],
              [
                458253.9871624059,
                9290549.435668092
              ],
              [
                458234.6904437754,
                9290544.342075258
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 87,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458207.7129325011,
                9290568.329850694
              ],
              [
                458199.9886069548,
                9290597.17267971
              ],
              [
                458219.5320114528,
                9290602.342892542
              ],
              [
                458227.0366334184,
                9290573.4519464
              ],
              [
                458207.7129325011,
                9290568.329850694
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 88,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458215.3560317309,
                9290539.238532811
              ],
              [
                458207.7129325011,
                9290568.329850694
              ],
              [
                458227.0366334184,
                9290573.4519464
              ],
              [
                458234.6904437754,
                9290544.342075258
              ],
              [
                458215.3560317309,
                9290539.238532811
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 85,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458188.3266142772,
                9290563.23280191
              ],
              [
                458180.521298562,
                9290592.022598127
              ],
              [
                458199.9886069548,
                9290597.17267971
              ],
              [
                458207.7129325011,
                9290568.329850694
              ],
              [
                458188.3266142772,
                9290563.23280191
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 86,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458196.1350101056,
                9290534.164921083
              ],
              [
                458188.3266142772,
                9290563.23280191
              ],
              [
                458207.7129325011,
                9290568.329850694
              ],
              [
                458215.3560317309,
                9290539.238532811
              ],
              [
                458196.1350101056,
                9290534.164921083
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 83,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458169.1782418192,
                9290558.09818274
              ],
              [
                458161.4268583624,
                9290586.971158916
              ],
              [
                458180.521298562,
                9290592.022598127
              ],
              [
                458188.3266142772,
                9290563.23280191
              ],
              [
                458169.1782418192,
                9290558.09818274
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 84,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458176.7267398503,
                9290529.041882902
              ],
              [
                458169.1782418192,
                9290558.09818274
              ],
              [
                458188.3266142772,
                9290563.23280191
              ],
              [
                458196.1350101056,
                9290534.164921083
              ],
              [
                458176.7267398503,
                9290529.041882902
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 81,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458161.4268583624,
                9290586.971158916
              ],
              [
                458169.1782418192,
                9290558.09818274
              ],
              [
                458149.903558643,
                9290552.918805303
              ],
              [
                458142.2778467632,
                9290581.905282835
              ],
              [
                458161.4268583624,
                9290586.971158916
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 82,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/88",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 600,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458169.1782418192,
                9290558.09818274
              ],
              [
                458176.7267398503,
                9290529.041882902
              ],
              [
                458157.5188992694,
                9290523.971750464
              ],
              [
                458149.903558643,
                9290552.918805303
              ],
              [
                458169.1782418192,
                9290558.09818274
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 52,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458156.8499483426,
                9290490.233753113
              ],
              [
                458150.7340436576,
                9290511.853476172
              ],
              [
                458170.1926420699,
                9290517.01288041
              ],
              [
                458175.9508869317,
                9290495.279880991
              ],
              [
                458156.8499483426,
                9290490.233753113
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 51,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458143.0626985203,
                9290463.280579656
              ],
              [
                458137.301858104,
                9290485.107275276
              ],
              [
                458156.8499483426,
                9290490.233753113
              ],
              [
                458162.3574847859,
                9290468.362247711
              ],
              [
                458143.0626985203,
                9290463.280579656
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 50,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458137.301858104,
                9290485.107275276
              ],
              [
                458131.6396369667,
                9290506.790636567
              ],
              [
                458150.7340436576,
                9290511.853476172
              ],
              [
                458156.8499483426,
                9290490.233753113
              ],
              [
                458137.301858104,
                9290485.107275276
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 49,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458123.6125657826,
                9290458.157997996
              ],
              [
                458117.9572847513,
                9290480.056145852
              ],
              [
                458137.301858104,
                9290485.107275276
              ],
              [
                458143.0626985203,
                9290463.280579656
              ],
              [
                458123.6125657826,
                9290458.157997996
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 48,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458117.9572847513,
                9290480.056145852
              ],
              [
                458112.2039454935,
                9290501.637306057
              ],
              [
                458131.6396369667,
                9290506.790636567
              ],
              [
                458137.301858104,
                9290485.107275276
              ],
              [
                458117.9572847513,
                9290480.056145852
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 47,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458104.4649032051,
                9290453.115077907
              ],
              [
                458098.6878521667,
                9290474.879781812
              ],
              [
                458117.9572847513,
                9290480.056145852
              ],
              [
                458123.6125657826,
                9290458.157997996
              ],
              [
                458104.4649032051,
                9290453.115077907
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 60,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458098.6878521667,
                9290474.879781812
              ],
              [
                458092.9070391556,
                9290496.520774119
              ],
              [
                458112.2039454935,
                9290501.637306057
              ],
              [
                458117.9572847513,
                9290480.056145852
              ],
              [
                458098.6878521667,
                9290474.879781812
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 59,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458085.1186223205,
                9290448.019847712
              ],
              [
                458079.4017216335,
                9290469.80360546
              ],
              [
                458098.6878521667,
                9290474.879781812
              ],
              [
                458104.4649032051,
                9290453.115077907
              ],
              [
                458085.1186223205,
                9290448.019847712
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 44,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458079.4017216335,
                9290469.80360546
              ],
              [
                458073.5930565136,
                9290491.399714436
              ],
              [
                458092.9070391556,
                9290496.520774119
              ],
              [
                458098.6878521667,
                9290474.879781812
              ],
              [
                458079.4017216335,
                9290469.80360546
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 43,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458065.8146986038,
                9290442.935773125
              ],
              [
                458059.5065174705,
                9290464.596891314
              ],
              [
                458060.1573359717,
                9290464.769173976
              ],
              [
                458079.4017216335,
                9290469.80360546
              ],
              [
                458085.1186223205,
                9290448.019847712
              ],
              [
                458065.8146986038,
                9290442.935773125
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 42,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458059.5065174705,
                9290464.596891314
              ],
              [
                458058.9971657178,
                9290466.34591029
              ],
              [
                458054.2647008374,
                9290486.274843775
              ],
              [
                458073.5930565136,
                9290491.399714436
              ],
              [
                458079.4017216335,
                9290469.80360546
              ],
              [
                458060.1573359717,
                9290464.769173976
              ],
              [
                458059.5065174705,
                9290464.596891314
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 41,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 467,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458059.5065174705,
                9290464.596891314
              ],
              [
                458065.8146986038,
                9290442.935773125
              ],
              [
                458051.2197590057,
                9290439.091903733
              ],
              [
                458044.5572775541,
                9290442.414795486
              ],
              [
                458038.1311685511,
                9290458.938474981
              ],
              [
                458059.5065174705,
                9290464.596891314
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 40,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 526,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458054.2647008374,
                9290486.274843775
              ],
              [
                458058.9971657178,
                9290466.34591029
              ],
              [
                458059.5065174705,
                9290464.596891314
              ],
              [
                458038.1311685511,
                9290458.938474981
              ],
              [
                458031.8000448999,
                9290475.217915313
              ],
              [
                458034.6053002479,
                9290481.062197288
              ],
              [
                458054.2647008374,
                9290486.274843775
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 55,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 322,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458058.60030374594,
                9290407.255499726
              ],
              [
                458074.0500291359,
                9290411.42757747
              ],
              [
                458079.8625009026,
                9290389.684043337
              ],
              [
                458071.7331887384,
                9290387.545336712
              ],
              [
                458064.9705195958,
                9290390.893275388
              ],
              [
                458058.60030374594,
                9290407.255499726
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 113,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458170.6434228649,
                9290437.149051331
              ],
              [
                458165.0889655479,
                9290458.927887447
              ],
              [
                458184.2540474406,
                9290463.991921447
              ],
              [
                458189.915038661,
                9290442.284720201
              ],
              [
                458170.6434228649,
                9290437.149051331
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 54,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 381,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458074.0500291359,
                9290411.42757747
              ],
              [
                458058.60030374594,
                9290407.255499726
              ],
              [
                458052.1214482248,
                9290423.896770602
              ],
              [
                458055.0018443411,
                9290429.699307708
              ],
              [
                458068.4229698675,
                9290433.239599062
              ],
              [
                458074.0500291359,
                9290411.42757747
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 57,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458093.4864412055,
                9290416.553847663
              ],
              [
                458099.1985111722,
                9290394.77107314
              ],
              [
                458079.8625009026,
                9290389.684043337
              ],
              [
                458074.0500291359,
                9290411.42757747
              ],
              [
                458093.4864412055,
                9290416.553847663
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 56,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458087.5162760835,
                9290438.276126498
              ],
              [
                458093.4864412055,
                9290416.553847663
              ],
              [
                458074.0500291359,
                9290411.42757747
              ],
              [
                458068.4229698675,
                9290433.239599062
              ],
              [
                458087.5162760835,
                9290438.276126498
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 59,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458112.6890819958,
                9290421.63002401
              ],
              [
                458118.540140033,
                9290399.859581115
              ],
              [
                458099.1985111722,
                9290394.77107314
              ],
              [
                458093.4864412055,
                9290416.553847663
              ],
              [
                458112.6890819958,
                9290421.63002401
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 58,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458106.7547205464,
                9290443.350939224
              ],
              [
                458112.6890819958,
                9290421.63002401
              ],
              [
                458093.4864412055,
                9290416.553847663
              ],
              [
                458087.5162760835,
                9290438.276126498
              ],
              [
                458106.7547205464,
                9290443.350939224
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 61,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458131.9585145805,
                9290426.789690105
              ],
              [
                458137.6950134839,
                9290404.898956392
              ],
              [
                458118.540140033,
                9290399.859581115
              ],
              [
                458112.6890819958,
                9290421.63002401
              ],
              [
                458131.9585145805,
                9290426.789690105
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 60,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458126.1785877837,
                9290448.474663692
              ],
              [
                458131.9585145805,
                9290426.789690105
              ],
              [
                458112.6890819958,
                9290421.63002401
              ],
              [
                458106.7547205464,
                9290443.350939224
              ],
              [
                458126.1785877837,
                9290448.474663692
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 62,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458145.3961885472,
                9290453.543978162
              ],
              [
                458151.2225317426,
                9290431.805633307
              ],
              [
                458131.9585145805,
                9290426.789690105
              ],
              [
                458126.1785877837,
                9290448.474663692
              ],
              [
                458145.3961885472,
                9290453.543978162
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 63,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/87",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458151.2225317426,
                9290431.805633307
              ],
              [
                458157.0680545489,
                9290409.99572847
              ],
              [
                458137.6950134839,
                9290404.898956392
              ],
              [
                458131.9585145805,
                9290426.789690105
              ],
              [
                458151.2225317426,
                9290431.805633307
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 112,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 112,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458170.6434228649,
                9290437.149051331
              ],
              [
                458176.3521706629,
                9290415.438176505
              ],
              [
                458157.0680545489,
                9290409.99572847
              ],
              [
                458151.2225317426,
                9290431.805633307
              ],
              [
                458170.6434228649,
                9290437.149051331
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 111,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458165.0889655479,
                9290458.927887447
              ],
              [
                458170.6434228649,
                9290437.149051331
              ],
              [
                458151.2225317426,
                9290431.805633307
              ],
              [
                458145.3961885472,
                9290453.543978162
              ],
              [
                458165.0889655479,
                9290458.927887447
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 127,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 454,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458309.7975944408,
                9290473.773524566
              ],
              [
                458304.0943570222,
                9290495.557411835
              ],
              [
                458319.057089744,
                9290499.432410387
              ],
              [
                458325.1384766009,
                9290495.96397415
              ],
              [
                458330.1784027117,
                9290479.012340752
              ],
              [
                458309.7975944408,
                9290473.773524566
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 116,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458213.1442513183,
                9290448.356923018
              ],
              [
                458218.9838705037,
                9290426.587500466
              ],
              [
                458199.7292450376,
                9290421.57857021
              ],
              [
                458194.0384059589,
                9290443.25087241
              ],
              [
                458213.1442513183,
                9290448.356923018
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 115,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458207.4472130686,
                9290470.068486627
              ],
              [
                458213.1442513183,
                9290448.356923018
              ],
              [
                458194.0384059589,
                9290443.25087241
              ],
              [
                458188.1429942337,
                9290464.923174608
              ],
              [
                458207.4472130686,
                9290470.068486627
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 118,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458232.5724535681,
                9290453.436110543
              ],
              [
                458238.5360561739,
                9290431.627426598
              ],
              [
                458218.9838705037,
                9290426.587500466
              ],
              [
                458213.1442513183,
                9290448.356923018
              ],
              [
                458232.5724535681,
                9290453.436110543
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 117,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458226.7782949735,
                9290475.16627167
              ],
              [
                458232.5724535681,
                9290453.436110543
              ],
              [
                458213.1442513183,
                9290448.356923018
              ],
              [
                458207.4472130686,
                9290470.068486627
              ],
              [
                458226.7782949735,
                9290475.16627167
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 120,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458251.9386641069,
                9290458.498766946
              ],
              [
                458257.6708309921,
                9290436.702481356
              ],
              [
                458238.5360561739,
                9290431.627426598
              ],
              [
                458232.5724535681,
                9290453.436110543
              ],
              [
                458251.9386641069,
                9290458.498766946
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 119,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458246.0742482395,
                9290480.179334698
              ],
              [
                458251.9386641069,
                9290458.498766946
              ],
              [
                458232.5724535681,
                9290453.436110543
              ],
              [
                458226.7782949735,
                9290475.16627167
              ],
              [
                458246.0742482395,
                9290480.179334698
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 122,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458271.1436961974,
                9290463.623415073
              ],
              [
                458276.8944606028,
                9290441.767204145
              ],
              [
                458257.6708309921,
                9290436.702481356
              ],
              [
                458251.9386641069,
                9290458.498766946
              ],
              [
                458271.1436961974,
                9290463.623415073
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 121,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458265.415662094,
                9290485.29571725
              ],
              [
                458271.1436961974,
                9290463.623415073
              ],
              [
                458251.9386641069,
                9290458.498766946
              ],
              [
                458246.0742482395,
                9290480.179334698
              ],
              [
                458265.415662094,
                9290485.29571725
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 124,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458290.5925623509,
                9290468.710868161
              ],
              [
                458296.3660570578,
                9290446.94351202
              ],
              [
                458276.8944606028,
                9290441.767204145
              ],
              [
                458271.1436961974,
                9290463.623415073
              ],
              [
                458290.5925623509,
                9290468.710868161
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 123,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458284.7033497989,
                9290490.407967035
              ],
              [
                458290.5925623509,
                9290468.710868161
              ],
              [
                458271.1436961974,
                9290463.623415073
              ],
              [
                458265.415662094,
                9290485.29571725
              ],
              [
                458284.7033497989,
                9290490.407967035
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 126,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458309.7975944408,
                9290473.773524566
              ],
              [
                458315.6640767217,
                9290451.964840624
              ],
              [
                458296.3660570578,
                9290446.94351202
              ],
              [
                458290.5925623509,
                9290468.710868161
              ],
              [
                458309.7975944408,
                9290473.773524566
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 125,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458304.0943570222,
                9290495.557411835
              ],
              [
                458309.7975944408,
                9290473.773524566
              ],
              [
                458290.5925623509,
                9290468.710868161
              ],
              [
                458284.7033497989,
                9290490.407967035
              ],
              [
                458304.0943570222,
                9290495.557411835
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 109,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 425,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458295.7327083988,
                9290526.824997704
              ],
              [
                458290.1007614503,
                9290548.64917958
              ],
              [
                458303.523516741,
                9290552.216802582
              ],
              [
                458309.8838662977,
                9290548.701872565
              ],
              [
                458314.788960375,
                9290531.914517183
              ],
              [
                458295.7327083988,
                9290526.824997704
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 106,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458262.8546295386,
                9290494.986054903
              ],
              [
                458257.0870757187,
                9290516.703301085
              ],
              [
                458276.3045061566,
                9290521.80986828
              ],
              [
                458282.0309904645,
                9290500.072474796
              ],
              [
                458262.8546295386,
                9290494.986054903
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 105,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458257.0870757187,
                9290516.703301085
              ],
              [
                458251.2660540642,
                9290538.445343941
              ],
              [
                458270.6074679112,
                9290543.54726176
              ],
              [
                458276.3045061566,
                9290521.80986828
              ],
              [
                458257.0870757187,
                9290516.703301085
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 108,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458282.0309904645,
                9290500.072474796
              ],
              [
                458276.3045061566,
                9290521.80986828
              ],
              [
                458295.7327083988,
                9290526.824997704
              ],
              [
                458301.5909250931,
                9290505.196089718
              ],
              [
                458282.0309904645,
                9290500.072474796
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 107,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458276.3045061566,
                9290521.80986828
              ],
              [
                458270.6074679112,
                9290543.54726176
              ],
              [
                458290.1007614503,
                9290548.64917958
              ],
              [
                458295.7327083988,
                9290526.824997704
              ],
              [
                458276.3045061566,
                9290521.80986828
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 102,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458224.315157658,
                9290484.779119665
              ],
              [
                458218.4073475906,
                9290506.618799483
              ],
              [
                458237.9967282919,
                9290511.616881188
              ],
              [
                458243.03929327085,
                9290493.241246236
              ],
              [
                458243.5387872622,
                9290489.91358314
              ],
              [
                458224.315157658,
                9290484.779119665
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 101,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458218.4073475906,
                9290506.618799483
              ],
              [
                458212.6390189102,
                9290528.328296697
              ],
              [
                458231.9680344151,
                9290533.374421977
              ],
              [
                458237.9967282919,
                9290511.616881188
              ],
              [
                458218.4073475906,
                9290506.618799483
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 104,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458243.5387872622,
                9290489.91358314
              ],
              [
                458243.03929327085,
                9290493.241246236
              ],
              [
                458237.9967282919,
                9290511.616881188
              ],
              [
                458257.0870757187,
                9290516.703301085
              ],
              [
                458262.8546295386,
                9290494.986054903
              ],
              [
                458243.5387872622,
                9290489.91358314
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 103,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458237.9967282919,
                9290511.616881188
              ],
              [
                458231.9680344151,
                9290533.374421977
              ],
              [
                458251.2660540642,
                9290538.445343941
              ],
              [
                458257.0870757187,
                9290516.703301085
              ],
              [
                458237.9967282919,
                9290511.616881188
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 100,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458204.9613454541,
                9290479.714396875
              ],
              [
                458199.2333113491,
                9290501.523080833
              ],
              [
                458218.4073475906,
                9290506.618799483
              ],
              [
                458224.315157658,
                9290484.779119665
              ],
              [
                458204.9613454541,
                9290479.714396875
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 99,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458199.2333113491,
                9290501.523080833
              ],
              [
                458193.3471984322,
                9290523.195383023
              ],
              [
                458212.6390189102,
                9290528.328296697
              ],
              [
                458218.4073475906,
                9290506.618799483
              ],
              [
                458199.2333113491,
                9290501.523080833
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 98,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458199.2333113491,
                9290501.523080833
              ],
              [
                458204.9613454541,
                9290479.714396875
              ],
              [
                458185.5501909713,
                9290474.80465337
              ],
              [
                458179.7741132359,
                9290496.241387054
              ],
              [
                458199.2333113491,
                9290501.523080833
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 115,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 450,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458193.3471984322,
                9290523.195383023
              ],
              [
                458199.2333113491,
                9290501.523080833
              ],
              [
                458179.7741132359,
                9290496.241387054
              ],
              [
                458174.1220190341,
                9290518.108963147
              ],
              [
                458193.3471984322,
                9290523.195383023
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 143,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 734,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458311.3928478272,
                9290440.533569094
              ],
              [
                458320.7845920583,
                9290405.161098745
              ],
              [
                458301.5981574662,
                9290399.870106235
              ],
              [
                458292.1692182014,
                9290435.43475092
              ],
              [
                458311.3928478272,
                9290440.533569094
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 142,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 861,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458293.3098656865,
                9290353.016770953
              ],
              [
                458282.1947518785,
                9290394.55741659
              ],
              [
                458301.5981574662,
                9290399.870106235
              ],
              [
                458312.5613915816,
                9290358.081493752
              ],
              [
                458293.3098656865,
                9290353.016770953
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 141,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 739,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458282.1947518785,
                9290394.55741659
              ],
              [
                458272.8557005949,
                9290430.401023975
              ],
              [
                458292.1692182014,
                9290435.43475092
              ],
              [
                458301.5981574662,
                9290399.870106235
              ],
              [
                458282.1947518785,
                9290394.55741659
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 145,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 512,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458320.7845920583,
                9290405.161098745
              ],
              [
                458311.3928478272,
                9290440.533569094
              ],
              [
                458326.1055472938,
                9290444.47675851
              ],
              [
                458330.6526393015,
                9290440.645670764
              ],
              [
                458329.0294896338,
                9290407.491987083
              ],
              [
                458320.7845920583,
                9290405.161098745
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 140,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 855,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458273.918858441,
                9290347.930351056
              ],
              [
                458263.0021181089,
                9290389.167237308
              ],
              [
                458282.1947518785,
                9290394.55741659
              ],
              [
                458293.3098656865,
                9290353.016770953
              ],
              [
                458273.918858441,
                9290347.930351056
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 139,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 745,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458263.0021181089,
                9290389.167237308
              ],
              [
                458253.4925896197,
                9290425.345599933
              ],
              [
                458272.8557005949,
                9290430.401023975
              ],
              [
                458282.1947518785,
                9290394.55741659
              ],
              [
                458263.0021181089,
                9290389.167237308
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 138,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 849,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458254.5898429069,
                9290342.778839858
              ],
              [
                458243.7102976012,
                9290383.761560097
              ],
              [
                458263.0021181089,
                9290389.167237308
              ],
              [
                458273.918858441,
                9290347.930351056
              ],
              [
                458254.5898429069,
                9290342.778839858
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 137,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 750,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458243.7102976012,
                9290383.761560097
              ],
              [
                458234.3991425877,
                9290420.237482933
              ],
              [
                458253.4925896197,
                9290425.345599933
              ],
              [
                458263.0021181089,
                9290389.167237308
              ],
              [
                458243.7102976012,
                9290383.761560097
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 136,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 844,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458235.2856240572,
                9290337.73271457
              ],
              [
                458224.480468805,
                9290378.337285371
              ],
              [
                458243.7102976012,
                9290383.761560097
              ],
              [
                458254.5898429069,
                9290342.778839858
              ],
              [
                458235.2856240572,
                9290337.73271457
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 135,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 756,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458224.480468805,
                9290378.337285371
              ],
              [
                458214.8593552359,
                9290415.222353501
              ],
              [
                458234.3991425877,
                9290420.237482933
              ],
              [
                458243.7102976012,
                9290383.761560097
              ],
              [
                458224.480468805,
                9290378.337285371
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 134,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 838,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458215.8698201275,
                9290332.674190946
              ],
              [
                458205.2816358643,
                9290373.001865432
              ],
              [
                458224.480468805,
                9290378.337285371
              ],
              [
                458235.2856240572,
                9290337.73271457
              ],
              [
                458215.8698201275,
                9290332.674190946
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 133,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 762,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458205.2816358643,
                9290373.001865432
              ],
              [
                458195.4993438462,
                9290410.157630702
              ],
              [
                458214.8593552359,
                9290415.222353501
              ],
              [
                458224.480468805,
                9290378.337285371
              ],
              [
                458205.2816358643,
                9290373.001865432
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 132,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 832,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458196.6523896733,
                9290327.607401751
              ],
              [
                458185.9402219879,
                9290367.695374962
              ],
              [
                458205.2816358643,
                9290373.001865432
              ],
              [
                458215.8698201275,
                9290332.674190946
              ],
              [
                458196.6523896733,
                9290327.607401751
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 131,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 767,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458185.9402219879,
                9290367.695374962
              ],
              [
                458176.1248677238,
                9290405.117704589
              ],
              [
                458195.4993438462,
                9290410.157630702
              ],
              [
                458205.2816358643,
                9290373.001865432
              ],
              [
                458185.9402219879,
                9290367.695374962
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 130,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 827,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458177.2154381225,
                9290322.306495985
              ],
              [
                458166.7062604108,
                9290362.28143219
              ],
              [
                458185.9402219879,
                9290367.695374962
              ],
              [
                458196.6523896733,
                9290327.607401751
              ],
              [
                458177.2154381225,
                9290322.306495985
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 129,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 773,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458166.7062604108,
                9290362.28143219
              ],
              [
                458156.6349885081,
                9290399.696450945
              ],
              [
                458176.1248677238,
                9290405.117704589
              ],
              [
                458185.9402219879,
                9290367.695374962
              ],
              [
                458166.7062604108,
                9290362.28143219
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 151,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 779,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458147.417032376,
                9290356.758310808
              ],
              [
                458137.2808351138,
                9290394.724619536
              ],
              [
                458156.6349885081,
                9290399.696450945
              ],
              [
                458166.7062604108,
                9290362.28143219
              ],
              [
                458147.417032376,
                9290356.758310808
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 150,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 815,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458138.5515623567,
                9290312.122905636
              ],
              [
                458128.3028065031,
                9290351.479905332
              ],
              [
                458147.417032376,
                9290356.758310808
              ],
              [
                458157.7368778654,
                9290317.250245633
              ],
              [
                458138.5515623567,
                9290312.122905636
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 149,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 784,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458128.3028065031,
                9290351.479905332
              ],
              [
                458118.2199264682,
                9290389.486201981
              ],
              [
                458137.2808351138,
                9290394.724619536
              ],
              [
                458147.417032376,
                9290356.758310808
              ],
              [
                458128.3028065031,
                9290351.479905332
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 152,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 821,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458166.7062604108,
                9290362.28143219
              ],
              [
                458177.2154381225,
                9290322.306495985
              ],
              [
                458157.7368778654,
                9290317.250245633
              ],
              [
                458147.417032376,
                9290356.758310808
              ],
              [
                458166.7062604108,
                9290362.28143219
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 148,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 810,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458119.1974089627,
                9290307.004451845
              ],
              [
                458108.9753117226,
                9290345.961572345
              ],
              [
                458128.3028065031,
                9290351.479905332
              ],
              [
                458138.5515623567,
                9290312.122905636
              ],
              [
                458119.1974089627,
                9290307.004451845
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 147,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 790,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458108.9753117226,
                9290345.961572345
              ],
              [
                458098.6924920863,
                9290384.407736108
              ],
              [
                458118.2199264682,
                9290389.486201981
              ],
              [
                458128.3028065031,
                9290351.479905332
              ],
              [
                458108.9753117226,
                9290345.961572345
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 226,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 886,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458108.9753117226,
                9290345.961572345
              ],
              [
                458119.1974089627,
                9290307.004451845
              ],
              [
                458104.8106438824,
                9290303.085635666
              ],
              [
                458097.9238353974,
                9290306.400189942
              ],
              [
                458084.7722527423,
                9290339.45687067
              ],
              [
                458108.9753117226,
                9290345.961572345
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 146,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1065,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458098.6924920863,
                9290384.407736108
              ],
              [
                458108.9753117226,
                9290345.961572345
              ],
              [
                458084.7722527423,
                9290339.45687067
              ],
              [
                458071.9005855357,
                9290372.184761828
              ],
              [
                458074.8596916324,
                9290378.18294986
              ],
              [
                458098.6924920863,
                9290384.407736108
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 145,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 512,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458314.7131613356,
                9290303.920938864
              ],
              [
                458303.7549901579,
                9290345.312879428
              ],
              [
                458321.8828473314,
                9290350.004795402
              ],
              [
                458326.6458529417,
                9290346.272589514
              ],
              [
                458325.4373291299,
                9290306.000310736
              ],
              [
                458314.7131613356,
                9290303.920938864
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 142,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 861,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458286.0181259822,
                9290256.148703508
              ],
              [
                458275.604975345,
                9290296.18994095
              ],
              [
                458295.0657631929,
                9290300.08209852
              ],
              [
                458305.9943136911,
                9290258.725702811
              ],
              [
                458286.0181259822,
                9290256.148703508
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 141,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/89",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 739,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458275.604975345,
                9290296.18994095
              ],
              [
                458265.2421798687,
                9290335.16483389
              ],
              [
                458284.5430160356,
                9290340.229970455
              ],
              [
                458295.0657631929,
                9290300.08209852
              ],
              [
                458275.604975345,
                9290296.18994095
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 171,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 842,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458303.7549901579,
                9290345.312879428
              ],
              [
                458314.7131613356,
                9290303.920938864
              ],
              [
                458295.0657631929,
                9290300.08209852
              ],
              [
                458284.5430160356,
                9290340.229970455
              ],
              [
                458303.7549901579,
                9290345.312879428
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 168,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 815,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458266.3085244084,
                9290253.678338658
              ],
              [
                458255.9042599755,
                9290292.484393679
              ],
              [
                458275.604975345,
                9290296.18994095
              ],
              [
                458286.0181259822,
                9290256.148703508
              ],
              [
                458266.3085244084,
                9290253.678338658
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 167,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 793,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458255.9042599755,
                9290292.484393679
              ],
              [
                458245.8702540654,
                9290329.975290464
              ],
              [
                458265.2421798687,
                9290335.16483389
              ],
              [
                458275.604975345,
                9290296.18994095
              ],
              [
                458255.9042599755,
                9290292.484393679
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 166,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 786,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458246.0479781556,
                9290251.012477309
              ],
              [
                458236.1502273791,
                9290288.432284424
              ],
              [
                458255.9042599755,
                9290292.484393679
              ],
              [
                458266.3085244084,
                9290253.678338658
              ],
              [
                458246.0479781556,
                9290251.012477309
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 165,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 768,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458236.1502273791,
                9290288.432284424
              ],
              [
                458226.3206041724,
                9290324.856836677
              ],
              [
                458245.8702540654,
                9290329.975290464
              ],
              [
                458255.9042599755,
                9290292.484393679
              ],
              [
                458236.1502273791,
                9290288.432284424
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 164,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 756,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458226.1251076737,
                9290248.64874691
              ],
              [
                458216.6094636906,
                9290284.486809626
              ],
              [
                458236.1502273791,
                9290288.432284424
              ],
              [
                458246.0479781556,
                9290251.012477309
              ],
              [
                458226.1251076737,
                9290248.64874691
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 163,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 743,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458216.6094636906,
                9290284.486809626
              ],
              [
                458206.9486783693,
                9290319.845017346
              ],
              [
                458226.3206041724,
                9290324.856836677
              ],
              [
                458236.1502273791,
                9290288.432284424
              ],
              [
                458216.6094636906,
                9290284.486809626
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 162,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 728,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458206.1666923741,
                9290246.142837243
              ],
              [
                458196.8021138671,
                9290280.701286513
              ],
              [
                458216.6094636906,
                9290284.486809626
              ],
              [
                458226.1251076737,
                9290248.64874691
              ],
              [
                458206.1666923741,
                9290246.142837243
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 161,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 718,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458196.8021138671,
                9290280.701286513
              ],
              [
                458187.7189318382,
                9290314.584384281
              ],
              [
                458206.9486783693,
                9290319.845017346
              ],
              [
                458216.6094636906,
                9290284.486809626
              ],
              [
                458196.8021138671,
                9290280.701286513
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 160,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 699,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458186.1194150292,
                9290243.512520712
              ],
              [
                458177.3146674056,
                9290276.87577548
              ],
              [
                458196.8021138671,
                9290280.701286513
              ],
              [
                458206.1666923741,
                9290246.142837243
              ],
              [
                458186.1194150292,
                9290243.512520712
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 159,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 693,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458177.3146674056,
                9290276.87577548
              ],
              [
                458168.3470060347,
                9290309.537020126
              ],
              [
                458187.7189318382,
                9290314.584384281
              ],
              [
                458196.8021138671,
                9290280.701286513
              ],
              [
                458177.3146674056,
                9290276.87577548
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 158,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 670,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458166.048441139,
                9290241.166562727
              ],
              [
                458157.5073175822,
                9290272.903642071
              ],
              [
                458177.3146674056,
                9290276.87577548
              ],
              [
                458186.1194150292,
                9290243.512520712
              ],
              [
                458166.048441139,
                9290241.166562727
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 157,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 669,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458157.5073175822,
                9290272.903642071
              ],
              [
                458148.9217630045,
                9290304.542973204
              ],
              [
                458168.3470060347,
                9290309.537020126
              ],
              [
                458177.3146674056,
                9290276.87577548
              ],
              [
                458157.5073175822,
                9290272.903642071
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 156,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 641,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458145.8352879768,
                9290238.725818558
              ],
              [
                458137.8332608263,
                9290269.038143115
              ],
              [
                458157.5073175822,
                9290272.903642071
              ],
              [
                458166.048441139,
                9290241.166562727
              ],
              [
                458145.8352879768,
                9290238.725818558
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 155,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 644,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458137.8332608263,
                9290269.038143115
              ],
              [
                458129.7897647231,
                9290299.486722844
              ],
              [
                458148.9217630045,
                9290304.542973204
              ],
              [
                458157.5073175822,
                9290272.903642071
              ],
              [
                458137.8332608263,
                9290269.038143115
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 154,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 653,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458137.8332608263,
                9290269.038143115
              ],
              [
                458145.8352879768,
                9290238.725818558
              ],
              [
                458130.8946161494,
                9290236.747157024
              ],
              [
                458124.034466278,
                9290240.799266271
              ],
              [
                458114.8283584191,
                9290264.353632323
              ],
              [
                458137.8332608263,
                9290269.038143115
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 153,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 767,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458129.7897647231,
                9290299.486722844
              ],
              [
                458137.8332608263,
                9290269.038143115
              ],
              [
                458114.8283584191,
                9290264.353632323
              ],
              [
                458105.4445264705,
                9290287.718426013
              ],
              [
                458108.3029222496,
                9290293.58628306
              ],
              [
                458129.7897647231,
                9290299.486722844
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 173,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 730,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458308.8082784469,
                9290204.977494894
              ],
              [
                458303.452859205,
                9290248.133347044
              ],
              [
                458318.6660413036,
                9290250.029070666
              ],
              [
                458323.7844950938,
                9290245.526727056
              ],
              [
                458322.6707574636,
                9290205.503262004
              ],
              [
                458308.8082784469,
                9290204.977494894
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 188,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 854,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458288.561061501,
                9290204.057772728
              ],
              [
                458283.5951542228,
                9290245.668906327
              ],
              [
                458303.452859205,
                9290248.133347044
              ],
              [
                458308.8082784469,
                9290204.977494894
              ],
              [
                458288.561061501,
                9290204.057772728
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 187,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 833,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458273.7966327308,
                9290163.08644587
              ],
              [
                458268.8070289046,
                9290203.204697099
              ],
              [
                458288.561061501,
                9290204.057772728
              ],
              [
                458293.9979376204,
                9290161.783135874
              ],
              [
                458273.7966327308,
                9290163.08644587
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 186,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 821,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458268.8070289046,
                9290203.204697099
              ],
              [
                458263.8085388764,
                9290243.157072524
              ],
              [
                458283.5951542228,
                9290245.668906327
              ],
              [
                458288.561061501,
                9290204.057772728
              ],
              [
                458268.8070289046,
                9290203.204697099
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 185,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 793,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458253.5953278413,
                9290164.164638681
              ],
              [
                458248.8130687869,
                9290202.53823176
              ],
              [
                458268.8070289046,
                9290203.204697099
              ],
              [
                458273.7966327308,
                9290163.08644587
              ],
              [
                458253.5953278413,
                9290164.164638681
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 184,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 787,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458248.8130687869,
                9290202.53823176
              ],
              [
                458243.7849580769,
                9290240.69263181
              ],
              [
                458263.8085388764,
                9290243.157072524
              ],
              [
                458268.8070289046,
                9290203.204697099
              ],
              [
                458248.8130687869,
                9290202.53823176
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 183,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 754,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458233.204450589,
                9290165.4561004
              ],
              [
                458228.5258639208,
                9290201.845107805
              ],
              [
                458248.8130687869,
                9290202.53823176
              ],
              [
                458253.5953278413,
                9290164.164638681
              ],
              [
                458233.204450589,
                9290165.4561004
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 182,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 753,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458228.5258639208,
                9290201.845107805
              ],
              [
                458223.9035565496,
                9290238.299280735
              ],
              [
                458243.7849580769,
                9290240.69263181
              ],
              [
                458248.8130687869,
                9290202.53823176
              ],
              [
                458228.5258639208,
                9290201.845107805
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 181,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 713,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458212.8491181546,
                9290166.688320756
              ],
              [
                458208.3719521219,
                9290201.045349402
              ],
              [
                458228.5258639208,
                9290201.845107805
              ],
              [
                458233.204450589,
                9290165.4561004
              ],
              [
                458212.8491181546,
                9290166.688320756
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 180,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 719,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458208.3719521219,
                9290201.045349402
              ],
              [
                458204.0695481127,
                9290235.834840024
              ],
              [
                458223.9035565496,
                9290238.299280735
              ],
              [
                458228.5258639208,
                9290201.845107805
              ],
              [
                458208.3719521219,
                9290201.045349402
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 158,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 670,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458192.5648753564,
                9290167.659879118
              ],
              [
                458188.5646022985,
                9290200.138956547
              ],
              [
                458208.3719521219,
                9290201.045349402
              ],
              [
                458212.8491181546,
                9290166.688320756
              ],
              [
                458192.5648753564,
                9290167.659879118
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 178,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 685,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458188.5646022985,
                9290200.138956547
              ],
              [
                458184.4488085837,
                9290233.311157947
              ],
              [
                458204.0695481127,
                9290235.834840024
              ],
              [
                458208.3719521219,
                9290201.045349402
              ],
              [
                458188.5646022985,
                9290200.138956547
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 177,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 634,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458172.3043291037,
                9290168.939492565
              ],
              [
                458168.4106904996,
                9290199.339198139
              ],
              [
                458188.5646022985,
                9290200.138956547
              ],
              [
                458192.5648753564,
                9290167.659879118
              ],
              [
                458172.3043291037,
                9290168.939492565
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 176,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 651,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458168.4106904996,
                9290199.339198139
              ],
              [
                458164.4963174203,
                9290230.846717235
              ],
              [
                458184.4488085837,
                9290233.311157947
              ],
              [
                458188.5646022985,
                9290200.138956547
              ],
              [
                458168.4106904996,
                9290199.339198139
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 174,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 939,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458164.4963174203,
                9290230.846717235
              ],
              [
                458168.4106904996,
                9290199.339198139
              ],
              [
                458140.7790376168,
                9290198.299512224
              ],
              [
                458131.5581194186,
                9290221.794636922
              ],
              [
                458134.6623668561,
                9290227.29223544
              ],
              [
                458164.4963174203,
                9290230.846717235
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 154,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/90",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 653,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458168.4106904996,
                9290199.339198139
              ],
              [
                458172.3043291037,
                9290168.939492565
              ],
              [
                458156.9252711878,
                9290169.952519873
              ],
              [
                458150.0651213161,
                9290174.697753077
              ],
              [
                458140.7790376168,
                9290198.299512224
              ],
              [
                458168.4106904996,
                9290199.339198139
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 221,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/92",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 4869,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458007.4991614809,
                9290163.292616691
              ],
              [
                458005.0201921978,
                9290100.850499693
              ],
              [
                457920.9322407579,
                9290118.7778802
              ],
              [
                457917.9935950514,
                9290168.357265852
              ],
              [
                458007.4991614809,
                9290163.292616691
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 222,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/92",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 5790,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458092.2273765106,
                9290158.400346193
              ],
              [
                458078.1087435082,
                9290077.209997924
              ],
              [
                458005.0201921978,
                9290100.850499693
              ],
              [
                458007.4991614809,
                9290163.292616691
              ],
              [
                458092.2273765106,
                9290158.400346193
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 223,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/92",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1290,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458114.6366021481,
                9290112.202865645
              ],
              [
                458085.1196376442,
                9290117.526715307
              ],
              [
                458092.2273765106,
                9290158.400346193
              ],
              [
                458117.4603287485,
                9290156.988482889
              ],
              [
                458121.7287526794,
                9290151.636535961
              ],
              [
                458114.6366021481,
                9290112.202865645
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 193,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 971,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458173.3899825134,
                9290108.445512053
              ],
              [
                458125.8636434067,
                9290117.008469429
              ],
              [
                458129.3280794649,
                9290136.439752905
              ],
              [
                458176.8215346174,
                9290128.105983507
              ],
              [
                458173.3899825134,
                9290108.445512053
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 192,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1369,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458224.5938792101,
                9290119.930907885
              ],
              [
                458176.8215346174,
                9290128.105983507
              ],
              [
                458181.104708431,
                9290153.379213788
              ],
              [
                458224.8525135958,
                9290150.901293898
              ],
              [
                458229.0408992465,
                9290145.57765793
              ],
              [
                458224.5938792101,
                9290119.930907885
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 191,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1095,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458176.8215346174,
                9290128.105983507
              ],
              [
                458129.3280794649,
                9290136.439752905
              ],
              [
                458131.9511957338,
                9290151.262509909
              ],
              [
                458137.6962503841,
                9290155.837912712
              ],
              [
                458181.104708431,
                9290153.379213788
              ],
              [
                458176.8215346174,
                9290128.105983507
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 201,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 976,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458207.5308570419,
                9290021.52544513
              ],
              [
                458159.6895752414,
                9290029.984234242
              ],
              [
                458163.0953262018,
                9290049.541501123
              ],
              [
                458210.91819694,
                9290041.060832642
              ],
              [
                458207.5308570419,
                9290021.52544513
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 199,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1642,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458118.8435678998,
                9290077.507215448
              ],
              [
                458166.6042817365,
                9290069.150370292
              ],
              [
                458163.0953262018,
                9290049.541501123
              ],
              [
                458159.6895752414,
                9290029.984234242
              ],
              [
                458156.2735125291,
                9290010.846802626
              ],
              [
                458151.5041624212,
                9290016.490236117
              ],
              [
                458120.2589774746,
                9290065.680116462
              ],
              [
                458118.3625934173,
                9290074.800820744
              ],
              [
                458118.8435678998,
                9290077.507215448
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 196,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 974,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458217.7399983656,
                9290080.403366428
              ],
              [
                458169.9326292659,
                9290088.733438313
              ],
              [
                458173.3899825134,
                9290108.445512053
              ],
              [
                458221.1678925186,
                9290100.172637489
              ],
              [
                458217.7399983656,
                9290080.403366428
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 195,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 970,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458169.9326292659,
                9290088.733438313
              ],
              [
                458122.3314012823,
                9290097.132900693
              ],
              [
                458125.8636434067,
                9290117.008469429
              ],
              [
                458173.3899825134,
                9290108.445512053
              ],
              [
                458169.9326292659,
                9290088.733438313
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 198,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 974,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458214.3386135411,
                9290060.786979342
              ],
              [
                458166.6042817365,
                9290069.150370292
              ],
              [
                458169.9326292659,
                9290088.733438313
              ],
              [
                458217.7399983656,
                9290080.403366428
              ],
              [
                458214.3386135411,
                9290060.786979342
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 197,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 970,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458166.6042817365,
                9290069.150370292
              ],
              [
                458118.8435678998,
                9290077.507215448
              ],
              [
                458122.3314012823,
                9290097.132900693
              ],
              [
                458169.9326292659,
                9290088.733438313
              ],
              [
                458166.6042817365,
                9290069.150370292
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 200,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 975,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458210.91819694,
                9290041.060832642
              ],
              [
                458163.0953262018,
                9290049.541501123
              ],
              [
                458166.6042817365,
                9290069.150370292
              ],
              [
                458214.3386135411,
                9290060.786979342
              ],
              [
                458210.91819694,
                9290041.060832642
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 203,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 968,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458156.2735125291,
                9290010.846802626
              ],
              [
                458204.0982299134,
                9290001.728878161
              ],
              [
                458198.122528786,
                9289967.265954247
              ],
              [
                458194.0201469474,
                9289966.182306208
              ],
              [
                458156.2735125291,
                9290010.846802626
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 202,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 958,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458204.0982299134,
                9290001.728878161
              ],
              [
                458156.2735125291,
                9290010.846802626
              ],
              [
                458159.6895752414,
                9290029.984234242
              ],
              [
                458207.5308570419,
                9290021.52544513
              ],
              [
                458204.0982299134,
                9290001.728878161
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 206,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1014,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458271.1892174776,
                9290093.900117334
              ],
              [
                458231.3249591086,
                9290100.81026275
              ],
              [
                458235.6039762153,
                9290125.494095532
              ],
              [
                458275.0722895951,
                9290118.566010652
              ],
              [
                458271.1892174776,
                9290093.900117334
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 205,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1311,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458315.7112029317,
                9290111.533549404
              ],
              [
                458275.0722895951,
                9290118.566010652
              ],
              [
                458279.5771884986,
                9290147.766288508
              ],
              [
                458316.3567044794,
                9290145.730122551
              ],
              [
                458320.5292590469,
                9290140.521403898
              ],
              [
                458315.7112029317,
                9290111.533549404
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 204,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1084,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458275.0722895951,
                9290118.566010652
              ],
              [
                458235.6039762153,
                9290125.494095532
              ],
              [
                458239.0087410725,
                9290145.134738298
              ],
              [
                458244.6204898141,
                9290149.701540725
              ],
              [
                458279.5771884986,
                9290147.766288508
              ],
              [
                458275.0722895951,
                9290118.566010652
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 211,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1023,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458303.4120847254,
                9290037.535853967
              ],
              [
                458263.3908218126,
                9290044.587681554
              ],
              [
                458267.3061453599,
                9290069.13101944
              ],
              [
                458307.5191863843,
                9290062.246248044
              ],
              [
                458303.4120847254,
                9290037.535853967
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 210,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1033,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458263.3908218126,
                9290044.587681554
              ],
              [
                458222.799898778,
                9290051.63280952
              ],
              [
                458227.0846860845,
                9290076.349928133
              ],
              [
                458267.3061453599,
                9290069.13101944
              ],
              [
                458263.3908218126,
                9290044.587681554
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 209,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1029,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458307.5191863843,
                9290062.246248044
              ],
              [
                458267.3061453599,
                9290069.13101944
              ],
              [
                458271.1892174776,
                9290093.900117334
              ],
              [
                458311.5828500801,
                9290086.695297437
              ],
              [
                458307.5191863843,
                9290062.246248044
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 208,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1023,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458267.3061453599,
                9290069.13101944
              ],
              [
                458227.0846860845,
                9290076.349928133
              ],
              [
                458231.3249591086,
                9290100.81026275
              ],
              [
                458271.1892174776,
                9290093.900117334
              ],
              [
                458267.3061453599,
                9290069.13101944
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 215,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1048,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458297.3248120153,
                9289987.949847165
              ],
              [
                458255.6440284352,
                9289995.191392059
              ],
              [
                458259.5400011245,
                9290019.883086517
              ],
              [
                458300.1638578091,
                9290012.707882125
              ],
              [
                458297.3248120153,
                9289987.949847165
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 214,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1052,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458255.6440284352,
                9289995.191392059
              ],
              [
                458214.2697719578,
                9290002.42612986
              ],
              [
                458218.5445501421,
                9290027.085510097
              ],
              [
                458259.5400011245,
                9290019.883086517
              ],
              [
                458255.6440284352,
                9289995.191392059
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 213,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1024,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458300.1638578091,
                9290012.707882125
              ],
              [
                458259.5400011245,
                9290019.883086517
              ],
              [
                458263.3908218126,
                9290044.587681554
              ],
              [
                458303.4120847254,
                9290037.535853967
              ],
              [
                458300.1638578091,
                9290012.707882125
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 212,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1042,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458259.5400011245,
                9290019.883086517
              ],
              [
                458218.5445501421,
                9290027.085510097
              ],
              [
                458222.799898778,
                9290051.63280952
              ],
              [
                458263.3908218126,
                9290044.587681554
              ],
              [
                458259.5400011245,
                9290019.883086517
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 220,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1675,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458247.9681882027,
                9289945.808003135
              ],
              [
                458290.1545711146,
                9289938.374664526
              ],
              [
                458277.6330531,
                9289892.876956943
              ],
              [
                458272.4857249441,
                9289891.122479174
              ],
              [
                458243.1627251999,
                9289915.98188109
              ],
              [
                458247.9681882027,
                9289945.808003135
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 218,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1787,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458210.0054333372,
                9289977.826971035
              ],
              [
                458251.7867574611,
                9289970.357791306
              ],
              [
                458247.9681882027,
                9289945.808003135
              ],
              [
                458243.1627251999,
                9289915.98188109
              ],
              [
                458219.7030353451,
                9289935.564949093
              ],
              [
                458208.8149527295,
                9289948.542924346
              ],
              [
                458206.4541480866,
                9289957.341114333
              ],
              [
                458210.0054333372,
                9289977.826971035
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 217,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1074,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458294.4679634798,
                9289963.03656254
              ],
              [
                458251.7867574611,
                9289970.357791306
              ],
              [
                458255.6440284352,
                9289995.191392059
              ],
              [
                458297.3248120153,
                9289987.949847165
              ],
              [
                458294.4679634798,
                9289963.03656254
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 216,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1061,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458251.7867574611,
                9289970.357791306
              ],
              [
                458210.0054333372,
                9289977.826971035
              ],
              [
                458214.2697719578,
                9290002.42612986
              ],
              [
                458255.6440284352,
                9289995.191392059
              ],
              [
                458251.7867574611,
                9289970.357791306
              ]
            ]
          ]
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "lotNumber": 219,
        "block": "P",
        "locality": "Mwavi",
        "planNumber": "E7/60/91",
        "regTownPlanNumber": "19/BGY/1477/062020",
        "legalArea": 1092,
        "district": "Bagamoyo",
        "region": "Coast",
        "unitOfMeasure": "sq.m",
        "lotType": "Plot",
        "drawingNumber": null,
        "surveyType": "private",
        "surveyorName": "Maige S Ntambi",
        "zone": 37,
        "council": "Bagamoyo District ",
        "pbl": null,
        "fid": null
      },
      "geometry": {
        "type": "MultiPolygon",
        "coordinates": [
          [
            [
              [
                458290.1545711146,
                9289938.374664526
              ],
              [
                458247.9681882027,
                9289945.808003135
              ],
              [
                458251.7867574611,
                9289970.357791306
              ],
              [
                458294.4679634798,
                9289963.03656254
              ],
              [
                458292.7009209852,
                9289947.626983743
              ],
              [
                458290.1545711146,
                9289938.374664526
              ]
            ]
          ]
        ]
      }
    }
  ]
};
  // Create a bounds object to fit the polygons
  var bounds = L.latLngBounds();
        var plotCoordinates = []; // Array to store plot center coordinates

        // Function to set plot color based on its status
        function getColor(status) {
            return status === "available" ? '#008000' : '#FF0000'; // Green for available, Red for sold
        }

        // Iterate over features in the GeoJSON data
        geojsonData.features.forEach(function (feature) {
            var coords = feature.geometry.coordinates;

            // Add each MultiPolygon to the map
            coords.forEach(function (polygon) {
                var leafletPolygon = L.polygon(polygon[0].map(function(coord) {
                    // Convert UTM to latitude/longitude using proj4
                    var convertedCoords = proj4(utm21037, "WGS84", [coord[0], coord[1]]);
                    return [convertedCoords[1], convertedCoords[0]]; // Return lat/lon
                }));

                // Store the centroid for distance calculation
                var latLngs = polygon[0].map(function(coord) {
                    var convertedCoords = proj4(utm21037, "WGS84", [coord[0], coord[1]]);
                    return [convertedCoords[1], convertedCoords[0]]; // Return lat/lon
                });
                var centroid = L.polygon(latLngs).getBounds().getCenter();
                plotCoordinates.push(centroid);

                // Set initial color based on the plot's status (green for available)
                var fillColor = getColor("available"); // Force all to green initially

                leafletPolygon.setStyle({
                    color: fillColor,       // Border color
                    fillColor: fillColor,   // Fill color
                    fillOpacity: 0.8        // Increased fill opacity
                });

                // Bind popup to show plot details on click
                leafletPolygon.on('click', function() {
                    var plotSize = feature.properties.legalArea;
                    var pricePerSqm = 5000; // Price per sqm in Tsh
                    var totalPrice = plotSize * pricePerSqm; // Calculate total price
                    
                    var popupContent = `
                        <b>Plot Details</b><br>
                        <table class="plot-info-table">
                            <tr><th>Plot Number:</th><td>${feature.properties.lotNumber}</td></tr>
                            <tr><th>Block:</th><td>${feature.properties.block}</td></tr>
                            <tr><th>Locality:</th><td>${feature.properties.locality}</td></tr>
                            <tr><th>Plan Number:</th><td>${feature.properties.planNumber}</td></tr>
                            <tr><th>Registered Town Plan Number:</th><td>${feature.properties.regTownPlanNumber}</td></tr>
                            <tr><th>Legal Area:</th><td>${plotSize} ${feature.properties.unitOfMeasure}</td></tr>
                            <tr><th>District:</th><td>${feature.properties.district}</td></tr>
                            <tr><th>Region:</th><td>${feature.properties.region}</td></tr>
                            <tr><th>Drawing Number:</th><td>${feature.properties.drawingNumber}</td></tr>
                            <tr><th>Survey Type:</th><td>${feature.properties.surveyType}</td></tr>
                            <tr><th>Surveyor Name:</th><td>${feature.properties.surveyorName}</td></tr>
                            <tr><th>Council:</th><td>${feature.properties.council}</td></tr>
                            <tr><th>Price:</th><td>${totalPrice.toLocaleString()} Tsh</td></tr> <!-- Display total price -->
                        </table>
                    `;
                    leafletPolygon.bindPopup(popupContent).openPopup();
                    
                    // Change plot color to red when clicked (sold)
                    leafletPolygon.setStyle({
                        color: '#FF0000',       // Red border
                        fillColor: '#FF0000',   // Red fill
                        fillOpacity: 0.8
                    });

                    // Update the plot's status to sold
                    feature.properties.status = 'sold';
                });

                // Add the polygon to the map
                leafletPolygon.addTo(map);
                
                // Extend bounds to include this polygon
                bounds.extend(leafletPolygon.getBounds());
            });
        });

        // Calculate and display distances between plots
        for (var i = 0; i < plotCoordinates.length; i++) {
            for (var j = i + 1; j < plotCoordinates.length; j++) {
                var distance = map.distance(plotCoordinates[i], plotCoordinates[j]);
                console.log(`Distance between plot ${i + 1} and plot ${j + 1}: ${distance.toFixed(2)} meters`);
            }
        }

        // Fit the map to the bounds of the plotted polygons
        map.fitBounds(bounds);
    </script>
</body>
</html>