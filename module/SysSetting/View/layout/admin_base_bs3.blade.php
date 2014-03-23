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
    <link href="{{$app_cdn}}/css/custom.css" rel="stylesheet">

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{$app_cdn}}/js/bootstrap.min.js"></script>
    <script src="{{$app_cdn}}/js/angular.min.js"></script>









    <!--[if IE 7]><link href="{{ $app_cdn; }}/css/custom-ie7.css" rel="stylesheet"><![endif]-->

    <style>
    body {
    min-height: 2000px;
    padding-top: 70px;
    }
      .ra {
        text-align: right;
      }
    </style>

    <!-- Fav and touch icons -->

@endif

@yield('script')
 
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Admin/Setting</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <form class="navbar-form navbar-left" role="search" action="{{$app_url}}/Admin/setting/search" method="get">
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      @yield('nav_bar')
      <li><div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search_value">
      </div></li>
      <li><select name ="search_key" class="form-control">
          <option value="key_type">Key Type</option>
          <option value="section">Section</option>
          <option value="module">Module</option>
        </select>
      </li>
      <li><button type="submit" class="btn btn-default">Search</button></li>
    </ul>
    
      
      
   
  </div>
  </form>
</nav>
  	
  	@yield('content')
	</body>
</html>