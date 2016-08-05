angular.module('starter.controllers')
    .controller('EmergenciaCtrl', ['$scope', '$state','$ionicLoading', '$emergencia',
        function ($scope, $state, $ionicLoading, $emergencia) {
            $scope.sub = [];

            $ionicLoading.show({
                template: "Carregando..."
            });

            $scope.exibirEstab = function (data) {
                window.localStorage['id'] = data.id;
                window.localStorage['nome'] = data.nome;
            };

            $emergencia.query({}, function (data) {
                $scope.sub = data;
                $ionicLoading.hide();
            });
    }]);
