appcntrls.controller('RvwCtrl', function ($scope, $http, $rootScope,$stateParams) {
   
    $scope.commenttab = false;
    $scope.disp = function swap(x) {
        x = !x;
    }


    $scope.revwID = $stateParams.reviewId;
    $url = 'http://localhost:8000/api/eplar/reviews/' + $scope.revwID;
    $scope.review = 0;
    $scope.comments = [];

    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well! 
        $scope.stat = "OK"
        $scope.review = response.data.message;
        //$scope.comments = response.data.message.comments;
    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });

    $scope.addComment = function createComment(x) {
        console.log("todo: " + x.text)
        //todo
        // $userid = $rootScope.user.id;
        // $url = 'http://localhost:8000/api/eplar/newcomment';
        // $http({
        //     method: 'POST',
        //     url: $url,
        //     data: { title : x.title, rating : x.rating, description : x.description, service_id : $srvID, user_id : $profileid}
        // })
    }
    
    $scope.removeReview = function removeReview(x) {
        $url = 'http://localhost:8000/api/eplar/'
    }


});

