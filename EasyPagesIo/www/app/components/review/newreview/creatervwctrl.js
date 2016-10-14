appcntrls.controller('NewRvwCtrl', function ($scope, $http, $state, 
$stateParams, $ionicHistory, $rootScope, 
ReviewFactory, LOGGED_STATUS) {
    if ((localStorage.getItem('isAuthorized') == LOGGED_STATUS.yes)) {
        $scope.user = JSON.parse(localStorage.getItem('user'));
        if ($scope.user.type != 'c') {
            $scope.mdl = 'app/components/review/newreview/forprofiles/templ.html';
        }else{
            $scope.mdl = 'app/components/review/newreview/forcompanies/templ.html';
        }
    } else {
        $state.go('tab.login')
    }
    $scope.service_id = $stateParams.serviceId;
    console.log($scope.mdl)
    $scope.createReview = function createReview(x) {
        x.service_id = $stateParams.serviceId;
        ReviewFactory.publish(x);

         $ionicHistory.nextViewOptions({
                        disableBack: true
                    });

        $state.go('tab.service',{serviceId: $scope.service_id})
    }





});

