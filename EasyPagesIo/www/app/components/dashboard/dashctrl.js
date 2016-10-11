appcntrls.controller('DashCtrl', function ($scope, $http, $rootScope) {

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

    $scope.refresh = function refresh() {
        console.log("refresh called");
        $http.get('/new-items')
            .success(function (newItems) {
                $scope.items = newItems;
            })
            .finally(function () {
                // Stop the ion-refresher from spinning
                $scope.$broadcast('scroll.refreshComplete');
            });
    }

    $scope.loadMoreData = function lmData() {
        console.log("called to load more");
    }
    
    $scope.orderByMe = function(x) {
        $scope.myOrderBy = x;
    }


});


