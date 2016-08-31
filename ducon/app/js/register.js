angular.module("myApp").controller('RegisterController',['$scope','Authentication','$rootScope','$location',
function($scope, Authentication, $rootScope, $location){
	$scope.message = '';
	$scope.error = '';
	$scope.register = function(){
		Authentication.register($scope.user).then(function(data){
			if(data!=0){
			$scope.error = '';
			$scope.message = "Registered successfully!";
		    }else{
		    	$scope.message = '';
		    	$scope.error = "Email Id already Exists";
		    }
		});
	};//Register

	$scope.login = function(){
		Authentication.ClearCredentials();
		Authentication.login($scope.user).then(function(data){
			if(typeof data != "undefined") {
				Authentication.SetCredentials(data.email);
				$location.path('/success');
          	}else{
          		$scope.error = "Invalid Login";
          	}
		}, function() {

		});
	};//Login

	$scope.logout = function(){
		Authentication.ClearCredentials();
		$location.path('/login');
	}; 

	$scope.forgetPassword = function(){
		Authentication.ForgetPassword($scope.user).then(function(data){
			console.log(data);
			if(data == 'error1'){
				$scope.message = '';
				$scope.error = "Email ID not register";
			}else if(data == 'error2'){
				$scope.message = '';
				$scope.error = "Password do not match";
			}else if(data == 'success'){
				$scope.error = '';
				$scope.message = "Password Updated Sucessfully";
			}
		});

	}

	
}]);//controller