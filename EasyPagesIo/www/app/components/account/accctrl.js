app.controller('AccCtrl', function ($scope, $auth, $http, $rootScope, $ionicHistory, $state) {

    $url = 'http://localhost:8000/api/eplar/authenticate/user';
    $scope.user = 0;
    $scope.mdl = 'app/components/account/myFile.html';
    $scope.moduleTitle = "";
    $scope.moduleDisplay = false;

    // receiving shits- authorization and all
    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well!
        $rootScope.user = response.data.user;

        // for the ease of use    
        $scope.user = $rootScope.user;
        // if ($scope.user.type !== 'c') {
            $scope.moduleTitle = "Your Profile"
            $scope.getUserProfile(response.data.user.id);
            $scope.mdl = 'app/components/account/profilestuff/profilepane.html';
        // }
        // else {
        //     $scope.moduleTitle = "Your Company"
        //     $scope.usertype = "service provider";
        //     $scope.mdl = 'app/components/account/companystuff/companypane.html';
        //     $scope.getUserCompany(response.data.user.id);
        // }

    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });



//methods - maybe we should add factories for the profiles and companies instead of declaring everythong int he controller? 

    $scope.getUserProfile = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/profile/' + 10;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.userprofile = response.data.message;
        }, function errorCallback(response) {

        });
    }

    $scope.getUserCompany = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/company/' + userid;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.usercompany = response.data.message;
        }, function errorCallback(response) {

        });
    }

});