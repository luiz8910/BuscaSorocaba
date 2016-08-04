angular.module('starter.controllers')
    .controller('_24hCtrl', ['$scope', '$state','$ionicLoading', '$_24h',
        function ($scope, $state, $ionicLoading, $_24h) {
            $scope.sub = [];

            $ionicLoading.show({
                template: "Carregando..."
            });

            $scope.exibirEstab = function (data) {
                window.localStorage['id'] = data.id;
                window.localStorage['nome'] = data.nome;
            };

            $_24h.query({}, function (data) {
                $scope.sub = data;
                $ionicLoading.hide();
            });
    }]);
