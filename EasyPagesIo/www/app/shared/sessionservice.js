app.service('Session', function ($rootScope, LOGGED_STATUS) {
  // called at login
  this.create = function (user) {
    localStorage.setItem('user', user)
    localStorage.setItem('isAuthorized', LOGGED_STATUS.yes)
  };
  
  this.recalluser = function (){
    return JSON.parse(localStorage.getItem('user'))
  }

  this.rememberprofile = function (profile) {
    localStorage.setItem('profile', JSON.stringify(profile))
    // maybe something else? 
  };

  this.recallprofile = function () {
    return JSON.parse(localStorage.getItem('profile'))
  };

  this.remembercompany = function (company) {
    localStorage.setItem('company', JSON.stringify(company))
    // maybe something else? 
  };

  this.recallcompany = function () {
    return JSON.parse(localStorage.getItem('company'))
  };

  this.destroy = function () {
    localStorage.clear();
    localStorage.setItem('isAuthorized', LOGGED_STATUS.no)
  };
})