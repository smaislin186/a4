<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'ProfitPoint')
    </title>

    <meta charset='utf-8'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href="/css/profitpoint.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    <header>
        
    </header>

    <section>
        <div class = "content">
            <a href='/results'> 
                <img id ='logo' src='/images/logo2.jpg' alt='Profit Point Logo'>
            </a>
            <div class="links">
                <a href='/results' class='dimAction'>RESULTS</a>
                <a href='/showCenter' class='dimAction'>Manage Centers</a>
                <a href='/showProduct' class='dimAction'>Manage Products</a>
                <a href='/showIncomeData' class='dimAction'>Manage Input Data</a>
            </div>
        </div>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/profitpoint.js"></script>
    @stack('body')

</body>
</html>