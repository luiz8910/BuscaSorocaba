angular.module('starter.controllers')
    .controller('EstabelecimentosCtrl', ['$scope', '$state', '$estab', '$ionicLoading',
        function ($scope, $state, $estab, $ionicLoading) {

            var id = window.localStorage['key'];
            var nome = window.localStorage['nome'];


            $scope.estabelecimentos = [];
            $scope.nome = nome;

            $ionicLoading.show({
                template: "Buscando por " + nome
            });

            $estab.query({id: id}, function (data) {
                $scope.estabelecimentos = data;
                $ionicLoading.hide();
            });

            $scope.exibirPerfil = function (data) {
              window.localStorage['perfil_id'] = data.id;
              window.localStorage['perfil_nome'] = data.nome;
              window.localStorage['perfil_telefone'] = data.telefone;
              window.localStorage['perfil_img'] = data.img;
            };

    }]);
