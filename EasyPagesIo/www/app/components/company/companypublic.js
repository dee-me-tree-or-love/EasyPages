app.controller('PublicCopmanyCtrl', function ($scope, $auth, Session,
    PublicAccountFactory,
    $http, $rootScope,
    $state, $stateParams) {

    $cpID = $stateParams.companyID;

    $scope.company = PublicAccountFactory.getCompany($cpID).then(function (resp){
        console.log(resp);
        $scope.company = resp;
    });



});