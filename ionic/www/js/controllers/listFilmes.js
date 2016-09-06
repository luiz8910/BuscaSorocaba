


angular.module('starter.controllers')
    .controller('FilmeCtrl', function ($scope, $listFilmes, $listShoppings) {

        $scope.Tab1 = function (item) {
            if(item == 1)
            {
                return true;
            }

            return false;
        };

        $scope.Tab2 = function (item) {
            if(item == 2)
            {
                return true;
            }

            return false;
        };

        $scope.Tab3 = function (item) {
            if(item == 3)
            {
                return true;
            }

            return false;
        };

        $listFilmes.query({}, function(data){
            $scope.filmes = data;
            //$ionicLoading.hide();
        });

        $listShoppings.query({}, function (data) {
            $scope.shoppings = data;
        })

    });
