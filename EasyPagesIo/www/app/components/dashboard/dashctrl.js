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


    // $scope.showReviews = function (service) {
    //     var alertPopup = $ionicPopup.alert({
    //         title: 'Reviews for ' + service.title,
    //         template:
    //         '<ion-list>' +
    //         '<ion-item ng-repeat="review in service.serreviews">' +
    //         '<h3>{{review.title}}</h3>' +
    //         '</ion-item>' +
    //         '</ion-list>',
    //     });
    //     alertPopup.then(function (res) {
    //         console.log('Thank you for not eating my delicious ice cream cone');
    //     });
    // }

    $scope.loadMoreData = function lmData() {
        console.log("called to load more");
    }

    $scope.orderByMe = function (x) {
        $scope.myOrderBy = x;
    }

    $scope.priceRange = function(item) {
        return (parseInt(item['min-acceptable-price']) >= $scope.lower_price_bound && parseInt(item['max-acceptable-price']) <= $scope.upper_price_bound);
    };

});


