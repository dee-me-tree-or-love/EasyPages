app.controller('PublicCopmanyCtrl', function ($scope, $auth, Session,
    PublicAccountFactory,
    $http, $rootScope,
    $state, $stateParams) {

    $cpID = $stateParams.companyID;


    $scope.getCompany = PublicAccountFactory.getCompany($cpID).then(function (resp) {
        console.log(resp);
        $scope.company = resp;
    });


    $scope.refresh = function () {
        //$state.reload();
        $scope.getCompany = PublicAccountFactory.getCompany($cpID).then(function (resp) {
            console.log(resp);
            $scope.company = resp;
        });
        // Stop the ion-refresher from spinning
        $scope.$broadcast('scroll.refreshComplete');
    }

});