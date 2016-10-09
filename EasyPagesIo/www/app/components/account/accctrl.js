app.controller('AccCtrl', function ($scope, $auth, Session,
    AuthService, AccFactory,
    $http, $rootScope,
    $ionicHistory, $state,
    ReviewFactory) {

    //$state.reload('tab.account');

    $url = 'http://localhost:8000/api/eplar/authenticate/user';
    $scope.user = 0;
    $scope.mdl = 'app/components/account/myFile.html';
    $scope.moduleTitle = "";
    $scope.moduleDisplay = false;
    $scope.logout = function () {
        AuthService.logout();
    }
    $scope.removeReview = function removeReview($rvwID) {
        ReviewFactory.remove($rvwID);
        $scope.userprofile.profilereviews
            = ReviewFactory.getByProfile($scope.userprofile.profile.profile_id)
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
                AccFactory.getUserCompany($scope.user.id);
                //Session.remembercompany(uc);
            }

        } else {
            $scope.moduleTitle = "Your Profile"
            $scope.mdl = 'app/components/account/profilestuff/profilepane.html';

            if (Session.recallprofile()) {
                $scope.userprofile = Session.recallprofile();
            } else {
                AccFactory.getUserProfile($scope.user.id);
            }
            // review refresh every time

            console.log($scope.userprofile);
            // $scope.userprofile.profilereviews
            //     = ReviewFactory.getByProfile($scope.userprofile.profile.profile_id);
            console.log($scope.userprofile.profilereviews);
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
                AccFactory.getUserProfile(response.data.user.id);
                $scope.mdl = 'app/components/account/profilestuff/profilepane.html';
                // should be run every time
                $rootScope.userprofile.profilereviews
                    = ReviewFactory.getByProfile($rootScope.userprofile.profile.profile_id);
                console.log($rootScope.userprofile.profilereviews);
            }
            else {
                $scope.moduleTitle = "Your Company"
                $scope.usertype = "service provider";
                $scope.mdl = 'app/components/account/companystuff/companypane.html';
                AccFactory.getUserCompany(response.data.user.id);
            }


        }, function errorCallback(response) {
            $scope.stat = response.data.message;
        });
    }



    //methods - maybe we should add factories for the profiles and companies instead of declaring everythong int he controller? 




});