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

    $scope.SubmitSearch = function SubmitSearch($searchText) {
        $scope.price = $scope.getRadioValue();
        if($scope.price != null)
            {
                $url = 'http://localhost:8000/api/eplar/services/searchbynameandprice';
        $scope.serv = 0;
        $scope.reviews = [];
        $http({
            method: 'POST',
            url: $url,
            data: {name : $searchText, price: $scope.price}
        }).then(function successCallback(response) {
            // everything went well! 
            $scope.services = response.data.message;
        }, function errorCallback(response) {
            $scope.stat = response.data.message;
        });
            }
        else
            {
        $url = 'http://localhost:8000/api/eplar/services/searchbyname';
        $scope.serv = 0;
        $scope.reviews = [];
        $http({
            method: 'POST',
            url: $url,
            data: {name : $searchText}
        }).then(function successCallback(response) {
            // everything went well! 
            $scope.services = response.data.message;
        }, function errorCallback(response) {
            $scope.stat = response.data.message;
        });
            }
    }

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


