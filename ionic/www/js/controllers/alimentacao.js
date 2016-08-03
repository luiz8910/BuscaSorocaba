angular.module('starter.controllers')
    .controller('AlimentacaoCtrl', ['$scope', '$state', 'SubCategoria','$ionicLoading',
        function ($scope, $state, SubCategoria, $ionicLoading) {
            $scope.sub = [];

            $ionicLoading.show({
                template: "Carregando..."
            });

            $scope.exibirEstab = function (data) {
                window.localStorage['key'] = data.id;
                window.localStorage['nome'] = data.nome;
            };

            SubCategoria.query({}, function (data) {
                $scope.sub = data;
                $ionicLoading.hide();
            });
    }]);
