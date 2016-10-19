// a service to control the authorization and atuhentication
app.factory('AuthService', function ($http, Session, $ionicHistory, $state, $auth, $rootScope) {
    var authService = {};

    // authService.isAuthenticated = function () {
    //     return app.isLoggedIn;
    // };

    //returns false, if an error occured
    authService.login = function ($credentials) {
        $auth.login($credentials).then(function successCallback(response) {
            // Return an $http request for the authenticated user
            $http.get('http://epapi.000webhostapp.com/api/eplar/authenticate/user').success(function (response) {
                // Stringify the retured data
                console.log(response);
                var user = JSON.stringify(response.user);
                
                // Set the stringified user data into local storage
                //localStorage.setItem('user', user);
                Session.create(user);
                // Getting current user data from local storage
                //$rootScope.currentUser = response.user;
                // $rootScope.currentUser = localStorage.setItem('user');;

                $ionicHistory.nextViewOptions({
                    disableBack: true
                });

                $state.go('tab.account');
            })
        }, function errorCallback(response) {
            var loginError = true;
                var loginErrorText = response;
                console.log(loginErrorText);
        })
    }

    authService.logout = function () {
        Session.destroy();
        $ionicHistory.nextViewOptions({
                    disableBack: true
                });
        $state.go('tab.login');
    }

    // $http.get('http://localhost:8000/api/eplar/authenticate').success(function (response) {

    //     // it returns all the users!
    //     console.log("success" + JSON.stringify(response));
    //     // Stringify the retured data
    //     var user = JSON.stringify(response.user);
    //     // ????
    //     console.log("success" + user);
    //     // Set the stringified user data into local storage
    //     localStorage.setItem('user', user);

    //     // Getting current user data from local storage
    //     $rootScope.currentUser = response.user;
    //     // $rootScope.currentUser = localStorage.setItem('user');;

    //     $ionicHistory.nextViewOptions({
    //         disableBack: true
    //     });

    //     // app.isLoggedIn = true;

    //     $state.go('tab.account');
    // })
    //     .error(function () {
    //         $scope.loginError = true;
    //         $scope.loginErrorText = "Error";
    //         console.log($scope.loginErrorText);
    //     })


    authService.register = function ($credentials) {
        // the passowrds should match, the email and username be specified
        if (($credentials.password == $credentials.confpassword)
            && ($credentials.username) && ($credentials.email)
            && ($credentials.type)) {

            console.log("Register user: "
                + $credentials.username
                + " - PW: " + $credentials.password);


            $url = 'http://epapi.000webhostapp.com/api/eplar/registration';
            $http({
                method: 'POST',
                url: $url,
                data: { username: $credentials.username, email: $credentials.email, password: $credentials.password, type: $credentials.type }
            }).success(function (response) {
                console.log("success" + JSON.stringify(response));
                var token = JSON.stringify(response);
                authService.login($credentials);
            }).error(function () {
                //$scope.msg = "Error appeared";
                console.log("Error appeared" + JSON.stringify($credentials));
            });



        } else {
            console.log("AAAAh, screw you, complete the form first, moron" + JSON.stringify($credentials));
        }
    }



    return authService;
});