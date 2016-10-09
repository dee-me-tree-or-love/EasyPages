app.factory('AccFactory', function ($http, Session, $ionicHistory, $state, $auth, $rootScope) {

    var accountService = {};
    accountService.getUserProfile = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/profile/' + userid;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            var userprofile = response.data.message;
            var usercompany = {};
            localStorage.setItem('userprofile', userprofile);
            localStorage.setItem('usercompany', usercompany);
        }, function errorCallback(response) {
            //$state.go('tab.acinit');
        });
    }

    accountService.getUserCompany = function getUser(userid) {
        $url = 'http://localhost:8000/api/eplar/company/user/' + userid;
        $http({
            method: 'GET',
            url: $url
        }).then(function successCallback(response) {
            // everything went well!
            var usercompany = response.data.message;
            var userprofile = {};
            localStorage.setItem('userprofile', userprofile);
            localStorage.setItem('usercompany', usercompany);
        }, function errorCallback(response) {
            //$state.go('tab.acinit');
        });
    }
});