angular.module('starter.controllers')
    .controller('FilmeCtrl', ['$scope', '$state', '$ionicLoading', '$listFilmes',
        function ($scope, $state, $ionicLoading, $listFilmes)
        {
            $ionicLoading.show({
                template: 'Carregando'
            });

            $listFilmes.query({}, function(data){
                $scope.filmes = data;
                $ionicLoading.hide();
            });
        }]);


