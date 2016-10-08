// a service to control the authorization and atuhentication
app.factory('AuthService', function ($http, Session) {
  var authService = {};
 
  authService.isAuthenticated = function () {
    return app.isLoggedIn;
  };
 
  authService.login = function($credentials){
    $http.get('http://localhost:8000/api/eplar/authenticate').success(function (response) {

                // it returns all the users!
                console.log("success" + JSON.stringify(response));
                // Stringify the retured data
                var user = JSON.stringify(response.user);
                // ????
                console.log("success" + user);
                // Set the stringified user data into local storage
                localStorage.setItem('user', user);

                // Getting current user data from local storage
                $rootScope.currentUser = response.user;
                // $rootScope.currentUser = localStorage.setItem('user');;

                $ionicHistory.nextViewOptions({
                    disableBack: true
                });

                // app.isLoggedIn = true;

                $state.go('tab.account');
            })
                .error(function () {
                    $scope.loginError = true;
                    $scope.loginErrorText = "Error";
                    console.log($scope.loginErrorText);
                })
        });
  }

  return authService;
})