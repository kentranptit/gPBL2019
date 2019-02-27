<html>
<body>
<h1>Hello, Global PBL Teams!</h1>
<p>このページはデータベースに接続していくつかのデータを取得、表示するコードを例示するためのサンプルです。<br/>
詳しくは、Laravelのドキュメントを参照してください。 <a href="http://laravel.jp/">http://laravel.jp/</a></p>
<p>This page is an example for database connection and getting some records.<br/>
If you want to learning about Laravel framework so please see a laravel website. <a href="https://laravel.com/">https:/\
/laravel.com/</a></p>
<ol>
    @foreach ($employees as $emp)
        <li>{{$emp->name}}
            {{$emp->birthday}}
            {{$emp->address}}
            {{$emp->gender}}</li>
    @endforeach
</ol>
</body>
</html>