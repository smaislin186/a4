/*----------------------------------------------------
Make the active link in the nav styled as such
-----------------------------------------------------*/
$('nav ul li a').each(function() {
    var currentLocation = window.location.pathname;
    var thisLinksLocation = $(this).attr('href');

    if(currentLocation == thisLinksLocation) {
        $(this).addClass('active');
    }
});

/*----------------------------------------------------
Graph and Chart rendering using LavaCharts http://lavacharts.com/
-----------------------------------------------------*/
//echo Lava::render('LineChart', 'Center Profit', 'center-chart');


// If this is the div you want your chart to appear in, then call:
// <div id="stocks-chart"></div>
//echo $lava->render('LineChart', 'MyStocks', 'stocks-chart');