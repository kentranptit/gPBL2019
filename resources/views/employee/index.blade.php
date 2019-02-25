<html>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset=utf-8></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset=utf-8></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js" type="text/javascript" charset="utf-8"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
<h1>Hello, Global PBL Teams!</h1>
<p>このページはデータベースに接続していくつかのデータを取得、表示するコードを例示するためのサンプルです。<br/>
詳しくは、Laravelのドキュメントを参照してください。 <a href="http://laravel.jp/">http://laravel.jp/</a></p>
<p>This page is an example for database connection and getting some records.<br/>
If you want to learning about Laravel framework so please see a laravel website. <a href="https://laravel.com/">https://laravel.com/</a></p>

<canvas id="pieGender" width="50" height="20"></canvas>
<script>
var ctx = document.getElementById('pieGender').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [@foreach ($resigned_gender as $item) '{{$item->gender}}', @endforeach],
        datasets: [{
            backgroundColor: ['rgb(255, 99, 132)', 'rgb(99, 132, 255)'],
            borderColor: ['rgb(255, 99, 132)', 'rgb(99, 132, 255)'],
            data: [@foreach ($resigned_gender as $item) '{{$item->cnt}}', @endforeach]
        }]
    },
    options: {}
});
</script>

<canvas id="pieMaritalStatus" width="50" height="20"></canvas>
<script>
var ctx = document.getElementById('pieMaritalStatus').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [@foreach ($resigned_mrStatus as $item) '{{$item->marital_status}}', @endforeach],
        datasets: [{
            backgroundColor: ['rgb(132, 255, 99)', 'rgb(255, 160, 99)'],
            borderColor: ['rgb(132, 255, 99)', 'rgb(255, 160, 99)'],
            data: [@foreach ($resigned_mrStatus as $item) '{{$item->cnt}}', @endforeach]
        }]
    },
    options: {}
});
</script>

<canvas id="doughnutPosition" width="50" height="20"></canvas>
@php
$colors = [
    'rgb(30,0,0)',
    'rgb(65,0,0)',
    'rgb(100,0,0)',
    'rgb(140,0,0)',
    'rgb(170,0,0)',
    'rgb(210,0,0)',
    'rgb(255,0,0)',
    'rgb(0,30,0)',
    'rgb(0,65,0)',
    'rgb(0,100,0)',
    'rgb(0,140,0)',
    'rgb(0,170,0)',
    'rgb(0,210,0)',
    'rgb(0,255,0)',
    'rgb(0,0,30)',
    'rgb(0,0,65)',
    'rgb(0,0,100)',
    'rgb(0,0,140)',
    'rgb(0,0,170)',
    'rgb(0,0,210)',
    'rgb(0,0,255)'
];
@endphp
<script>
var ctx = document.getElementById('doughnutPosition').getContext('2d');
var chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [@foreach ($resigned_pos as $item) '{{$item->position}}', @endforeach],
        datasets: [{
            backgroundColor: [@foreach ($colors as $color) '{{$color}}', @endforeach],
            borderColor: [@foreach ($colors as $color) '{{$color}}', @endforeach],
            data: [@foreach ($resigned_pos as $item) '{{$item->cnt}}', @endforeach]
        }]
    },
    options: {}
});
</script>

<canvas id="lineAge" width="50" height="20"></canvas>
<script>
var ctx = document.getElementById('lineAge').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['<25', '25-30', '30-35', '>35'],
        datasets: [{
            backgroundColor: ['rgba(255,255,255, 0)'],
            borderColor: ['rgb(132,255,99)'],
            data: ['{{$counter_25}}', '{{$counter_25_30}}', '{{$counter_30_35}}', '{{$counter_35}}']
        }]
    },
    options: {}
});
</script>

<h3>Map</h3>
<p id="near"></p>
<p id="far"></p>
<div style="width:500px height:500px margin:auto" id='map'></div>
<div id="geolocation">Geolocation</div>
<script>
    var platform = new H.service.Platform({
        'app_id': 'KTaS5N8kgmop9R0exGB8',
        'app_code': 'TC7X2f9TI0IHqg5N8M42NA'
    });
    console.log(platform);
    var defaultLayers = platform.createDefaultLayers();
    var map = new H.Map(
    document.getElementById('map'), defaultLayers.normal.map,{
        zoom:13,
        center:{
            lat:21.0301527,
            lng:105.7858207
        }
    }
    );
    var icon = new H.map.Icon('download.jpg');
    var circle1 = new H.map.Circle(
    {
    lat: 21.0301527,
    lng: 105.7858207
    },
    5000,
    {
    style:{
         strokeColor: 'rgba(75, 171, 73, 1)', // Color of the perimeter
         lineWidth: 2,
         fillColor: 'rgba(75, 171, 73, 0.2)'  // Color of the circle
    }
    }
    );
    map.addObject(circle1);
    marker = new H.map.Marker({lat: 21.0301527,lng: 105.7858207}, {icon:icon});
    map.addObject(marker);
    var mapEvents = new H.mapevents.MapEvents(map);
    var behavior = new H.mapevents.Behavior(mapEvents);
    var ui = new H.ui.UI.createDefault(map, defaultLayers);
    var geoloc = document.getElementById('geolocation');
    function distance(lat1, lon1, lat2, lon2) {
        if ((lat1 == lat2) && (lon1 == lon2)) {
                return 0;
                }
                else {
                var radlat1 = Math.PI * lat1/180;
                var radlat2 = Math.PI * lat2/180;
                var theta = lon1-lon2;
                var radtheta = Math.PI * theta/180;
                var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(rad\
theta);
                if (dist > 1) {
                dist = 1;
                }
                dist = Math.acos(dist);
                dist = dist * 180/Math.PI;
                dist = dist * 60 * 1.1515;
                dist = dist * 1.609344;
                return dist;
                }
      }
      var far = 0;
      var near = 0;
    </script>
@foreach ($arr_add as $add)
        <script>
            var addText = <?php echo json_encode($add);?>;
            var geocodingParams = {
            searchText: addText
            };
            // Define a callback function to process the geocoding response:
            var onResult = function(result) {
            var locations = result.Response.View[0].Result,
            position,
            marker;
            position = {
            lat: locations[0].Location.DisplayPosition.Latitude,
            lng: locations[0].Location.DisplayPosition.Longitude
            };
            marker = new H.map.Marker(position);
            map.addObject(marker);
            if(distance(position.lat,position.lng,21.0301527,105.7858207)<5){
                near ++;
            }
            else {
                far ++;
            }
            console.log(far +" "+ near);
            document.getElementById("near").innerHTML = "Number of people who resigned live within 5km: ~"+ near;
            document.getElementById("far").innerHTML = "Number of people who resigned live beyond 5km: ~" +far;
            };
            var geocoder = platform.getGeocodingService();
            geocoder.geocode(geocodingParams, onResult, function(e) {
            alert(e);
            })
        </script>
    </div>
@endforeach


</body>
</html>
