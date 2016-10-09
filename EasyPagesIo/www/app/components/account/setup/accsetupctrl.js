app.controller('AccSetupCtrl', function ($scope, $auth, $http, $rootScope, $ionicHistory, $state) {

    // definitely requires a factory
    $url = 'http://localhost:8000/api/eplar/authenticate/user';
    $scope.user = 0;
    $scope.data = {};
    $scope.mdl = "";


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
        if ($scope.user.type != 'c') {
            $rootScope.usercompany = null;
            $scope.getUserProfile($rootScope.user.id);
            //$scope.profile = $rootScope.userprofile;
            console.log("It's a PROFILE!");

            // intended to be a delegate assignment
            $scope.mdl = 'app/components/account/setup/profilesetup/profilesetupmod.html';

            

        } else {
            $rootScope.userprofile = null;
            $scope.getUserCompany($rootScope.user.id);
            //$scope.profile = $rootScope.usercompany;
            console.log("It's a COMPANY!");

            // intended to be a delegate assignment
            $scope.mdl = 'app/components/account/setup/companysetup/companysetupmod.html';
            
        }

    }, function errorCallback(response) {
        $scope.stat = response.data.message;
    });
    //




    $scope.initializeProfile = function (x) {
        if (x.fname && x.lname && x.dob) {
            $url = 'http://localhost:8000/api/eplar/initprofile';
            $http({
                method: 'POST',
                url: $url,
                data: { fname: x.fname, lname: x.lname, dob: x.dob, sex: x.sex }
            })
            $state.go("tab.account");
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }
    $scope.updateProfile = function (x) {
        if (x.fname && x.lname && x.dob) {
            $url = 'http://localhost:8000/api/eplar/profiles/';
            $http({
                method: 'PUT',
                url: $url,
                data: { fname: x.fname, lname: x.lname, dob: x.dob, sex: x.sex }
            })
            $state.go("tab.account");
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
            // hopefully it would work
             $scope.mdl = 'app/components/account/setup/profilesetup/exprofilesetupmod.html';
        }, function errorCallback(response) {

        });
    }



    $scope.initializeCompany = function (x) {
        if (x.fname && x.lname && x.dob) {
            $url = 'http://localhost:8000/api/eplar/initcompany';
            $http({
                method: 'POST',
                url: $url,
                data: { name: x.name, description: x.description, website: x.website }
            })
            $state.go("tab.account");
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }
    $scope.updateCompany = function (x) {
        if (x.name || x.description || x.website) {
            $url = 'http://localhost:8000/api/eplar/companies/';
            $http({
                method: 'PUT',
                url: $url,
                data: { name: x.name, description: x.description, website: x.website }
            })
            $state.go("tab.account");
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }






    $scope.getUserCompany = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/company/user/' + userid;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.usercompany = response.data.message.company;
            // hopefully it would work
             $scope.mdl = 'app/components/account/setup/companysetup/excompanysetupmod.html';

        }, function errorCallback(response) {
            console.log(response);
        });
    }


});