appcntrls.controller('ServCtrl', function ($scope, $http, $rootScope, $stateParams, LOGGED_STATUS, Session) {
    var srvcururl = window.location.href;


    $scope.srvID = $stateParams.serviceId;

    $url = 'http://localhost:8000/api/eplar/services/' + $scope.srvID;
    $scope.serv = 0;
    $scope.reviews = [];

    if ((localStorage.getItem('isAuthorized') == LOGGED_STATUS.yes)) {
        var user = Session.recalluser();
        if (user.type != 'c') {
            $scope.revmdl = 'app/components/service/reviewbutton/newreview.html';
        } else {
            $scope.revmdl = 'app/components/service/reviewbutton/noreviewforcorp.html';
        }
    } else {
        $scope.revmdl = 'app/components/service/reviewbutton/nologinnoreview.html';
    }


    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well! 
        $scope.stat = "OK"
        $scope.serv = response.data.message.service;
        $scope.reviews = response.data.message.service.serreviews;

        for (var i = 0; i < $scope.reviews.length; i++) {
            if ($scope.reviews[i] != undefined) {
                $scope.reviews[i].defPic = DetermineAvatar($scope.reviews[i].relprofile.sex);
            }
        }
    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });

    //done from other locations
    // $scope.createReview = function createReview(x) {
    //     //todo
    //     $url = 'http://localhost:8000/api/eplar/newreview';
    //     $http({
    //         method: 'POST',
    //         url: $url,
    //         data: { title : x.title, rating : x.rating, description : x.description, service_id : $srvID}
    //     })
    // };

    // $scope.removeReview = function removeReview($rvwID) {
    //     $url = 'http://localhost:8000/api/eplar/review/' + $rvwID + '/delete';
    //     $http({
    //     method: 'DELETE',
    //     url: $url
    //     }).then(function successCallback(response) {
    //         // everything went well! 
    //         $scope.stat = "OK"
    //     }, function errorCallback(response) {
    //         $scope.stat = response.data.message;
    //     });
    // };

    DetermineAvatar = function (x) {
        switch (x) {
            case 'm':
                {
                    return profilepicurl = "assets/img/dprofpics/person-flat.png";

                }
            case 'f':
                {
                    return profilepicurl = "assets/img/dprofpics/person-girl-flat.png";
                }
            default:
                {
                    return profilepicurl = "assets/img/dprofpics/hotdog-flat.png";
                }
        }
    }
});

