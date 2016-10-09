appcntrls.controller('ExploreCtrl', function ($scope, $http, ReviewFactory) {

    $scope.reviews = [];

    ReviewFactory.getAll($scope.reviews);
    console.log("formed ctrl instance");
    $scope.searchOptions = ['service', 'people', 'companies'];
    $scope.showCancel = false;

    $scope.showCncl = function showCncl($searchText) {
        console.log("key down");
        console.log($searchText);
        if (($searchText.trim()).length != 0) {
            $scope.showcancel = !$scope.showcancel;
        }
    };

    $scope.SubmitSearch = function SubmitSearch($searchText) {
        console.log($searchText)
        $scope.showcancel = false;
    }

    $scope.refresh = function refresh() {
        console.log("refresh called");
        ReviewFactory.getAll($scope.reviews);
        // Stop the ion-refresher from spinning
        $scope.$broadcast('scroll.refreshComplete');

    }

    $scope.loadMoreData = function lmData() {
        console.log("called to load more");
    }
});


