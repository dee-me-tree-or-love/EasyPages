app.factory('ServicesFactory', function ($http, APIROUTING) {
  // Might use a resource here that returns a JSON array

  var servService = {};

  servService.getAll = function ($rvewcontainer) {
    var reviews = [];
    $http({
      method: 'GET',
      url: APIROUTING.host + APIROUTING.prefix+'reviews'
    }).then(function successCallback(response) {
      // everything went well! 
      $rvewcontainer = response.data.message;
    }, function errorCallback(response) {
      //nothing happens
      console.log("couldn't load")
    });
  }

  servService.getById = function () {
    // todo
  }

  servService.publish = function ($newservice) {

    $url = APIROUTING.host + APIROUTING.prefix+'newservice';
    $http({
      method: 'POST',
      url: $url,
      data: { title: $newservice.title, price: $newservice.price, description: $newservice.description, company_id: $newservice.company_id }
    });
  }

  servService.remove = function ($delservice) {
    // todo
  }



  return servService;

});
