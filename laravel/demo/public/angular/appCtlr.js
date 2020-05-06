app.controller('appCtlr', ['$scope', function($scope) {

    $scope.click = function() {
        $scope.prixttc = parseFloat($scope.prix * $scope.tva) + parseFloat($scope.prix);


    }
}]);