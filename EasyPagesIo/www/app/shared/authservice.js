// global variable
app.value('isLoggedIn', false);

// a service to control the authorization and atuhentication
app.factory('AuthService', function ($http, Session) {
  var authService = {};
 
  authService.isAuthenticated = function () {
    return app.isLoggedIn;
  };
 
  return authService;
})