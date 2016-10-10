app.service('ReviewFactory', function ($http, $rootScope) {
    // Might use a resource here that returns a JSON array

    var reviewService = {};

    reviewService.getAll = function ($rvwContainer) {
        $http({
            method: 'GET',
            url: 'http://localhost:8000/api/eplar/reviews'
        }).then(function successCallback(response) {
            // everything went well! 
            return $rvwContainer = response.data.message;
        }, function errorCallback(response) {
            //nothing happens
            return $rvwContainer;
        });
    }

    reviewService.getByProfile = function ($profID) {
        $url = 'http://localhost:8000/api/eplar/reviews/byprof/' + $profID;
        var reviews = [];
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well! 
            $rootScope.userprofile.profilereviews = response.data.message;
            //$scope.comments = response.data.message.comments;
        }, function errorCallback(response) {
            return reviews = [];
        });
    }

    reviewService.getById = function ($revID) {
        $url = 'http://localhost:8000/api/eplar/reviews/' + $revID;
        var review = 0;
        var comments = [];

        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well! 
            return review = response.data.message;
            //$scope.comments = response.data.message.comments;
        }, function errorCallback(response) {
            return review = {};
        });
    }
    reviewService.publish = function ($newreview) {

        $url = 'http://localhost:8000/api/eplar/newreview';
        $http({
            method: 'POST',
            url: $url,
            data: { title: $newreview.title, rating: $newreview.rating, description: $newreview.description, service_id: $newreview.service_id }
        })

    }
    
    reviewService.remove = function removeReview($rvwID) {
        $url = 'http://localhost:8000/api/eplar/review/' + $rvwID + '/delete';
        $http({
            method: 'DELETE',
            url: $url
        }).then(function successCallback(response) {
            // everything went well! 
            console.log("OK");
        }, function errorCallback(response) {
           console.log(response.data.message);
        });
    }


    return reviewService;

});
