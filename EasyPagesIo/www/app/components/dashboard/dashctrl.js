appcntrls.controller('DashCtrl', function ($scope, $http) {

    $scope.srvces = [];
    $http({
        method: 'GET',
        url: 'http://localhost:8000/api/eplar/services'
    }).then(function successCallback(response) {
        // everything went well! 
        $scope.stat = "OK"
        $scope.srvces = response.data.message;
    }, function errorCallback(response) {
         $scope.stat = response.data.message;
    });




});


