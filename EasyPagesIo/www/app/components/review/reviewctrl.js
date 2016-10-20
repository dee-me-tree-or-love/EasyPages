appcntrls.controller('RvwCtrl', function ($scope, $http, $ionicPopup, $rootScope, $state, $stateParams, Session, LOGGED_STATUS) {

    $scope.commenttab = false;
    $scope.disp = function swap(x) {
        x = !x;
    }

    // checking whether can comment or not
    $scope.commdl = "";
    if ((localStorage.getItem('isAuthorized') == LOGGED_STATUS.yes)) {
        $scope.commdl = 'app/components/review/comments/newcomment.html';
    } else {
        $scope.commdl = 'app/components/review/comments/nocomment.html';
    }



    $scope.revwID = $stateParams.reviewId;
    $url = 'http://localhost:8000/api/eplar/reviews/' + $scope.revwID;
    $scope.review = 0;
    $scope.comments = [];

    $scope.user = Session.recalluser();
    $scope.DeletableComment = false;

    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well! 
        $scope.stat = "OK"
        $scope.review = response.data.message;
        for (var i=0; i< $scope.review.comments.length; i++) {
            if ( $scope.review.comments[i] != undefined) {
                $scope.review.comments[i].DeletableComment = ($scope.review.comments[i].user_id==$scope.user.id);
            }
        }
        //$scope.comments = response.data.message.comments;
    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });




    $scope.addComment = function createComment(x) {
        if (localStorage.getItem('isAuthorized') == LOGGED_STATUS.yes 
            && x) {
            x.user_id = $scope.user.id;
            x.review_id = $scope.revwID;
            x.thread_id = 0;
            console.log("todo: ");
            console.log(x);
            //todo
            $url = 'http://localhost:8000/api/eplar/newcomment';
            $http({
                method: 'POST',
                url: $url,
                data: {text: x.text,
                    user_id: x.user_id,
                    review_id: x.review_id,
                    thread_id: x.thread_id}
            }).then(function()
            {
                $state.reload();
            })
        } else if (!x) {
            var alertPopup = $ionicPopup.alert({
                title: 'Please, provide the data',
            });

            alertPopup.then(function (res) {
                console.log('Thanks');
            });
        }else {
            var alertPopup = $ionicPopup.alert({
                title: 'Log in is required',
            });

            alertPopup.then(function (res) {
                console.log('Thanks');
            });
        }
    }


       $scope.removeComment = function removeComment($comID) {
        $url = 'http://localhost:8000/api/eplar/comment/' + $comID + '/delete';
        $http({
            method: 'DELETE',
            url: $url
        }).then(function successCallback(response) {
            // everything went well! 
            console.log("OK");
            $state.reload();
        }, function errorCallback(response) {
           console.log(response.data.message);
        });
    }








    $scope.removeReview = function removeReview(x) {
        $url = 'http://localhost:8000/api/eplar/'
    }


});

