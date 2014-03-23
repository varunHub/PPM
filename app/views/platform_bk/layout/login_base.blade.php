
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
    padding-top: 70px;
    }
    
      .ra {
        text-align: right;
      }
    </style>

    <!-- Fav and touch icons -->
</head>
  

  	@yield('content')

</html>