@extends('platform.layout.login_base')



@section('content')
<body>
<div ng-controller="formController">
<div id="messages" ng-show="message">{{ aw('message') }}</div>

	<!-- FORM -->
	<form >
		<!-- NAME -->
		<div id="username-group" class="form-group" >
			<label>UserName</label>
			<input type="text" name="name" class="form-control" placeholder="User name" ng-model="formData.username">
			<span class="help-block" ng-show="errorUsername">{{ aw('errorUsername') }}</span>
		</div>

		<!-- Password NAME -->
		<div id="password-group" class="form-group" >
			<label>Password</label>
			<input type="text" name="password" class="form-control" placeholder="password" ng-model="formData.password">
			<span class="help-block" ng-show="errorPassword">{{ aw('errorPassword') }}</span>
		</div>

		<!-- SUBMIT BUTTON -->
		<button type="submit" class="btn btn-success btn-lg btn-block" ng-click="processForm()">
			<span class="glyphicon glyphicon-flash"></span> Submit!
		</button>
	</form>

	<!-- SHOW DATA FROM INPUTS AS THEY ARE BEING TYPED -->
	<pre>
		{{ aw('formData') }}
	</pre>
</div>
<script >
	// define angular module/app
	//var formApp = angular.module('formApp', []);


	function formController($scope, $http) {

		$scope.url = 'login/submit';
		//$scope.formData = {};

		// create angular controller and pass in $scope and $http
		$scope.datai					= {'username':'test'};

		$scope.processForm = function() { 
			$http.post($scope.url, {
				"data" : $scope.datai
			}).success(function(data,status) {
				alert(data.username);
		 	});
		};
	};

</script>
</body>

@stop