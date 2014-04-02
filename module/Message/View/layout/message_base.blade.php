@if (!isset($no_layout))    
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" ng-app>
  <head>
    <meta charset="utf-8">
    <title>{{$app_admin_title}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="revisit-after" content="2 days" />
    <meta name="googlebot" content="index, follow" />
    <meta name="robots" content="index, follow" />

    <!-- Le styles -->
    <link href="{{$app_cdn}}/css/bootstrap.3.css" rel="stylesheet">
    <link href="{{$app_cdn}}/css/vux-base.css" rel="stylesheet">

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{$app_cdn}}/js/jquery-2.0.3.min.js"></script>
    
    
    <script src="{{$app_cdn}}/js/bootstrap.3.min.js"></script>
    <script src="{{$app_cdn}}/js/angular.min.js"></script>
    <script src="{{$app_cdn}}/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="{{$app_cdn}}/js/app.js" type="text/javascript"></script>



    <link href="{{$app_cdn}}/css/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]><link href="{{ $app_cdn; }}/css/font-awesome-ie7.css" rel="stylesheet"><![endif]-->

    <style>
    body {
    min-height: 2000px;
    padding-top: 10px;
    }
      .ra {
        text-align: right;
      }

      
    .menu-text{
      color:black;
      font-style: bold;
    }
    </style>

    <!-- Fav and touch icons -->

@endif

<h2>@yield('heading')</h2>
<table>
<tr>
<td valign="top">
  <div class="navbar" style="background-color:#949494;width:200px;height:400px;">
    <div class="navbar-inner">
        <ul class="nav">
            <li>
                <a href="#" class="dropdown-toggle menu-text" data-toggle="dropdown">Composer</a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle menu-text" data-toggle="dropdown">Inbox</a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle menu-text" data-toggle="dropdown">Sent</a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle menu-text" data-toggle="dropdown">UserList</a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle menu-text" data-toggle="dropdown">Search</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web development</a></li>
                    <li><a href="#">Wordpress Theme development</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</td>
<td valign="top">
  <div style="vertical-align: top;height:400px;">
    @yield('content')
  </div>
</td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
</table>


      
  	
  	
	</body>
</html>