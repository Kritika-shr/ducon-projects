angular.module("myApp").factory('Authentication',['$rootScope','$http','$cookieStore', '$q',
function($rootScope,$http, $cookieStore, $q){
	var myObject = {
		register: function(user){
      var defer = $q.defer();
   		$http.post('http://localhost/ducon/index.php/home/register',
              {
                "firstname":  user.firstname,
                "lastname": user.lastname,
                "email": user.email,
                "password" : user.password
              }).success(function(data, status, headers, config){
                 return defer.resolve(data[0]);
              }).error(function(){
                return defer.reject();
              });
              return defer.promise;
		},//register

      login: function(user){
      // $rootScope.message = "Welcome" + user.email;
       var defer = $q.defer();
       $http.post('http://localhost/ducon/index.php/home/login',
       {
        "email":    user.email,
        "password": user.password
       }).success(function(data, status, headers, config){ 
          if(typeof data != "undefined") {
            return defer.resolve(data[0]);
          } else {
            return defer.reject();
          }
       });
       return defer.promise;
    },//login

    ClearCredentials: function(){
        $rootScope.globals = {};
        $cookieStore.remove('globals');
        $http.defaults.headers.common.Authorization = 'Basic ';
    }, //Clear Crendentilas

    SetCredentials : function(email){
      $rootScope.globals = {
        currentUser: {
          email: email,
        }
      };

    },//Set Crendentials

    ForgetPassword: function(user){
       var defer = $q.defer();
       $http.post('http://fractalnetwork.co.in/index.php/home/forgetpassword',
       {
          "email": user.email,
          "npass": user.npass,
          "cpass": user.cpass
       }).success(function(data){
           console.log(data);
           return defer.resolve(data);
       });
       return defer.promise;
    },//forget Password
	}//myObject
	return myObject;
}]);//factory
