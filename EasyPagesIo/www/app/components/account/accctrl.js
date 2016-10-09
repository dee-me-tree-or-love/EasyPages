app.controller('AccCtrl', function ($scope, $auth, Session, AuthService, $http, $rootScope, $ionicHistory, $state) {

    //$state.reload('tab.account');

    $url = 'http://localhost:8000/api/eplar/authenticate/user';
    $scope.user = 0;
    $scope.mdl = 'app/components/account/myFile.html';
    $scope.moduleTitle = "";
    $scope.moduleDisplay = false;
    $scope.logout = function () {
        AuthService.logout();
    }

    $scope.getUserProfile = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/profile/' + userid;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.userprofile = response.data.message;
            Session.rememberprofile ($rootScope.userprofile);
        }, function errorCallback(response) {
            $state.go('tab.acinit');
        });
    }

    $scope.getUserCompany = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/company/user/' + userid;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            $rootScope.usercompany = response.data.message;
            Session.remembercompany ($rootScope.usercompany);
        }, function errorCallback(response) {
            $state.go('tab.acinit');
        });
    }


    console.log("rrotscope: " + $rootScope);

    if (localStorage.getItem('user')) {
        $scope.user = Session.recalluser();
        if ($scope.user.type == 'c') {
            $scope.moduleTitle = "Your Company"
            $scope.usertype = "service provider";
            $scope.mdl = 'app/components/account/companystuff/companypane.html';
            
            if (Session.recallcompany()) {
                $scope.usercompany = Session.recallcompany();
            } else {
                $scope.getUserCompany($scope.user.id);
                //Session.remembercompany(uc);
            }

        } else {
            $scope.moduleTitle = "Your Profile"
            $scope.mdl = 'app/components/account/profilestuff/profilepane.html';
            
            if (Session.recallcompany()) {
                $scope.userprofile = Session.recallprofile();
            } else {
                $scope.getUserProfile($scope.user.id);
            }
        }
    } else {
        $scope.getUser();
    }

    // receiving stuff - authorization and all
    $scope.getUser = function getUser() {

        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            //$rootScope.user = response.data.user;
            console.log("me here" + JSON.stringify(response))
            // for the ease of use    
            $scope.user = response.data.user;

            if ($scope.user.type !== 'c') {
                $scope.moduleTitle = "Your Profile"
                $scope.getUserProfile(response.data.user.id);
                $scope.mdl = 'app/components/account/profilestuff/profilepane.html';
            }
            else {
                $scope.moduleTitle = "Your Company"
                $scope.usertype = "service provider";
                $scope.mdl = 'app/components/account/companystuff/companypane.html';
                $scope.getUserCompany(response.data.user.id);
            }

        }, function errorCallback(response) {
            $scope.stat = response.data.message;
        });
    }



    //methods - maybe we should add factories for the profiles and companies instead of declaring everythong int he controller? 




});