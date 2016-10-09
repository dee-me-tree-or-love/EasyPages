app.service('Session', function ($rootScope, LOGGED_STATUS) {
    // called at login
  this.create = function (user) {
    localStorage.setItem('user',user)
    localStorage.setItem('isAuthorized',LOGGED_STATUS.yes)
  };

  this.rememberprofile = function (profile) {
    localStorage.setItem('profile',profile)
    // maybe something else? 
  };

  this.remembercompany = function (company) {
    localStorage.setItem('company',company)
    // maybe something else? 
  };

  this.destroy = function () {
    localStorage.clear();
    localStorage.setItem('isAuthorized',LOGGED_STATUS.no)
  };
})