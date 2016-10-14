app.controller('PublicProfileCtrl', function ($scope, $auth, Session,
    PublicAccountFactory,
    $http, $rootScope,
    $state, $stateParams) {

    $proID = $stateParams.profileID;

    $scope.profile = PublicAccountFactory.getProfile($proID).then(function (resp){
        $scope.profile = resp;
        switch($scope.profile.sex)
        {
            case 'm':
            {
                $scope.profilepicurl = "assets/img/dprofpics/person-flat.png";
                break;
            }
            case 'f':
            {
                $scope.profilepicurl = "assets/img/dprofpics/person-girl-flat.png";
                break;
            }
            default:
            {
                $scope.profilepicurl = "assets/img/dprofpics/hotdog-flat.png";
                break;
            }
        }
    });

});