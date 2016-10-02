var appservices = angular.module('starter.services', [])

  .factory('Chats', function () {
    // Might use a resource here that returns a JSON array

    // Some fake testing data
    var chats = [{
      id: 0,
      name: 'Ben Sparrow',
      lastText: 'You on your way?',
      face: 'assets/img/ben.png'
    }, {
        id: 1,
        name: 'Max Lynx',
        lastText: 'Hey, it\'s me',
        face: 'assets/img/max.png'
      }, {
        id: 2,
        name: 'Adam Bradleyson',
        lastText: 'I should buy a boat',
        face: 'assets/img/adam.jpg'
      }, {
        id: 3,
        name: 'Perry Governor',
        lastText: 'Look at my mukluks!',
        face: 'assets/img/perry.png'
      }, {
        id: 4,
        name: 'Mike Harrington',
        lastText: 'This is wicked good ice cream.',
        face: 'assets/img/mike.png'
      }];

    return {
      all: function () {
        return chats;
      },
      remove: function (chat) {
        chats.splice(chats.indexOf(chat), 1);
      },
      get: function (chatId) {
        for (var i = 0; i < chats.length; i++) {
          if (chats[i].id === parseInt(chatId)) {
            return chats[i];
          }
        }
        return null;
      }
    };
  })




  .factory('ReviewsFactory', function ($http, $ionicLoading) {
    // Might use a resource here that returns a JSON array
    var reviews = [];
    // $ionicLoading.show();
    console.log("start loading");
    $http({
          method: 'GET',
          url: 'http://localhost:8000/api/eplar/reviews'
        }).then(function successCallback(response) {
          // everything went well! 
          console.log("loaded");

          reviews = response.data.message;
        }, function errorCallback(response) {
          console.log("not loaded");

          //nothing happens
        });

    return {
      all: function () {
        return reviews;
      },
      remove: function (review) {
        reviews.splice(review.indexOf(chat), 1);
      },
      get: function (reviewId) {
        for (var i = 0; i < reviews.length; i++) {
          if (reviews[i].review_id === parseInt(reviewId)) {
            return reviews[i];
          }
        }
        return null;
      }
    };
  });

