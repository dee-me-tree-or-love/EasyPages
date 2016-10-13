app.service('PublicAccountFactory', function ($rootScope, APIROUTING, $http) {

    var publicAccountService = {
        getCompany: function ($compid) {
            // $http returns a promise, which has a then function, which also returns a promise
            var promise = $http.get(APIROUTING.host + APIROUTING.prefix + "companies/" + $compid)
                .then(function (response) {
                    // The then function here is an opportunity to modify the response
                    console.log(response);
                    // The return value gets picked up by the then in the controller.
                    return response.data.message;
                });
            // Return the promise to the controller
            return promise;
        },




         getProfile: function ($pid) {
            // $http returns a promise, which has a then function, which also returns a promise
            var promise = $http.get(APIROUTING.host + APIROUTING.prefix + "profile/PID/" + $pid)
                .then(function (response) {
                    // The then function here is an opportunity to modify the response
                    console.log(response);
                    // The return value gets picked up by the then in the controller.
                    return response.data.message;
                });
            // Return the promise to the controller
            return promise;
        }
    };


    return publicAccountService;

});