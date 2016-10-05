appcntrls.controller('ServCtrl', function ($scope, $http, $rootScope) {
    var srvcururl = window.location.href;
    $scope.reviewtab = false;
    $scope.disp = function swap(x) {
        x = !x;
    }


    $srvID = srvcururl.substr(srvcururl.length - 1, 1);
    $url = 'http://localhost:8000/api/eplar/services/' + $srvID;
    $scope.serv = 0;
    $scope.reviews = [];
    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well! 
        $scope.stat = "OK"
        $scope.serv = response.data.message.service;
        $scope.reviews = response.data.message.reviews;
    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });

    $scope.createReview = function createReview(x) {
        //todo
        $profileid = $rootScope.user.id;
        $url = 'http://localhost:8000/api/eplar/newreview';
        $http({
            method: 'POST',
            url: $url,
            data: { title : x.title, rating : x.rating, description : x.description, service_id : $srvID, profile_id : $profileid}
        })
    }
    
    $scope.removeReview = function removeReview(x) {
        $url = 'http://localhost:8000/api/eplar/'
    }


});

