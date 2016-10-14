appcntrls.controller('ExploreCtrl', function ($scope, $http, ReviewFactory, ServicesFactory) {

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

    $scope.refresh = function refresh() {
        console.log("refresh called");
        ServicesFactory.getAll($scope.services);
        // Stop the ion-refresher from spinning
        $scope.$broadcast('scroll.refreshComplete');
    }

    $scope.loadMoreData = function lmData() {
        console.log("called to load more");
    }
    
    $scope.getRadioValue = function getRadioValue()
    {
        var elements = document.getElementsByName('price');
        for (var i = 0, l = elements.length; i < l; i++)
        {
            if (elements[i].checked)
            {
                return elements[i].value;
            }
        }
    }
});


