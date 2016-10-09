app.factory('ServicesFactory', function($http) {
  // Might use a resource here that returns a JSON array

   var servService = {};

   servService.getAll = function($rvewcontainer){
     var reviews =[];
     $http({
        method: 'GET',
        url: 'http://localhost:8000/api/eplar/reviews'
    }).then(function successCallback(response) {
        // everything went well! 
        $rvewcontainer = response.data.message;
    }, function errorCallback(response) {
        //nothing happens
        console.log("couldn't load")
    });
   }
   
   servService.getById - function (){
     // todo
   }

   servService.publish - function ($newservice){
     // todo
   }
   servService.remove - function ($delservice){
     // todo
   }



  return servService;
  
});
