@extends('layouts.app')
@section('title', 'Visualize')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://js.api.here.com/v3/3.0/mapsjs-ui.css"> @endsection 
@php $colors = [ '#FF0000', '#FF8000', '#FFFF00', '#80FF00', '#00FF00', '#00FF80', '#00FFFF', '#0080FF', '#0000FF', '#7F00FF',
'#FF00FF', '#FF007F', '#808080', '#FFCCCC', '#FFE5CC', '#FFFFCC', '#E5FFCC', '#CCFFCC', '#CCFFE5', '#CCFFFF', '#CCE5FF',
'#CCCCFF', '#E5CCFF' ];
@endphp
@section('scripts')
<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset=utf-8></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset=utf-8></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js" type="text/javascript" charset="utf-8"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    //DOUGHNUT CHART (gender)
    var ctx = document.getElementById('doughnutGender').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [@foreach($all_gender as $item)
                '{{$item->gender}}', @endforeach
            ],
            datasets: [{
                backgroundColor: ['rgb(255, 99, 132)', 'rgb(99, 132, 255)'],
                // borderColor: ['rgb(255, 99, 132)', 'rgb(99, 132, 255)'],
                data: [@foreach($all_gender as $item)
                    '{{$item->cnt}}', @endforeach
                ]},
                {
                backgroundColor: ['rgb(255, 99, 132)', 'rgb(99, 132, 255)'],
                // borderColor: ['rgb(255, 99, 132)', 'rgb(99, 132, 255)'],
                data: [@foreach($resigned_gender as $item)
                    '{{$item->cnt}}', @endforeach
                ]}
            ]
        },
        options: {
            legend: {
                position: 'bottom',
            },
            responsive: true
        }
    });

    //DOUGHNUT CHART (marital status)
    var ctx = document.getElementById('doughnutStatus').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [@foreach($all_mrStatus as $item)
                '{{$item->marital_status}}', @endforeach
            ],
            datasets: [{
                backgroundColor: ['rgb(132, 255, 99)', 'rgb(255, 160, 99)'],
                // borderColor: ['rgb(132, 255, 99)', 'rgb(255, 160, 99)'],
                data: [@foreach($all_mrStatus as $item)
                    '{{$item->cnt}}', @endforeach
                ]},
                {
                backgroundColor: ['rgb(132, 255, 99)', 'rgb(255, 160, 99)'],
                // borderColor: ['rgb(132, 255, 99)', 'rgb(255, 160, 99)'],
                data: [@foreach($resigned_mrStatus as $item)
                    '{{$item->cnt}}', @endforeach
                ]}
            ]
        },
        options: {
            legend: {
                position: 'bottom'
            }
        }
    });

    //DOUGHNUT CHART (position)
    var ctx = document.getElementById('doughnutPosResigned').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [@foreach($resigned_pos as $item)
                '{{$item->position}}', @endforeach
            ],
            datasets: [{
                backgroundColor: [@foreach($colors as $color)
                    '{{$color}}', @endforeach
                ],
                borderColor: [@foreach($colors as $color)
                    '{{$color}}', @endforeach
                ],
                data: [@foreach($resigned_pos as $item)
                    '{{$item->cnt}}', @endforeach
                ]
            }]
        },
        options: {
            legend: {
                position: 'right'
            }
        }
    });

    //LINE CHART (age)
    var ctx = document.getElementById('lineAgeResigned').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['<25', '25-30', '30-35', '>35'],
            datasets: [{
                label: 'Resigned employees',
                lineTension: 0,
                backgroundColor: ['rgb(132,255,99)'],
                borderColor: ['rgb(132,255,99)'],
                fill: false,
                data: ['{{$counter_25}}', '{{$counter_25_30}}', '{{$counter_30_35}}', '{{$counter_35}}']
            },
            {
                label: 'All employees',
                lineTension: 0,
                backgroundColor: ['rgb(99,132,255)'],
                borderColor: ['rgb(99,132,255)'],
                fill: false,
                data: ['{{$counter_all_25}}', '{{$counter_all_25_30}}', '{{$counter_all_30_35}}', '{{$counter_all_35}}']
            }]
        },
        options: {
            legend: {
                position: 'bottom'
            }
        }
    });

    //MAP
    var platform = new H.service.Platform({
        'app_id': 'KTaS5N8kgmop9R0exGB8',
        'app_code': 'TC7X2f9TI0IHqg5N8M42NA'
    });
    var defaultLayers = platform.createDefaultLayers();
    var map = new H.Map(
        document.getElementById('map'), defaultLayers.normal.map, {
            zoom: 13,
            center: {
                lat: 21.0301527,
                lng: 105.7858207
            }
        }
    );
    var icon = new H.map.Icon("{{ asset('/img/download.jpg') }}");
    var circle1 = new H.map.Circle({
            lat: 21.0301527,
            lng: 105.7858207
        },
        4000, {
            style: {
                strokeColor: 'rgba(75, 171, 73, 1)', // Color of the perimeter
                lineWidth: 2,
                fillColor: 'rgba(75, 171, 73, 0.2)' // Color of the circle
            }
        }
    );
    map.addObject(circle1);
    marker = new H.map.Marker({
        lat: 21.0301527,
        lng: 105.7858207
    }, {
        icon: icon
    });
    map.addObject(marker);
    var mapEvents = new H.mapevents.MapEvents(map);
    var behavior = new H.mapevents.Behavior(mapEvents);
    var ui = new H.ui.UI.createDefault(map, defaultLayers);
    var geoloc = document.getElementById('geolocation');
    function distance(lat1, lon1, lat2, lon2) {
        if ((lat1 == lat2) && (lon1 == lon2)) {
            return 0;
        } else {
            var radlat1 = Math.PI * lat1 / 180;
            var radlat2 = Math.PI * lat2 / 180;
            var theta = lon1 - lon2;
            var radtheta = Math.PI * theta / 180;
            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(
                radtheta);
            if (dist > 1) {
                dist = 1;
            }
            dist = Math.acos(dist);
            dist = dist * 180 / Math.PI;
            dist = dist * 60 * 1.1515;
            dist = dist * 1.609344;
            return dist;
        }
    }
    var far = 0;
    var near = 0;
    @foreach ($arr_add as $add)
        var addText = <?php echo json_encode($add);?>;
        var geocodingParams = {
            searchText: addText
        };
        //var redmarker = new H.map.Icon('redmarker.png');
        // Define a callback function to process the geocoding response:
        var onResult = function (result) {
            var locations = result.Response.View[0].Result,
                position,
                marker;
            position = {
                lat: locations[0].Location.DisplayPosition.Latitude,
                lng: locations[0].Location.DisplayPosition.Longitude
            };
            marker = new H.map.Marker(position);
            map.addObject(marker);
            if (distance(position.lat, position.lng, 21.0301527, 105.7858207) <= 4) {
                near++;
            } else {
                far++;
            }
            console.log(far + " " + near);
            document.getElementById("near").innerHTML = "Number of people who resigned live within 4km: ~" + near;
            document.getElementById("far").innerHTML = "Number of people who resigned live beyond 4km: ~" + far;
        };
        var geocoder = platform.getGeocodingService();
        geocoder.geocode(geocodingParams, onResult, function (e) {
            alert(e);
        })
    @endforeach 
    
    // @foreach ($arr_all_add as $add)
    //     var addText = <?php echo json_encode($add);?>;
    //     var geocodingParams = {
    //         searchText: addText
    //     };
    //     // Define a callback function to process the geocoding response:
    //     var onResult = function (result) {
    //         var locations = result.Response.View[0].Result,
    //             position,
    //             marker;
    //         position = {
    //             lat: locations[0].Location.DisplayPosition.Latitude,
    //             lng: locations[0].Location.DisplayPosition.Longitude
    //         };
    //         marker = new H.map.Marker(position);
    //         map.addObject(marker);
    //     };
    //     var geocoder = platform.getGeocodingService();
    //     geocoder.geocode(geocodingParams, onResult, function (e) {
    //         alert(e);
    //     })
    // @endforeach 

