@extends('platform.layout.login_base')



@section('content')
<body>
<h3>Welcome <b>{{ $resData[0]->first_name }}</b> to home page</h3>
<input type="hidden" id="user_id" value='{{$resData[0]->user_id}}'/>
<div ng-controller="formController">
	<form id="myForm">
		<ul>
			<li ng-click="gotoMessage()"><a href="#">Message</a>
			</li>
		</ul>
	</form>
</div>



<script >
	// define angular module/app
	//var formApp = angular.module('formApp', []);


	function formController($scope, $http) {
		$scope.url = '../message/home/'+document.getElementById("user_id").value;
		alert ($scope.url);
		//$scope.formData = {};
		// create angular controller and pass in $scope and $http

		$scope.gotoMessage = function() { 
			document.getElementById("myForm").action =$scope.url;
			document.getElementById("myForm").method ="POST";
			document.getElementById("myForm").submit();
		};


	};

</script>
</body>

@stop