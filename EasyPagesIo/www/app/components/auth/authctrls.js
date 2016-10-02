app.controller('LoginCtrl', function ($scope, $auth) {



// auth method
    $scope.loginData = {};
    $scope.loginError = false;
    $scope.loginErrorText;

    $scope.login = function () {

        var credentials = {
            email: $scope.loginData.email,
            password: $scope.loginData.password
        }

        console.log(credentials);

        $auth.login(credentials).then(function () {
            // Return an $http request for the authenticated user
            $http.get('http://localhost:8000/api/eplar/authenticate/user').success(function (response) {
                // Stringify the retured data
                var user = JSON.stringify(response.user);

                // Set the stringified user data into local storage
                localStorage.setItem('user', user);

                // Getting current user data from local storage
                $rootScope.currentUser = response.user;
                // $rootScope.currentUser = localStorage.setItem('user');;

                $ionicHistory.nextViewOptions({
                    disableBack: true
                });

                $state.go('app.account');
            })
                .error(function () {
                    $scope.loginError = true;
                    $scope.loginErrorText = error.data.error;
                    console.log($scope.loginErrorText);
                })
        });
    }

})




    .controller('RegCtrl', function ($scope) {
        $scope.data = {};

        $scope.login = function () {
            console.log("LOGIN user: " + $scope.data.username + " - PW: " + $scope.data.password);
        }
    })