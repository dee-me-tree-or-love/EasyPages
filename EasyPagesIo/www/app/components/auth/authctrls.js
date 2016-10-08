app.controller('LoginCtrl', function ($scope, $auth, $http, $rootScope, $ionicHistory, $state) {



    // auth method
    $scope.loginData = {};
    $scope.loginError = false;
    $scope.loginErrorText = "";

    $scope.login = function () {

        var $credentials = {
            email: $scope.loginData.email,
            password: $scope.loginData.password
        }

        console.log($credentials);

        $auth.login($credentials).then(function () {
            // Return an $http request for the authenticated user
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

})

  


    // for the REGISTRATION

    .controller('RegCtrl', function ($scope, $auth, $http, $rootScope, $ionicHistory, $state) {
        $scope.data = {};
        // being checked inside of the template
        $scope.passMatch = true;

        $scope.companyidentifier = 'c';
        $scope.personal = 'i';

        // registration
        $scope.register = function ($credentials) {
            // the passowrds should match, the email and username be specified
            if (($credentials.password == $credentials.confpassword)
                && ($credentials.username) && ($credentials.email)
                && ($credentials.type)) {

                console.log("Register user: "
                    + $credentials.username
                    + " - PW: " + $credentials.password);


                $url = 'http://localhost:8000/api/eplar/registration';
                $http({
                    method: 'POST',
                    url: $url,
                    data: { username: $credentials.username, email: $credentials.email, password: $credentials.password, type: $credentials.type }
                }).success(function (response) {
                    console.log("success" + JSON.stringify(response));
                    var token = JSON.stringify(response);
                    $ionicHistory.nextViewOptions({
                        disableBack: true
                    });
                    // app.isLoggedIn = true;
                    $state.go('tab.acinit');

                }).error(function () {
                    $scope.msg = "Error appeared";
                    console.log("Error appeared" + JSON.stringify($credentials));
                });



            } else {
                console.log("AAAAh, screw you, complete the form first, moron" + JSON.stringify($credentials));
            }
        }

    })