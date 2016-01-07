app.controller('employeesController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "/task")
            .success(function(response) {
                $scope.employees = response["tasks"];
                console.log(response["tasks"]);
            });    
});