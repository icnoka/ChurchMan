  <?php include_once('shared\authenticateuser.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>COP - Church App</title>

    <!-- Favicon -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php include_once('shared\navbar.php'); ?>
            <br />
       <?php include_once('shared\sidebar.php'); ?>
           
       <?php include_once('shared\menuFooterButtons.php'); ?>
           
      </div>
    </div>

        <?php include_once('shared\topnav.php'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count">579</div>
                  <h3>Total Children</h3>
                  <p>Total number of children</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>New children in church.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaction Summary <small>Weekly progress</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div class="demo-container" style="height:280px">
                        <div id="placeholder33x" class="demo-placeholder"></div>
                      </div>
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                          <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                      </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Revenue</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                          <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                      </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                          <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                      </span>
                        </div>
                      </div>

                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div>
                        <div class="x_title">
                          <h2>Top Profiles</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                              </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
 
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Weekly Summary <small>Activity shares</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                      <div class="col-md-7" style="overflow:hidden;">
                        <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                  </span>
                        <h4 style="margin:18px">Weekly sales progress</h4>
                      </div>

                      <div class="col-md-5">
                        <div class="row" style="text-align: center;">
                          <div class="col-md-4">
                            <canvas id="canvas1i" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Bounce Rates</h4>
                          </div>
                          <div class="col-md-4">
                            <canvas id="canvas1i2" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">New Traffic</h4>
                          </div>
                          <div class="col-md-4">
                            <canvas id="canvas1i3" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Device Share</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Profiles <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Profiles <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Profiles <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      <?php include_once('shared\footer.php'); ?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/date.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- Flot -->
    <script>
      $(document).ready(function() {
        //define chart clolors ( you maybe add more colors if you want or flot will add it automatic )
        var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];

        //generate random number for charts
        randNum = function() {
          return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
        };

        var d1 = [];
        //var d2 = [];

        //here we generate data for chart
        for (var i = 0; i < 30; i++) {
          d1.push([new Date(Date.today().add(i).days()).getTime(), randNum() + i + i + 10]);
          //    d2.push([new Date(Date.today().add(i).days()).getTime(), randNum()]);
        }

        var chartMinDate = d1[0][0]; //first day
        var chartMaxDate = d1[20][0]; //last day

        var tickSize = [1, "day"];
        var tformat = "%d/%m/%y";

        //graph options
        var options = {
          grid: {
            show: true,
            aboveData: true,
            color: "#3f3f3f",
            labelMargin: 10,
            axisMargin: 0,
            borderWidth: 0,
            borderColor: null,
            minBorderMargin: 5,
            clickable: true,
            hoverable: true,
            autoHighlight: true,
            mouseActiveRadius: 100
          },
          series: {
            lines: {
              show: true,
              fill: true,
              lineWidth: 2,
              steps: false
            },
            points: {
              show: true,
              radius: 4.5,
              symbol: "circle",
              lineWidth: 3.0
            }
          },
          legend: {
            position: "ne",
            margin: [0, -25],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function(label, series) {
              // just add some space to labes
              return label + '&nbsp;&nbsp;';
            },
            width: 40,
            height: 1
          },
          colors: chartColours,
          shadowSize: 0,
          tooltip: true, //activate tooltip
          tooltipOpts: {
            content: "%s: %y.0",
            xDateFormat: "%d/%m",
            shifts: {
              x: -30,
              y: -50
            },
            defaultTheme: false
          },
          yaxis: {
            min: 0
          },
          xaxis: {
            mode: "time",
            minTickSize: tickSize,
            timeformat: tformat,
            min: chartMinDate,
            max: chartMaxDate
          }
        };
        var plot = $.plot($("#placeholder33x"), [{
          label: "Email Sent",
          data: d1,
          lines: {
            fillColor: "rgba(150, 202, 89, 0.12)"
          }, //#96CA59 rgba(150, 202, 89, 0.42)
          points: {
            fillColor: "#fff"
          }
        }], options);
      });
    </script>
    <!-- /Flot -->

    <!-- jQuery Sparklines -->
    <script>
      $(document).ready(function() {
        $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
          type: 'bar',
          height: '125',
          barWidth: 13,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#26B99A'
        });

        $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {
          type: 'bar',
          height: '40',
          barWidth: 8,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#26B99A'
        });

        $(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
          type: 'line',
          height: '40',
          width: '200',
          lineColor: '#26B99A',
          fillColor: '#ffffff',
          lineWidth: 3,
          spotColor: '#34495E',
          minSpotColor: '#34495E'
        });
      });
    </script>
    <!-- /jQuery Sparklines -->

    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function() {
        var canvasDoughnut,
            options = {
              legend: false,
              responsive: false
            };

        new Chart(document.getElementById("canvas1i"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]

            }]
          },
          options: options
        });

        new Chart(document.getElementById("canvas1i2"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]

            }]
          },
          options: options
        });

        new Chart(document.getElementById("canvas1i3"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]

            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->

    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript">
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
  </body>
</html>

