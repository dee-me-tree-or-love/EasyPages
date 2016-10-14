app.factory('AccFactory', function ($http, Session,
    $ionicHistory, $state,
    $auth, $rootScope) {

    var accountService = {};

    accountService.getUserProfile = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/profile/' + userid;
        $rootScope.usercompany = {};
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.userprofile = response.data.message;
            Session.rememberprofile($rootScope.userprofile);
        }, function errorCallback(response) {
             $state.go('tab.acinit');
            $rootScope.userprofile = {};
            console.log("problem with getuser");
        });
    }



    accountService.getUserCompany = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/company/user/' + userid;
        $rootScope.userprofile = {};
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.usercompany = response.data.message;
            Session.remembercompany($rootScope.usercompany);
        }, function errorCallback(response) {
            //$rootScope.usercompany = {};
            $state.go('tab.acinit');
            console.log("problem with getuser");
        });
    }


    accountService.initializeProfile = function (x) {
        if (x.fname && x.lname && x.dob) {
            $url = 'http://localhost:8000/api/eplar/initprofile';
            $http({
                method: 'POST',
                url: $url,
                data: { fname: x.fname, lname: x.lname, dob: x.dob, sex: x.sex }
            })
            $ionicHistory.nextViewOptions({
                disableBack: true
            });
            $state.go("tab.account");
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }

    accountService.updateProfile = function (newdata, olddata) {
        if (newdata.fname || newdata.lname || newdata.dob || newdata.senewdata) {
            $url = 'http://localhost:8000/api/eplar/profiles/';
            $http({
                method: 'PUT',
                url: $url,
                data: { fname: newdata.fname, lname: newdata.lname, dob: newdata.dob, sex: newdata.sex }
            })
            if (!newdata.fname) {
                newdata.fname = olddata.fname;
            }
            if (!newdata.lname) {
                newdata.lname = olddata.lname;
            }
            if (!newdata.dob) {
                newdata.dob = olddata.dob;
            }
            if (!newdata.sex) {
                newdata.sex = olddata.sex;
            }
            var profile = {};
            profile.profile = newdata;
            Session.rememberprofile(profile);
            $state.go("tab.account");
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }



    accountService.initializeCompany = function (x) {
        console.log(x);
        console.log("starting requuest")
        if (x.name && x.description && x.website) {
            $url = 'http://localhost:8000/api/eplar/initcompany';
            $http({
                method: 'POST',
                url: $url,
                data: { name: x.name, description: x.description, website: x.website }
            })

            console.log("yeah, got it");
            $state.go("tab.account");
        } else {
            console.log("Here's what I got, something is missing: " + JSON.stringify(x));
        }
    }
    accountService.updateCompany = function (newdata, olddata) {
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


    return accountService;
});