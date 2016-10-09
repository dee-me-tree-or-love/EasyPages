app.run(function ($rootScope, LOGGED_STATUS, $state) {
  $rootScope.$on('$stateChangeStart', function (event, next) {
    if (next.data.requiredAuthState) {// something is specified
      var requiredStatus = next.data.requiredAuthState;
      if(!localStorage.getItem('isAuthorized'))
      {
        localStorage.setItem('isAuthorized',LOGGED_STATUS.no)
      }
      if (localStorage.getItem('isAuthorized') != requiredStatus 
        && requiredStatus!=LOGGED_STATUS.any) {
        //they do not match -> you shall not pass <|>:{>
        event.preventDefault();
        console.log("You shall not pass!");
        if(next.url.includes('account')){
          $state.go('tab.login');
        }
        if(next.url.includes('login')||next.url.includes('register')){
          $state.go('tab.account');
        }
      }
    }

  });
})