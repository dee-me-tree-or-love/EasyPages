appcntrls.controller('ServCtrl', function ($scope, $http, $rootScope, $stateParams) {
    var srvcururl = window.location.href;


    $scope.srvID = $stateParams.serviceId;
    
    $url = 'http://localhost:8000/api/eplar/services/' + $scope.srvID;
    $scope.serv = 0;
    $scope.reviews = [];
    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well! 
        $scope.stat = "OK"
        $scope.serv = response.data.message.service;
        $scope.reviews = response.data.message.service.serreviews;
    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });

    $scope.createReview = function createReview(x) {
        //todo
        $url = 'http://localhost:8000/api/eplar/newreview';
        $http({
            method: 'POST',
            url: $url,
            data: { title : x.title, rating : x.rating, description : x.description, service_id : $srvID}
        })
    };
    
    $scope.removeReview = function removeReview($rvwID) {
        $url = 'http://localhost:8000/api/eplar/review/' + $rvwID + '/delete';
        $http({
        method: 'DELETE',
        url: $url
        }).then(function successCallback(response) {
            // everything went well! 
            $scope.stat = "OK"
        }, function errorCallback(response) {
            $scope.stat = response.data.message;
        });
    };


});

