app.controller('AccSetupCtrl', function (
    $scope, $auth, APIROUTING,
    $http, $rootScope, // the data about the companies and profiles is in the rootscope
    $ionicHistory, $state,
    AccFactory, Session) {

    // definitely requires a factory
    $url = APIROUTING.host + APIROUTING.prefix + 'authenticate/user';
    $scope.user = 0;
    $scope.data = {};
    $scope.mdl = "";
    $scope.mdltemp = "app/components/account/setup";

    $scope.initializeCompany = function (x) {
        AccFactory.initializeCompany(x);
    }
    $scope.updateCompany = function (x) {
        AccFactory.updateCompany(x);
    }
    $scope.initializeProfile = function (x) {
        AccFactory.initializeProfile(x);
    }
    $scope.updateProfile = function (x) {
        AccFactory.updateProfile(x);
    }



    if (Session.recalluser()) {
        $scope.user = Session.recalluser();
        if ($scope.user.type != 'c') {
            // a profile
            $scope.mdltemp += "/profilesetup";
            if (Session.recallprofile($scope.user.id)) {
                $scope.profile = Session.recallprofile($scope.user.id);
            }
            else {
                AccFactory.getUserProfile($scope.user.id);
                $scope.profile = Session.recallprofile($scope.user.id);
            }
            if ($scope.profile) {
                $scope.profile = $scope.profile.profile;
                $scope.mdltemp += "/exprofilesetupmod.html";
            } else {
                $scope.mdltemp += "/profilesetupmod.html";
            }
        } else {
            //a compnay
            $scope.mdltemp += "/companysetup";
            if (Session.recallcompany($scope.user.id)) {
                $scope.company = Session.recallcompany($scope.user.id)
            }
            else {

                AccFactory.getUserCompany($scope.user.id);
                $scope.company = Session.recallcompany($scope.user.id)
            }
            if ($scope.company) {
                $scope.company = $scope.company.company;
                $scope.mdltemp += "/excompanysetupmod.html";
            } else {
                $scope.mdltemp += "/companysetupmod.html";
            }
        }
    }
    $scope.mdl = $scope.mdltemp;


});