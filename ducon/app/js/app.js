(function() {
 angular.module('myApp',['ngRoute','ngCookies'])
.config(['$routeProvider',function($routeProvider){
	$routeProvider.
	when('/home',{
		templateUrl: 'app/template/login.html',
		controller: 'RegisterController'
	}).
	when('/register',{
		templateUrl: 'app/template/register.html',
		controller: 'RegisterController'

	}).
	when('/login',{
		templateUrl: 'app/template/login.html',
		controller: 'RegisterController'
	}).
	when('/success',{
		templateUrl: 'app/template/success.html',
		//controller: 'SuccessController'		
	}).
	when('/logout',{
		templateUrl:'app/template/login.html',
		controller: 'RegisterController'
	}).
	when('/forget-password',{
		templateUrl: 'app/template/forget-password.html',
		controller: 'RegisterController'
	}).
	otherwise({
		redirectTo: '/home'
	});
}])

.run(['$rootScope', '$location', '$cookieStore', '$http',
  function($rootScope,$location, $cookieStore, $http){
   	//Keep user logged in after page refresh
   	$rootScope.globals = $cookieStore.get('globals') ||  {};
   	if($rootScope.globals.currectUser){
   		console.log(globals);
   		$http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata; // jshint ignore:line
   	}//IF1

    $rootScope.$on('$locationChangeStart', function( event, next, current){
   		if($location.path() =='/success' && !$rootScope.globals.currentUser){
   				$location.path('/login');
   		}//IF2
   	});//ON
  }]) 
})();
