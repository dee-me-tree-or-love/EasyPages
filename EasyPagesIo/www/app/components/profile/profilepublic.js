app.controller('PublicProfileCtrl', function ($scope, $auth, Session,
    PublicAccountFactory,
    $http, $rootScope,
    $state, $stateParams) {

    $proID = $stateParams.profileID;

    $scope.profile = PublicAccountFactory.getProfile($proID).then(function (resp){
        $scope.profile = resp;
    });



});