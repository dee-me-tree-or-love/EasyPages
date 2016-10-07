app.factory('ReviewsFactory', function($http) {
  // Might use a resource here that returns a JSON array
   var reviews = [];
   $http({
        method: 'GET',
        url: 'http://localhost:8000/api/eplar/reviews'
    }).then(function successCallback(response) {
        // everything went well! 
        reviews = response.data.message;
    }, function errorCallback(response) {
        //nothing happens
    });

  return {
    all: function() {
      return reviews;
    },
    remove: function(review) {
      reviews.splice(review.indexOf(chat), 1);
    },
    get: function(reviewId) {
      for (var i = 0; i < reviews.length; i++) {
        if (reviews[i].review_id === parseInt(reviewId)) {
          return reviews[i];
        }
      }
      return null;
    }
  };
});
