<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Filter</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link href="/css/memenu.css" rel="stylesheet" type="text/css"  /> 
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"  /> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="/bootstrap/js/bootstrap.js" > </script>     
</head>
<body> 
    <div class="logo">
        <a href="index.html">
            <h1>Cost Accounting Service</h1>
        </a>
    </div>
    <div class="header-bottom" style="margin-bottom: 40px;">
        <div class="container">
            <div class="header">
                <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="grid">
                            <a href="/">Home</a>
                        </li>
                        <li class="grid">
                            <a href="{{route('create')}}">Create costs</a>
                        </li>
                        <li class="grid">
                            <a href="{{route('create-type')}}">Create type costs</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    @yield('content')
    <div class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-right" style="text-align: center;">                 
                    <p>
                        © 2019 Created kostakokos | email 
                        <span style="color: tomato;" >kostakokos121@gmail.com </span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div> 
    @yield('script')
</body>
</html>
   


        
        
        
       
        