<html>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<h1>Hello, Global PBL Teams!</h1>
<p>このページはデータベースに接続していくつかのデータを取得、表示するコードを例示するためのサンプルです。<br/>
詳しくは、Laravelのドキュメントを参照してください。 <a href="http://laravel.jp/">http://laravel.jp/</a></p>
<p>This page is an example for database connection and getting some records.<br/>
If you want to learning about Laravel framework so please see a laravel website. <a href="https://laravel.com/">https://laravel.com/</a></p>

<input type="hidden" id="maleS_percent" maleSper="{{$maleSper}}"></input>
<input type="hidden" id="maleM_percent" maleMper="{{$maleMper}}"></input>
<input type="hidden" id="femaleS_percent" femaleSper="{{$femaleSper}}"></input>
<input type="hidden" id="femaleM_percent" femaleMper="{{$femaleMper}}"></input>
<input type="hidden" id="posdev_amount" posdev="{{$posdev}}"></input>
<input type="hidden" id="posqa_amount" posqa="{{$posqa}}"></input>
<input type="hidden" id="pospartime_amount" pospartime="{{$pospartime}}"></input>
<input type="hidden" id="posintership_amount" posintership="{{$posintership}}"></input>
<input type="hidden" id="posother_amount" posother="{{$posother}}"></input>

<canvas id="pieChart"></canvas>
<script>
var maleM = document.getElementById('maleM_percent').getAttribute('maleMper');
var femaleM = document.getElementById('femaleM_percent').getAttribute('femaleMper');
var maleS = document.getElementById('maleS_percent').getAttribute('maleSper');
var femaleS = document.getElementById('femaleS_percent').getAttribute('femaleSper');
var ctx = document.getElementById('pieChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Male Single", "Male Married", "Female Single", "Female Married"],
        datasets: [{
            backgroundColor: ['rgb(99, 132, 255)', 'rgb(255, 99, 132)', 'rgb(160,99,220)', 'rgb(255, 132, 99)'],
            borderColor: ['rgb(99, 132, 255)', 'rgb(255, 99, 132)', 'rgb(160, 99, 220)', 'rgb(255, 132, 99)'],
            data: [maleS, maleM, femaleS, femaleM]
        }]
    },
    options: {}
});
</script>

<canvas id="barChart"></canvas>
<script>
var posdev = document.getElementById('posdev_amount').getAttribute('posdev');
var posqa = document.getElementById('posqa_amount').getAttribute('posqa');
var pospartime = document.getElementById('pospartime_amount').getAttribute('pospartime');
var posintership = document.getElementById('posintership_amount').getAttribute('posintership');
var posother = document.getElementById('posother_amount').getAttribute('posother');
var ctx = document.getElementById('barChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['DEV', 'QA', 'Part-time', 'Internship', 'Others'],
        datasets: [{
            backgroundColor: ['rgb(99,255,132)', 'rgb(132,255,99)', 'rgb(99,132,255)', 'rgb(132,99,255)', 'rgb(255,132,99)'],
            borderColor: ['rgb(99,255,132)', 'rgb(132,255,99)', 'rgb(99,132,255)', 'rgb(132,99,255)', 'rgb(255,132,99)'],
            data: [posdev, posqa, pospartime, posintership, posother]
        }]
    },
    options: {
        //barThickness: 'flex'
    }
});
</script>
</body>
</html>
