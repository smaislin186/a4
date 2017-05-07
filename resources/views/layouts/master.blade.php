<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'ProfitPoint')
    </title>

    <meta charset='utf-8'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href="/css/scrabble.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    <header>
        <!--img src='/images/scrabble_tiles.jpeg' alt='Scrabble Logo'-->
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