<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="admin/img/apple-icon.png">
    <link rel="icon" href="{{ asset('client/img/core-img/logo2.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Threads Mania</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('admin/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('admin/css/paper-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('admin/css/demo.css')}}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('admin/css/themify-icons.css')}}" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo ">
                <a href="/admin-side"><img src="{{asset('client/img/core-img/logo.png')}}" alt=""></a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/admin-side">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/admin-side/categories">
                        <i class="ti-view-list-alt"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li>
                    <a href="/admin-side/products">
                        <i class="ti-bag"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.orders.index')}}">
                        <i class="ti-shopping-cart"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users.index')}}">
                        <i class="ti-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="/admin-side/product/customize">
                        <i class="ti-paint-roller"></i>
                        <p>Customize Product</p>
                    </a>
                </li>
                <li>
                    <a href="/admin-side/reports">
                        <i class="ti-pie-chart"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <li>
                    <a href="/admin-side/notes">
                        <i class="ti-notepad"></i>
                        <p>Notes</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
</body>

    <script src="{{mix('js/app.js')}}"></script>

    <!--   Core JS Files   -->
    <script src="{{asset('admin/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{asset('admin/js/bootstrap.min.js')}}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{asset('admin/js/bootstrap-checkbox-radio.js')}}"></script>

	<!--  Charts Plugin -->
	<script src="{{asset('admin/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('admin/js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{asset('admin/js/paper-dashboard.js')}}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{asset('admin/js/demo.js')}}"></script>

    <script type="text/javascript">
    	$(document).ready(function(){
            let showMessage = "{{Session::has('message')}}";

            if(showMessage){
                demo.showNotification('top','right')
                document.getElementById("flash-message").innerHTML = "{{Session::get('message')}}"
            }

        	demo.initChartist();
    	});
	</script>
    <script type="text/javascript">
    	$(document).ready(function(){

                var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);
        //chosen
        Chartist.Pie('#chartPreferences', {
          labels: ['10%','10%','10%','10%','10%','10%','10%','10%','20%'],
          series: [10, 10,10,10,10,10,10,10,20]
        });

        demo.initChartist();
    });
</script>
</html>

