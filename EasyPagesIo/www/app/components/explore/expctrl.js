appcntrls.controller('ExploreCtrl', function ($scope,$http) {

    $scope.searchOptions = ['service', 'people', 'companies'];
    $scope.showcancel = false;
    $scope.sparam = "";

    $scope.showCncl = function showCncl() 
    {
        
        
        console.log("key down");
        console.log($scope.sparam);
        if(($scope.sparam.trim()).length != 0)
        {
            $scope.showcancel = !$scope.showcancel;
        }
    };

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


