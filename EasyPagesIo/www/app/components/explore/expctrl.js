appcntrls.controller('ExploreCtrl', function ($scope, $http) {

   $scope.searchParams = [];

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


});


