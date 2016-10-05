app.controller('AccCtrl', function ($scope, $auth, $http, $rootScope, $ionicHistory, $state) {
    
    $url = 'http://localhost:8000/api/eplar/authenticate/user';
    $scope.user = 0;
    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well!
        $rootScope.user = response.data.user;
        $scope.getUser(response.data.user.id);
    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });
    
    $scope.getUser = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/profile/' + userid;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.userprofile = response.data.message;
        }, function errorCallback(response) {
            
        });
    }
});