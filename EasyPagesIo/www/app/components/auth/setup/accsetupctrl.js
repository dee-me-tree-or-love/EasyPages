app.controller('AccSetupCtrl', function ($scope, $auth, $http, $rootScope, $ionicHistory, $state) {

    // definitely requires a factory
    $url = 'http://localhost:8000/api/eplar/authenticate/user';
    $scope.user = 0;
    $http({
        method: 'GET',
        url: $url
    }).then(function successCallback(response) {
        // everything went well!
        $rootScope.user = response.data.user;
        console.log("haha" + JSON.stringify(response.data));
        // for the ease of use    
        $scope.user = $rootScope.user;
        // if ($scope.user.type !== 'c') {
        console.log(response);
        // }
        // else {
        //     $scope.moduleTitle = "Your Company"
        //     $scope.usertype = "service provider";
        //     $scope.mdl = 'app/components/account/companystuff/companypane.html';
        //     $scope.getUserCompany(response.data.user.id);
        // }
        if ($rootScope.user.type != 'c') {
            $rootScope.usercompany = null;
            $scope.getUserProfile($rootScope.user.id);
            $scope.profile = $rootScope.userprofile;
            console.log("It's a PROFILE: " + JSON.stringify($rootScope.userprofile))
        } else {
            $rootScope.userprofile = null;
            $scope.getUserCompany($rootScope.user.id);
            $scope.profile = $rootScope.usercompany;
            console.log("It's a PROFILE: " + JSON.stringify($rootScope.usercompany))
        }

    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });
    //

    


    $scope.initializeAccout = function (x) {
        if (x.fname && x.lname && x.dob) {
            $url = 'http://localhost:8000/api/eplar/initprofile';
            $http({
                method: 'POST',
                url: $url,
                data: { fname: x.fname, lname: x.lname, dob: x.dob, sex: x.sex }
            }).successCallback(function (respones) {
                console.log(JSON.stringify(response));
            })
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }
    $scope.updateAccout = function (x) {
        if (x.fname && x.lname && x.dob) {
            $url = 'http://localhost:8000/api/eplar/initprofile';
            $http({
                method: 'PUT',
                url: $url,
                data: { fname: x.fname, lname: x.lname, dob: x.dob, sex: x.sex }
            }).successCallback(function (respones) {
                console.log(JSON.stringify(response));
            })
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }


    $scope.getUserProfile = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/profile/' + userid;
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