</script>
@endsection

@section('content')
<div class="container-fluid" style="margin-top:80px">
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-map-tab" data-toggle="tab" href="#nav-map" role="tab" aria-controls="nav-map"
                aria-selected="true">Distance</a>
            <a class="nav-item nav-link" id="nav-gender-tab" data-toggle="tab" href="#nav-gender" role="tab" aria-controls="nav-gender"
                aria-selected="false">Gender</a>
            <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status"
                aria-selected="false">Marital status</a>
            <a class="nav-item nav-link" id="nav-pos-tab" data-toggle="tab" href="#nav-pos" role="tab" aria-controls="nav-pos"
                aria-selected="false">Position</a>
            <a class="nav-item nav-link" id="nav-age-tab" data-toggle="tab" href="#nav-age" role="tab" aria-controls="nav-age"
                aria-selected="false">Age</a>
        </div>
    </nav>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-map" role="tabpanel" aria-labelledby="nav-map-tab">
            <p id="near"></p>
            <p id="far"></p>
            <div style="width:50%; height:500px; margin:auto" id='map'></div>
            <div id="geolocation"></div>
        </div>
        <div class="tab-pane fade" id="nav-gender" role="tabpanel" aria-labelledby="nav-gender-tab">
            <canvas id="doughnutGender" width="50" height="20"></canvas>
        </div>
        <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
            <canvas id="doughnutStatus" width="50" height="20"></canvas>
        </div>
        <div class="tab-pane fade" id="nav-pos" role="tabpanel" aria-labelledby="nav-pos-tab">
            <canvas id="doughnutPosResigned" width="50" height="20"></canvas>
        </div>
        <div class="tab-pane fade" id="nav-age" role="tabpanel" aria-labelledby="nav-age-tab">
            <canvas id="lineAgeResigned" width="50" height="20"></canvas>
        </div>
    </div>
</div>
@endsection
