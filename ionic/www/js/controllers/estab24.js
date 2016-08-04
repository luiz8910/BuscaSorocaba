angular.module('starter.controllers')
    .controller('Estab24Ctrl', ['$scope', '$state', '$estab24', '$ionicLoading',
        function ($scope, $state, $estab24, $ionicLoading) {
            var id = window.localStorage['id'];
            var nome = window.localStorage['nome'];

            $scope.estabelecimentos = [];
            $scope.nome = nome;

            $ionicLoading.show({
                template: "Buscando por " + nome
            });

            $estab24.query({id: id}, function (data) {
                $scope.estabelecimentos = data;
                $ionicLoading.hide();
            });

            $scope.exibirPerfil = function (data) {
              window.localStorage['perfil_id'] = data.id;
              window.localStorage['perfil_nome'] = data.nome;
            };

    }]);
