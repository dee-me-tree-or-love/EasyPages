app.config(function ($stateProvider, $urlRouterProvider, $authProvider, LOGGED_STATUS) {


  $authProvider.loginUrl = 'http://localhost:8000/api/eplar/authenticate';

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
      cache: false,
      views: {
        'tab-dash': {
          templateUrl: 'app/components/dashboard/tab-dash.html',
          controller: 'DashCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.any
      }
    })
    .state('tab.service', {
      cache: false,
      url: '/services/:serviceId',
      views: {
        'tab-dash': {
          templateUrl: 'app/components/service/serv-detail.html',
          controller: 'ServCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.any
      }
    })
    
    // for overview of companies and profiles
    .state('tab.company', {
      cache: false,
      url: '/companies/:companyID',
      views: {
        'tab-dash': {
          templateUrl: 'app/components/copmany/companypublic.html',
          controller: 'ServCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.any
      }
    })
    .state('tab.profile', {
      cache: false,
      url: '/profiles/:profileID',
      views: {
        'tab-dash': {
          templateUrl: 'app/components/copmany/profilepublic.html',
          controller: 'ServCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.any
      }
    })

    .state('tab.review', {
      url: '/reviews/:reviewId',
      views: {
        'tab-dash': {
          templateUrl: 'app/components/review/review-detail.html',
          controller: 'RvwCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.any
      }
    })
    .state('tab.newreview', {
      url: '/reviews/publish/:serviceId',
      views: {
        'tab-dash': {
          templateUrl: 'app/components/review/newreview/creatervw.html',
          controller: 'NewRvwCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.yes
      }
    })

    .state('tab.explore', {
      url: '/explore',
      views: {
        'tab-explore': {
          templateUrl: 'app/components/explore/tab-explore.html',
          controller: 'ExploreCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.any
      }
    })
    // .state('tab.chat-detail', {
    //   url: '/chats/:chatId',
    //   views: {
    //     'tab-chats': {
    //       templateUrl: 'templates/chat-detail.html',
    //       controller: 'ChatDetailCtrl'
    //     }
    //   }
    // })

    .state('tab.account', {
      cache: false,
      url: '/account',
      views: {
        'tab-account': {
          templateUrl: 'app/components/account/account.html',
          controller: 'AccCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.yes
      }
    })
    .state('tab.login', {
      url: '/login',
      views: {
        'tab-account': {
          templateUrl: 'app/components/auth/authlogin.html',
          controller: 'LoginCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.no
      }
    })
    .state('tab.register', {
      cache: false,
      url: '/register',
      views: {
        'tab-account': {
          templateUrl: 'app/components/auth/authreg.html',
          controller: 'RegCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.no
      }
    }).state('tab.acinit', {
      url: '/accountinit',
      cache: false,
      views: {
        'tab-account': {
          templateUrl: 'app/components/account/setup/accountsetup.html',
          controller: 'AccSetupCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.yes
      }
    }).state('tab.acedit', {
      url: '/accountinit',
      cache: false,
      views: {
        'tab-account': {
          templateUrl: 'app/components/account/setup/accountsetup.html',
          controller: 'AccSetupCtrl'
        }
      },
      data: {
        requiredAuthState: LOGGED_STATUS.yes
      }
    });


  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/tab/dash');

});