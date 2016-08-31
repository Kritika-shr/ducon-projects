var base_url = "http://localhost/fractalNetwork";
angular.module("myApp").controller('ContactController',['$scope','$http',
function($scope, $http){
	$scope.contactus = function(){
  	  $http.post('http://fractalnetwork.co.in/index.php/home/contactus',
              {
                "name":  $scope.user.name,
                "email": $scope.user.email,
                "phone": $scope.user.phone,
                "message" : $scope.user.message
              }).success(function(data, status, headers, config){
                  alert("Your Query has Submitted successfully!We will get back to you soon!")
                  $scope.success = "Your Query has been submitted Successfully"
                  console.log(data);
              }).error(function(){
                alert("There is some problem sending the request!Please try again later");
              });

    }//contactus

}]);//controller




