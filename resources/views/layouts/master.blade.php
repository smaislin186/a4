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
         <div class = "content">
            <a href='/'> 
                <img id ='logo' src='/images/logo2.jpg' alt='Profit Point Logo'>
            </a>
            <nav>
                <ul>
                <div class="links">
                    <li><a href='/results' class='dimAction'>RESULTS</a></li>
                    <li><a href='/showCenter' class='dimAction'>Manage Centers</a></li>
                    <li><a href='/showProduct' class='dimAction'>Manage Products</a></li>
                    <li><a href='/showIncomeData' class='dimAction'>Manage Input Data</a></li>
                </div>
                </ul>
            </nav>
        </div>
    </header>

    <section>
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