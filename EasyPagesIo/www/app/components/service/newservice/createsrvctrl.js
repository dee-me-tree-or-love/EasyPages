appcntrls.controller('NewSrvCtrl', function ($scope, $http, $state, 
$stateParams, $ionicHistory, $rootScope, 
ServicesFactory, LOGGED_STATUS) {
    if ((localStorage.getItem('isAuthorized') == LOGGED_STATUS.yes)) {
        $scope.user = JSON.parse(localStorage.getItem('user'));
        if ($scope.user.type != 'c') {
            $scope.mdl = 'app/components/service/newservice/forprofiles/templ.html';
        }else{
            $scope.mdl = 'app/components/service/newservice/forcompanies/templ.html';
        }
    } else {
        $state.go('tab.login')
    }
    $scope.company_id = $stateParams.companyId;
    console.log($scope.mdl)
    $scope.createService = function createService(x) {
        x.company_id = $stateParams.companyId;
        ServicesFactory.publish(x);

         $ionicHistory.nextViewOptions({
                        disableBack: true
                    });

        $state.go('tab.account');
    }





});

