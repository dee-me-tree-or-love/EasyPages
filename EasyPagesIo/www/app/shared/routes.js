app.config(function($stateProvider, $urlRouterProvider, $authProvider) {

  
  $authProvider.loginUrl = 'http://localhost:8000/api/authenticate';

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

  // setup an abstract state for the tabs directive
    .state('tab', {
    url: '/tab',
    abstract: true,
    templateUrl: 'templates/tabs.html'
  })

  // Each tab has its own nav history stack:

  .state('tab.dash', {
    url: '/dash',
    views: {
      'tab-dash': {
        templateUrl: 'app/components/dashboard/tab-dash.html',
        controller: 'DashCtrl'
      }
    }
  })
  .state('tab.service', {
    url: '/services/:serviceId',
    views: {
      'tab-dash': {
        templateUrl: 'app/components/service/serv-detail.html',
        controller: 'ServCtrl'
      }
    }
  })

  .state('tab.explore', {
      url: '/explore',
      views: {
        'tab-chats': {
          templateUrl: 'app/components/explore/tab-explore.html',
          controller: 'ExploreCtrl'
        }
      }
    })
    .state('tab.chat-detail', {
      url: '/chats/:chatId',
      views: {
        'tab-chats': {
          templateUrl: 'templates/chat-detail.html',
          controller: 'ChatDetailCtrl'
        }
      }
    })

  .state('tab.login', {
    url: '/account',
    views: {
      'tab-account': {
        templateUrl: 'app/components/auth/authlogin.html',
        controller: 'LoginCtrl'
      }
    }
  })
  .state('tab.register', {
    url: '/register',
    views: {
      'tab-account': {
        templateUrl: 'app/components/auth/authreg.html',
        controller: 'RegCtrl'
      }
    }
  });

  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/tab/dash');

});