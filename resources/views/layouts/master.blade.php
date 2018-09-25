<html>
<head>
    <title>Esscents Naturals</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="/css/style.css">
    
    <script type="text/javascript" src="/js/product.js"></script>
</head>
<body>
@section('sidebar')
    <div id="wrapper">

        <header>
            <div class="box">
                <nav>
                    <a href="/">Home</a> 
                    <a href="/products#tinCandles">Candles</a>
                </nav>
            </div>
            <div class="middle box">
                <a href="http://www.esscentsnaturals.com"><img src="images/logo2.png"></a>
            </div>
            <div class="box">
                <nav>
                    <a href="/products#reedDiffusers">Diffusers</a>
                    <a href="/about">About</a>
                </nav>
            </div>   
        </header>

        
        @yield('content')
        

    </div>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90488436-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-90488436-1');
    </script>
</body>
</html>
