appcntrls.controller('DashCtrl', function ($scope, $http, $rootScope, APIROUTING) {

    $scope.srvces = [];
    $http({
        method: 'GET',
        url: APIROUTING.host + APIROUTING.prefix + 'services'
    }).then(function successCallback(response) {
        // everything went well! 
        $scope.stat = "OK"
        $scope.srvces = response.data.message;

        for (var i = 0; i < $scope.srvces.length; i++) {
            $scope.srvces[i].avrating = 0;
            for (var j = 0; j < $scope.srvces[i].serreviews.length; j++) {
                $scope.srvces[i].avrating
                    += parseInt($scope.srvces[i]
                        .serreviews[j].rating);
            }
            if ($scope.srvces[i].serreviews.length != 0) {
                $scope.srvces[i].avrating = $scope.srvces[i].avrating
                                                    /$scope.srvces[i].serreviews.length;

               $scope.srvces[i].avrating = Math.round($scope.srvces[i].avrating);
            }

        }


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


